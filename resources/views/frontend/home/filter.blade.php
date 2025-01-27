       <!-- filter -->
       <div class="flat-filter-search home">
           <div class="container">
               <div class="row">
                   <div class="col-lg-12">
                       <div class="flat-tabs">
                           <div class="box-tab center">
                               <ul class="menu-tab tab-title flex">
                                   <li class="item-title style active">
                                       <span class="inner fs-16 fw-5 lh-20">All Car</span>
                                   </li>
                                   <li class="item-title style">
                                       <span class="inner fs-16 fw-5 lh-20">New Car</span>
                                   </li>
                                   <li class="item-title style">
                                       <span class="inner fs-16 fw-5 lh-20">Used Car</span>
                                   </li>
                               </ul>
                           </div>
                           <div class="content-tab">
                               <div class="content-inner tab-content">
                                   <div class="form-sl">

                                    <form method="GET" action="{{ route('shop') }}">
                                        <div class="wd-find-select flex">
                                            <div class="inner-group select-style">
                                                <!-- Brand Selection -->
                                                <div class="form-group-1">
                                                    <label>Brand</label>
                                                    <div class="group-select tf-select">
                                                    <select name="brand_id" id="brand-select" class="nice-select">
                                                        <option value="">Brand</option>
                                                        @foreach ($brands as $brand)
                                                            <option value="{{ $brand->id }}">
                                                                {{ $brand->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    </div>
                                                </div>

                                                <!-- Model Selection -->
                                                <div class="form-group-1">
                                                    <label>Model</label>
                                                    <div class="group-select tf-select">
                                                    <select name="car_model_id" id="model-select" class="nice-select">
                                                        <option value="">Models</option>
                                                        @foreach ($models as $model)
                                                            <option value="{{ $model->id }}">
                                                                {{ $model->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    </div>
                                                </div>

                                                <!-- Transmission Selection -->
                                                <div class="form-group-1">
                                                    <label>Transmission</label>
                                                    <div class="group-select tf-select">
                                                    <select name="transmission" id="transmission-select" class="nice-select">
                                                        <option value="">Transmission</option>
                                                        <option value="Automatic">
                                                            Automatic
                                                        </option>
                                                        <option value="Manual">Manual</option>
                                                    </select>
                                                    </div>
                                                </div>

                                                <!-- Body Type Selection -->
                                                <div class="form-group-1">
                                                    <label>Body Type</label>
                                                    <div class="group-select tf-select">
                                                    <select name="body_type_id" id="body-type-select" class="nice-select">
                                                        <option value="">Body Type</option>
                                                        @foreach ($bodyTypes as $bodyType)
                                                            <option value="{{ $bodyType->id }}">
                                                                {{ $bodyType->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Submit Button -->
                                            <div class="button-search sc-btn-top">
                                                <button type="submit" class="sc-button sc-button-filter">
                                                    <span>Find cars</span>
                                                    <i class="far fa-search text-color-1"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>



                                   </div>
                               </div>

                           </div>

                       </div>
                   </div>
               </div>
           </div>
       </div>


       @push('scripts')
           <script>
               document.addEventListener('DOMContentLoaded', function() {
                   // Brand Selection Handler
                   document.querySelectorAll('#brand-select .option').forEach(option => {
                       option.addEventListener('click', function() {
                           const brandId = this.dataset.value;
                           document.getElementById('selected_brand').value = brandId;
                       });
                   });

                   // Model Selection Handler
                   document.querySelectorAll('#model-select .option').forEach(option => {
                       option.addEventListener('click', function() {
                           document.getElementById('selected_model').value = this.dataset.value;
                       });
                   });

                   // Transmission Selection Handler
                   document.querySelectorAll('#transmission-select .option').forEach(option => {
                       option.addEventListener('click', function() {
                           document.getElementById('selected_transmission').value = this.dataset.value;
                       });
                   });

                   // Body Type Selection Handler
                   document.querySelectorAll('#body-type-select .option').forEach(option => {
                       option.addEventListener('click', function() {
                           document.getElementById('selected_body_type').value = this.dataset.value;
                       });
                   });

                   // Fetch Models for Selected Brand


               });
           </script>
       @endpush
