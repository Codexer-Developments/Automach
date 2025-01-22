    <!-- Footer -->
    <footer id="footer" class="clearfix home">
        <div class="container">
            <div class="footer-main">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="widget widget-menu footer-col-block">
                            <div class="footer-heading-desktop">
                                <h4>About Auto Decar</h4>
                            </div>
                            <div class="footer-heading-mobie">
                                <h4>About Auto Decar</h4>
                            </div>
                            <ul class="box-menu tf-collapse-content">
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Careers With Us</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Corporate Policies</a></li>
                                <li><a href="#">Investors</a></li>
                                <li><a href="#">FAQs</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="widget widget-menu footer-col-block">
                            <div class="footer-heading-desktop">
                                <h4>Popular used car</h4>
                            </div>
                            <div class="footer-heading-mobie">
                                <h4>Popular used car</h4>
                            </div>
                            <ul class="box-menu tf-collapse-content">
                                <li><a href="#">Chevrolet</a></li>
                                <li><a href="#">Land Rover</a></li>
                                <li><a href="#">Tesla</a></li>
                                <li><a href="#">Volkswagen</a></li>
                                <li><a href="#">Honda</a></li>
                                <li><a href="#">Hyundai</a></li>
                                <li><a href="#">Mercedes benz</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="widget widget-menu footer-col-block">
                            <div class="footer-heading-desktop">
                                <h4>Other</h4>
                            </div>
                            <div class="footer-heading-mobie">
                                <h4>Other</h4>
                            </div>
                            <ul class="box-menu tf-collapse-content">
                                <li><a href="#">How it work</a></li>
                                <li><a href="#">Terms and Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Copyrights</a></li>
                                <li><a href="#">Help center</a></li>
                                <li><a href="#">Car sales trends</a></li>
                                <li><a href="#">Personal loan</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12 ">
                        <div class="widget widget-menu widget-form footer-col-block">
                            <div class="footer-heading-desktop">
                                <h4>Newsletter</h4>
                            </div>
                            <div class="footer-heading-mobie">
                                <h4>Newsletter</h4>
                            </div>
                            <div class="tf-collapse-content">
                                <form method="post" class="comment-form form-submit" action="#"
                                    accept-charset="utf-8">
                                    <p class="font-2">Stay on top of the latest car trends, tips, and tricks for
                                        selling your car.</p>
                                    <div class="text-wrap clearfix">
                                        <fieldset class="email-wrap style-text">
                                            <input type="email" class="tb-my-input" name="email"
                                                placeholder="Your email address" required="">
                                        </fieldset>
                                    </div>
                                    <button name="submit" type="submit" class="button btn-submit-comment btn-1 btn-8">
                                        <span>Send</span>
                                    </button>
                                </form>
                                <p class="text-warning d-none" id="message" style="color: #FF7101 !important"></p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="logo-footer style box-1">
                            <a href="index.html">
                                <img class="lazyload" data-src="{{ asset('frontend/logo/automach_light.svg') }}"
                                    src="{{ asset('frontend/logo/automach_light.svg') }}" alt="img" width="225"
                                    height="40">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12">
                        <div class="footer-bottom-right flex-six flex-wrap ">
                            <div class="title-bottom center">© {{ date('Y') }} AutoMach. All rights reserved |
                                Design & Developed By <a class="text-color-3" href="http://codexer.co.uk">Codexer</a>
                            </div>
                            <div class="icon-social box-3 text-color-1">
                                <a href="#"><i class="icon-autodeal-facebook"></i></a>
                                <a href="#"><i class="icon-autodeal-linkedin"></i></a>
                                <a href="#"><i class="icon-autodeal-twitter"></i></a>
                                <a href="#"><i class="icon-autodeal-instagram"></i></a>
                                <a href="#"><i class="icon-autodeal-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer><!-- /#footer -->

    @push('scripts')
    <script>
        $(document).ready(function () {
            $('.comment-form').on('submit', function (e) {
                e.preventDefault(); // Prevent the default form submission

                // Clear any previous messages
                $('#message').text('').removeClass('d-none');

                // Perform the AJAX request
                $.ajax({
                    url: "{{ route('newsletter.subscribe') }}", // Use the correct route
                    method: "POST",
                    data: $(this).serialize(), // Serialize the form data
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Add CSRF token
                    },
                    success: function (response) {
                        if (response.success) {
                            // Display success message
                            $('#message').text(response.message).addClass('text-success').removeClass('text-warning');

                            // Clear the email input field
                            $('.comment-form input[name="email"]').val('');
                        } else {
                            // Display error message
                            $('#message').text(response.message).addClass('text-warning').removeClass('text-success');
                        }
                    },
                    error: function (xhr) {
                        // Handle server errors (e.g., validation errors)
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            $('#message').text(xhr.responseJSON.message).addClass('text-warning').removeClass('text-success');
                        } else {
                            $('#message').text('An error occurred. Please try again.').addClass('text-warning').removeClass('text-success');
                        }
                    }
                });
            });
        });
    </script>
    @endpush
