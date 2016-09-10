<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;


class Student extends Model{

	public function insert($studentname, $gender, $phone)
	{
		$data = array(
				"student_name" => $studentname,
				"gender"	  => $gender,
				"phone_number"		  => $phone
			);

		$insert = DB::table('student')->insertGetId($data);
		return $insert;
	}

}

?>