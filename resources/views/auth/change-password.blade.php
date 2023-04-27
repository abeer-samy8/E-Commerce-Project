@extends("layouts.admin")
@section("title","Change Password ")


@section("content")
<div class="m-portlet m-portlet--mobile">
    <form method="post" action='{{route("password.changed")}}'>
        @csrf
        <div class='m-form'>
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Current Password</label>
                        <div class="col-lg-6">
                            <input type="password" id="password" name="password" class="password form-control m-input"
                                placeholder="Enter current password ">
                            <span toggle="#password" class=" field-icon toggle-password"></span>
                            <span class="m-form__help"></span>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label"> New password</label>
                        <div class="col-lg-6">
                            <input type="password" name="new_password" id="new_password" class=" form-control m-input"
                                placeholder=" Enter new password ">
                            <span toggle="#new_password" class=" field-icon toggle-password"></span>
                            <span class="m-form__help">Password must be at least 9 letters or numbers</span>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label"> Confirm the new password</label>
                        <div class="col-lg-6">
                            <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                                class=" form-control m-input" placeholder="Enter the new password again">
                            <span toggle="#new_password_confirmation"
                                class=" field-icon toggle-password"></span>
                            <span class="m-form__help">Password must be at least 9 letters or numbers</span>
                        </div>
                    </div>


                </div>
            </div>
            <div class="m-portlet__foot m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-accent ">Change Password</button>
                            <a href="{{asset('admin/')}}" class="btn btn-secondary "> Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection


@section('css')
<style>
.field-icon {
    float: left;
    margin-left: 10px;
    margin-top: -22px;
    position: relative;
    z-index: 2;
}
</style>
@endsection
@section('js')
<script type="text/javascript">
$(".toggle-password").click(function() {

    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});
</script>
@endsection
