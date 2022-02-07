<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\PropertyNews;

class PropertyNewsController extends Controller
{

    public function index()
    {
        return view('backend.property_news.index');
    }

    public function create()
    {
        return view('backend.property_news.create');
    }

    public function getdetails(Request $request)
    {
       
            $data = PropertyNews::get();
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
                ->addColumn('featured', function($data){
                    if($data->featured == 'Enabled'){
                        $featured = '<span class="badge badge-success">Enabled</span>';
                    }
                    else{
                        $featured = '<span class="badge badge-danger">Disabled</span>';
                    }   
                    return $featured;
                })
                ->addColumn('most_viewed', function($data){
                    if($data->most_viewed == 'Enabled'){
                        $most_viewed = '<span class="badge badge-success">Enabled</span>';
                    }
                    else{
                        $most_viewed = '<span class="badge badge-danger">Disabled</span>';
                    }   
                    return $most_viewed;
                })
                ->addColumn('trending', function($data){
                    if($data->trending == 'Enabled'){
                        $trending = '<span class="badge badge-success">Enabled</span>';
                    }
                    else{
                        $trending = '<span class="badge badge-danger">Disabled</span>';
                    }   
                    return $trending;
                })
                ->addColumn('feature_image', function($data){
                    $img = '<img src="'.uploaded_asset($data->feature_image).'" style="width: 50%">';
                 
                    return $img;
                })
                ->addColumn('action', function($data){
                    $button1 = '<a href="'.route('admin.property_news.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-edit"></i> Edit </a>';
                    $button2 = '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                    return $button1.$button2;
                })
                ->rawColumns(['action','status','feature_image','featured','trending','most_viewed'])
                ->make(true);
        
        return back();
    }

    public function store(Request $request)
    {        
        // dd($request);  
        
        if($request->description == null){
            return back()->withErrors('Please Add Description Section');
        } 
        
        if($request->feature_image == null){
            return back()->withErrors('Please Select An Feature Image');
        }   
     
        if($request->featured == 'Enabled'){
            PropertyNews::where('featured','Enabled')->update(array('featured' => 'Disabled'));           
        }

        $add = new PropertyNews;

        $add->title = $request->title;        
        $add->description = $request->description;
        $add->most_viewed = $request->most_viewed;
        $add->trending = $request->trending;
        $add->feature_image = $request->feature_image;
        $add->order = $request->order;
        $add->featured = $request->featured;
        $add->status = $request->status;

        $add->save();

        return redirect()->route('admin.property_news.index')->withFlashSuccess('Added Successfully');    
                    
    }

    public function edit($id)
    {
        $property_news = PropertyNews::where('id',$id)->first(); 

        return view('backend.property_news.edit',[
            'property_news' => $property_news
        ]);
    }

    public function update(Request $request)
    {        
        // dd($request);         
        if($request->description == null){
            return back()->withErrors('Please Add Description Section');
        }               
        
        if($request->feature_image == null){
            return back()->withErrors('Please Select An Feature Image');
        }   

        if($request->featured == 'Enabled'){
            PropertyNews::where('featured','Enabled')->update(array('featured' => 'Disabled'));           
        }
          
        $update = new PropertyNews;

        $update->title = $request->title;        
        $update->description = $request->description;
        $update->most_viewed = $request->most_viewed;
        $update->trending = $request->trending;
        $update->feature_image = $request->feature_image;
        $update->order = $request->order;
        $update->featured = $request->featured;
        $update->status = $request->status;

        PropertyNews::whereId($request->hidden_id)->update($update->toArray());

        return redirect()->route('admin.property_news.index')->withFlashSuccess('Updated Successfully');            

    }

    public function destroy($id)
    {
        PropertyNews::where('id', $id)->delete(); 
    }

}
