<section class="loan-calculator inner-1 bg-2" id="inquery">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="loan-calculator-form w-560">
                    <div class="box-title">
                        <h2 class="title-ct">Make an Inquiry</h2>
                        <p>Have questions about this car? Send us a message, and we'll get back to you shortly.</p>
                    </div>

                    <div id="comments" class="comments">
                        <div class="respond-comment">
                            <form method="post" id="contactFormInquery" class="comment-form form-submit" action="#" accept-charset="utf-8" novalidate="novalidate">
                                @csrf <!-- Add CSRF token -->
                                <div class="grid-sw-2">
                                    <fieldset class="email-wrap style-text">
                                        <label class="font-1 fs-14 fw-5">Name</label>
                                        <input type="text" class="tb-my-input" name="name" placeholder="Your name" required>
                                    </fieldset>
                                    <fieldset class="phone-wrap style-text">
                                        <label class="font-1 fs-14 fw-5">Email address</label>
                                        <input type="email" class="tb-my-input" name="email" placeholder="Your email" required>
                                    </fieldset>
                                </div>

                                <div class="grid-sw-2">
                                    <fieldset class="email-wrap style-text">
                                        <label class="font-1 fs-14 fw-5">Phone Numbers</label>
                                        <input type="tel" class="tb-my-input" name="phone" placeholder="Phone Numbers" required>
                                    </fieldset>
                                    <fieldset class="phone-wrap style-text">
                                        <label class="font-1 fs-14 fw-5">Subject</label>
                                        <input type="text" class="tb-my-input" name="subject" placeholder="Enter Subject" required>
                                    </fieldset>
                                </div>

                                <fieldset class="name-wrap">
                                    <label class="font-1 fs-14 fw-5">Your Message</label>
                                    <textarea id="comment-message" name="message" rows="4" tabindex="4" placeholder="Your message" aria-required="true" required></textarea>
                                </fieldset>

                                <div class="button-boxs">
                                    <button class="sc-button" name="submit" type="submit">
                                        <span>Send Message</span>
                                    </button>
                                </div>
                            </form>

                            <!-- Response Message -->
                            <div id="responseMessageForm" class="mt-3"></div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    $(document).ready(function () {
        $('#contactFormInquery').on('submit', function (e) {
            e.preventDefault(); // Prevent the form from submitting normally

            // Get the form data
            const formData = $(this).serialize();

            // Send the AJAX request
            $.ajax({
                url: "{{ route('contact.inquery') }}", // Use the named route
                type: "POST",
                data: formData,
                success: function (response) {
                    if (response.success) {
                        $('#responseMessageForm').html(`
                            <div class="text-success">
                                ${response.message}
                            </div>
                        `);
                        $('#contactForm')[0].reset(); // Reset the form
                    }
                },
                error: function (xhr) {
                    const errors = xhr.responseJSON.errors;
                    let errorHtml = '<div class="text-danger"><ul>';
                    for (const key in errors) {
                        errorHtml += `<li>${errors[key][0]}</li>`;
                    }
                    errorHtml += '</ul></div>';
                    $('#responseMessageForm').html(errorHtml);
                }
            });
        });
    });
</script>
@endpush
