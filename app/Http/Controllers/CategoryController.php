<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
/**
 * CategoryController - CRUD: create, added, edit, delete. 
 * @author Yuliia Bondarenko JKTV21 Year - 2023
 * 
 * @copyright Copyright 2023
 * 
 */
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * Для вывода списка всех категорий на эту страницу
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //список всех категорий
        $categories = Category::orderBy('name','asc')->get();
        return view('categories.index', compact('categories'));
    }
    /**
     * Для вывода списка всех категорий на страницу Аbout_us.
     */
    public function about_us()
    {
        
        $categories = Category::orderBy('name','asc')->get();
        return view('categories.aboutUs', compact('categories'));
    }
    /**
     * Для вывода списка всех категорий на страницу Сontact.
     */
    public function contact()
    {
        //список всех категорий
        $categories = Category::orderBy('name','asc')->get();
        return view('categories.contact', compact('categories'));
    }
    /**
     * Для вывода списка всех категорий на страницу Products.
     */
    public function listMany()
    {
        //список всех категорий
        $categories = Category::orderBy('name','asc')->get();
        $products = Product::orderBy('image','asc')->get();
        return view('categories.list', compact('categories', 'products'));          	
    }
    /**
     * Для вывода списка всех категорий и продуктов по выбранной категории.
     */
    public function productslist($id)//передан id категории
    {
     $categoryOne=Category::where('id',$id)->first();
     $products=Product::where('category_id', $categoryOne->id)->get();
     $sortinglist = array('all','date asc','date desc','title asc', 'title desc');
		if(empty($categoryOne)){//если запись не существует, то ...
			return redirect('/listMany');//возврат на полные список
		}else{        //если выбрана категория
            $categories=Category::orderBy('name', 'asc')->get();//все категории              
			return view('categories.products', compact('products', 'categories','categoryOne', 'sortinglist'));
		}
    }  
    /** 
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response     */
    public function create()
    {
        return view('categories.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        Category::create($request->all());
        return redirect('/categorylist');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'=> 'required'
        ]);
        $category->update($request->all());

        return redirect('/categorylist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('/categorylist');
    }

}