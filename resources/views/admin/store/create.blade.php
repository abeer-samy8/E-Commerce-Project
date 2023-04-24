@extends('layouts.admin')
@section('title','Add New Store')

@section("content")


<div class="m-portlet m-portlet--mobile">
    <form method="post" action='{{route("store.index")}}'>
        @csrf
        <div class='m-form'>
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Store Name </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control m-input" placeholder="Enter store name" name="name"
                                value='{{ old("name") }}'>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label"> Email </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control m-input" placeholder="Enter email "
                                name="email" value='{{ old("email") }}'>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Phone</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control m-input" placeholder="Enter phone "
                                name="phone" value='{{ old("phone") }}'>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Address</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control m-input"
                                placeholder="Enter address store" name="address"
                                value='{{ old("address") }}'>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Description</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control m-input"
                                placeholder="Enter description store" name="description"
                                value='{{ old("description") }}'>
                        </div>
                    </div>




                </div>
            </div>
            <div class="m-portlet__foot m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <button class="btn btn-primary" type="submit">Add</button>
                            <a href='{{route("store.index")}}' class="btn btn-secondary">Cancel </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
