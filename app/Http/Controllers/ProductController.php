<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductController extends Controller
{
    public function index(){

        $result = DB::table('products')->paginate(5);
        return view('product.index')->with('data', $result);
    }

    public function form(){
        return view('product.addproduct');
    }

    public function delete($id){
        $deleteId = DB::table('products')
                    ->where('id', $id)
                    ->delete();

        if($deleteId > 0){
            \Session::flash('message', 'Record has been delete successfully');
            return redirect('productindex');
        }
    }

    public function edit($id){
        $row = DB::table('products')
                       ->where('id', $id)
                       ->first();

        return view('product.editproduct')->with('row', $row);
        
    }

    public function update(Request $request){
        $inputs = $request->all();
        
        //Validation

        $validator = \Validator::make($request->all(),
            [
                "product_name" => 'required',
                "product_price" => 'required',
                "product_qty" => 'required',
            ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }else{

            $data = array("product_name" => $inputs['product_name'],
                "product_price" => $inputs['product_price'],
                "product_qty" => $inputs['product_qty']
                );
            $updateRecord = DB::table('products')
                        ->where('id', $inputs['id'])
                        ->update($data);

            if($updateRecord){

                //Two ways you can set data for message
                //\Session::flash('message', 'Record has been update successfully');
                return redirect('productindex')->with("success", "Record has been update successfully");
            }else{
                return redirect('productindex');
            }
        }
    }

    public function save(Request $request){
        $inputs = $request->all();
        //Validation

        $validator = \Validator::make($request->all(),
            [
                "product_name" => 'required',
                "product_price" => 'required',
                "product_qty" => 'required',
            ]);
        if($validator->fails()){
            //return redirect()->back()->withErrors($validator->errors());
            return redirect('productform')->withErrors($validator)->withInput();
        }else{

            $data = array("product_name" => $inputs['product_name'],
                "product_price" => $inputs['product_price'],
                "product_qty" => $inputs['product_qty']
                );
            $addRecord = DB::table('products')->insert($data);

            if($addRecord){

                \Session::flash('message', 'Record has been saved successfully');
                return redirect('productindex');
            }
        }
    }
}
