<x-layout>
    <h1>Maak een Afspraak</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('afspraak.store') }}" method="POST">
        @csrf

        <div>
            <label for="product">Om welk product gaat het:</label>
            <input type="text" id="product" name="product" required maxlength="50" placeholder="Vul hier het product in">
            @error('product')
            <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="help_request">Waar kan ik u mee helpen:</label>
            <textarea id="help_request" name="help_request" required maxlength="200" placeholder="Beschrijf waar u hulp bij nodig heeft"></textarea>
            @error('help_request')
            <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="phone">Telefoonnummer:</label>
            <input type="tel" id="phone" name="phone" required maxlength="10" pattern="\d{10}" placeholder="Voer uw telefoonnummer in (10 cijfers)">
            @error('phone')
            <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="datum">Datum en Tijd:</label>
            <input type="datetime-local" id="datum" name="datum" required>
            @error('datum')
            <div>{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Afspraak Maken</button>
    </form>
</x-layout>
