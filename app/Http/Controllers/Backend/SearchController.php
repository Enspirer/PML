<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Search;

class SearchController extends Controller
{
    public function index()
    {
        return view('backend.search.index');
    }

    public function getdetails(Request $request)
    {
        if($request->ajax())
        {
            $data = Search::get();
            // dd($data);
            return DataTables::of($data)
            
                    ->addColumn('action', function($data){                        
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm"><i class="fas fa-info-circle"></i> View</button>';
                        $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                        return $button;
                    })
                    
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return back();
    }

    public function show($id)
    {
        // dd($id);
        if(request()->ajax())
        {
            $data = Search::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }
    
    public function destroy($id)
    {
        $data = Search::findOrFail($id);
        $data->delete();
    }
    

}
