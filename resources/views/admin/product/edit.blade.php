@extends("layouts.admin")
@section("title","Update Product")

@section("content")
<div class="m-portlet m-portlet--mobile">
    <form enctype="multipart/form-data" method='post' action='{{asset("admin/product/".$product->id)}}'>
        @csrf
        @method("put")
        <div class='m-form'>
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Product Name </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control m-input" name="title"
                                value='{{ old("title",$product->title) }}'>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Description </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control m-input" name="slug"
                                value='{{ old("slug",$product->slug) }}'>
                        </div>
                    </div>


                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Category </label>
                        <div class="col-lg-6">
                        <select class='form-control select2' name='category_id' id='category_id'>
                            <option value=''>-Choose Category-</option>
                            @foreach($categories as $category)
                            <option {{old('category_id',$product->category_id)==$category->id?'selected':''}}
                                value='{{$category->id}}'>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Store </label>
                        <div class="col-lg-6">
                        <select class='form-control select2' name='store_id' id='store_id'>
                            <option value=''>-Choose Store-</option>
                            @foreach($stores as $store)
                            <option {{old('store_id',$product->store_id)==$store->id?'selected':''}}
                                value='{{$store->id}}'>{{$store->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>



                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Currency </label>
                        <div class="col-lg-6">
                            <select class="form-control chosen-rtl select2" name='currency_id' id='currency_id'>
                                <option selected>-Choose Currency- </option>
                                @foreach($currencies as $currency)
                                <option {{old('currency_id',$product->currency_id)==$currency->id?'selected':''}}
                                    value='{{$currency->id}}'>{{$currency->symbol}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label" for="details">Product Details</label>
                        <textarea class="form-control col-lg-6" id="details" name="details"
                            rows="3">{{ old("details",$product->details) }}</textarea>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Normal Price  </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control m-input"
                                name="regular_price" value='{{ old("regular_price",$product->regular_price) }}'>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Sale Price </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control m-input"
                                name="sale_price" value='{{ old("sale_price",$product->sale_price) }}'>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Quantity </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control m-input"
                                 name="quantity"
                                value='{{ old("quantity",$product->quantity) }}'>
                        </div>
                    </div>
                    <div class="m-form__group form-group row">
                        <label class=" col-lg-3 col-form-label">status</label>
                        <div class="m-radio-inline col-lg-6">
                            <label class="m-radio m-radio--solid m-radio--brand">
                                <input {{old('active',$product->active)=='1'?"checked":""}} type="radio" name="active" checked=""
                                    value="1" aria-describedby="account_group-error"> Active
                                <span></span>
                            </label>
                            <label class="m-radio m-radio--solid m-radio--brand">
                                <input {{old('active',$product->active)=='0'?"checked":""}} type="radio" name="active" value="0"> Inactive
                                <span></span>
                            </label>
                        </div>
                        <span class="m-form__help"></span>
                    </div>

                    <div class="m-form__group form-group row">
                        <label class="col-lg-3" for="details">Image</label>
                        <input class="col-lg-6" type='file' name="main_image" id="main_image" />
                    </div>

                </div>
            </div>
            <div class="m-portlet__foot m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <button class="btn btn-primary" type="submit">Update</button>
                            <a href='{{route("product.index")}}' class="btn btn-secondary">Cancel</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section("js")

@endsection
