@extends('layouts.master')

@section('title')
    المخازن
@stop
@section('sub_title')
    الرئيسية
@endsection
@section('page_title')
    المخازن
@endsection

@section('css')
    <!--  Owl-carousel css-->
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
    <!-- Maps css -->
    <link href="{{ URL::asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">
@endsection


@section('content')

    <!-- row counters -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="card bg-primary-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div class="counter-icon">
                            <i class="icon icon-people"></i>
                        </div>
                        <div class="mr-auto">
                            <h5 class="mb-3 tx-13 tx-white-8">وحدات الأصناف</h5>
                            <h2 class="mb-0 text-white counter">{{App\Models\Unit::count();}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card bg-danger-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div class="counter-icon text-warning">
                            <i class="icon icon-rocket"></i>
                        </div>
                        <div class="mr-auto">
                            <h5 class="mb-3 tx-13 tx-white-8">عائلات الأصناف</h5>
                            <h2 class="mb-0 text-white counter">{{App\Models\Category::count();}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card bg-success-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div class="counter-icon text-primary">
                            <i class="icon icon-docs"></i>
                        </div>
                        <div class="mr-auto">
                            <h5 class="mb-3 tx-13 tx-white-8"> الأصناف</h5>
                            <h2 class="mb-0 text-white counter">{{App\Models\Item::count();}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card bg-warning-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div class="counter-icon text-success">
                            <i class="icon icon-emotsmile"></i>
                        </div>
                        <div class="mr-auto">
                            <h5 class="mb-3 tx-13 tx-white-8">المخازن</h5>
                            <h2 class="mb-0 text-white counter">{{App\Models\Store::count();}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed counters -->
    <!-- row counters -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="card bg-primary-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div class="counter-icon">
                            <i class="icon icon-people"></i>
                        </div>
                        <div class="mr-auto">
                            <h5 class="mb-3 tx-13 tx-white-8">الموردين</h5>
                            <h2 class="mb-0 text-white counter">{{App\Models\Supplier::count();}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card bg-danger-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div class="counter-icon text-warning">
                            <i class="icon icon-rocket"></i>
                        </div>
                        <div class="mr-auto">
                            <h5 class="mb-3 tx-13 tx-white-8">الأصناف الواردة</h5>
                            <h2 class="mb-0 text-white counter">{{App\Models\Invoice::count();}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card bg-success-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div class="counter-icon text-primary">
                            <i class="icon icon-docs"></i>
                        </div>
                        <div class="mr-auto">
                            <h5 class="mb-3 tx-13 tx-white-8">الأصناف الصادرة</h5>
                            <h2 class="mb-0 text-white counter">{{App\Models\InvoiceExport::count();}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card bg-warning-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div class="counter-icon text-success">
                            <i class="icon icon-emotsmile"></i>
                        </div>
                        <div class="mr-auto">
                            <h5 class="mb-3 tx-13 tx-white-8">العهد</h5>
                            <h2 class="mb-0 text-white counter">{{App\Models\Custody::count();}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed counters -->
    <!-- row counters -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="card bg-primary-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div class="counter-icon">
                            <i class="icon icon-people"></i>
                        </div>
                        <div class="mr-auto">
                            <h5 class="mb-3 tx-13 tx-white-8">الدوائر</h5>
                            <h2 class="mb-0 text-white counter">{{App\Models\Department::count();}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card bg-danger-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div class="counter-icon text-warning">
                            <i class="icon icon-rocket"></i>
                        </div>
                        <div class="mr-auto">
                            <h5 class="mb-3 tx-13 tx-white-8">الأقسام</h5>
                            <h2 class="mb-0 text-white counter">{{App\Models\SubDepartment::count();}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card bg-success-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div class="counter-icon text-primary">
                            <i class="icon icon-docs"></i>
                        </div>
                        <div class="mr-auto">
                            <h5 class="mb-3 tx-13 tx-white-8">المستخدمين</h5>
                            <h2 class="mb-0 text-white counter">{{App\Models\User::count();}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card bg-warning-gradient">
                <div class="card-body">
                    <div class="counter-status d-flex md-mb-0">
                        <div class="counter-icon text-success">
                            <i class="icon icon-emotsmile"></i>
                        </div>
                        <div class="mr-auto">
                            <h5 class="mb-3 tx-13 tx-white-8">الموظفين</h5>
                            <h2 class="mb-0 text-white counter">{{App\Models\Employee::count();}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed counters -->
@endsection

@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- Moment js -->
    <script src="{{ URL::asset('assets/plugins/raphael/raphael.min.js') }}"></script>
    <!--Internal  Flot js-->
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ URL::asset('assets/js/dashboard.sampledata.js') }}"></script>
    <script src="{{ URL::asset('assets/js/chart.flot.sampledata.js') }}"></script>
    <!--Internal Apexchart js-->
    <script src="{{ URL::asset('assets/js/apexcharts.js') }}"></script>
    <!-- Internal Map -->
    <script src="{{ URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ URL::asset('assets/js/modal-popup.js') }}"></script>
    <!--Internal  index js -->
    <script src="{{ URL::asset('assets/js/index.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.vmap.sampledata.js') }}"></script>
    <!--Internal Counters -->
    <script src="{{ URL::asset('assets/plugins/counters/waypoints.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/counters/counterup.min.js') }}"></script>
    <!--Internal Time Counter -->
    <script src="{{ URL::asset('assets/plugins/counters/jquery.missofis-countdown.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/counters/counter.js') }}"></script>

@endsection
