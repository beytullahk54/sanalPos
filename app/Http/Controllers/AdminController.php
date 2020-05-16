<?php

namespace App\Http\Controllers;

use App\role_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session; 
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Alert;
use Validator;
use Carbon\Carbon;
use App\education;

class AdminController extends Controller
{
        public function __construct() 
        {
            $this->middleware( 'auth' );
        }
   			
		public function index()
		{
			return view('admin.educations.index')->with('educations',education::all());
		}
   			
		public function create()
		{
			return view('admin.educations.create');
		}
   			
		public function createPost(Request $request )
		{
			if(education::where('education_url','=',$request->education_url)->count()==0)
			{
				$educationSave = new education();
				$educationSave->education_name = $request->education_name;
				$educationSave->education_price = $request->education_price;
				$educationSave->education_url = $request->education_url;
				
				if($educationSave->save())
				{
					return redirect()->route('admin.panel');
				}
			}else
			{
				return redirect()->back();
			}


		}
   			
		public function edit()
		{
			return view('admin.educations.edit');
		}
      
    
}
