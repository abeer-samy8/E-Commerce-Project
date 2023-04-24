@extends("layouts.admin")
@section("title","Show Store")



@section("content")
<div class="m-portlet m-portlet--mobile">

        <div class='m-form'>
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Name</label>
                        <div class="col-lg-6">
                            <input disabled type="text" name="name" value="{{$item->name}}" class="form-control m-input" >
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">ُEmail</label>
                        <div class="col-lg-6">
                            <input disabled type="text" name="emai;" value="{{$item->email}}" class="form-control m-input" >
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Phone</label>
                        <div class="col-lg-6">
                            <input disabled type="text" name="phone" value="{{$item->phone}}" class="form-control m-input" >
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Address</label>
                        <div class="col-lg-6">
                            <input disabled type="text" name="address" value="{{$item->address}}" class="form-control m-input">
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Description</label>
                        <div class="col-lg-6">
                            <input disabled type="text" name="description" value="{{$item->description}}" class="form-control m-input">
                        </div>
                    </div>




                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Last Updated</label>
                        <div class="col-lg-6">
                            <input disabled type="text" name="name" value="{{$item->updated_at}}" class="form-control m-input" placeholder="ادخل الاسم ">
                        </div>
                    </div>

                </div>
            </div>
            <div class="m-portlet__foot m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <a href="{{asset('admin/category')}}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
@endsection
