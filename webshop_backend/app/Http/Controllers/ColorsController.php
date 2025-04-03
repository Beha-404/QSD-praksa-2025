<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Colors;
use Illuminate\Http\Request;

class ColorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Colors::query();

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->has('hex_code')) {
            $query->where('hex_code', 'like', '%' . $request->hex_code . '%');
        }

        $colors = $query->get();

        return response()->json($colors);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'hex_code' => 'required|string|max:255|regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/',
        ]);

        $color = Colors::create($validatedData);

        return response()->json([
            'success' => true,
            'data' => $color,
            'message' => 'Color created successfully.'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Colors $color)
    {
        return response()->json([
            'success' => true,
            'data' => $color
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Colors $color)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'hex_code' => 'required|string|max:255|regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/',
        ]);

        $color->update($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Color updated successfully.',
            'data' => $color,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Colors $colors)
    {
        $colors->delete();

        return response()->json([
            'success' => true,
            'message' => 'Color deleted successfully.',
        ]);
    }
}
