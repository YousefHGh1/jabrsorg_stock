@extends('layouts.master')

@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('title', 'تقرير الجرد')
@section('sub_title', 'التقارير')
@section('page_title', 'تقرير الجرد')

@section('content')

    <!-- row opened -->
    <div class="row row-sm">
        <!--div-->
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="pb-0 card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">تقرير الجرد</h4>
                        <div class="card-toolbar">
                            <form action="{{ url('/elgarditem') }}" method="POST" class="pr-5 form-group">
                                @csrf
                                <div class="input-daterange input-group">
                                    <label class="mt-2 ml-2">نوع الصنف:</label>
                                    <div class="p-0 col-md-6">
                                        <input name="status" class="form-control" id="status" />
                                    </div>
                                    <div class="mt-auto mb-auto col-lg-2">
                                        <input type="submit" class="btn btn-primary btn-primary--icon" value="بحث" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped dt-responsive" style="width:100%">
                            <thead>

                                <tr>
                                    <th>رقم الصنف</th>
                                    <th>الصنف</th>
                                    <th>نوع الصنف</th>
                                    <th>رصيد الصنف</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($elgard as $elgards)
                                    <tr>
                                        <td>{{ $elgards->item_num }}</td>
                                        <td>{{ $elgards->item_name }}</td>
                                        <td>
                                            @if ($elgards->status == 1)
                                                {{ 'أصل' }}
                                            @elseif ($elgards->status == 2)
                                                {{ 'استهلاك' }}
                                            @endif
                                        </td>
                                        <td>{{ $elgards->balance }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
@endsection
