<?php

namespace App\Http\Controllers;

use App\Page;
use App\Color;
use App\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreColorRequest;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\UpdateColorRequest;

class ColorController extends Controller
{

    public function content()
    {
        return view('administrator.color.content');
    }

    public function store(StoreColorRequest $request)
    {
        $data = $request->all();
        $data['exa'] = $request->file('exa')->store('images/colors', 'custom');
        Color::create($data);
        return response()->json(['tableReload' => true],201);
    }

    public function update(UpdateColorRequest $request)
    {

        $element = Color::find($request->input('id'));
        $data = $request->all();
        
        if($request->hasFile('exa')){
            if(Storage::disk('custom')->exists($element->exa))
                Storage::disk('custom')->delete($element->exa);
            
            $data['exa'] = $request->file('exa')->store('images/colors','custom');
        }    

        $element->update($data);
    }

    public function destroy($id)
    {
        $element = Color::find($id);
        if(Storage::disk('custom')->exists($element->exa))
            Storage::disk('custom')->delete($element->exa);

        $element->delete();
    }   
            
    public function find($id)
    {
        $content = Color::find($id);
        return response()->json(['content' => $content]);
    }

    public function getList()
    {
        return DataTables::of(Color::query())
        ->editColumn('exa', function($color) {
            
            return '<img src="'.asset($color->exa).'" style="width:100px;">';
        })
        ->addColumn('actions', function($color) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$color->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$color->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'exa'])
        ->make(true);
    }
}
