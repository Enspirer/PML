<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\SubscribedEmails;

class SubscribedEmailsController extends Controller
{

    public function index()
    {
        return view('backend.subscribed_emails.index');
    }    

    public function getdetails(Request $request)
    {       
        $data = SubscribedEmails::get();
        return DataTables::of($data)
                
            ->addColumn('action', function($data){
                $button = '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
        
        return back();
    }

    public function destroy($id)
    {        
        $data = SubscribedEmails::findOrFail($id);
        $data->delete();   
    }

}
