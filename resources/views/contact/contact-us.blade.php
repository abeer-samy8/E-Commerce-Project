
@extends("layouts.frontHome")

@section("title","Contact Us")

@section("servicesActive","active")


@section("content")


	<!-- Start Hero Section -->
    <div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Contact</h1>
								<p class="mb-4">Are you curious about something? Do you have a problem with our products?<br> Feel free to contact us, our customer service center is open 24/7.</p>
								<p><a href="{{asset('/products')}}" class="btn btn-secondary me-2">Shop Now</a></p>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="hero-img-wrap">
								<img src="{{asset('furni/images/couch.png')}}" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->


		<!-- Start Contact Form -->
		<div class="untree_co-section">
      <div class="container">
        <div class="block">
          <div class="row justify-content-center">
            <div class="col-md-8 col-lg-8 pb-4">
              <div class="row mb-5">
                <div class="col-lg-4">
                  <div  class="service no-shadow align-items-center link horizontal d-flex active" data-aos="fade-left" data-aos-delay="0">
                    <div class="service-icon color-1 mb-4">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                      </svg>
                    </div> <!-- /.icon -->
                    <div class="service-contents">
                      <p>43 Raymouth Rd. Baltemoer, London 3910</p>
                    </div> <!-- /.service-contents-->
                  </div> <!-- /.service -->
                </div>

                <div class="col-lg-4">
                  <div  class="service no-shadow align-items-center link horizontal d-flex active" data-aos="fade-left" data-aos-delay="0">
                    <div class="service-icon color-1 mb-4">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                      </svg>
                    </div> <!-- /.icon -->
                    <div class="service-contents">
                      <p>info@yourdomain.com</p>
                    </div> <!-- /.service-contents-->
                  </div> <!-- /.service -->
                </div>

                <div class="col-lg-4">
                  <div  class="service no-shadow align-items-center link horizontal d-flex active" data-aos="fade-left" data-aos-delay="0">
                    <div class="service-icon color-1 mb-4">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                      </svg>
                    </div> <!-- /.icon -->
                    <div class="service-contents">
                      <p>+1 294 3925 3939</p>
                    </div> <!-- /.service-contents-->
                  </div> <!-- /.service -->
                </div>
              </div>
              <form id="contactForm" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="text-black" for="firstname"> First name</label>
                                        <input id="firstname" name="firstname" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="text-black" for="lastname"> Last name</label>
                                        <input id="lastname" name="lastname" type="text" class="form-control">
                                    </div>
                                </div>
                                    <div class="form-group">
                                        <label class="text-black" for="email">Email address</label>
                                        <input id="email" name="email" type="text" class="form-control">
                                    </div>


                                    <div class="form-group">
                                        <label class="text-black" for="message">Message</label>
                                        <textarea id="message" name="message" class="form-control" cols="30" rows="5"></textarea>
                                    </div>



                                <div class="col-sm-12 text-center" style= 'padding: 20px'>
                                <button type="submit" class="btn btn-template-outlined"><i class="fa fa-envelope-o"></i> Send Message</button>

                                </div>
                            </div>
                        </form>

            </div>

        </div>

        </div>

    </div>


    </div>
</div>

<!-- End Contact Form -->




@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- <script>
$(document).ready(function() {
  $('#contact-form').submit(function(event) {
    event.preventDefault();

    // var formData = {
    //   firstname: $('#firstname').val(),
    //   lastname: $('#lastname').val(),
    //   email: $('#email').val(),
    //   message: $('#message').val()
    // };

    var formData = form.serialize();
    dd('d');

    $.post('/contactus', formData, function(response) {
      // Handle the response from the server
      console.log('response');
    });
  });
});
</script> -->
<!-- <script>
$(function() {
    // Target the form by its ID
    var form = $("#contactForm");
    form.submit(function(event) {
        event.preventDefault();
        // Serialize the form data
        var formData = form.serialize();
        // Send the AJAX POST request
        $.post("/contact-us", formData)
            .done(function(response) {
                console.log('Sended Success');
                // Reset the form
                form[0].reset();
            })
            .fail(function(error) {
                // Handle the error case
                console.error(error);
                // Optionally, you can show an error message or perform other actions
            });
    });
});
</script> -->

<script>
    $('form').submit(function(event) {
    event.preventDefault();

    var formData = new FormData(this);
    var form = this;
    
    $.ajax({
        url: '/contact-us',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            alert(response.msg);
            form.reset();
        },
        error: function(xhr, status, error) {

            console.log(xhr.responseText);
        }
    });
});
</script>


@endsection

