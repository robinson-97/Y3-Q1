<x-layout>
    <h1>Maak een Afspraak</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('afspraak.store') }}" method="POST">
        @csrf

        <div>
            <label for="datum">Datum en Tijd:</label>
            <input type="datetime-local" id="datum" name="datum" required>
            @error('datum')
            <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="opmerkingen">Opmerkingen:</label>
            <textarea id="opmerkingen" name="opmerkingen"></textarea>
            @error('opmerkingen')
            <div>{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Afspraak Maken</button>
    </form>
</x-layout>
