 @extends('admin.app')

 @section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- Total Revenue -->
            <div class="col-12 order-3 order-md-2">
                <div class="row">

                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="{{ asset('admin/assets/img/icons/unicons/chart-success.png')}}" alt="chart success" class="rounded" />
                                    </div>
                                </div>
                                <span class="d-block mb-1">Payments</span>
                                <h3 class="card-title text-nowrap mb-2">$2,456</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="{{ asset('admin/assets/img/icons/unicons/chart-success.png')}}" alt="chart success" class="rounded" />
                                    </div>
                                </div>
                                <span class="d-block mb-1">Payments</span>
                                <h3 class="card-title text-nowrap mb-2">$2,456</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="{{ asset('admin/assets/img/icons/unicons/chart-success.png')}}" alt="chart success" class="rounded" />
                                    </div>
                                </div>
                                <span class="d-block mb-1">Usulan</span>
                                <h3 class="card-title text-nowrap mb-2">0</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="{{ asset('admin/assets/img/icons/unicons/chart-success.png')}}" alt="chart success" class="rounded" />
                                    </div>
                                </div>
                                <span class="d-block mb-1">Kajian</span>
                                <h3 class="card-title text-nowrap mb-2">0</h3>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
 @endsection
