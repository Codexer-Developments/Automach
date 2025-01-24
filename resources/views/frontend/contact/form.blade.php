<section class="tf-section-contact">
    <div class="container">
        <div class="row">
            <div class="col-md-8 contact-left">
                <div class="heading-section mb-30">
                    <h2>Drop Us a Line</h2>
                    <p class="mt-12">Stay connected with us! Reach out for inquiries, assistance, or to learn more about our services. We're here to help.</p>
                </div>
                <div id="comments" class="comments">
                    <div class="respond-comment">
                        <form method="post" id="loan-calculator" class="comment-form form-submit"
                            action="{{ route('contact.submit') }}" accept-charset="utf-8" novalidate="novalidate">
                            @csrf <!-- Add CSRF token for security -->
                            <div class="grid-sw-2">
                                <fieldset class="email-wrap style-text">
                                    <label class="font-1 fs-14 fw-5">Name</label>
                                    <input type="text" class="tb-my-input" name="name" placeholder="Your name"
                                        required>
                                </fieldset>
                                <fieldset class="phone-wrap style-text">
                                    <label class="font-1 fs-14 fw-5">Email address</label>
                                    <input type="email" class="tb-my-input" name="email" placeholder="Your email"
                                        required>
                                </fieldset>
                            </div>
                            <div class="grid-sw-2">
                                <fieldset class="email-wrap style-text">
                                    <label class="font-1 fs-14 fw-5">Phone Numbers</label>
                                    <input type="tel" class="tb-my-input" name="phone" placeholder="Phone Numbers"
                                        required>
                                </fieldset>
                                <fieldset class="phone-wrap style-text">
                                    <label class="font-1 fs-14 fw-5">Subject</label>
                                    <input type="text" class="tb-my-input" name="subject" placeholder="Enter Subject"
                                        required>
                                </fieldset>
                            </div>
                            <fieldset class="phone-wrap style-text">
                                <label class="font-1 fs-14 fw-5">Your Message</label>
                                <textarea id="comment-message" name="message" rows="4" tabindex="4" placeholder="Your message"
                                    aria-required="true" required></textarea>
                            </fieldset>


                            <div class="button-boxs">
                                <button class="sc-button" name="submit" type="submit">
                                    <span>Send Message</span>
                                </button>
                            </div>
                        </form>
<br>
                        <!-- Display success message -->
                        @if (session('success'))
                            <p class="text-success">{{ session('success') }}</p>
                        @endif

                        @if ($errors->any())
                            <p class="text-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            </p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-4 contact-right">
                <div class="contact-info box-sd">
                    <h2 class="mb-30">Contact Us</h2>
                    <div class="wrap-info">
                        <div class="box-info">
                            <h5>Address</h5>
                            <p>81 Brakens Lane Alvaston Derby DE22 0AQ <br> United Kingdom</p>
                        </div>
                        <div class="box-info">
                            <h5>Infomation:</h5>
                            <p>+44 20 8866 6435</p>
                            <p>info@automach.co.uk</p>
                        </div>
                        <div class="box-info">
                            <h5>Opentime:</h5>
                            <p>Monay - Friday: 08:00 - 20:00</p>
                            <p>Saturday - Sunday: 10:00 - 18:00</p>
                        </div>
                        <div class="box-info">
                            <h5>Follow Us:</h5>
                            <div class="icon-social style2">
                                <a href="#"><i class="icon-autodeal-facebook"></i></a>
                                <a href="#"><i class="icon-autodeal-linkedin"></i></a>
                                <a href="#"><i class="icon-autodeal-twitter"></i></a>
                                <a href="#"><i class="icon-autodeal-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
