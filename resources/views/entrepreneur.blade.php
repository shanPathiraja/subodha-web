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
                                Celebrating its 10th year in operations in 2022, Alta Vision Solar provides the best Solar and green energy solutions in Sri Lanka. Main services are residential and industrial Solar PV system installations. We have served over 1000 residential and industrial clients over the last 10 years becoming one of the market leaders.
                                </p>

                                <div>
                                    <span class="mr-2">Visit</span>

                                    <a target="_blank" href="https://altavision.lk/">Website</a> | <a target="_blank" href="https://www.facebook.com/altavision.solar">Facebook</a> | <a target="_blank" href="https://www.linkedin.com/company/alta-vision-solar/">LinkedIn</a> | <a target="_blank" href="https://instagram.com/altavisionsolar">Instagram</a>
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
                <a href="#" class="bg-white p-5 flex flex-1 flex-col items-center text-center shadow-2xl hover:shadow-lg items-center justify-center" data-toggle="modal" data-target="#alp">
                    <div class="w-56 h-56 overflow-hidden flex items-center justify-center">
                        <img src="img/alta-vision-power.png" alt="Alta Vision Power" class="h-full">
                    </div>
                </a>
                <div class="modal fade" id="alp" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="hospitalsLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content p-3">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hospitalsLabel">Alta Vision Power</h5>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <div class="overflow-hidden my-3 w-56 mx-auto">
                                    <img src="img/alta-vision-power.png" alt="" class="w-full">
                                </div>

                                <p class="mb-3 text-gray-600 leading-relaxed">
                                Born as a combination of Leotech Engineering (Pvt) Ltd and Alta Vision (Pvt) Ltd, Alta Vision power offers solutions ranging from construction, power distribution and renewable energy integration.
                                </p>

                                <div>
                                    <span class="mr-2">Visit</span>

                                    <a target="_blank" href="https://altavision.lk/">Website</a>
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
                        <img src="img/southern-hospital.png" alt="Southern Lanka Hospitals" class="h-full">
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

                                    <a target="_blank" href="https://slh.lk/">Website</a> | <a target="_blank" href="https://www.facebook.com/southernlankahospitals">Facebook</a>
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
                <a href="#" class="bg-white p-5 flex flex-1 flex-col items-center text-center shadow-2xl hover:shadow-lg items-center justify-center" data-toggle="modal" data-target="#d470">
                    <div class="w-56 h-56 overflow-hidden flex items-center justify-center">
                        <img src="img/d470-logo.png" alt="Design470" class="h-full">
                    </div>
                </a>
                <div class="modal fade" id="d470" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="hospitalsLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content p-3">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hospitalsLabel">Design470</h5>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <div class="overflow-hidden my-3 w-56 mx-auto">
                                    <img src="img/d470-logo.png" alt="" class="w-full">
                                </div>

                                <p class="mb-3 text-gray-600 leading-relaxed">
                                We cater to your design needs, not as another job, but as our own expression of your thoughts. Design470 provides digital graphics, branding & marketing collateral, social media management and web design & development services.
                                </p>

                                <div>
                                    <span class="mr-2">Visit</span>

                                    <a target="_blank" href="https://design470.com/">Website</a>
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
                <a href="#" class="bg-white p-5 flex flex-1 flex-col items-center text-center shadow-2xl hover:shadow-lg items-center justify-center" data-toggle="modal" data-target="#sgy">
                    <div class="w-56 h-56 overflow-hidden flex items-center justify-center">
                        <img src="img/sgx-logo.png" alt="Syntax Genie" class="h-full">
                    </div>
                </a>
                <div class="modal fade" id="sgy" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="hospitalsLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content p-3">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hospitalsLabel">Syntax Genie</h5>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <div class="overflow-hidden my-3 w-56 mx-auto">
                                    <img src="img/sgx-logo.png" alt="" class="w-full">
                                </div>

                                <p class="mb-3 text-gray-600 leading-relaxed">
                                The newest addition to the Pearl Cluster; Syntax Genie (Pvt) Ltd., provides the best quality software and digital solutions transforming ideas, businesses and communities into fast-growing giants in their relevant industries.
                                </p>

                                <div>
                                    <span class="mr-2">Visit</span>

                                    <a target="_blank" href="https://syntaxgenie.com/">Website</a> | <a target="_blank" href="https://www.facebook.com/SyntaxGenie">Facebook</a> | <a target="_blank" href="https://www.linkedin.com/company/syntaxgenie">LinkedIn</a> | <a target="_blank" href="https://www.instagram.com/syntaxgenie/">Instagram</a>
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