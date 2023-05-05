@extends("layouts.frontHome")

@section("title","الصفحة الرئيسية")

@section('content')


@foreach ($products as $product)
    <div class="product">
        <h3>{{ $product->name }}</h3>
        <p>{{ $product->description }}</p>
        <p>Price: {{ $product->price }}</p>
    </div>
@endforeach

@endsection
