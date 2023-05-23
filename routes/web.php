<?php
/**
 * Routing. 
 * @author Yuliia Bondarenko JKTV21 Year - 2023
 * @copyright Copyright 2023 
 */
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
        return view('startMainPage');//Main page site
    //return view('start');// старт - форма Login
});
Route::get('/listMany', [CategoryController::class, 'listMany']);//переход на страницу Products со списком категорий
Route::get('/productsbycategory/{id}', [CategoryController::class, 'productslist']);
Route::get('/aboutUs', [CategoryController::class, 'about_us']);//переход на страницу About us...
Route::get('/contact', [CategoryController::class, 'contact']);//переход на страницу Contact...
Route::get('/show/{product}', [ProductController::class, 'show']);
//------------------------
Route::get('/formorder', [ProductController::class, 'form_order']);//форма заказа
Route::post('/formorder', [ProductController::class, 'formstore']);//обработка формы заказа
Route::get('/orderconfirm/{id}', [ProductController::class, 'orderconfirm']);//id order
//-------------------------
Route::get('/register', [UserController::class, 'register']);//вывод страницы - форма register
Route::post('/register', [UserController::class, 'adduser']);//обработка формы register
//----------------------------------------------------------------------
Route::group(['middleware'=>['auth']],function(){
    //только для авторизованных пользователей
Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard'); 
//--------------------------------------admin, manager 
Route::middleware('manager')->group(function(){ //Здесь все маршруты для MANAGER и ADMIN
//------------------------Category list CRUD ----------------------
        Route::get('/categorylist', [CategoryController::class, 'index']);
        Route::get('/addcategory', [CategoryController::class, 'create']);
        Route::post('/addcategory', [CategoryController::class, 'store']);

        Route::get('/editcategory/{category}', [CategoryController::class, 'edit']);
        Route::post('/editcategory/{category}', [CategoryController::class, 'update']);

        Route::delete('/deletecategory/{category}', [CategoryController::class, 'destroy']);
//------------------------Product list CRUD ----------------------
// список - вывод на страницу - get
        Route::get('/productlist', [ProductController::class, 'index']);
        // обработка данных формы - выбор категории - post
        Route::post('/productBycategory', [ProductController::class, 'productByCategory']);
        // показать форму добавления новости - get
        Route::get('/addproduct', [ProductController::class, 'create']);
        //– обработка формы добавления новости - post
        Route::post('/addproduct', [ProductController::class, 'store']);
        // показать форму редактирования новости - get
        Route::get('/editproduct/{product}', [ProductController::class, 'edit']);
        //– обработка формы редактирования новости - post
        Route::post('/editproduct/{product}', [ProductController::class, 'update']);
        // показать форму удаления новости - get
        Route::get('/deleteproduct/{product}', [ProductController::class, 'delete']);
        //– обработка формы удаления новости - post
        Route::post('/deleteproduct/{product}', [ProductController::class, 'updelete']);
});
//------------------------- ADMIN -------------------------------
Route::middleware('admin')->group(function(){
        //--------------------------User CRUD----------------------
        Route::get('/users', [UserController::class, 'index']);
        Route::post('/userByrole', [UserController::class, 'userByrole']);
        Route::get('/adduser', [UserController::class, 'create']);
        Route::post('/adduser', [UserController::class, 'store']);
}); 
Route::get('/profile/{user}', [UserController::class, 'edit']);//редактирование профиля для пользователя
        Route::get('/edituser/{user}', [UserController::class, 'edit']);
        Route::post('/edituser/{user}', [UserController::class, 'update']);
        Route::get('/orderlist', [UserController::class, 'orderlist']);//показать все заказы User
        
});//end of Route::group(['middleware'=>['auth']],function(){
//--------------------- login to admin panel
Route::get('/login', [AuthController::class, 'login'])->name('login');//вывод страницы - форма login
Route::post('/login', [AuthController::class, 'authentificate']);//обработка формы login
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');//