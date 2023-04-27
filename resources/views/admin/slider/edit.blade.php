@extends("layouts.admin")
@section("title","اضافة تصنيف جديد")

@section("title-side")
<!--a href="{{asset('admin/category/create')}}" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
    <span>
        <i class="la la-plus"></i>
        <span>
            اضافة تصنيف جديد
        </span>
    </span>
</a-->
@endsection

@section("content")
<form enctype='multipart/form-data' method='post' action='{{asset("admin/slider/".$item->id)}}'>
    @csrf
    @method("put")
    <div class="m-portlet m-portlet--mobile">
        <div class='m-form'>
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Title:</label>
                        <div class="col-lg-6">
                            <input autofocus='true' value='{{ old("title",$item->title) }}' type="text"
                                class="form-control m-input" name="title" id="title" placeholder="Enter Title">
                            <span class="m-form__help">Please enter Title</span>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Sub Title:</label>
                        <div class="col-lg-6">
                            <input autofocus='true' value='{{ old("subtitle",$item->subtitle) }}' type="text"
                                class="form-control m-input" name="subtitle" id="subtitle" placeholder="Enter Title">
                            <span class="m-form__help">Please enter Sub Title</span>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Image:</label>
                        <div class="col-lg-6">
                            <input autofocus='true' value='{{ old("image",$item->image) }}' type="file"
                                class="form-control m-input" placeholder="Enter image" name="image" id="image">
                            <span class="m-form__help">Please enter Image</span>
                            @if($item->url)
                                <hr>
                                <img width='350' src='{{asset("/storage/images/$item->image")}}'>
                                @endif
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">url</label>
                        <div class="col-lg-6">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i
                                            class="la la-chain"></i></span></div>
                                <input type="text" class="form-control m-input" placeholder="url" name="url"
                                    value="{{ old('url',$item->url) }}" id="url">

                            </div>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">button_text:</label>
                        <div class="col-lg-6">
                            <input autofocus='true' value='{{ old("button_text",$item->button_text) }}' type="text"
                                class="form-control m-input" name="button_text" id="button_text"
                                placeholder="Enter button_text">
                            <span class="m-form__help">Please enter button_text</span>
                        </div>
                    </div>

                    <div class="m-form__group form-group row">
                        <label class="col-lg-3 col-form-label">Active:</label>
                        <div class="col-lg-6">
                            <div class="m-checkbox-inline">
                                <label class="m-checkbox">
                                    <input {{$item->active?"checked":""}} type="checkbox" name="active" />
                                    Active
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="m-form__group form-group row">
                        <label class="col-lg-3 col-form-label">new_window:</label>
                        <div class="col-lg-6">
                            <div class="m-checkbox-inline">
                                <label class="m-checkbox">
                                    <input {{$item->new_window?"checked":""}} type="checkbox" name="new_window" />
                                    new_window
                                    <span></span>
                                </label>
                            </div>
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
                            <a href="{{asset('admin/slider')}}" class="btn btn-secondary">Cancel </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
