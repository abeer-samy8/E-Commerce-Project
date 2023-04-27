@extends("layouts.admin")
@section("title","Update Static Page")

@section("title-side")

@endsection

@section("js")
<script>
    $(".summernote").summernote({height:400})
</script>
@endsection
@section("content")
<div class="m-portlet m-portlet--mobile">
    <form enctype="multipart/form-data" method='post' action=" {{asset ('admin/static-page/'.$item->id)}}">
        @csrf
        @method("put")
        <div class='m-form'>
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Title</label>
                        <div class="col-lg-6">
                            <input id="title" value="{{ old('title',$item->title) }}" name="title" placeholder="title"
                                class="form-control" type="text">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Short Description</label>
                        <div class="col-lg-6">
                            <input id="slug" value="{{ old('slug',$item->slug) }}" name="slug"
                                placeholder="Short Description " class="form-control" type="text">
                        </div>
                    </div>
                    <!-- <input {{$item->active?"checked":""}} type="checkbox" name="active" /> -->
                    <div class="m-form__group form-group row">
                        <label class=" col-lg-3 col-form-label">Active/ Inactive</label>
                        <div class="m-radio-inline col-lg-6">
                            <label class="m-radio m-radio--solid m-radio--brand">
                                <input {{$item->active=='1'?"checked":""}} type="radio" name="active" checked=""
                                    value="1" aria-describedby="account_group-error"> Active
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
                        <label class="col-lg-3 col-form-label">Details</label>
                        <div class="col-lg-6">
                            <textarea id="details" rows='8' style='height:350px;' name="details" placeholder="أدخل التفاصيل"
                                class="summernote form-control">{{ old('details',$item->details) }}</textarea>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Image</label>
                        <div class="col-lg-6">
                            <input type='file' class="form-control" name="image" id="image" />
                            @if($item->image)
                            <hr>
                            <img style='max-width:250px' src='{{asset("storage/images/$item->image")}}' />
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-portlet__foot m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <button class="btn btn-primary" type="submit">Update</button>
                            <a href="{{asset('admin/static-page')}}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
