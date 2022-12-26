<?php

namespace App\Http\Controllers;

use App\Page;
use App\Content;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateServiceRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Requests\UpdateServiceBagRequest;

class ServiceController extends Controller
{

    protected $sections;

    public function __construct(){
        $this->sections = Page::where('name', 'servicios')->first()->sections;
    }


    public function content()
    {
        $sections = $this->sections;
        $section1s = $sections->where('name', 'section_1')->first()->contents;
        $section2 = $sections->where('name', 'section_2')->first()->contents()->first();
        return view('administrator.service.content', compact('section1s', 'section2'));
    }

    public function updateService(UpdateServiceRequest $request)
    {
        $this->update($request);
    }

    public function updateBag(UpdateServiceBagRequest $request)
    {
        $this->update($request);
    }

    private function update($request){
        $element = Content::find($request->input('id'));
        $data = $request->all();
        
        if($request->hasFile('image')){
            if(Storage::disk('custom')->exists($element->image))
                Storage::disk('custom')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images','custom');
        }        

        $element->update($data);
    }

    /**
     * @author Raul castro
     * @return datatable
     */

    public function sliderGetList()
    {
        $sections = $this->sections;
        $section1s = $sections->where('name', 'section_1')->first()->contents()->orderBy('order', 'ASC');

        return DataTables::of($section1s)
        ->editColumn('image', function($section){
            return '<img src="'.asset($section->image).'" class="img-fluid" style="max-width:100px">';
        })
        ->addColumn('actions', function($section) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$section->id.')"></button>';
        })
        ->rawColumns(['actions', 'image'])
        ->make(true);
    }

}
