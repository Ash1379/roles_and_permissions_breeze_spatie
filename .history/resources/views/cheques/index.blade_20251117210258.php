@extends('my_layouts.master')
@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-xxl">

                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                    <div class="flex-grow-1">
                        <h4 class="fs-18 fw-semibold m-0">Dashboard</h4>
                    </div>
                </div>



                <!-- Start Monthly Sales -->
              
                <!-- End Monthly Sales -->

                <div class="row">
                    <div class="col-md-6 col-xl-6">
                        <div class="card">

                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <div class="border border-dark rounded-2 me-2 widget-icons-sections">
                                        <i data-feather="minus-square" class="widgets-icons"></i>
                                    </div>
                                    <h5 class="card-title mb-0">Audiences By Time Of Day</h5>
                                </div>
                            </div>

                            <div class="card-body">
                                <div id="audiences-daily" class="apex-charts mt-n3"></div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-6 col-xl-6">
                        <div class="card overflow-hidden">

                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <div class="border border-dark rounded-2 me-2 widget-icons-sections">
                                        <i data-feather="table" class="widgets-icons"></i>
                                    </div>
                                    <h5 class="card-title mb-0">Most Visited Pages</h5>
                                </div>
                            </div>

                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-traffic mb-0">
                                        <tbody>

                                            <thead>
                                                <tr>
                                                    <th>Page name</th>
                                                    <th>Visitors</th>
                                                    <th>Unique</th>
                                                    <th colspan="2">Bounce rate</th>
                                                </tr>
                                            </thead>

                                            <tr>
                                                <td>
                                                    /home
                                                    <a href="#" class="ms-1" aria-label="Open website">
                                                        <i data-feather="link" class="ms-1 text-primary"
                                                            style="height: 15px; width: 15px;"></i>
                                                    </a>
                                                </td>
                                                <td>5,896</td>
                                                <td>3,654</td>
                                                <td>82.54%</td>
                                                <td class="w-25">
                                                    <div id="sparkline-bounce-1" class="apex-charts"></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    /about.html
                                                    <a href="#" class="ms-1" aria-label="Open website">
                                                        <i data-feather="link" class="ms-1 text-primary"
                                                            style="height: 15px; width: 15px;"></i>
                                                    </a>
                                                </td>
                                                <td>3,898</td>
                                                <td>3,450</td>
                                                <td>76.29%</td>
                                                <td class="w-25">
                                                    <div id="sparkline-bounce-2" class="apex-charts"></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    /index.html
                                                    <a href="#" class="ms-1" aria-label="Open website">
                                                        <i data-feather="link" class="ms-1 text-primary"
                                                            style="height: 15px; width: 15px;"></i>
                                                    </a>
                                                </td>
                                                <td>3,057</td>
                                                <td>2,589</td>
                                                <td>72.68%</td>
                                                <td class="w-25">
                                                    <div id="sparkline-bounce-3" class="apex-charts"></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    /invoice.html
                                                    <a href="#" class="ms-1" aria-label="Open website">
                                                        <i data-feather="link" class="ms-1 text-primary"
                                                            style="height: 15px; width: 15px;"></i>
                                                    </a>
                                                </td>
                                                <td>867</td>
                                                <td>795</td>
                                                <td>44.78%</td>
                                                <td class="w-25">
                                                    <div id="sparkline-bounce-4" class="apex-charts"></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    /docs/
                                                    <a href="#" class="ms-1" aria-label="Open website">
                                                        <i data-feather="link" class="ms-1 text-primary"
                                                            style="height: 15px; width: 15px;"></i>
                                                    </a>
                                                </td>
                                                <td>958</td>
                                                <td>801</td>
                                                <td>41.15%</td>
                                                <td class="w-25">
                                                    <div id="sparkline-bounce-5" class="apex-charts"></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    /service.html
                                                    <a href="#" class="ms-1" aria-label="Open website">
                                                        <i data-feather="link" class="ms-1 text-primary"
                                                            style="height: 15px; width: 15px;"></i>
                                                    </a>
                                                </td>
                                                <td>658</td>
                                                <td>589</td>
                                                <td>32.65%</td>
                                                <td class="w-25">
                                                    <div id="sparkline-bounce-6" class="apex-charts"></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    /analytical.html
                                                    <a href="#" class="ms-1" aria-label="Open website">
                                                        <i data-feather="link" class="ms-1 text-primary"
                                                            style="height: 15px; width: 15px;"></i>
                                                    </a>
                                                </td>
                                                <td>457</td>
                                                <td>859</td>
                                                <td>32.65%</td>
                                                <td class="w-25">
                                                    <div id="sparkline-bounce-7" class="apex-charts"></div>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div> <!-- container-fluid -->
        </div> <!-- content -->

    </div>
@endsection

