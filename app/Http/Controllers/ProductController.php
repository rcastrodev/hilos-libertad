<?php

namespace App\Http\Controllers;

use App\Color;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function content()
    {
        return view('administrator.product.content');
    }

    public function create()
    {
        $categories = Category::all();
        $colors     = Color::all();
        
        return view('administrator.product.create', compact('categories', 'colors'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $product = Product::create($request->all());        
        
        if($request->input('colors')){
            if(in_array("-1", $request->input('colors'))){
                $product->colors()->attach(Color::pluck('id')->toarray());
            }else{
                $product->colors()->attach($request->input('colors'));
            }
        }
            
        
        if($request->hasFile('images')){
            foreach($request->file('images') as $image){
                $product->images()->create([
                    'image' => $image->store('images/products', 'custom')
                ]);
            }
        }
 
        return redirect()
            ->route('product.content.edit', ['id' => $product->id])
            ->with('mensaje', 'Producto creado');

    }

    public function edit($id)
    {   
        $categories = Category::all();
        $colors     = Color::all();
        $product = Product::findOrFail($id);
        $numberOfImagesAllowed = 3 - $product->images()->count();
        return view('administrator.product.edit', compact('product', 'categories', 'colors', 'numberOfImagesAllowed'));
    }

    public function update(ProductRequest $request)
    {        
        $data = $request->all();
        $product = Product::find($request->input('id'));
        $product->update($data);
        $colorsProduct = $product->colors;
        
        
        if($request->input('colors')){
            /** destroy colors */
            if(in_array("-1", $request->input('colors'))){
                $product->colors()->detach();
                $product->colors()->attach(Color::pluck('id')->toarray());
            }else{
                $product->colors()->wherePivotNotIn('color_id', $request->input('colors'))->detach();

                /** update color */
                foreach ($request->input('colors') as $colorID) {
                    if(! in_array($colorID, $colorsProduct->pluck('id')->toArray()))
                        $product->colors()->attach($colorID);
                }
            }
        }else{
            $product->colors()->detach();
        }
            
        
        if($request->hasFile('images')){
            foreach($request->file('images') as $image){
                $product->images()->create([
                    'image' => $image->store('images/products', 'custom')
                ]);
            }
        }
        return back()->with('mensaje', 'Producto editado correctamente');
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
    }

    public function find($id)
    {
        $content = Product::find($id);
        return response()->json(['content' => $content]);
    }

    public function getColor($id)
    {
        $product = Product::find($id);

        return response()->json([
            'colors' => $product->colors
        ]);

    }

    public function getList()
    {
        return DataTables::of(Product::query())
        ->addColumn('category', function($product) {
            return $product->category->name;
        })
        ->addColumn('actions', function($product) {
            return '<a href="'.route('product.content.edit', ["id" => $product->id]).'" class="btn btn-sm btn-primary rounded-pill far fa-edit"></a><button class="btn btn-sm btn-danger rounded-pill" onclick="modalProductDestroy('.$product->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions'])
        ->make(true);
    }
}
