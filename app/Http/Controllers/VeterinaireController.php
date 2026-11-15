<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veterinaire;

class VeterinaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index(Request $request)
    {
        $query = Veterinaire::query();

        // 🔍 Search sur nom, email, téléphone, adresse
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('nom', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%')
                  ->orWhere('telephone', 'like', '%' . $request->search . '%')
                  ->orWhere('adresse', 'like', '%' . $request->search . '%');
            });
        }

        $vets = $query->latest()->get();

        return view('veterinaires.index', compact('vets'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.veterinaires.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'adresse' => 'required',
        ]);

        Veterinaire::create($request->all());

        return redirect()->route('admin.vets')
            ->with('success', 'Vétérinaire ajouté avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $veterinaire = Veterinaire::findOrFail($id);
        return view('veterinaires.show', ['veterinaire' => $veterinaire, 'vet' => $veterinaire]);    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $vet = Veterinaire::findOrFail($id);
        return view('admin.veterinaires.edit', compact('vet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $vet = Veterinaire::findOrFail($id);

        $vet->update([
            'nom' => $request->nom,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'adresse' => $request->adresse,
        ]);

        return redirect()->route('admin.vets');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Veterinaire::destroy($id);

        return redirect()->route('admin.vets');
    }
    public function adminIndex(Request $request)
{
    $query = Veterinaire::query();
    
    // 🔍 Recherche par nom, email, téléphone, adresse
    if ($request->filled('search')) {
        $search = trim($request->search);
        $query->where(function($q) use ($search) {
            $q->where('nom', 'like', '%' . $search . '%')
              ->orWhere('email', 'like', '%' . $search . '%')
              ->orWhere('telephone', 'like', '%' . $search . '%')
              ->orWhere('adresse', 'like', '%' . $search . '%');
        });
    }
    
    // 📊 Trie par ordre alphabétique
    $query->orderBy('nom', 'asc');
    
    $vets = $query->get();
    
    return view('admin.veterinaires.index', compact('vets'));
}
}
