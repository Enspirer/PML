<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\HelpCategory;
use App\Models\HelpSupports;

class HelpSupportsController extends Controller
{
    
    public function index()
    {
        return view('backend.help_supports.index');
    }

    public function create()
    {
        $categories = HelpCategory::where('status','=','Enabled')->get();

        return view('backend.help_supports.create',[
            'categories' => $categories
        ]);
    }

    public function getdetails(Request $request)
    {
       
            $data = HelpSupports::get();
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
                ->addColumn('category', function($data){
                    $category = HelpCategory::where('id',$data->category)->first();
                    if($category == null){
                        $category_name = '<span class="badge badge-danger">Not Set</span>';
                        return $category_name;
                    }
                    elseif($category->status == 'Disabled'){
                        $category_name = '<span class="badge badge-warning">Category Disabled</span>';
                        return $category_name;
                    }
                    else{
                        $category_name = $category->name;
                        return $category_name;
                    }                    
                })
                ->addColumn('action', function($data){
                    $button1 = '<a href="'.route('admin.help_supports.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-edit"></i> Edit </a>';
                    $button2 = '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                    return $button1.$button2;
                })
                ->rawColumns(['action','status','category'])
                ->make(true);
        
        return back();
    }

    public function store(Request $request)
    {        
        // dd($request);  
        
        $add = new HelpSupports;

        $add->title = $request->title;        
        $add->description = $request->description;
        $add->category = $request->category;
        $add->order = $request->order;
        $add->status = $request->status;

        $add->save();

        return redirect()->route('admin.help_supports.index')->withFlashSuccess('Added Successfully');    
                    
    }

    public function edit($id)
    {
        $help_supports = HelpSupports::where('id',$id)->first(); 

        $categories = HelpCategory::where('status','=','Enabled')->get();

        return view('backend.help_supports.edit',[
            'help_supports' => $help_supports,
            'categories' => $categories
        ]);
    }

    public function update(Request $request)
    {        
        // dd($request);                         
     
        $update = new HelpSupports;

        $update->title = $request->title;        
        $update->description = $request->description;
        $update->category = $request->category;
        $update->order = $request->order;
        $update->status = $request->status;

        HelpSupports::whereId($request->hidden_id)->update($update->toArray());

        return redirect()->route('admin.help_supports.index')->withFlashSuccess('Updated Successfully');            

    }

    public function destroy($id)
    {
        HelpSupports::where('id', $id)->delete(); 
    }

}
