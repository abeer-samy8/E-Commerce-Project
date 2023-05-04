@foreach($products as $product)
    <div class="product">
        <h4>{{ $product->name }}</h4>
        <p>{{ $product->description }}</p>
        <p>Price: {{ $product->price }}</p>
    </div>
@endforeach

@endif
