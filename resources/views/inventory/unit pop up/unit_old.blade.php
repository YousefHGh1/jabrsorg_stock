@extends('layouts.master')

@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!---Internal Owl Carousel css-->
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <!---Internal  Multislider css-->
    <link href="{{ URL::asset('assets/plugins/multislider/multislider.css') }}" rel="stylesheet">
    <!--- Select2 css -->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('title')
    اضافة وحدة
@stop

@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الوحدات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    اضافة وحدة</span>
            </div>
        </div>
    </div>
@endsection

@section('content')

    {{-- Alert --}}

    <!-- row -->
    <div class="row">

        {{-- show --}}
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
                            data-toggle="modal" href="#exampleModal">اضافة الوحدات</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'>
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">{{ '#' }}</th>
                                    <th class="border-bottom-0">{{ 'رقم الوحدة' }}</th>
                                    <th class="border-bottom-0">{{ 'اسم الوحدة' }}</th>
                                    <th class="border-bottom-0">{{ 'الاجراءات ' }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($unit as $units)
                                    <?php $i++; ?>
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $units->unit_num }}</td>
                                        <td>{{ $units->unit_name }}</td>
                                        <td>
                                            <button class="btn btn-outline-success btn-sm" data-id="{{ $units->id }}"
                                                data-num="{{ $units->unit_num }}" data-name="{{ $units->unit_name }}"
                                                data-toggle="modal" data-target="#edit_Product">تعديل</button>

                                            {{-- <button class="btn btn-outline-danger btn-sm " data-id="{{ $units->id }}"
                                                data-num="{{ $units->unit_num }}" data-toggle="modal"
                                                data-target="#modaldemo9">حذف</button> --}}

                                            <form method="POST" action="{{ url('/inventory/unit' . '/' . $units->id) }}"
                                                accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }} {{ csrf_field() }}
                                                <button type="submit" class="btn btn-outline-danger btn-sm" title="Delete unit"
                                                    onclick="return confirm('هل تريد تأكيد عملية الحذف؟؟؟')">حذف</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- add -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">اضافة وحدات</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('units.store') }}" onsubmit="return validation()" name="myForm"
                        method="post" enctype="multipart/form-data" autocomplete="off">
                        {{ csrf_field() }} @csrf

                        {{-- 1 --}}
                        <div class="row g-3 align-items-center p-2 m-1">
                            <div class="col-auto">
                                <label for="unit_num" class="col-form-label">رقم الوحدة <span
                                        class="tx-danger mr-1">*</span></label>
                            </div>
                            <div class="col-md-10">
                                <input type="number" autofocus name="unit_num" id="unit_num" class="form-control"
                                    {{-- value="{{old('unit_num',$next_num)}}" disabled --}}>
                            </div>
                        </div>

                        {{-- 2 --}}
                        <div class="row g-10 align-items-center p-2 m-1">
                            <div class="col-auto">
                                <label for="unit_name" class="col-form-label">اسم الوحدة <span
                                        class="tx-danger mr-1">*</span></label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="unit_name" id="unit_name" class="form-control"
                                    placeholder="ادخل اسم الوحدة">
                            </div>
                        </div>

                        <div class="d-flex justify-content-center m-3">
                            <button type="submit" value="Submit" class="btn btn-primary">حفظ البيانات</button>
                            <button type="reset" class="btn btn-danger mr-2">إلغاء</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <!-- edit -->
        <div class="modal fade" id="edit_Product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">تعديل الوحدة</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('units.update', $units->id) }}" method="post" class="needs-validation"
                        novalidate enctype="multipart/form-data">
                        @csrf {{ csrf_field() }}
                        {{ method_field('patch') }}
                        @method('PUT')

                        {{-- 1 --}}
                        <div class="row g-3 align-items-center p-2 m-1">
                            <div class="col-auto">
                                <label for="unit_num" class="col-form-label">رقم الوحدة</label>
                                <input type="hidden" name="id" id="id" value="">
                            </div>
                            <div class="col-md-10">
                                <input type="number" name="unit_num" id="unit_num" class="form-control" autofocus>
                            </div>
                        </div>

                        {{-- 2 --}}
                        <div class="row g-10 align-items-center p-2 m-1">
                            <div class="col-auto">
                                <label for="unit_name" class="col-form-label">اسم الوحدة</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="unit_name" id="unit_name" class="form-control">
                            </div>
                        </div>

                        {{-- action --}}
                        <div class="d-flex justify-content-center m-3">
                            <button type="submit" class="btn btn-success">تعديل</button>
                            <a type="submit" href="{{ route('units.index') }}" class="mr-2 btn btn-danger">العودة</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->

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
    <!-- Internal Prism js-->
    <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Modal js-->
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>


    <script>
        $('#edit_Product').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var unit_num = button.data('unit_num')
            var unit_name = button.data('unit_name')
            var pro_id = button.data('pro_id')
            var modal = $(this)
            modal.find('.modal-body #unit_num').val(unit_num);
            modal.find('.modal-body #unit_name').val(unit_name);
            modal.find('.modal-body #pro_id').val(pro_id);
        })


        // $('#modaldemo9').on('show.bs.modal', function(event) {
        //     var button = $(event.relatedTarget)
        //     var pro_id = button.data('pro_id')
        //     var unit_num = button.data('unit_num')
        //     var modal = $(this)

        //     modal.find('.modal-body #pro_id').val(pro_id);
        //     modal.find('.modal-body #unit_num').val(unit_num);
        // })
    </script>
@endsection
