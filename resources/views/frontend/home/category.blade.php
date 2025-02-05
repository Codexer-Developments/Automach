      <!-- widegt categori -->
      <section class="tf-section3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-section flex align-center justify-space flex-wrap gap-20">
                        <h2 class="wow fadeInUpSmall" data-wow-delay="0.2s" data-wow-duration="1000ms">What
                            would you like to find?</h2>
                        <a href="{{ route('shop') }}" class="tf-btn-arrow wow fadeInUpSmall" data-wow-delay="0.2s"
                            data-wow-duration="1000ms">View all<i class="icon-autodeal-btn-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="swiper partner-slide overflow-hidden">
                        <div class="swiper-wrapper">

                            @foreach ($brands as $brand)
                            <div class="swiper-slide">
                                <a href="{{ route('shop') }}" class="partner-item style-1">
                                    <div class="image">
                                        <img class="lazyload" data-src="{{ $brand->logo ? asset('storage/' . $brand->logo) : asset('frontend/assets/images/placeholders/placeholder.webp') }}"
                                            src="{{ $brand->logo ? asset('storage/' . $brand->logo) : asset('frontend/assets/images/placeholders/placeholder.webp') }}" alt="{{$brand->name}}">
                                    </div>
                                    <div class="content center">
                                        <div class="fs-16 fw-6 title text-color-2 font-2">{{$brand->name}}</div>
                                        <span class="sub-title fs-12 fw-4 font-2">{{$brand->cars_count}} Car</span>
                                    </div>
                                </a>
                            </div>
                            @endforeach


                        </div>
                    </div>
                    <div class="swiper-pagination4"></div>

                </div>
            </div>
        </div>
    </section>