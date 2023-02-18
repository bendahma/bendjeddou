<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Category\AddCategoryRequest;
use Alert;
class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('backoffice.category.index')->with('categories',$categories);
    }

    public function create()
    {
        return view('backoffice.category.add');
    }

    public function store(Request $request)
    {
        $count = Category::where('name',$request->name)->count();
        if($count > 0) {
           toast('La category ' . $request->name . ' déjà existe','error');
        }else{

           $category = Category::create([
              'name' => $request->name,
            ]);
            toast('Nouvelle category ajouté avec success','success');
         }
        return redirect(route('category.index'));
    }

    public function edit(Category $category)
    {
        return view('backoffice.category.add')->with('category',$category);
    }

    public function update(Request $request, Category $category)
    {
        $category->update([
            'name' => $request->name,
        ]);
        toast('Category Updated successfully','Success');
        return redirect(route('category.index'));
    }

    public function supprime(Category $category)
    {
        $category->delete();
        toast('categorie supprime avec success','success');
        return redirect(route('category.index'));
    }

    public function products(Category $category){
        $products = Product::whereHas('category',function($q) use ($category){
            $q->where('id',$category->id);
        })->with(['marque','category'])->get();
        return view('backoffice.category.products')->with('products',$products);
    }
}
