<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Student;

class StudentController extends Controller
{
	public function index(){
		
		return view('admin.index');

	}

	public function saverecord(Request $request){

		$insertObject = new Student;
		$post = $request->all();

		$validator = \Validator::make($request->all(),
			[
			  "studentname" => 'required',
			  "gender" 		=> 'required',
			  "phone"		=> 'required'		
			]);

		if($validator->fails()){
			return \Response::json([
				'success' => false,
				'message' => "Validation Error",
				'errors'  => $validator->errors()->toArray(),
			], 404); 
		}

		$studentname = $post['studentname'];
		$gender = $post['gender'];
		$phone = $post['phone'];

		$add = $insertObject->insert($studentname, $gender, $phone);

		if( $add > 0 )
		{
			return \Response::json([
				"success" => true,
				"message" => "Data Saved Successfully",
				"data"    => $add
			], 201);
		}else{
			return \Response::json([
				"success" => false,
				"message" => "Error in Adding Data",
				"data"    => $add
			], 404);
		}

		exit();
	}

}


?>