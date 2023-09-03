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

@section('title', ' جدول الأصناف ')
@section('sub_title', ' الأصناف ')
@section('page_title', ' عرض الأصناف ')

@section('content')

    <!-- row opened -->
    <div class="row row-sm">
        <!--div-->
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="pb-0 card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">عرض الأصناف</h4>
                        <div class="card-toolbar">
                            <button class="btn btn-light">
                                <i class="mdi mdi-plus" style="color: black;"></i>
                                <a href="{{ url('inventory/item/create') }}" style="font: bolder; color:rgb(0, 0, 0);">
                                    إضافة الأصناف </a>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example">
                            <thead>
                                <tr>
                                    <th width="4%">{{ '#' }}</th>
                                    <th>{{ 'رقم الصنف' }} </th>
                                    <th>{{ 'اسم الصنف' }}</th>
                                    <th>{{ 'اسم العائلة' }}</th>
                                    <th>{{ 'اسم الوحدة' }} </th>
                                    <th>{{ 'الرصيد الإفتتاحي' }}</th>
                                    <th>{{ 'رصيد الصنف' }}</th>
                                    <th>{{ 'الحد الأدني' }}</th>
                                    <th>{{ 'نوع الصنف' }}</th>
                                    <th>{{ 'الاجراءات ' }} </th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($item as $items)
                                    <?php $i++; ?>
                                    <tr>
                                        <td> {{ $i }}</td>
                                        <td>{{ $items->item_num }}</td>
                                        <td>{{ $items->item_name }}</td>
                                        <td>{{ $items->category->category_name }}</td>
                                        <td>{{ $items->unit->unit_name }}</td>
                                        <td>{{ $items->open_balance }}</td>
                                        <td>{{ $items->balance }}</td>
                                        <td>{{ $items->low_limit }}</td>
                                        <td>
                                            @if ($items->status == 1)
                                                {{ 'أصل' }}
                                            @elseif ($items->status == 2)
                                                {{ 'إستهلاك' }}
                                            @endif
                                        </td>
                                        {{-- <td>{{ $items->status }}</td> --}}

                                        <td data-field="Actions" data-autohide-disabled="false" aria-label="null"
                                            class="datatable-cell d-flex">


                                            {{-- <form method="POST" action="{{ url('/inventory/item' . '/' . $items->id) }}"
                                                accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }} {{ csrf_field() }}
                                                <button type="submit" class="btn btn-sm btn-danger btn-icon "
                                                    title="Delete items"
                                                    onclick="return confirm('هل تريد تأكيد عملية الحذف؟؟؟')"><i
                                                        class="la la-trash"></i></button>
                                            </form> --}}


                                            <a class="modal-effect btn btn-sm btn-danger btn-icon"
                                                data-effect="effect-scale" data-item_id="{{ $items->id }}"
                                                data-item_name="{{ $items->item_name }}" data-toggle="modal"
                                                href="#modaldemo8" title="حذف"><i class="la la-trash"></i></a>


                                            <a href="{{ url('/inventory/item/' . $items->id . '/edit') }}"
                                                class="ml-2 mr-2 btn btn-sm btn-success btn-icon" title="Edit details"><i
                                                    class="la la-edit"></i></a>

                                            <a href="{{ url('/inventory/item/' . $items->id) }}" title="View store"><button
                                                    class="btn btn-sm btn-info btn-icon"> <svg
                                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
        <!-- Modal effects -->
        <div class="modal" id="modaldemo8">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">حذف الصنف</h6><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ route('item.destroy', 'test') }}" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}ًًًًًًًًًًًًً
                        <div class="modal-body">
                            <p>هل انت متاكد من عملية الحذف ؟</p><br>
                            <input type="hidden" name="item_id" id="item_id" value="">
                            <input class="form-control" name="item_name" id="item_name" type="text" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                            <button type="submit" class="btn btn-danger">تاكيد</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
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

    <!-- Internal Modal js-->
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>

    <script>
        $('#modaldemo8').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var item_id = button.data('item_id')
            var item_name = button.data('item_name')
            var modal = $(this)
            modal.find('.modal-body #item_id').val(item_id);
            modal.find('.modal-body #item_name').val(item_name);
        })
    </script>
@endsection
