<x-app-layout>

<div class="container mt-4">

    <h2>✏️ Modifier vétérinaire</h2>

    <form method="POST" action="{{ route('veterinaires.update', $veterinaire->id) }}">
        @csrf
        @method('PUT')

        <input type="text" name="nom" value="{{ $veterinaire->nom }}" class="form-control mb-2">

        <input type="email" name="email" value="{{ $veterinaire->email }}" class="form-control mb-2">

        <input type="text" name="telephone" value="{{ $veterinaire->telephone }}" class="form-control mb-2">

        <input type="text" name="adresse" value="{{ $veterinaire->adresse }}" class="form-control mb-2">

        <button class="btn btn-primary">
            Update
        </button>

    </form>

</div>

</x-app-layout>