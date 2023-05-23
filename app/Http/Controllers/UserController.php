<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;//для заполнения ордеров в БД
use App\Models\Order_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;//сервис аутентификации
use Hash;// библиотека для кодлирования паролей
/**
 * UserController - CRUD: create, added, edit, delete. 
 * @author Yuliia Bondarenko JKTV21 Year - 2023
 * 
 * @copyright Copyright 2023
 * 
 */
class UserController extends Controller
{
    public $roles=array('admin', 'manager', 'user');//глобальный массив - все role
//------------------------------ lisr users
    /**
     * Display a listing of the resource.     
     * 
     * @return \Illuminate\Http\Response     */
    public function index()
    {
        $roles=$this->roles;//все role из глобального массива
        $users = User::orderBy('name', 'desc')->get();
        return view('users.index', compact('users','roles'));
    }


    public function orderlist()// показать все заказы пользователя по email
    {
        $user_email=Auth::user()->email;
        
        $ordersL= DB::table('orders')->where('email', $user_email)->get();//запрос в таблицу Order
        //$ordersDet = DB::table('order_detail')->where('order_id', $orders->id)->get() ;//запрос в таблицу , 'ordersDet'
       //  , 'ordersDet'           
		return view('products.orderlist', compact('ordersL'));
    }
    
//---------------------- list users by role
    public function userByrole(Request $request){
    //из формы передан id role
        $data = $request->all();//данные, переданы формой
        $roles=$this->roles;//все role из глобального массива
        $selectRole=$data['role'];
    //если выбран All - все
    if($data['role']=='0'){
        return redirect('/users');//возврат на полные спаисок role
    }else{        //если выбрана role
        //запрос на выбоp пo role
        $users = User::where('role', 'LIKE', $data['role'])->get();
        return view('users.index', compact('users','roles','selectRole'));
    }}
    /**
     * Show the form for creating a new resource. 
     * @return \Illuminate\Http\Response     */
    public function create()
    {
        $roles=array('admin', 'manager', 'user');
        return view('users.create', compact('roles'));
    }
    /** Store a newly created resource in storage.*
     * ******@param  \Illuminate\Http\Request  $request
     * ******@return \Illuminate\Http\Response     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);
        //-----------------запрос на добавление пользователя
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        return redirect('users');
    }
    /**    
     * Display the specified resource.     
     * 
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response     */
    
    public function show()
    {
       /* $user = $request->email;
        //$orderId = DB::table('orders')->where('name', $user['name'])->value('id');//запрос в таблицу Order 'orderId', 'orderDate', 'orderTprice',
        //$orderDate = DB::table('orders')->where('name', $user['name'])->value('order_date');//запрос в таблицу Order
        //$orderTprice = DB::table('orders')->where('name', $user['name'])->value('total_price');//запрос в таблицу Order
        $orders = DB::table('orders')->where('email', $user)->get();//запрос в таблицу Order
        //$ordersDet = Order_detail::where('order_id', $orders->id)->get() ;//запрос в таблицу , 'ordersDet'
                    
		return view('products.orderlist', compact('user', 'orders', 'request'));
		*/
    }
    /**     
     * Show the form for editing the specified resource.
     * 
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response     */

    public function edit(User $user)
    {
        $roles=array('admin', 'manager', 'user');
        return view('users.edit', compact('user','roles'));
    }
    /**     
     * Update the specified resource in storage.     
     * Что делает: проверка роли пользователя, 
     * login: form -> request authentificate,
     * authentificate проверка формы Login,
     * запрос на добавление пользователя
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response     
     * */

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);
        if(!isset($request->role)) $request->role=Auth::user()->role; //проверка роли пользователя
        if($request->password){//если пароль меняют!
            $request->validate([
                'password' => 'required|string|min:6|confirmed',
                'password_confirmation' => 'required',
            ]);
            $user->update([
                'name' => $request->name,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
        }else{//пароль НЕ меняют
            $user->update([
                'name' => $request->name,
                'role' => $request->role,
            ]);
        }
        return redirect('users');
    }
    //--------------------login: form -> request authentificate
    public function register()
    {
        return view('users.register');
    }
    //--------------------authentificate проверка формы Login
    public function adduser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);
        //-----------------запрос на добавление пользователя
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        return view('users.registerUser');
    }
    /**     
     * Remove the specified resource from storage.
     * 
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response     
     */

    public function destroy(User $user)
    {
        //
    }
}
