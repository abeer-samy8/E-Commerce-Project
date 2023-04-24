@extends('layouts.admin')
@section('title','Add New Currency')

@section("content")


<div class="m-portlet m-portlet--mobile">
    <form method="post" action='{{route("currency.index")}}'>
        @csrf
        <div class='m-form'>
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Name</label>
                        <div class="col-lg-6">
                            <input type="text" name="name" value="{{old('name')}}" class="form-control m-input" placeholder="Enter Name ">
                            <span class="m-form__help"> Enter Category Name</span>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Code</label>
                        <div class="col-lg-6">
                            <input type="text" name="code" value="{{old('code')}}" class="form-control m-input" placeholder="Enter Code ">
                            <span class="m-form__help"> Enter Currency Code </span>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Symbol</label>
                        <div class="col-lg-6">
                            <input type="text" name="symbol" value="{{old('symbol')}}" class="form-control m-input" placeholder="Enter Symbol ">
                            <span class="m-form__help"> Enter Currency Symbol</span>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Exchange Rate</label>
                        <div class="col-lg-6">
                            <input type="text" name="rate" value="{{old('rate')}}" class="form-control m-input" placeholder="Enter Exchange Rate ">
                            <span class="m-form__help"> Enter Currency Exchange Rate</span>
                        </div>
                    </div>



                </div>
            </div>
            <div class="m-portlet__foot m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-primary">Add</button>
                            <a href="{{asset('admin/currency')}}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
