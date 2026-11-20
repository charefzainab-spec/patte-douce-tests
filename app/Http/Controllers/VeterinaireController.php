<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veterinaire;

class VeterinaireController extends Controller
{
    private function rules(): array
    {
        return [
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:20',
            'adresse' => 'required|string|max:255',
        ];
    }

    public function index(Request $request)
    {
        $query = Veterinaire::query();

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

    public function create()
    {
        return view('admin.veterinaires.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());

        Veterinaire::create($data);

        return redirect()->route('admin.vets')
            ->with('success', 'Veterinaire ajoute avec succes');
    }

    public function show(string $id)
    {
        $veterinaire = Veterinaire::findOrFail($id);
        return view('vet.show', compact('veterinaire'));
    }

    public function edit($id)
    {
        $vet = Veterinaire::findOrFail($id);
        return view('admin.veterinaires.edit', compact('vet'));
    }

    public function update(Request $request, $id)
    {
        $vet = Veterinaire::findOrFail($id);

        $data = $request->validate($this->rules());

        $vet->update($data);

        return redirect()->route('admin.vets');
    }

    public function destroy($id)
    {
        Veterinaire::destroy($id);

        return redirect()->route('admin.vets');
    }

    public function adminIndex(Request $request)
    {
        $query = Veterinaire::query();

        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('nom', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%')
                  ->orWhere('telephone', 'like', '%' . $search . '%')
                  ->orWhere('adresse', 'like', '%' . $search . '%');
            });
        }

        $query->orderBy('nom', 'asc');

        $vets = $query->get();

        return view('admin.veterinaires.index', compact('vets'));
    }
}