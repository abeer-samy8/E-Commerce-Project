@extends("layouts.admin")
@section("title","  Add New Service")

@section("content")
<div class="m-portlet m-portlet--mobile">
    <form enctype='multipart/form-data' method="post" action='{{route("service.index")}}'>
        @csrf
        <div class='m-form'>
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Service</label>
                        <div class="col-lg-6">
                            <input id="title" value="{{ old('title') }}" name="title" placeholder="Service"
                                class="form-control" type="text">
                        </div>
                    </div>

                    </div>
                    <div class="m-form__group form-group row">
                    <label class="col-lg-3 col-form-label">Status</label>
                    <div class="m-radio-inline col-lg-6">
                        <label class="m-radio m-radio--solid m-radio--brand">
                            <input {{ old('status') == \App\Models\Service::STATUS_ACTIVE ? 'checked' : '' }} type="radio" name="status" value="{{ \App\Models\Service::STATUS_ACTIVE }}" aria-describedby="account_group-error" checked="">Active
                            <span></span>
                        </label>
                        <label class="m-radio m-radio--solid m-radio--brand">
                            <input {{ old('status') == \App\Models\Service::STATUS_INACTIVE ? 'checked' : '' }} type="radio" name="status" value="{{ \App\Models\Service::STATUS_INACTIVE }}">Inactive
                            <span></span>
                        </label>
                    </div>
                    <span class="m-form__help"></span>
                </div>


                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Summary</label>
                        <div class="col-lg-6">
                            <textarea id="details" rows='8' name="summary"
                                class="form-control">{{old("summary")}}</textarea>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Image</label>
                        <div class="col-lg-6">
                            <input multiple id="image" name="image" type='file' class="form-control">
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
                            <a href="{{asset('admin/service')}}" class="btn btn-secondary"> Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
