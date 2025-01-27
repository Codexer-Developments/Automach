<div class="flat-filter-search mt--3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="flat-tabs ">
                    <div class="content-tab style2">
                        <div class="content-inner tab-content">
                            <div class="form-sl">
                                <form method="GET" action="{{ route('shop') }}">
                                    <div class="wd-find-select flex">
                                        <div class="inner-group">
                                            <!-- Brand Selection -->
                                            <div class="form-group-1">
                                                <input type="hidden" name="brand_id" id="selected_brand"
                                                    value="{{ $selectedBrand ?? '' }}">
                                                <div class="group-select" id="brand-select">
                                                    <div class="nice-select" tabindex="0">
                                                        <span class="current">
                                                            {{ $selectedBrand ? $brands->find($selectedBrand)->name : 'Make' }}
                                                        </span>
                                                        <ul class="list">
                                                            <li data-value=""
                                                                class="option {{ !$selectedBrand ? 'selected' : '' }}">
                                                                Brand</li>
                                                            @foreach ($brands as $brand)
                                                                <li data-value="{{ $brand->id }}"
                                                                    class="option {{ $selectedBrand == $brand->id ? 'selected' : '' }}">
                                                                    {{ $brand->name }}
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Model Selection -->
                                            <div class="form-group-1">
                                                <input type="hidden" name="car_model_id" id="selected_model"
                                                    value="{{ $selectedModel ?? '' }}">

                                                <div class="group-select" id="model-select">
                                                    <div class="nice-select" tabindex="0">
                                                        <span class="current">
                                                            {{ $selectedModel ? $models->find($selectedModel)->name : 'Make' }}
                                                        </span>
                                                        <ul class="list">
                                                            <li data-value=""
                                                                class="option {{ !$selectedModel ? 'selected' : '' }}">
                                                                Model</li>
                                                            @foreach ($models as $model)
                                                                <li data-value="{{ $model->id }}"
                                                                    class="option {{ $selectedModel == $model->id ? 'selected' : '' }}">
                                                                    {{ $model->name }}
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Transmission Selection -->
                                            <div class="form-group-1">
                                                <input type="hidden" name="transmission" id="selected_transmission"
                                                    value="{{ $selectedTransmission ?? '' }}">
                                                <div class="group-select" id="transmission-select">
                                                    <div class="nice-select" tabindex="0">
                                                        <span class="current">
                                                            {{ $selectedTransmission ?? 'Transmission' }}
                                                        </span>
                                                        <ul class="list">
                                                            <li data-value=""
                                                                class="option {{ !$selectedTransmission ? 'selected' : '' }}">
                                                                Transmission</li>
                                                            <li data-value="Automatic"
                                                                class="option {{ $selectedTransmission == 'Automatic' ? 'selected' : '' }}">
                                                                Automatic</li>
                                                            <li data-value="Manual"
                                                                class="option {{ $selectedTransmission == 'Manual' ? 'selected' : '' }}">
                                                                Manual</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Body Type Selection -->
                                            <div class="form-group-1">
                                                <input type="hidden" name="body_type_id" id="selected_body_type"
                                                    value="{{ $selectedBodyType ?? '' }}">
                                                <div class="group-select" id="body-type-select">
                                                    <div class="nice-select" tabindex="0">
                                                        <span class="current">
                                                            {{ $selectedBodyType ? $bodyTypes->find($selectedBodyType)->name : 'Body' }}
                                                        </span>
                                                        <ul class="list">
                                                            <li data-value=""
                                                                class="option {{ !$selectedBodyType ? 'selected' : '' }}">
                                                                Body</li>
                                                            @foreach ($bodyTypes as $bodyType)
                                                                <li data-value="{{ $bodyType->id }}"
                                                                    class="option {{ $selectedBodyType == $bodyType->id ? 'selected' : '' }}">
                                                                    {{ $bodyType->name }}
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
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
                                {{-- <form method="post">
                                    <div class="wd-find-select flex">
                                        <div class="inner-group">
                                            <div class="form-group-1">

                                                <div class="group-select">
                                                    <div class="nice-select" tabindex="0"><span
                                                            class="current">Make</span>
                                                        <ul class="list">
                                                            <li data-value class="option selected">Brand
                                                            </li>
                                                            <li data-value="Audi" class="option">Audi</li>
                                                            <li data-value="BMW" class="option">BMW</li>
                                                            <li data-value="Dongfeng" class="option">
                                                                Dongfeng
                                                            </li>
                                                            <li data-value="Ford" class="option">Ford</li>
                                                            <li data-value="Foton" class="option">Foton
                                                            </li>
                                                            <li data-value="Isuzu" class="option">Isuzu</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-1">

                                                <div class="group-select">
                                                    <div class="nice-select" tabindex="0"><span
                                                            class="current">Model</span>
                                                        <ul class="list">
                                                            <li data-value class="option selected">Model
                                                            </li>
                                                            <li data-value="A4" class="option">A4</li>
                                                            <li data-value="Almera" class="option">Almera
                                                            </li>
                                                            <li data-value="Bellett" class="option">Bellett
                                                            </li>
                                                            <li data-value="C-Class" class="option"> C-Class
                                                            </li>
                                                            <li data-value="Camry" class="option">Camry</li>
                                                            <li data-value="Carnival" class="option">
                                                                Carnival</li>
                                                            <li data-value="Territory" class="option">
                                                                Territory</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-1">

                                                <div class="group-select">
                                                    <div class="nice-select" tabindex="0"><span
                                                            class="current">Door</span>
                                                        <ul class="list">
                                                            <li data-value class="option selected">Door</li>
                                                            <li data-value="2" class="option">2</li>
                                                            <li data-value="4" class="option">4</li>
                                                            <li data-value="6" class="option ">6</li>
                                                            <li data-value="8" class="option">8</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-1">

                                                <div class="group-select">
                                                    <div class="nice-select" tabindex="0"><span
                                                            class="current">Body</span>
                                                        <ul class="list">
                                                            <li data-value class="option selected">Body
                                                            </li>
                                                            <li data-value="Convertible" class="option">
                                                                Convertible</li>
                                                            <li data-value="Coupe" class="option">Coupe</li>
                                                            <li data-value="Crossover" class="option ">
                                                                Crossover</li>
                                                            <li data-value="Hatchback" class="option">
                                                                Hatchback</li>
                                                            <li data-value="Crossover" class="option ">
                                                                Minivan</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-2 form-style">

                                        </div>
                                        <div class="button-search sc-btn-top">
                                            <a class="sc-button" href="#">
                                                <span>Find cars</span>
                                                <i class="far fa-search text-color-1"></i>
                                            </a>
                                        </div>
                                    </div>

                                </form> --}}
                                <!-- End Job  Search Form-->
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
