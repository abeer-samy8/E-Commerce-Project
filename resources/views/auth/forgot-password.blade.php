@extends("auth.auth-layout")
@section('title','Forget Password')
@section('main-title',' Forget password?')
@section('sub-title','Forgot your password? No problem. Just tell us your email and we will send you a link to reset
password and choose a new password.')

@section('content')
<form class="m-login__form m-form" method="POST" action="{{ route('password.email') }}">
    @csrf

    <div class="form-group m-form__group">
        <input class="form-control m-input" type="email" placeholder="Enter Eamil" name="email" id="email"
            value="{{old('email')}}" required autofocus>
    </div>



    <div class="m-login__form-action">
        <button id="" type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn">
        Send a password reset link to the mail</button>&nbsp;&nbsp;

    </div>

</form>
@endsection
