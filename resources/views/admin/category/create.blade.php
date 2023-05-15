@extends('layouts.admin')
@section('title','Add New Category')

@section("content")


<div class="m-portlet m-portlet--mobile">
    <form method="post" action='{{route("category.index")}}'>
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


                    <div class="m-form__group form-group row">
                        <label class=" col-lg-3 col-form-label">Active / Inactive</label>
                        <div class="m-radio-inline col-lg-6">
                            <label class="m-radio m-radio--solid m-radio--brand">
                                <input {{ old('active') === '1' ? 'checked' : '' }} type="radio" name="status" value="active" aria-describedby="account_group-error"> Active
                                <span></span>
                            </label>
                            <label class="m-radio m-radio--solid m-radio--brand">
                                <input {{ old('active') === '0' ? 'checked' : '' }} type="radio" name="status" value="inactive"> Inactive
                                <span></span>
                            </label>
                        </div>
                        <span class="m-form__help"></span>
                    </div>

                </div>
            </div>
            <div class="m-portlet__foot m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-primary">Add</button>
                            <a href="{{asset('admin/category')}}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
