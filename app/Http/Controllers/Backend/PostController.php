<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Category;
use App\Models\Posts;

class PostController extends Controller
{
    
    public function index()
    {
        return view('backend.post.index');
    }

    public function create()
    {
        $categories = Category::where('status','=','Enabled')->get();

        return view('backend.post.create',[
            'categories' => $categories
        ]);
    }

    public function getdetails(Request $request)
    {
       
            $data = Posts::get();
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
                ->addColumn('feature_image', function($data){
                    $img = '<img src="'.uploaded_asset($data->feature_image).'" style="width: 50%">';
                 
                    return $img;
                })
                ->addColumn('action', function($data){
                    $button1 = '<a href="'.route('admin.post.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-edit"></i> Edit </a>';
                    $button2 = '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                    return $button1.$button2;
                })
                ->rawColumns(['action','status','feature_image'])
                ->make(true);
        
        return back();
    }

    public function store(Request $request)
    {        
        // dd($request);  

        if($request->feature_image == null){
            return back()->withErrors('Please Add Feature Image');
        }else{         

            $add = new Posts;

            $add->title = $request->title;        
            $add->description = $request->description;
            $add->category = $request->category;
            $add->type = $request->type;
            $add->article = $request->article;
            $add->youtube = $request->youtube;
            $add->user_id = auth()->user()->id;
            $add->feature_image = $request->feature_image;
            $add->order = $request->order;
            $add->status = $request->status;

            $add->save();

            return redirect()->route('admin.post.index')->withFlashSuccess('Added Successfully');
     
        }              

    }

    public function edit($id)
    {
        $post = Posts::where('id',$id)->first(); 

        $categories = Category::where('status','=','Enabled')->get();

        return view('backend.post.edit',[
            'post' => $post,
            'categories' => $categories
        ]);
    }

    public function update(Request $request)
    {        
        // dd($request);  
                       
        if($request->feature_image == null){
            return back()->withErrors('Please Add Feature Image');
        }else{         

            $update = new Posts;

            $update->title = $request->title;        
            $update->description = $request->description;
            $update->category = $request->category;
            $update->type = $request->type;
            $update->article = $request->article;
            $update->youtube = $request->youtube;
            $update->user_id = auth()->user()->id;
            $update->feature_image = $request->feature_image;
            $update->order = $request->order;
            $update->status = $request->status;

            Posts::whereId($request->hidden_id)->update($update->toArray());

            return redirect()->route('admin.post.index')->withFlashSuccess('Updated Successfully');
     
        }

    }

    public function destroy($id)
    {
        Posts::where('id', $id)->delete(); 
    }

}
