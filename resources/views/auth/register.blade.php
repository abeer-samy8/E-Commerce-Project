@extends("auth.auth-layout")
@section('title','Register a new user')
@section('main-title','Register a new user')
@section('sub-title','Please enter your details to register your account')

@section('content')
<form class="m-login__form m-form" method="POST" action="{{ route('register') }}">
    @csrf
    <div class="form-group m-form__group">
        <input class="form-control m-input" type="text" id="name" value="{{old('name')}}" placeholder="Full Name"
            name="name" autocomplete="on" required autofocus>
    </div>
    <div class="form-group m-form__group">
        <input class="form-control m-input" type="email" id="email" placeholder="Email"
            value="{{old('email')}}" name="email" autocomplete="on" required>
    </div>
    <div class="form-group m-form__group">
        <input class="form-control m-input" type="password" placeholder="Password" name="password" id="password"
            required>
    </div>
    <div class="form-group m-form__group">
        <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Confirm Password"
            id="password_confirmation" name="password_confirmation" required>
    </div>


    <div class="m-login__form-action">
        <button id="" type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn">Rigester</button>&nbsp;&nbsp;

        <a href="{{asset('login')}}" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom  m-login__btn">
            Cancel</a>


    </div>
    <div class="row m-login__form-sub">
        <div class="col m--align-center m-login__form-right">
            <a href="{{ route('login') }}" id="m_login_forget_password" class="m-link">Already have an account?</a>

        </div>
    </div>
</form>
@endsection
