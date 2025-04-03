<?php

namespace App\Http\Controllers;

use App\Http\Resources\SizeResource;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SizeController extends Controller
{
    public function index()
    {
        $discount = Size::get();

        if ($discount->count() > 0) {
            return SizeResource::collection($discount);
        } else {
            return response()->json(['message' => 'No size found'], 404);
        }
    }

    public function show(Size $size){
        return new SizeResource($size);
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'type' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $size = Size::create([
            'name' => $request->name,
            'type' => $request->type
        ]);

        return response()->json(['message' => 'Size created successfully','data' => new SizeResource($size)], 201);
    }
    public function update(Size $size, Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'type' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $size->update([
            'name' => $request->name,
            'type' => $request->type
        ]);

        return response()->json(['message' => 'Size updated successfully','data' => new SizeResource($size)], 201);

    }

    public function destroy(Size $size){
        $size->delete();
        return response()->json(['message' => 'Size deleted successfully'], 200);
    }
}
