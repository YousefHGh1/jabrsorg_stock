@extends('layouts.master')

@section('css')
    <style>
        input {
            border: 1px solid #d5c1ff !important;
        }
    </style>
@endsection

@section('title', ' اضافة العهد ')
@section('sub_title', 'العهد')
@section('page_title', 'اضافة عهد')

@section('content')

    <!-- \ row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                {{-- card-header --}}
                <div class="card-header d-flex" style="justify-content: space-between;">
                    <div class="card-title">
                        <h3 class="card-label"> بيانات العهد</h3>
                    </div>
                    <div class="card-toolbar">
                        <button class="btn btn-light">
                            <i class="ml-1 far fa-eye" style="color: black;"></i>
                            <a href="{{ url('inventory/custody') }}" style="font: bolder; color:rgb(0, 0, 0);">
                                عرض العهد </a>
                        </button>
                    </div>
                </div>


                <div class="card-body">
                    <form action="{{ route('custody.store') }}" method="post" class="form needs-validation " novalidate
                        enctype="multipart/form-data">
                        @csrf
                        {!! csrf_field() !!}
                        <div class="card-body">
                            {{-- 1 --}}
                            <div class="p-3 form-group row">
                                <label for="department_id" class="col-lg-2 col-form-label ">
                                    <h6><strong>الدائرة<span class="mr-1 tx-danger">*</span></strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <select onclick="console.log($(this).val())"
                                            onchange="console.log('change is firing')"
                                            class="@error('department_id') is-invalid @enderror form-control selectpicker "
                                            data-size="7" tabindex="null" data-live-search="true" title="أدخل اسم الدائرة"
                                            name="department_id" id="department_id">
                                            <option value="">اختر اسم الدائرة</option>

                                            @foreach ($department as $departments)
                                                <option value="{{ $departments->id }}">
                                                    {{ $departments->department_name }}
                                                </option>
                                            @endforeach
                                            {{-- هاي عشان تعمل تحقق لما تختار عائلة  ولازم تعطي القيمه تعت الاوبشن فاضية --}}
                                            @if ($errors->has('department_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('department_id') }}</strong>
                                                </span>
                                            @endif
                                        </select>

                                    </div>
                                </div>

                                <label for="sub_department_id " class="col-lg-2 col-form-label ">
                                    <h6><strong>القسم <span class="mr-1 tx-danger">*</span></strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <select data-size="7" tabindex="null"
                                            class="@error('sub_department_id') is-invalid @enderror form-control "
                                            data-live-search="true" title="أدخل اسم القسم" name="sub_department_id"
                                            id="sub_department_id">
                                            {{-- <option value="">اختر اسم القسم</option> --}}
                                            {{-- @foreach ($sub_department as $sub_departments)
                                                <option value="{{ $sub_departments->id }}">
                                                    {{ $sub_departments->sub_department_name }}
                                                </option>
                                            @endforeach --}}
                                            @if ($errors->has('sub_department_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('sub_department_id') }}</strong>
                                                </span>
                                            @endif
                                        </select>

                                    </div>
                                </div>
                            </div>

                            {{-- 2 --}}
                            <div class="p-3 form-group row">
                                <label for="item_num" class="col-lg-2 col-form-label ">
                                    <h6><strong> اسم الموظف<span class="mr-1 tx-danger">*</span></strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <select data-size="7" tabindex="null"
                                            class="@error('user_id') is-invalid @enderror form-control "
                                            data-live-search="true" title="أدخل اسم  الموظف" name="user_id" id="user_id">
                                            <option value="">اختر الموظف</option>
                                            @foreach ($user as $users)
                                                <option value="{{ $users->id }}">
                                                    {{ $users->name }}
                                                </option>
                                            @endforeach
                                            @if ($errors->has('user_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('user_id') }}</strong>
                                                </span>
                                            @endif
                                        </select>

                                    </div>
                                </div>

                                <label for="custody_num" class="col-lg-2 col-form-label ">
                                    <h6><strong> رقم العهدة<span class="mr-1 tx-danger">*</span></strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="custody_num"
                                            type="number"class="@error('custody_num') is-invalid @enderror form-control selectpicker "
                                            id="custody_num" placeholder="ادخل  رقم العهدة" />
                                        @error('custody_num')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- 3 --}}
                            <div class="p-3 form-group row">
                                <label for="date" class="col-lg-2 col-form-label ">
                                    <h6><strong>تاريخ العهدة<span class="mr-1 tx-danger">*</span></strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="date" id="date" type="date" min="0"
                                            value="{{ date('Y-m-d') }}"
                                            class="@error('date') is-invalid @enderror form-control"placeholder="ادخل تاريخ العهدة">
                                        @error('date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>

                        {{-- 4 --}}
                        <div class="p-3 form-group row">
                            <label for="description" class="col-lg-2 col-form-label ">
                                <h6><strong>وصف الفاتورة<span class="tx-danger mr-1">*</span></strong></h6>
                            </label>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <input type="text" class="@error('description') is-invalid @enderror form-control"
                                        id="description" name="description">
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="50%">الصنف
                                        <a href="{{ url('inventory/item/create') }}" title="اضافة صنف جديد"
                                            target="_blank">
                                            <i class="p-3 ki ki-solid-plus icon-md"></i>
                                        </a>
                                        <a href="{{ url('inventory/item') }}" title="عرض الأصناف">
                                            <i class="p-3 far fa-eye icon-md"></i>
                                        </a>
                                    </th>
                                    <th>الكمية</th>
                                    <th width="5%">جديد</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select class="form-control selectpicker" data-size="7" tabindex="null"
                                            title="أدخل الصنف" data-live-search="true" name="product[]" id="product[]">
                                            {{-- <option value="0">{{ 'اختر الصنف' }}</option> --}}
                                            @foreach ($products as $product)
                                                @if ($product->balance > 0)
                                                    <option value="{{ $product->id }}">
                                                        {{ $product->item_name }}
                                                        {{ 'الرصيد: ' . $product->balance }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        {{-- <input type="text"> --}}

                                    </td>
                                    {{-- <td><input type="text" name="balance[]" class="form-control"></td> --}}
                                    <td><input type="number" name="quantity[]"
                                            class="@error('quantity') is-invalid @enderror form-control" id="quantity"
                                            onchange="myFunction( )"></td>

                                    <td> <button type="button" class="btn btn-danger" id="add-row">+</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="mt-3 d-flex" style="margin-right: 215px;">
                            <button type="submit" value="Submit" class="btn btn-success">حفظ البيانات</button>
                            <button type="reset" class="mr-2 btn btn-danger">إلغاء</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- / row -->

@endsection

@section('js')

    <script>
        $(document).ready(function() {
            // السماح بحذف صف من جدول المنتجات
            $(document).on('click', '.delete-row', function() {
                $(this).closest('tr').remove();
            });

            // // إضافة زر "delete-row" إلى كل صف في جدول المنتجات
            // $("table tbody tr").each(function() {
            //     var deleteBtnHtml =
            //         '<td><button type="button" class="btn btn-danger delete-row">حذف</button></td>';
            //     $(this).append(deleteBtnHtml);
            // });

            // تحويل الزر "add-row" لإضافة الصف إلى جدول المنتجات
            $("#add-row").click(function() {
                var html = "<tr>";
                html +=
                    "<td><select name='product[]' title='اختر الصنف' class='form-control' data-live-search='true'>";
                @foreach ($products as $product)
                  @if($product->balance > 0)
                  html +=
                        "<option value='{{ $product->id }}'>{{ $product->item_name }} {{ ' - الرصيد :' }} {{ $product->balance }}</option>";
                  @endif
                @endforeach
                html += "</select></td>";
                html += "<td><input type='text' name='quantity[]' class='form-control'></td>";
                html += "<td><button type='button' class='btn btn-danger delete-row'>حذف</button></td>";
                html += "</tr>";
                $("table tbody").append(html);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('select[name="department_id"]').on('change', function() {
                var department_id = $(this).val();
                if (department_id) {
                    $.ajax({
                        url: "{{ URL::to('getdepartment') }}/" + department_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="sub_department_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="sub_department_id"]').append(
                                    '<option value="' +
                                    value + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>

@endsection
