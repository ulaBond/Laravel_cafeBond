<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;//для вывода данных из модели Category
use App\Models\Order;//для заполнения ордеров в БД
use App\Models\Order_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/**
 * ProductController - CRUD: create, added, edit, delete. 
 * @author Yuliia Bondarenko JKTV21 Year - 2023
 * 
 * @copyright Copyright 2023
 * 
 */
class ProductController extends Controller
{
    /**
     * Display a listing of the resource. 
     *  
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::orderBy('name', 'asc')->get();
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('products.index', compact('products', 'categories'));
    }
    //-----------------------list products by category
	public function productByCategory(Request $request)
	{
    //из формы передан id категории
        $data = $request->all();//данные, переданы формой
        $categories=Category::orderBy('name', 'asc')->get();//все категории
        $selectCategory=$data['category_id'];
    //если выбран All - все
		if($data['category_id']=='0'){
			return redirect('/productlist');//возврат на полный список товаров
		}else{        //если выбрана категория
			//запрос на выбоp пo категории
			$products = Product::where('category_id', $data['category_id'])->get();
			return view('products.index', compact('products','categories','selectCategory'));
		}
	}
    /**
     * Show the form for creating a new resource. 
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //список категорий для выбора
        $categories=Category::orderBy('name', 'asc')->get();//все категории
        return view('products.create', compact('categories'));
    }
    /**
     * Store a newly created resource in storage.
     * Что делает: закачка картинки и обработка данных формы add
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //закачка картинки и обработка данных формы add
        $request->validate([
            'title' => 'required',
			'units' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category_id' => 'required'
        ]);
        $data = $request->all(); //данные, переданы формой
        $filename = $request->file('image')->getClientOriginalName();//имя файла картинки
        $data['image'] = $filename;//записали имя файла для БД
        Product::create($data);//добавили данные в базу (INSERT)
        //---------------закачка картинки root/images/
        $file = $request->file('image');//путь исходной картинки
        if($filename){
            $file->move('../public/images', $filename);//загрузка изображения
        }
        return redirect('/productlist');//возврат к списку продуктов
    }
    /**
     * Display the specified resource.
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $categories=Category::orderBy('name', 'asc')->get();
        return view('products.detail', compact('categories', 'product'));
    }
    /**
     * Форма заказа.
     * 
     */
    public function form_order()
    {
        $categories=Category::orderBy('name', 'asc')->get();
        $products = Product::orderBy('created_at', 'desc')->get();
        $modal_message = "";
        
        return view('products.form', compact('categories',  'products','modal_message'));
    }
    /**
     * Обработка заказа.
     * Обработка формы и запись в базу данных
     */
    public function formstore(Request $request)
    {       
        $request->validate([
            'email' => 'required|string|email',
        ]);
        $categories=Category::orderBy('name', 'asc')->get();
		$products = Product::orderBy('created_at', 'desc')->get();
		
        $data = $request->all(); //данные, переданы формой        
        
        $productId = $request->productId;//массив данных id
        $product = $request->product;//массив chekbox
        //$modal_message = "Не все поля заполнены!";
        if($product == 0){//обработка, если отправили пустую форму                      
            // добавили JavaScript-код для окрытия модального окна
            return view('products.form', compact('categories', 'products'))
                ->with('modal_message', 'Вы не выбрали продукцию!');
        }
                         
        $total_price = 0;
        $order = Order::create($data);//создание записи в БД в таблицу Order    
        $id_order = $order->id;// id  из таблицы Order 
        //создание записи в БД в таблицу Order_detail
        foreach ($product as $key => $item) {//$key - номер элемента в массиве $product, $item - содержимоеэлемента в массиве $product
                $amount = $request->amount[$key];//количество товара из формы
                if($amount < 1){
                    $amount = 1;
                }

                $price = DB::table('products')->where('id', $productId[$key])->value('price');
                $name = DB::table('products')->where('id', $productId[$key])->value('title');
                $summ_prod = $price*$amount;//подсчет стоимости товара
                $total_price = $total_price+$summ_prod;
                if($total_price>0){
                    //$order = Order::create($data);//создание записи в БД в таблицу Order    
                    //$id_order = $order->id;// id  из таблицы Order 
                    DB::table('orders_detail')->insert(['products_id' => $productId[$key], 
                                                'amount' => $amount, 
                                                'price' =>  $price, 
                                                'product_name' => $name,
                                                'summ_prod' => $summ_prod, 
                                                'order_id' => $id_order]); 
                    $order = DB::table('orders')->where('id', $id_order)->update(['total_price' => $total_price]);
                    
                }else{
                    $id_order = 0;                    
                    return redirect('/form_order');
                }                            
            }

        return redirect('/orderconfirm/'.$id_order);//переход по адресу с номером ордера на показ деталей заказа
       
    }
    /**
     * Результат обработки заказа.
     * Метод для показа деталей заказа
     */
    public function orderconfirm($id_order){ // метод для показа деталей заказа
        if($id_order>0){    
            $orderClient = DB::table('orders')->where('id',$id_order)->get();
            $productOrder = DB::table('orders_detail')->where('order_id',$id_order)->get();
        }else{
            $orderClient = 0;$productOrder = 0;
        }
        return view('products.orderclient', compact('orderClient', 'productOrder', 'id_order'));
    }
    
    /**     
     * Show the form for editing the specified resource.
     * 
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //список категорий для выбора
        $categories=Category::orderBy('name', 'asc')->get();//все категории
        return view('products.edit', compact('categories', 'product'));
    }
    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category_id' => 'required'
        ]);
        $data = $request->all(); //данные, переданы формой
        //$data['price']=(float)$request->price; - преобразовать строку в число
        if($request->file('image')){
        $filename = $request->file('image')->getClientOriginalName();//имя файла картинки
        $data['image'] = $filename;//записали имя файла для БД
        //---------------закачка картинки root/images/
        $file = $request->file('image');//путь исходной картинки
            if($filename){
                //загрузка изображения из $file на сервер
                $file->move('../public/images', $filename);//загрузка изображения
            }
        }
        $product->update($data);//update data
        return redirect('/productlist');//возврат к списку продуктов
    }
    /**
     * Delete the specified resource from storage.
     * GET-метод: в переменной $product передаются все данные из таблицы БД по id 
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function delete(Product $product) 
    {
        $categories=Category::orderBy('name','asc')->get();
        return view('products.delete', compact('categories', 'product'));
    }
    /**
     * Delete the specified resource from storage.
     * POST-метод: в переменной $product передаются все данные из таблицы БД по id 
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function updelete(Product $product)
    {
        $product->delete();
        return view('products.deleteProduct');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
