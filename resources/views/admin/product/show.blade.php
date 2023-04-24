@extends("layouts.admin")

@section("title-side")
<a href="{{asset('admin/product/create')}}"
    class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
    <span>
        <i class="la la-plus"></i>
        <span>
            Create New Product
        </span>
    </span>
</a>
@endsection


@section("content")

<h2 class="text-center m-5 pt-5">  Product: {{$product->title }}</h2>

<div class="container d-flex justify-content-center align-items-center flex-column">
    <div class="card mb-3" style="max-width: 640px;">
        <div class="row no-gutters">
            <div class="col-md-4">
            <img class="card-img" src='{{asset("storage/assets/img/{$product->main_image}")}}'>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$product->title }}</h5>
                    <p class="card-text">
                        <ul>
                                    <li> Category: {{ $product->category->name??'' }}</li>
                                    <li> Product Details</Details>:<br> {{ $product->details }}</li>
                                    <li>Quantity: {{ $product->quantity }} </li>
                                    <li> Normal Price: {{ $product->regular_price }} </li>
                                    <li> Sale Price: {{ $product->sale_price }}</li>
                                    <li> Status: {{$product->active=='1'?"Active":"Inactive"}} </li>
                        </ul>
                    </p>

                </div>
            </div>
        </div>

    </div>
    <div class="">
        <p class="card-text">
                <a href='{{ route("product.edit",$product->id) }}' class='btn btn-sm btn-info'>Update</a>
                <a class='btn btn-light' href='{{route("product.index")}}'>Cancel</a>


        </p>
    </div>

</div>
@endsection
