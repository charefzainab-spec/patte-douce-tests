<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalApiController extends Controller
{
    public function index()
    {
        return response()->json(Animal::all(), 200);
    }

    public function show($id)
    {
        $animal = Animal::find($id);

        if (!$animal) {
            return response()->json([
                'message' => 'Animal not found'
            ], 404);
        }

        return response()->json($animal, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'age' => 'required|integer|min:0',
            'race' => 'required|string|max:255',
        ]);

        $animal = Animal::create($validated + [
            'user_id' => $request->user()->id,
            'statut' => 'adoption',
        ]);

        return response()->json($animal, 201);
    }
}