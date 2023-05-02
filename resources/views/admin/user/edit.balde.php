@extends("layouts.admin")
@section("title", "Users  ")
@section("title-side")

@endsection

@section("content")
<div class="m-portlet m-portlet--mobile">
    <form method='post' action='{{route("user.update",$item->id)}}'>
        @csrf
    @method("put")
    <div class="m-portlet__body">
        <div class="m-form__section m-form__section--first">
            <div class="form-group m-form__group row">
                <label class="col-lg-3 col-form-label">Full Name</label>
                <div class="col-lg-6">
                    <input type="text" class="form-control m-input" placeholder="Enter full name" name="name" value='{{ old("name",$item->name) }}'>

                </div>
            </div>
            <div class="form-group m-form__group row">
                <label class="col-lg-3 col-form-label">Email </label>
                <div class="col-lg-6">
                    <input type="email" class="form-control m-input" placeholder="Enter your email" name="email" value='{{ old("email",$item->email) }}'>

                </div>
            </div>
            <div class="form-group m-form__group row">
                <label class="col-lg-3 col-form-label">Password </label>
                <div class="col-lg-6">
                    <input type="password" class="form-control m-input" placeholder="Enter password " name="password" value='{{ old("password") }}'>
                </div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Update</button>
        <a class='btn btn-light' href='{{route("user.index")}}'>Cancel</a>

    </div>
</form>
</div>

@endsection
