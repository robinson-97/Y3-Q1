<x-layout>
    <div id="afspraak-form" class="container">
        <h1>Maak een Afspraak</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('afspraak.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="product">Om welk product gaat het?</label>
                <input type="text" id="product" name="product" required maxlength="50" placeholder="Vul hier het product in">
                @error('product')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="help_request">Waar kan ik u mee helpen?</label>
                <textarea id="help_request" name="help_request" required maxlength="200" placeholder="Beschrijf waar u hulp bij nodig heeft"></textarea>
                @error('help_request')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone">Telefoonnummer:</label>
                <input type="tel" id="phone" name="phone" required maxlength="10" pattern="\d{10}" placeholder="Voer uw telefoonnummer in (10 cijfers)">
                @error('phone')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="datum">Datum en Tijd:</label>
                <select id="datum" name="datum" required>
                    @foreach(range(9, 17) as $hour)
                        @foreach([0, 30] as $minute)
                            @php
                                $time = sprintf("%02d:%02d", $hour, $minute);
                                $timestamp = now()->next(\Carbon\Carbon::MONDAY)->setTime($hour, $minute);
                            @endphp
                            <option value="{{ $timestamp->format('Y-m-d\TH:i') }}">{{ $time }}</option>
                        @endforeach
                    @endforeach
                </select>
                @error('datum')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">Afspraak Maken</button>
        </form>
    </div>
</x-layout>
