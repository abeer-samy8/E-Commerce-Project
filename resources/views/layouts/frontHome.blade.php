
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
