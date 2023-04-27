@extends("auth.auth-layout")
@section('title','Login to Dashboard')
@section('main-title','Login to Dashboard')

@section('content')
<form class="m-login__form m-form" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="form-group m-form__group">
        <input id="email" class="form-control m-input" type="email" placeholder="Email" name="email"
            value="{{old('email')}}" autocomplete="on">
    </div>
    <div class="form-group m-form__group">
        <input id="password" class="form-control m-input m-login__form-input--last" type="password"
            placeholder="Password" type="password" name="password" required autocomplete="current-password">
    </div>
    <div class="row m-login__form-sub">
        <div class="col m--align-right m-login__form-right">
            <label class="m-checkbox  m-checkbox--focus">
                <input id="remember_me" type="checkbox" name="remember"> Remember me
                <span></span>
            </label>
        </div>
        <div class="col m--align-left m-login__form-left">
            @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" id="m_login_forget_password" class="m-link">Forget password?</a>
            @endif

        </div>

    </div>
    <div class="m-login__form-action">
        <button type="submit" id=""
            class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
            Login</button>
    </div>
</form>
<div class="m-login__account">
    <span class="m-login__account-msg">
    Don't have an account?    </span>&nbsp;&nbsp;
    <a href="{{asset('/register')}}" id="m_login_signup" class="m-link m-link--light m-login__account-link">
    Register a new user</a>
</div>
@endsection
