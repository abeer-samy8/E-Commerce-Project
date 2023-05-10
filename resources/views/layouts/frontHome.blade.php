
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
		<link href="{{asset('furni/css/bootstrap.min.css')}}" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="{{asset('furni/css/tiny-slider.css')}}" rel="stylesheet">
		<link href="{{asset('furni/css/style.css')}}" rel="stylesheet">
		<title>E-Store - @yield("title") </title>
        <style>

.ribbon {
  width: 80px;
  height: 32px;
  line-height: 32px;
  background: #4fbfa8;
  color: #fff;
  text-transform: uppercase;
  letter-spacing: 0.1em;
  font-weight: 700;
  font-size: 0.9rem;
  margin-bottom: 20px;
  position: absolute;
  top: 30px;
  left: -15px;
  text-align: center;
}

.ribbon.sale {
background: #198754;
}

.ribbon.new {
background: #ffc107;
}

.ribbon.new::after {
content: '';
border-top: 15px solid #1f7e9a;
}

.ribbon.sold {
background: #f0ad4e;
}

.ribbon.sold::after {
content: '';
border-top: 15px solid #b06d0f;
}

.ribbon.gift {
background: #5cb85c;
}

.ribbon.gift::after {
content: '';
border-top: 15px solid #2d672d;
}

.ribbon:nth-of-type(2) {
top: 82px;
}

.ribbon::after {
content: '';
border-top: 15px solid #308372;
border-left: 15px solid transparent;
border-right: 0 solid transparent;
position: absolute;
bottom: -15px;
left: 0;
display: block;
}
.nav-pills .nav-link {
  border-radius: 0;
}
.nav-link:focus, .nav-link:hover {
    color: black;
}

.nav-pills .nav-link:hover {
  background: white;
}

.nav-pills .nav-link.active {
  background: #4fbfa8;
}
.category-menu a.nav-link {
  text-transform: uppercase;
  letter-spacing: 0.1em;
  font-weight: 700;
}

ul ul a.nav-link {
  padding-left: 30px !important;
  font-size: 0.85rem;
  text-transform: none !important;
  font-weight: 400 !important;
  color: #777;
}

.heading.text-center h1:after, .text-center.panel-heading h1:after, .heading.text-center h2:after, .text-center.panel-heading h2:after,   .heading.text-center h4:after, .text-center.panel-heading h4:after, .heading.text-center h5:after, .text-center.panel-heading h5:after, .heading.text-center h6:after, .text-center.panel-heading h6:after {
  margin-left: auto;
  margin-right: auto;
}

.heading h1, .panel-heading h1, .heading h2, .panel-heading h2, .heading h3, .panel-heading h3, .heading h4, .panel-heading h4, .heading h5, .panel-heading h5, .heading h6, .panel-heading h6 {
    line-height: 1.1;
    display: inline-block;
    margin-bottom: 0;
    padding-bottom: 10px;
    text-transform: uppercase;
    letter-spacing: 0.1em;
}

.panel-heading {
  margin-bottom: 10px;
}

.panel-heading h3 {
  margin-top: 5px;
  color: black;
}
.heading h1:after, .panel-heading h1:after, .heading h2:after, .panel-heading h2:after, .heading h3:after, .panel-heading h3:after, .heading h4:after, .panel-heading h4:after, .heading h5:after, .panel-heading h5:after, .heading h6:after, .panel-heading h6:after {
  content: " ";
  display: block;
  width: 100px;
  height: 2px;
  margin-top: .6rem;
  background:  #4fbfa8;
}

.badge {
  font-weight: 400;
  text-transform: uppercase;
  letter-spacing: 0.1em;
  padding: 3px 5px;
}

.badge-primary {
  color: #111;
  background-color: #4fbfa8;
}

.badge-primary[href]:focus, .badge-primary[href]:hover {
  color: #111;
  text-decoration: none;
  background-color: #3aa18c;
}

.badge-secondary {
  color: #fff;
  background-color: #868e96;
}

.badge-secondary[href]:focus, .badge-secondary[href]:hover {
  color: #fff;
  text-decoration: none;
  background-color: #6c757d;
}

.badge-success {
  color: #fff;
  background-color: #28a745;
}

.badge-success[href]:focus, .badge-success[href]:hover {
  color: #fff;
  text-decoration: none;
  background-color: #1e7e34;
}

.badge-info {
  color: #fff;
  background-color: #17a2b8;
}

.badge-info[href]:focus, .badge-info[href]:hover {
  color: #fff;
  text-decoration: none;
  background-color: #117a8b;
}

.badge-warning {
  color: #111;
  background-color: #ffc107;
}

.badge-warning[href]:focus, .badge-warning[href]:hover {
  color: #111;
  text-decoration: none;
  background-color: #d39e00;
}

.badge-danger {
  color: #fff;
  background-color: #dc3545;
}

.badge-danger[href]:focus, .badge-danger[href]:hover {
  color: #fff;
  text-decoration: none;
  background-color: #bd2130;
}

.badge-light {
  color: #111;
  background-color: #f8f9fa;
}

.badge-light[href]:focus, .badge-light[href]:hover {
  color: #111;
  text-decoration: none;
  background-color: #dae0e5;
}

.badge-dark {
  color: #fff;
  background-color: #343a40;
}

.badge-dark[href]:focus, .badge-dark[href]:hover {
  color: #fff;
  text-decoration: none;
  background-color: #1d2124;
}
.sidebar-menu .badge {
  font-weight: 700;
  margin: 0;
}

</style>
        @yield("css")
	</head>

	<body>

            @include("layouts.home.header")

			@yield("content")

		<!-- Start Footer Section -->

        @include("layouts.home.footer")
		<!-- End Footer Section -->
        <script
  src="https://code.jquery.com/jquery-3.6.4.min.js"
  integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
  crossorigin="anonymous"></script>

        <!-- <script type="text/javascript" src="{{asset('furni/js/jquery-3.5.1.min.js')}}"></script> -->

        <!-- <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script> -->
		<script src="{{asset('furni/js/bootstrap.bundle.min.js')}}"></script>
		<script src="{{asset('furni/js/tiny-slider.js')}}"></script>
		<script src="{{asset('furni/js/custom.js')}}"></script>

        <!-- <script src="js/cartNumber.js"></script> -->
        @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

        <script>
            function addSubscriber(){
                var subscriber_email = $("#subscriber_email").val();
                var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if(regex.test(subscriber_email)==false){
                    alert("Please enter valid Email!");
                    return false;
                }
                $.ajax({
                    type:'post',
                    url:'/add-subscriber-email',
                    data:{subscriber_email:subscriber_email},
                    success:function(resp){
                        alert(resp);
                    },error:function(){
                        alert("Error");
                    }
                });
            }
        </script>


        @yield("js")


	</body>

</html>
