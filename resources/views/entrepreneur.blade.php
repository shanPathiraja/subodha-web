@extends('layouts.web.base')

@section('content')
<section class="bg-white py-16">
    <div class="container">
        <div class="row items-center">
            <div class="col-lg-7 col-md-6 mb-6 md:mb-0">
                <h2 class="text-gray-800 font-bold text-3xl">Entrepreneur</h2>

                <h6 class="font-medium max-w-lg">Outcomes of the daily hustle of planning and execution, and mainly, getting s**t done</h6>
            </div>
        </div>

        <div class="h-px border-t border-gray-300 w-full my-12"></div>

        <div class="row">
            <div class="col-md-6 col-lg-3 flex flex-col flex-1 mb-4">
                <a href="#" class="bg-white p-5 flex flex-1 flex-col items-center text-center shadow-2xl hover:shadow-lg items-center justify-center" data-toggle="modal" data-target="#alt">
                    <div class="w-56 h-56 overflow-hidden flex items-center justify-center">
                        <img src="img/alta-vision.png" alt="Alta Vision Solar" class="w-full">
                    </div>
                </a>
                <div class="modal fade" id="alt" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="altLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content p-3">
                            <div class="modal-header">
                                <h5 class="modal-title" id="altLabel">Alta Vision Solar</h5>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <div class="overflow-hidden my-3 w-56 h-56 mx-auto">
                                    <img src="img/alta-vision.png" alt="" class="w-full">
                                </div>

                                <p class="mb-3 text-gray-600 leading-relaxed">
                                    Celebrating its 8th year in operations in 2020, Alta Vision Solar provides the best Solar and green energy solutions in Sri Lanka. Main services are residential and industrial Solar PV system installations. We have served over 500 residential and industrial clients over the last 8 years becoming one of the market leaders.
                                </p>

                                <div>
                                    <span class="mr-2">Visit</span>

                                    <a target="_blank" href="https://altavision.lk/">Website</a> | <a target="_blank" href="https://www.facebook.com/altavision.solar">Facebook</a>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="font-mono font-light text-sm text-white px-4 py-3 leading-none rounded-full bg-gray-900 hover:bg-blue-800" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 flex flex-col flex-1 mb-4">
                <a href="#" class="bg-white p-5 flex flex-1 flex-col items-center text-center shadow-2xl hover:shadow-lg items-center justify-center" data-toggle="modal" data-target="#hospitals">
                    <div class="w-56 h-56 overflow-hidden flex items-center justify-center">
                        <img src="img/southern-hospital.png" alt="Alta Vision Solar" class="h-full">
                    </div>
                </a>
                <div class="modal fade" id="hospitals" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="hospitalsLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content p-3">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hospitalsLabel">Southern Lanka Hospitals</h5>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <div class="overflow-hidden my-3 w-56 mx-auto">
                                    <img src="img/southern-hospital.png" alt="" class="w-full">
                                </div>

                                <p class="mb-3 text-gray-600 leading-relaxed">
                                    Southern Lanka Hospitals, inaugurated on January 2019, is a healthcare center in Tangalle, Sri Lanka which aims to provide a healthcare experience that is beyond just a service. The hospital has channeling, OPD/ETU, laboratory facilities, residential care, and surgery facilities.
                                </p>

                                <div>
                                    <span class="mr-2">Visit</span>

                                    <a target="_blank" href="https://www.facebook.com/southernlankahospitals">Facebook</a>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="font-mono font-light text-sm text-white px-4 py-3 leading-none rounded-full bg-gray-900 hover:bg-blue-800" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection