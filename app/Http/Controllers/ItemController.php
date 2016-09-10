<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class ItemController extends Controller
{
    public function myform(){
    	return view('item.form');
    }

    public function postform(Request $request){
    	$post = $request->all();

    	$entries[0] = $post['ItemName'];
    	$
    	
    	if(count($post['selectMultiple']) > 0 ){
    		foreach($post)
    	}


    	$check = DB::table('items')->insert($data);


    	if($check > 0 ){
    		echo "Data Inserted";
    	}else{
    		echo "Fail";
    	}


    }
}
