<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\HelpCategory;

class HelpCategoryController extends Controller
{
    
    public function index()
    {
        return view('backend.help_category.index');
    }

    public function getdetails(Request $request)
    {
       
            $data = HelpCategory::get();
            return DataTables::of($data)
                ->addColumn('status', function($data){
                    if($data->status == 'Enabled'){
                        $status = '<span class="badge badge-success">Enabled</span>';
                    }
                    else{
                        $status = '<span class="badge badge-danger">Disabled</span>';
                    }   
                    return $status;
                })
                ->addColumn('icon', function($data){
                    $img = '<img src="'.uploaded_asset($data->icon).'" style="width: 60%">';
                 
                    return $img;
                })
                ->addColumn('action', function($data){
                    $button1 = '<a href="'.route('admin.help_category.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-edit"></i> Edit </a>';
                    $button2 = '&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                    return $button1.$button2;
                })
                ->rawColumns(['action','status','icon'])
                ->make(true);
        
        return back();
    }

    public function store(Request $request)
    {        
        // dd($request);  

        $data = HelpCategory::where('name',$request->name)->first(); 
        // dd($data);
        if( $data == null ){
    
            if($request->icon == null){
                return back()->withErrors('Please Select an Icon');
            }else{            

                $add = new HelpCategory;

                $add->icon = $request->icon;
                $add->name = $request->name;        
                $add->description = $request->description;
                $add->order = $request->order;
                $add->status = $request->status;

                $add->save();

                return redirect()->route('admin.help_category.index')->withFlashSuccess('Added Successfully');
            }           

        }else{
            return back()->withErrors('Already Added This Category');
        }              

    }

    public function edit($id)
    {
        $categories = HelpCategory::where('id',$id)->first(); 

        return view('backend.help_category.edit',[
            'categories' => $categories
        ]);
    }

    public function update(Request $request)
    {        
        // dd($request);  
       
        if($request->icon == null){
             return back()->withErrors('Please Select an Icon');
        }else{   
        
            $update = new HelpCategory;

            $update->icon = $request->icon;
            $update->name = $request->name;         
            $update->description = $request->description;
            $update->order = $request->order;
            $update->status = $request->status;

            HelpCategory::whereId($request->hidden_id)->update($update->toArray());

            return redirect()->route('admin.help_category.index')->withFlashSuccess('Updated Successfully'); 
        }                 

    }

    public function destroy($id)
    {
        HelpCategory::where('id', $id)->delete(); 
    }

}
