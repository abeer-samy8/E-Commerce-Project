@extends("layouts.admin")
@section("title","Create New User")

@section("content")
<div class="m-portlet m-portlet--mobile">
    <form method='post' action='{{route("user.index")}}'>
        @csrf
        <div class='m-form'>
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Full Name</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control m-input" placeholder="Enter full name" name="name"
                                value='{{ old("name") }}'>
                            <span class="m-form__help">Enter full name  </span>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Email </label>
                        <div class="col-lg-6">
                            <input type="email" class="form-control m-input" placeholder="Enter your email" name="email"
                                value='{{ old("email") }}'>
                            <span class="m-form__help"> We will not share your email</span>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Password </label>
                        <div class="col-lg-6">
                            <input type="password" class="form-control m-input" placeholder=" Enter password "
                                name="password" value='{{ old("password") }}'>
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
                            <a href='{{route("user.index")}}' class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
