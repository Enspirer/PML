<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\PropertyType;

class PropertyTypeController extends Controller
{
    
    public function index()
    {
        return view('backend.property_type.index');
    }

    public function create()
    {
        return view('backend.property_type.create');
    }

    public function getDetails(Request $request)
    {
        if($request->ajax())
        {
            $data = PropertyType::get();
            return DataTables::of($data)
            
                    ->addColumn('action', function($data){
                       
                        $button = '<a href="'.route('admin.property_type.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-edit"></i> Edit </a>';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                        return $button;
                    })
                    
                    ->editColumn('status', function($data){
                        if($data->status == '1'){
                            $status = '<span class="badge badge-success">Enable</span>';
                        }
                        else{
                            $status = '<span class="badge badge-danger">Disable</span>';
                        }   
                        return $status;
                    })
                    
                    ->rawColumns(['action','status'])
                    ->make(true);
        }
        return back();
    }


    public function store(Request $request)
    {        
        // dd($request);

        if($request->get('item') == null){
            return back()->withErrors('Add at least one attribute');
        } 
        else {

            $out_json = $request->item;
        
            $addprotype = new PropertyType;

            $addprotype->property_type_name=$request->property_type_name; 
            $addprotype->property_description=$request->property_description;  
            $addprotype->user_id = auth()->user()->id;
            $addprotype->status=$request->status;        

            $addprotype->activated_fields=json_encode($out_json);

            $addprotype->save();

            return redirect()->route('admin.property_type.index')->withFlashSuccess('Added Successfully');

        }


          
    }

    public function edit($id)
    {
        $property_type = PropertyType::where('id',$id)->first();
        
        // dd($property_type);              
        
        return view('backend.property_type.edit',[
            'property_type' => $property_type         
        ]);  
    }

    public function update(Request $request)
    {    

        if($request->get('item') == null){
            return back()->withErrors('Add at least one attribute');
        } 
        else {

        $out_json = $request->item;
        
        $updatpro_type = new PropertyType;
        
        $updatpro_type->property_type_name=$request->property_type_name; 
        $updatpro_type->property_description=$request->property_description;
        $updatpro_type->user_id = auth()->user()->id;
        $updatpro_type->status=$request->status;

        $updatpro_type->activated_fields=json_encode($out_json);
   
        PropertyType::whereId($request->hidden_id)->update($updatpro_type->toArray());

        return redirect()->route('admin.property_type.index')->withFlashSuccess('Updated Successfully'); 
        }                     

    }

    public function destroy($id)
    {        
        $data = PropertyType::findOrFail($id);
        $data->delete();   
    }


}
