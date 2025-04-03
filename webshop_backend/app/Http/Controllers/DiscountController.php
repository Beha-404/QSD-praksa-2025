<?php

namespace App\Http\Controllers;

use App\Http\Resources\DiscountResource;
use App\Models\Discounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DiscountController extends Controller
{
    public function index()
    {
        $discount = Discounts::get();

        if ($discount->count() > 0) {
            return DiscountResource::collection($discount);
        } else {
            return response()->json(['message' => 'No discount found'], 404);
        }
    }

    public function show(Discounts $discount){
        return new DiscountResource($discount);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

       $discount = Discounts::create([
            'name' => $request->name,
            'discount_value' => $request->discount_value,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return response()->json(['message' => 'Discount created successfully','data' => new DiscountResource($discount)], 201);
    }

    public function update(Discounts $discount, Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

       $discount->update([
            'name' => $request->name,
            'discount_value' => $request->discount_value,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return response()->json(['message' => 'Discount updated successfully','data' => new DiscountResource($discount)], 201);
    }

    public function destroy(Discounts $discount){
        $discount->delete();
        return response()->json(['message' => 'Discount deleted successfully'], 200);
    }

}
