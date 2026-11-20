<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;

class AnimalController extends Controller
{
    public function index(Request $request)
    {
        $query = Animal::query();

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('titre', 'LIKE', '%' . $request->search . '%')
                  ->orWhere('race', 'LIKE', '%' . $request->search . '%');
            });
        }

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

    private function autoriser(Animal $animal): void
    {
        $user = auth()->user();

        abort_unless(
            $user && ((int) $animal->user_id === (int) $user->id || $user->role === 'admin'),
            403
        );
    }

    public function create()
    {
        return view('animals.create');
    }

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

    public function show(string $id)
    {
        $animal = Animal::findOrFail($id);
        return view('animals.show', compact('animal'));
    }

    public function edit(string $id)
    {
        $animal = Animal::findOrFail($id);
        $this->autoriser($animal);

        return view('animals.edit', compact('animal'));
    }

    public function update(Request $request, $id)
    {
        $animal = Animal::findOrFail($id);
        $this->autoriser($animal);

        $data = $request->validate([
            'titre' => 'required|string|max:255',
            'race' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'description' => 'required|string',
            'tel' => 'nullable|string|max:20',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $photoName = $animal->photo;

        if ($request->hasFile('photo')) {
            $photoName = time() . '.' . $request->file('photo')->extension();
            $request->file('photo')->move(public_path('uploads'), $photoName);
        }

        $animal->update([
            'titre' => $data['titre'],
            'race' => $data['race'],
            'age' => $data['age'],
            'description' => $data['description'],
            'photo' => $photoName,
            'tel' => $data['tel'] ?? $animal->tel,
        ]);

        return redirect()->route('animals.index');
    }

    public function destroy(string $id)
    {
        $animal = Animal::findOrFail($id);
        $this->autoriser($animal);

        $animal->delete();

        return back();
    }

    public function myAnimals()
    {
        $animals = Animal::where('user_id', auth()->id())->get();

        return view('animals.myanimals', compact('animals'));
    }
}