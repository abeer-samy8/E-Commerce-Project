	<!-- Start Header/Navigation -->
    <nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

<div class="container">
    <a class="navbar-brand" href="index.html">Dash<span>.</span></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsFurni">
        <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
            <li class="nav-item active">
                <a class="nav-link" href="{{asset('/')}}">Home</a>
            </li>
            <li><a class="nav-link" href="{{asset('products')}}">Sales</a></li>
            <li><a class="nav-link" href="{{asset('categories')}}">Categories</a></li>
            <li><a class="nav-link" href="{{asset('stores')}}">Stores</a></li>
            <li><a class="nav-link" href="{{asset('services')}}">Services</a></li>
            <li><a class="nav-link" href="{{asset('contact-us')}}">Contact us</a></li>
            <li><a class="nav-link" href="{{asset('/about-us')}}">About us</a></li>



        </ul>
<div class="form-inline mt-2 mt-md-0 mr-auto">
                <ul class="navbar-nav">
                    @if (Route::has('login'))

                    @auth
                    <!-- <li class="nav-item @yield('profileActive')">
                        <a class="nav-link" href="{{asset('/member/profile')}}">{{trans('welcome')}} {{auth()->user()->name}}</a>
                    </li> -->
                    <li class="nav-item @yield('profileActive')">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="nav-link">logout</a>

                        </form>
                    </li>
                    @else
                    <li class="nav-item @yield('profileActive')">
                        <a class="nav-link" href="{{asset('login')}}">Login</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item @yield('profileActive')">
                        <a class="nav-link" href="{{asset('register')}}">Register</a>
                    </li>
                    @endif
                    @endauth

                    @endif

                </ul>
            </div>

        <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5 cartt">
            <li><img src="{{asset('furni/images/user.svg')}}"></li>
            <li>


            <a class="nav-link" href="{{asset('products/cart')}}">
            <img src="{{asset('furni/images/cart.svg')}}">
             <?php
                    $cartItems = json_decode(request()->cookie('cart'),true)??[];
                    $count = count($cartItems);
                    if($count)
                        echo "<span class='badge'>$count</span>";
                    ?>
                </a>
            </li>
        </ul>

    </div>
</div>

</nav>
<!-- End Header/Navigation -->


