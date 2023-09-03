@extends('layouts.master')

@section('css')
    <style>
        input {
            border: 1px solid #d5c1ff !important;
        }
    </style>
@endsection

@section('title', ' تعديل العهدة ')
@section('sub_title', 'العهد')
@section('page_title', 'تعديل العهدة')

@section('content')

    <!-- \ row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                {{-- card-header --}}
                <div class="card-header d-flex" style="justify-content: space-between;">
                    <div class="card-title">
                        <h3 class="card-label"> تعديل بيانات العهد</h3>
                    </div>
                    <div class="card-toolbar">
                        <button class="btn btn-light">
                            <i class="far fa-eye ml-1" style="color: black;"></i>
                            <a href="{{ url('inventory/custody') }}" style="font: bolder; color:rgb(0, 0, 0);">
                                عرض العهد </a>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <!--begin::Form-->
                    <form action="{{ route('custody.update', ['custody' => $custody->id]) }}" method="post"
                        class="form needs-validation " novalidate enctype="multipart/form-data" id="kt_form">
                        @csrf
                        {!! csrf_field() !!}
                        @method('PUT')

                        <div class="card-body">
                            {{-- 1 --}}
                            <div class="p-3 form-group row">
                                <label for="department_id" class="col-lg-2 col-form-label ">
                                    <h6><strong>القسم<span class="tx-danger mr-1">*</span></strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <select onclick="console.log($(this).val())"
                                            onchange="console.log('change is firing')"
                                            class="@error('department_id') is-invalid @enderror form-control selectpicker "
                                            data-size="7" tabindex="null" data-live-search="true" name="department_id"
                                            id="department_id">
                                            <option value="">اختر اسم القسم</option>

                                            @foreach ($department as $departments)
                                                <option value="{{ $departments->id }}"
                                                    {{ $custody->department_id == $departments->id ? 'selected' : '' }}>
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
                                    <h6><strong>القسم الفرعي <span class="tx-danger mr-1">*</span></strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <select data-size="7" tabindex="null"
                                            class="@error('sub_department_id') is-invalid @enderror form-control "
                                            data-live-search="true" title="أدخل اسم القسم الفرعي" name="sub_department_id"
                                            id="sub_department_id">
                                    <option value="{{ $custody->sub_department_id }}"> {{ $custody->sub_department_id }}</option>

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
                                    <h6><strong> اسم الموظف<span class="tx-danger mr-1">*</span></strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <select data-size="7" tabindex="null"
                                            class="@error('user_id') is-invalid @enderror form-control "
                                            data-live-search="true" title="أدخل اسم  الموظف" name="user_id" id="user_id">
                                            <option value="">اختر الموظف</option>
                                            @foreach ($user as $users)
                                                <option value="{{ $users->id }}"
                                                    {{ $custody->user_id == $users->id ? 'selected' : '' }}>
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
                                    <h6><strong> رقم العهدة<span class="tx-danger mr-1">*</span></strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="custody_num"
                                            type="number"class="@error('custody_num') is-invalid @enderror form-control selectpicker "
                                            id="custody_num" value="{{$custody->custody_num}}" />
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
                                    <h6><strong>تاريخ العهدة<span class="tx-danger mr-1">*</span></strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="date" id="date" type="date" min="0"
                                            value="{{ date('Y-m-d') }}"
                                            class="@error('date') is-invalid @enderror form-control" value="{{$custody->date}}">
                                        @error('date')
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
                                        <th width="50%">الصنف</th>
                                        <th>الكمية</th>

                                        <th width="5%">الاجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($custody->custodyproduct as $index => $custodyProduct)
                                        <tr>
                                            <td>
                                                <select name="product[]" class="form-control selectpicker">
                                                    <option value="" disabled selected>اختر المنتج</option>

                                                    @foreach ($products as $product)
                                                        <option value="{{ $product->id }}"
                                                            {{ $custodyProduct->item_id == $product->id ? 'selected' : '' }}>
                                                            {{ $product->item_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td><input type="number" name="quantity[]" min="0"
                                                    value="{{ $custodyProduct->quantity }}" class="form-control"></td>
                                    @endforeach
                                    <td> <button type="button" class="btn btn-danger" id="add-row">+</button>
                                        </tr>
                                </tbody>
                            </table>

                        </div>

                        <div class="d-flex mt-3" style="margin-right: 215px;">
                            <button type="submit" value="Submit" class="btn btn-success">حفظ البيانات</button>
                            <button type="reset" class="btn btn-danger mr-2">إلغاء</button>
                        </div>

                    </form>

                    <!--end::Form-->
                </div>
            </div>
        </div>
    </div>
    <!-- / row -->

@endsection

@section('js')

    <script>
        function myFunction() {
            var quantity = parseFloat(document.getElementById("quantity").value);
            var price = parseFloat(document.getElementById("price").value);
            var total = quantity * price;

            document.getElementById("Total").value = total;
        }
    </script>

    <script>
        $(document).ready(function() {
            // السماح بحذف صف من جدول المنتجات
            $(document).on('click', '.delete-row', function() {
                $(this).closest('tr').remove();
                calculateTotalAll();
            });
            // إضافة زر "delete-row" إلى كل صف في جدول المنتجات
            $("table tbody tr").each(function() {
                var deleteBtnHtml =
                    '<td><button type="button" class="btn btn-danger delete-row">حذف</button></td>';
                $(this).append(deleteBtnHtml);
            });

            // تحويل الزر "add-row" لإضافة الصف إلى جدول المنتجات
            $("#add-row").click(function() {
                var html = "<tr>";
                html +=
                    "<td><select name='product[]' title='اختر الصنف' class='form-control' data-live-search='true'>";
                @foreach ($products as $product)
                    html +=
                        "<option value='{{ $product->id }}'>{{ $product->item_num }} {{ $product->item_name }} {{ $product->balance }}</option>";
                @endforeach
                html += "</select></td>";
                html +=
                    "<td><input type='number' name='quantity[]' class='form-control'  onchange='calculateTotal(this); calculateTotalAll();'></td>";
                html += "<td><button type='button' class='btn btn-danger delete-row'>حذف</button></td>";
                html += "</tr>";
                $("table tbody").append(html);
            });

            // حساب الإجمالي الكلي
            function calculateTotalAll() {
                var total = 0;
                $("table tbody tr").each(function() {
                    var quantity = parseFloat($(this).find("input[name='quantity[]']").val());
                    var price = parseFloat($(this).find("input[name='price[]']").val());
                    var subtotal = quantity * price;
                    $(this).find("input[name='Total']").val(subtotal.toFixed(2));
                    total += subtotal;
                });
                $("#total-all").val(total.toFixed(2));
            }

        });

        function calculateTotal(element) {
            var tr = $(element).closest('tr');
            var quantity = parseFloat(tr.find("input[name='quantity[]']").val());
            var price = parseFloat(tr.find("input[name='price[]']").val());
            var total = quantity * price;
            tr.find("input[name='Total[]']").val(total);
        }
    </script>

    <script>
        $(document).ready(function() {
            $('select[name="department_id"]').on('change', function() {
                var department_id = $(this).val();
                if (department_id) {
                    $.ajax({
                        url: "{{ URL::to('getgetdepartment') }}/" + department_id,
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
