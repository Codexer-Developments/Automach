      <!-- widegt List car -->
      <section class="tf-section">
          <div class="container">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="heading-section flex align-center justify-space flex-wrap gap-20">
                          <h2 class="wow fadeInUpSmall" data-wow-delay="0.2s" data-wow-duration="1000ms">Discover Our
                              Collection</h2>
                          <a href="{{ route('shop') }}" class="tf-btn-arrow wow fadeInUpSmall" data-wow-delay="0.2s"
                              data-wow-duration="1000ms">View all<i class="icon-autodeal-btn-right"></i></a>
                      </div>
                  </div>
                  <div class="col-lg-12">
                      <div class="list-car-grid-4 gap-30">

                          @foreach ($cars as $car)
                              <div class="box-car-list hv-one">
                                  <div class="image-group relative ">
                                      <div class="top flex-two">
                                          <ul class="d-flex gap-8">

                                              <li class="flag-tag style-1">
                                                  <div class="icon">
                                                      <svg width="16" height="13" viewBox="0 0 16 13"
                                                          fill="none" xmlns="http://www.w3.org/2000/svg">
                                                          <path
                                                              d="M1.5 9L4.93933 5.56067C5.07862 5.42138 5.24398 5.31089 5.42597 5.2355C5.60796 5.16012 5.80302 5.12132 6 5.12132C6.19698 5.12132 6.39204 5.16012 6.57403 5.2355C6.75602 5.31089 6.92138 5.42138 7.06067 5.56067L10.5 9M9.5 8L10.4393 7.06067C10.5786 6.92138 10.744 6.81089 10.926 6.7355C11.108 6.66012 11.303 6.62132 11.5 6.62132C11.697 6.62132 11.892 6.66012 12.074 6.7355C12.256 6.81089 12.4214 6.92138 12.5607 7.06067L14.5 9M2.5 11.5H13.5C13.7652 11.5 14.0196 11.3946 14.2071 11.2071C14.3946 11.0196 14.5 10.7652 14.5 10.5V2.5C14.5 2.23478 14.3946 1.98043 14.2071 1.79289C14.0196 1.60536 13.7652 1.5 13.5 1.5H2.5C2.23478 1.5 1.98043 1.60536 1.79289 1.79289C1.60536 1.98043 1.5 2.23478 1.5 2.5V10.5C1.5 10.7652 1.60536 11.0196 1.79289 11.2071C1.98043 11.3946 2.23478 11.5 2.5 11.5ZM9.5 4H9.50533V4.00533H9.5V4ZM9.75 4C9.75 4.0663 9.72366 4.12989 9.67678 4.17678C9.62989 4.22366 9.5663 4.25 9.5 4.25C9.4337 4.25 9.37011 4.22366 9.32322 4.17678C9.27634 4.12989 9.25 4.0663 9.25 4C9.25 3.9337 9.27634 3.87011 9.32322 3.82322C9.37011 3.77634 9.4337 3.75 9.5 3.75C9.5663 3.75 9.62989 3.77634 9.67678 3.82322C9.72366 3.87011 9.75 3.9337 9.75 4Z"
                                                              stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                              stroke-linejoin="round" />
                                                      </svg>
                                                  </div>
                                                  @if ($car->image_urls && count($car->image_urls) > 0)
                                                      @php

                                                          $imageCount = count($car->image_urls); // Get the total number of images
                                                      @endphp

                                                      <div>
                                                          {{ $imageCount }}
                                                      </div>
                                                  @else
                                                      0
                                                  @endif
                                              </li>
                                          </ul>
                                          <div class="year flag-tag">{{ $car->year }}</div>
                                      </div>

                                      <div class="img-style">
                                          @if ($car->image_urls && count($car->image_urls) > 0)
                                              @php
                                                  $firstImage = $car->image_urls[0]; // Get the first image
                                              @endphp
                                              <img class="lazyload car-image"
                                                  data-src="{{ asset('storage/' . $firstImage['url']) }}"
                                                  src="{{ asset('storage/' . $firstImage['url']) }}" alt="image">
                                          @else
                                              <img class="lazyload car-image"
                                                  data-src="{{ asset('frontend/assets/images/placeholders/placeholder.webp') }}"
                                                  src="{{ asset('frontend/assets/images/placeholders/placeholder.webp') }}"
                                                  alt="image">
                                          @endif
                                      </div>
                                  </div>
                                  <div class="content">
                                      <div class="text-address">
                                          <p class="text-color-3 font">{{ $car->bodyType?->name ?? '-' }}</p>
                                      </div>
                                      <h5 class="link-style-1">
                                          <a href="{{ route('car.detail', $car->id) }}">{{ $car->name }}</a>
                                      </h5>
                                      <div class="icon-box flex flex-wrap">
                                          <div class="icons flex-three">
                                              <i class="icon-autodeal-km1"></i>
                                              <span>{{ number_format($car->miles) }} Miles</span>
                                          </div>
                                          <div class="icons flex-three">
                                              <i class="icon-autodeal-diesel"></i>
                                              <span>{{ $car->fuel_type }}</span>
                                          </div>
                                          <div class="icons flex-three">
                                              <i class="icon-autodeal-automatic"></i>
                                              <span>{{ $car->transmission }}</span>
                                          </div>
                                      </div>
                                      <div class="money fs-20 fw-5 lh-25 text-color-3">£{{ number_format($car->price) }}</div>
                                      <div class="days-box flex justify-space align-center">
                                          <div class="img-author">
                                              <img class="lazyload"
                                                  src="https://ui-avatars.com/api/?name={{$car->user?->name}}" alt="{{$car->user?->name}}">
                                              <span class="font text-color-2 fw-5">{{ $car->user?->name ?? '-' }}</span>
                                          </div>
                                          <a href="{{ route('car.detail', $car->id) }}" class="view-car">View car</a>
                                      </div>
                                  </div>
                              </div>
                          @endforeach


                      </div>
                  </div>

              </div>
          </div>
      </section>
