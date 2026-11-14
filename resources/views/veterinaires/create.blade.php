<x-app-layout>

<div class="container mt-4">

    <h2>➕ Ajouter vétérinaire</h2>

    <form method="POST" action="{{ route('veterinaires.store') }}">
        @csrf

        <input type="text" name="nom" class="form-control mb-2" placeholder="Nom">

        <input type="email" name="email" class="form-control mb-2" placeholder="Email">

        <input type="text" name="telephone" class="form-control mb-2" placeholder="Téléphone">

        <input type="text" name="adresse" class="form-control mb-2" placeholder="Adresse">

        <button class="btn btn-success">
            Ajouter
        </button>

    </form>

</div>

</x-app-layout>