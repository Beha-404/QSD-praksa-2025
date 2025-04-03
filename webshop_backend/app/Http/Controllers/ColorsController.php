<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Colors;
use App\Models\Colors as ColorsAlias;
use Faker\Core\Color;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;

class ColorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colors = Colors::all();
        return $colors;

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'hex_code' => 'required|string|max:7',
        ]);

        Colors::create($validated);

        return redirect()->route('colors.index')
            ->with('success', 'Color created successfully.');

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Colors $color)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'hex_code' => 'required|string|max:7',
        ]);

        $color->update($validated);

        return redirect()->route('colors.index')
            ->with('success', 'Color updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Colors $color)
    {
        $color->delete();
        return redirect()->route('colors.index')->with('success', 'Color deleted successfully.');
    }
}
