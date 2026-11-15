<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Animal::query();

        // Recherche par titre ou race
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('titre', 'LIKE', '%' . $request->search . '%')
                  ->orWhere('race', 'LIKE', '%' . $request->search . '%');
            });
        }

        // Filtre age
        if ($request->age_filter) {
            if ($request->age_filter == 'baby') {
                $query->whereBetween('age', [0, 1]);
            } elseif ($request->age_filter == 'young') {
                $query->whereBetween('age', [1, 5]);
            } elseif ($request->age_filter == 'adult') {
                $query->whereBetween('age', [5, 10]);
            } elseif ($request->age_filter == 'senior') {
                $query->where('age', '>=', 10);
            }
        }

        // pagination
        $animals = $query->latest()->paginate(9);

        return view('animals.index', compact('animals'));
    }

    public function adminIndex(Request $request)
    {
        $animals = $this->getAnimals($request);

        return view('admin.animals.index', compact('animals'));
    }

    private function getAnimals($request)
    {
        $query = Animal::query();

        if ($request->search) {
            $query->where('titre', 'like', '%' . $request->search . '%')
                ->orWhere('race', 'like', '%' . $request->search . '%');
        }

        return $query->get();
    }

    /**
     * Seul le proprietaire (ou l'administrateur si autorise) peut agir sur l'annonce.
     */
    private function authorizeOwner(Animal $animal, bool $adminAllowed = false): void
    {
        $user = auth()->user();
        $isOwner = (int) $animal->user_id === (int) $user->id;
        $isAdmin = $user->role === 'admin';

        if (!$isOwner && !($adminAllowed && $isAdmin)) {
            abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('animals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'race' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'description' => 'required|string',
            'telephone' => 'required|string|max:20',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'titre.required' => 'Le titre est obligatoire.',
            'titre.string' => 'Le titre doit être un texte.',
            'titre.max' => 'Le titre ne doit pas dépasser 255 caractères.',
            'race.required' => 'La race est obligatoire.',
            'age.required' => 'L’âge est obligatoire.',
            'age.integer' => 'L’âge doit être un nombre entier.',
            'age.min' => 'L’âge ne peut pas être négatif.',
            'description.required' => 'La description est obligatoire.',
            'telephone.required' => 'Le numéro de téléphone est obligatoire.',
            'photo.image' => 'Le fichier doit être une image.',
            'photo.mimes' => 'Formats autorisés : JPG, JPEG, PNG et WEBP.',
            'photo.max' => 'L’image ne doit pas dépasser 2 Mo.',
        ]);

        $photoName = null;

        if ($request->hasFile('photo')) {
            $photoName = time() . '.' . $request->file('photo')->extension();

            $request->file('photo')->move(
                public_path('uploads'),
                $photoName
            );
        }

        Animal::create([
            'titre' => $validated['titre'],
            'race' => $validated['race'],
            'age' => $validated['age'],
            'description' => $validated['description'],
            'photo' => $photoName,
            'statut' => 'adoption',
            'user_id' => auth()->id(),
            'tel' => $validated['telephone'],
        ]);

        return redirect()
            ->route('animals.index')
            ->with('success', 'L’annonce a été ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $animal = Animal::findOrFail($id);
        return view('animals.show', compact('animal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $animal = Animal::findOrFail($id);
        $this->authorizeOwner($animal);

        return view('animals.edit', compact('animal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $animal = Animal::findOrFail($id);
        $this->authorizeOwner($animal);

        $photoName = $animal->photo;

        if ($request->hasFile('photo')) {
            $photoName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads'), $photoName);
        }

        $animal->update([
            'titre' => $request->titre,
            'race' => $request->race,
            'age' => $request->age,
            'description' => $request->description,
            'photo' => $photoName,
            'tel' => $request->tel
        ]);

        return redirect()->route('animals.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $animal = Animal::findOrFail($id);
        $this->authorizeOwner($animal, true);
        $animal->delete();

        return back();
    }

    public function myAnimals()
    {
        $animals = Animal::where('user_id', auth()->id())->get();

        return view('animals.myanimals', compact('animals'));
    }
}