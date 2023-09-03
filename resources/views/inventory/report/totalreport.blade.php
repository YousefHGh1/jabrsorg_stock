@extends('layouts.master')

@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!-- Interenal Accordion Css -->
    <link href="{{ URL::asset('assets/plugins/accordion/accordion.css') }}" rel="stylesheet" />
@endsection

@section('title', 'تقرير المجاميع')
@section('sub_title', 'التقارير')
@section('page_title', 'تقرير المجاميع')

@section('content')

    <!-- row opened -->
    <div class="row row-sm">
        <!--div-->
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">تقرير المجاميع</h4>
                    </div>
                </div>

                {{-- بحــــــــث متــقـــــــــــــــدم  --}}
                <div class="row">
                    <div class="col-lg-4 col-md-4 mt-3 mr-2">

                        <div class="card-body">
                            <div class="panel-group1" id="accordion11">
                                <div class="panel panel-default ">
                                    <div class="panel-heading1 bg-primary ">
                                        <h4 class="panel-title1">
                                            <a class="accordion-toggle collapsed" data-toggle="collapse"
                                                data-parent="#accordion11" href="#collapseFour1"
                                                aria-expanded="false">بحــــــــث متــقـــــــــــــــدم</a>
                                        </h4>
                                    </div>
                                    <div id="collapseFour1" class="panel-collapse collapse" role="tabpanel"
                                        aria-expanded="false">
                                        <div class="panel-body border">

                                            <form action="{{ url('/searchbalance') }}" method="POST"
                                                class="pr-5 form-group">
                                                @csrf
                                                <div class="input-daterange input-group">
                                                    <label class="mt-2 ml-2">الرصيد:</label>
                                                    <div class="p-0 col-md-6">
                                                        <input name="balance" type="number" class="form-control"
                                                            id="balance" />
                                                    </div>
                                                    <div class="mt-auto mb-auto col-lg-2">
                                                        <input type="submit" class="btn btn-primary btn-primary--icon"
                                                            value="بحث" />
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
                <div class="card-body">
                    <div class="table-responsive">
                        <!--begin: Datatable-->
                        <table id="example" class="table table-striped dt-responsive" style="width:100%">
                            <thead class="thead_dark">
                                <tr>
                                    <th>{{ 'رقم الصنف' }}</th>
                                    <th>{{ 'اسم الصنف' }}</th>
                                    <th>{{ 'الرصيد الافتتاحي' }}</th>
                                    <th>{{ 'مجموع الوارد' }}</th>
                                    <th>{{ 'مجموع الصادر' }}</th>
                                    <th>{{ 'رصيد الصنف' }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($totalreport as $totalreports)
                                    <tr>
                                        <td>{{ $totalreports->item_num }}</td>
                                        <td>{{ $totalreports->item_name }}</td>
                                        <td>{{ $totalreports->open_balance }}</td>
                                        <td>{{ $totalreports->total_incoming }}</td>
                                        <td>{{ $totalreports->total_outgoing }}</td>
                                        <td>{{ $totalreports->balance }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!--end: Datatable-->
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
    </div>
    <!-- /row -->

@endsection

@section('js')
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
    <!--- Internal Accordion Js -->
    <script src="{{ URL::asset('assets/plugins/accordion/accordion.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/accordion.js') }}"></script>
@endsection
