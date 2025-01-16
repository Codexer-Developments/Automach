<section class="tf-section3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-section center">
                    <h2>We love our clients</h2>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="swiper-container carousel-7 overflow-hidden">
                    <div class="swiper-wrapper ">
                        @foreach ($testimonials as $testimonial)
                            <div class="swiper-slide">
                                <div class="tf-testimonial bg-4">
                                    <div class="inner-top flex-two">
                                        <img class="lazyload"
                                            data-src="{{ asset('frontend/assets/images/section/star-5.png') }}"
                                            src="{{ asset('frontend/assets/images/section/star-5.png') }}"
                                            alt="images">
                                        <p class="fs-12">{{ $testimonial->created_at->format('d M Y h:i a') }}</p>

                                    </div>
                                    <p class="fs-16 lh-22 text-color-2">{{ $testimonial->message }}</p>
                                    <div class="author-box flex">
                                        <div class="images">
                                            <img class="lazyload" data-src="{{ $testimonial->image ? asset('storage/' . $testimonial->image) : asset('frontend/assets/images/placeholders/avatar.jpg') }}"
                                                src="{{ $testimonial->image ? asset('storage/' . $testimonial->image) : asset('frontend/assets/images/placeholders/avatar.jpg') }}" alt="{{ $testimonial->name }}">
                                        </div>
                                        <div class="content">
                                            <h5>{{ $testimonial->name }}</h5>
                                            <p class="fs-12 lh-16">{{ $testimonial->position }}</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="swiper-pagination3"></div>
                </div>
            </div>

        </div>

    </div>
</section>
