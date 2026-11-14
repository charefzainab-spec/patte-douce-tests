<x-app-layout>

<div class="container mt-4">

    <div class="card p-4">

        <h2>{{ $veterinaire->nom }}</h2>

        <p>📧 {{ $veterinaire->email }}</p>
        <p>📞 {{ $veterinaire->telephone }}</p>
        <p>📍 {{ $veterinaire->adresse }}</p>

    </div>

</div>

</x-app-layout>