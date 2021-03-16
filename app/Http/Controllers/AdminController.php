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
use App\educationiyzico;
use App\iyziusers;
use Alert;
use Validator;
use Carbon\Carbon;
use App\education;

class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		return view('admin.educations.index')->with('educations', education::all());
	}

	//iyzico
	public function iyzico()
	{
		return view('admin.educations.iyzico')->with('educations', educationiyzico::all());
	}
	//iyzico

	public function create()
	{
		return view('admin.educations.create');
	}

	//iyzico
	public function createIyzico()
	{
		return view('admin.educations.createiyzico');
	}

	public function createPostiyzico(Request $request)
	{
		if (educationiyzico::where('education_url', '=', $request->education_url)->count() == 0) {
			$educationSave = new educationiyzico();
			$educationSave->education_name = $request->education_name;
			$educationSave->education_price = $request->education_price;
			$educationSave->education_url = $request->education_url;
			$educationSave->iyzi_link = $request->iyzilink;
			$educationSave->resim = $request->glink;
			$educationSave->metin = $request->metin;
			if ($educationSave->save()) {
				return redirect()->route('admin.iyzipanel');
			}
		} else {
			return redirect()->back();
		}
	}
	//iyzico

	public function createPost(Request $request)
	{
		if (education::where('education_url', '=', $request->education_url)->count() == 0) {
			$educationSave = new education();
			$educationSave->education_name = $request->education_name;
			$educationSave->education_price = $request->education_price;
			$educationSave->education_url = $request->education_url;

			if ($educationSave->save()) {
				return redirect()->route('admin.panel');
			}
		} else {
			return redirect()->back();
		}
	}

	public function edit($id)
	{
		return view('admin.educations.edit')->with('education', education::where('id', '=', $id)->first());
	}
	public function update(Request $request, $id)
	{

		$educationSave = education::where('id', '=', $id)->first();
		$educationSave->education_name = $request->education_name;
		$educationSave->education_price = $request->education_price;
		$educationSave->education_url = $request->education_url;
		$educationSave->resim = $request->resim;
		$educationSave->education_image_2 = $request->education_image_2;

		if ($educationSave->save()) {
			return redirect()->route('admin.panel');
		}
	}

	public function delete($id)
	{
		if (education::where('id', '=', $id)->delete()) {
			return redirect()->back()->with('status', 'Eğitim silme işlemi başarılı');
		}
	}
}
