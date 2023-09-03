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

@section('title', 'عرض سندات الصرف')
@section('sub_title', 'سندات الصرف')
@section('page_title', 'صفحة العرض')

@section('content')

    <!-- row opened -->
    <div class="row row-sm">
        <!--div-->
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="pb-0 card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">عرض سندات الصرف</h4>
                        <div class="card-toolbar">
                            <button class="btn btn-light">
                                <i class="mdi mdi-plus" style="color: black;"></i>
                                <a href="{{ url('inventory/invoice_export/create') }}"
                                    style="font: bolder; color:rgb(0, 0, 0);">
                                    إنشاء سند صرف جديد </a>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!--begin: Datatable-->
                        <table id="example">
                            <thead class="thead_dark">
                                <tr>
                                    <th>#</th>
                                    <th style="width: 10%">رقم السند</th>
                                    <th style="width: 12%">تاريخ السند</th>
                                    <th style="width: 13%">اسم الموظف</th>
                                    <th style="width: 10%">اسم المخزن</th>
                                    <th style="width: 45%">الأصناف</th>
                                    <th style="width: 10%">الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>

                                @foreach ($invoice_exports as $invoice_export)
                                    <?php $i++; ?>

                                    <tr>
                                        <td> {{ $i }}</td>
                                        <td>{{ $invoice_export->voucher_no }}</td>
                                        <td>{{ $invoice_export->voucher_date }}</td>
                                        <td>{{ $invoice_export->employee_name }}</td>
                                        <td>{{ $invoice_export->store_name }}</td>
                                        <td>{!! $invoice_export->products !!}</td>
{{--  --}}
                                        <td data-field="Actions" data-autohide-disabled="false" aria-label="null"
                                            class="datatable-cell d-flex">
                                            <form method="POST"
                                                action="{{ url('/inventory/invoice_export' . '/' . $invoice_export->id) }}"
                                                accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }} {{ csrf_field() }}
                                                <button type="submit" class="btn btn-sm btn-danger btn-icon "
                                                    title="Delete invoice_export"
                                                    onclick="return confirm('هل تريد تأكيد عملية الحذف؟؟؟')"><i
                                                        class="la la-trash"></i></button>
                                            </form>

                                            <a href="{{ url('/inventory/invoice_export/' . $invoice_export->id . '/edit') }}"
                                                class="ml-2 mr-2 btn btn-sm btn-success btn-icon" title="Edit details"><i
                                                    class="la la-edit"></i></a>

                                            <a href="{{ url('/inventory/exportshow/' . $invoice_export->id) }}"
                                                title="View invoice_export"><button class="btn btn-sm btn-info btn-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                        <path
                                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                    </svg></button>
                                            </a>

                                        </td>
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
@endsection
