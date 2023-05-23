@extends("layouts.admin")
@section("title","Update Category")



@section("content")
<div class="m-portlet m-portlet--mobile">
<form method="post" action="{{asset('admin/category/'.$item->id)}}" data-record-id="{{$item->id}}">
        @csrf
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
                        <label class="col-lg-3 col-form-label">Active / Inactive</label>
                        <div class="m-radio-inline col-lg-6">
                            <label class="m-radio m-radio--solid m-radio--brand">
                                <input {{ $item->status === \App\Models\Category::STATUS_ACTIVE ? 'checked' : '' }} type="radio" name="status" value="active"> Active
                                <span></span>
                            </label>
                            <label class="m-radio m-radio--solid m-radio--brand">
                                <input {{ $item->status === \App\Models\Category::STATUS_INACTIVE ? 'checked' : '' }} type="radio" name="status" value="inactive"> Inactive
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

@section('js')
<script>
$('form').submit(function(e) {
    e.preventDefault(); // Prevent default form submission

    var form = $(this);
    var recordId = form.data('record-id'); // Retrieve the record ID from the form data attribute
    var data = form.serialize(); // Serialize the form data

    $.ajax({
        url: form.attr('action'),
        type: 'PATCH',
        data: data,
        success: function(response) {
            // Handle the response from the server
            console.log(response);
            // Perform any necessary UI updates or display success message
        },
        error: function(xhr) {
            // Handle any errors that occur
            console.log(xhr.responseText);
            // Display error message or handle errors accordingly
        }
    });
});
</script>
@endsection
