<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LostFound;

class LostFoundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = LostFound::query();

        // search
        if ($request->search) {
            $query->where('description', 'like', '%' . $request->search . '%')
                  ->orWhere('localisation', 'like', '%' . $request->search . '%')
                  ->orWhere('titre', 'like', '%' . $request->search . '%');
        }

        // filter type
        if ($request->type) {
            $query->where('type', $request->type);
        }

        $losts = $query->latest()->get();

        return view('lost-found.index', compact('losts'));
    }

    public function adminIndex(Request $request)
    {
        $query = LostFound::query();

        if ($request->search) {
            $query->where('type', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        $losts = $query->get();

        return view('admin.lostfound.index', compact('losts'));
    }

    /**
     * Seul le proprietaire (ou l'administrateur si autorise) peut agir sur l'annonce.
     */
    private function authorizeOwner(LostFound $lost, bool $adminAllowed = false): void
    {
        $user = auth()->user();
        $isOwner = (int) $lost->user_id === (int) $user->id;
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
        return view('lost-found.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $photoName = null;

        // upload image
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');

            $photoName = time() . '.' . $photo->getClientOriginalExtension();

            $photo->move(public_path('uploads'), $photoName);
        }

        LostFound::create([
            'type' => $request->type,
            'description' => $request->description,
            'localisation' => $request->localisation,
            'contact' => $request->contact,
            'photo' => $photoName,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('lost-found.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lost = LostFound::findOrFail($id);
        return view('lost-found.show', compact('lost'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lost = LostFound::findOrFail($id);
        $this->authorizeOwner($lost);

        return view('lost-found.edit', compact('lost'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $lost = LostFound::findOrFail($id);
        $this->authorizeOwner($lost);

        $lost->update([
            'type' => $request->type,
            'description' => $request->description,
            'localisation' => $request->localisation,
            'contact' => $request->contact,
        ]);

        return redirect()->route('lost-found.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lost = LostFound::findOrFail($id);
        $this->authorizeOwner($lost, true);
        $lost->delete();

        return back();
    }

    public function myLostFound()
    {
        $losts = LostFound::where('user_id', auth()->id())->get();

        return view('lost-found.mylostfound', compact('losts'));
    }
}