<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Section;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::skip($request->input('offset'))->take(6)->get();

        return  response()->json($products);
    }


    public function get(Request $request)
    {
        $products = Product::get();
        $answers = array();
        $category = null;
        foreach($products as $product) {
            $category = Category::find($product->category_id);
            $category_title = $category->title;
            $product->category = $category_title;
            $section_id = $category->section_id;
            $product->section_id = $section_id;
            $section = Section::select('title')->find($section_id);
            //$section_title = $section->title;
            $product->section = $section->title;
            

        }
        return  response()->json($products);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required',
            'category_id' => 'required',
        ]);

        if ($validatedData->fails()) {
            return response()->json($validatedData->errors(), 422);
        }
        
        $last = Product::select('id')->latest('id')->first()->toArray();
        $lastId = $last['id'];
        $lastId++;
        $product = new Product();
        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $fileName = $lastId.'.'.$request->file('image')->getClientOriginalExtension();
        $product->image = $fileName;
        $product->category_id = $request->input('category_id');
        $product->save();
        $file = $request->file('image')->storeAs('/uploads', $fileName, [
            "disk" => 'public'
        ]);

        return json_encode($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->image = $request->input('image');
        $product->category_id = $request->input('category_id');
        $product->save();

        return json_encode($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    public function delete(Request $request) 
    {
        $id = $request->input('id');
        Product::destroy($id);

        return json_encode($id);
    }
}
