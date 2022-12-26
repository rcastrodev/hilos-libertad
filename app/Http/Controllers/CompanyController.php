<?php

namespace App\Http\Controllers;

use App\Page;
use App\Content;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCompanySlider;
use App\Http\Requests\UpdateCompanySlider;
use App\Http\Requests\UpdateCompanyInfoRequest;
use App\Http\Requests\UpdateCompanyRibbonRequest;

class CompanyController extends Controller
{
    protected $page;

    public function __construct(){
        $this->page = Page::where('name', 'empresa')->first();
    }


    public function content()
    {
        $page = Page::where('name', 'empresa')->first();
        $sections   = $page->sections;
        $section2   = $sections->where('name', 'section_2')->first()->contents()->first();
        $section3   = $sections->where('name', 'section_3')->first()->contents()->first();
        return view('administrator.company.content', compact('page', 'section2', 'section3'));
    }
    

    public function storeSlider(StoreCompanySlider $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store('images','custom');
        
        Content::create($data);
        return response()->json(['tableReload' => true],201);
    }

    public function updateSlider(UpdateCompanySlider $request)
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

    public function updateRibbon(UpdateCompanyRibbonRequest $request)
    {
        $this->updateGeneric($request);
    }

    public function updateInfo(UpdateCompanyInfoRequest $request)
    {
        $this->updateGeneric($request);
    }


    public function destroyHomeGenericSection($id)
    {
        Content::find($id)->delete();
        return response()->json([], 200);
    }

    public function sliderGetList()
    {
        $sectionSlider = $this->page
            ->sections()
            ->where('name', 'section_1')
            ->first();

        $sliders = $sectionSlider->contents()->orderBy('order', 'ASC');

        return DataTables::of($sliders)
        ->editColumn('image', function($slider){
            return '<img src="'.asset($slider->image).'" class="img-fluid" style="max-width:100px">';
        })
        ->addColumn('actions', function($slider) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$slider->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$slider->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'image'])
        ->make(true);
    }

    private function updateGeneric($request)
    {
        $element = Content::find($request->input('id'));
        $data = $request->all();    
        $element->update($data);
    }
}
