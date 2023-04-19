@extends("layouts.admin")
@section("title","Update Category")



@section("content")
<div class="m-portlet m-portlet--mobile">
    <form method="post" action="{{asset('admin/category/'.$item->id)}}">
        @csrf
        @method("put")
        <div class='m-form'>
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Name</label>
                        <div class="col-lg-6">
                            <input type="text" name="name" value="{{$item->name}}" class="form-control m-input" placeholder="ادخل الاسم ">
                            <span class="m-form__help"> Enter Category Name </span>
                        </div>
                    </div>


                    <div class="m-form__group form-group row">
                        <label class=" col-lg-3 col-form-label">Active / Inactive</label>
                        <div class="m-radio-inline col-lg-6">
                            <label class="m-radio m-radio--solid m-radio--brand">
                                <input {{$item->active=='1'?"checked":""}} type="radio" name="active" checked="" value="1"
                                    aria-describedby="account_group-error"> Active
                                <span></span>
                            </label>
                            <label class="m-radio m-radio--solid m-radio--brand">
                                <input {{$item->active=='0'?"checked":""}} type="radio" name="active" value="0"> Inactive
                                <span></span>
                            </label>
                        </div>
                        <span class="m-form__help"></span>
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
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{asset('admin/category')}}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
