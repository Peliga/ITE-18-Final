<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{


    // get method using API
    public function getName($name){
        return Product::where('name',$name)->first();
    }
    public function getId($id=null){
        return $id?Product::find($id):Product::all();
    }

    // post method for api

    public function add(Request $request){
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->is_active = $request->is_active;

        $result = $product->save();

        if($result){
            return ["Result"=>"Product added successfully"];
        }else{
            return ["Result"=>"Opertaion failed"];

        }

    }
    public function update(Request $request) {
        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->is_active = $request->is_active;
        $result = $product->save();

        if($result){
            return ["result"=>"Product data is updated successfully"];
        }else{
            return ["result"=>"Failed to update"];
        }
    }
    public function search($name){
        $result = Product::where("name","like","%".$name."%")->get();

        // if(count($result) > 0){
        //     return $result;
        // }else{
        //     return ["result"=>"No product found"];
        // }
        return count($result)? $result : ["result"=>"No product found"];

    }
    public function delete($id){
        $product = Product::find($id);

        if(!$product){
              return ["Result"=>"No Product Id: ".$id." found"];
        }else{
            $product->delete;
            return ["result"=>"Product Id: ".$id." has been deleted"];

        }
        // return $result ? ["Result"=>"Product Id: ".$id." has been deleted"] : ["Result"=>"No Product Id: ".$id." found"];
    }
    public function validateProduct(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required|string',
            'description'=>'required|string',
            'price'=>'required|numeric',
            'quantity'=>'required|numeric',
            'is_active'=> 'sometimes'
        ]);

        if($validator->fails()){
            return $validator->errors();
        }else{
            $product = new Product;
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->is_active = $request->is_active;

            $result = $product->save();

            if($result){
                return ["Result"=>"Product added successfully"];
            }else{
                return ["Result"=>"Opertaion failed"];

            }

        }

    }

}
