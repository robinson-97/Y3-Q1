<x-layout>
    <div class="background-container"></div>
    <div class="main-content">
        <section class="about">
            <div class="container">
                <div class="about">
                    <h2>Webshop</h2>
                </div>
        </section>
    </div>

    <div class="container">
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text">Price: ${{ $product->price }}</p>
                            <p class="card-text">In stock: {{ $product->stock }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</x-layout>
