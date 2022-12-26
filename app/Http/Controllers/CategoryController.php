<?php

namespace App\Http\Controllers;

use App\Page;
use App\Content;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    protected $cordon;
    protected $cinta;

    public function __construct(){
        $this->cordon = Page::where('name', 'cordon')->first()->sections()->first()->contents()->first();
        $this->cinta = Page::where('name', 'cinta')->first()->sections()->first()->contents()->first();
    }


    public function content()
    {
        $cordon = $this->cordon;
        $cinta = $this->cinta;

        return view('administrator.category.content', compact('cordon', 'cinta'));
    }

    public function update(UpdateCategoryRequest $request)
    {
        $element = Content::find($request->input('id'));
        $data = $request->all();
        
        if($request->hasFile('image')){
            if(Storage::disk('custom')->exists($element->image))
                Storage::disk('custom')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images','custom');
        }        
        $element->update($data);
    }

}
