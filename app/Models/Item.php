<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Item extends Model
{
    public function addItem($itemname, $itemprice, $itemqty, $gender, $multiple, $agree){

    		$data = array(

    				"item_name" => $itemname,
    				"item_price" => $itemprice,
    				"item_qty" => $itemqty,
    				"plain_option" => $gender,
    				"multi_tag" => $multiple,
    				"check_box" => $agree,

    			)

    		$insert = DB::table(items)->insertGetId($data);
    		return $insert;

    }
}
