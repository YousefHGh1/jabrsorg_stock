@extends('layouts.master')

@section('css')
    <style>
        input {
            border: 1px solid #d5c1ff !important;
        }
    </style>
@endsection

@section('title', ' اضافة فاتورة صرف ')
@section('sub_title', 'فاتورة صرف')
@section('page_title', 'اضافة فاتورة صرف')

@section('content')

    <!-- \ row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                {{-- card-header --}}
                <div class="card-header d-flex" style="justify-content: space-between;">
                    <div class="card-title">
                        <h3 class="card-label"> بيانات الفواتير (سند صرف)</h3>
                    </div>
                    <div class="card-toolbar">
                        <button class="btn btn-light">
                            <i class="ml-1 far fa-eye" style="color: black;"></i>
                            <a href="{{ url('inventory/invoice_export') }}" style="font: bolder; color:rgb(0, 0, 0);">
                                عرض فاتورة صرف </a>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <!--begin::Form-->
                    <form action="{{ route('invoice_export.store') }}" method="post" class="form needs-validation "
                        novalidate enctype="multipart/form-data" id="kt_form">
                        @csrf
                        {!! csrf_field() !!}

                        <div class="card-body">
                            {{-- 1 --}}
                            <div class="p-3 form-group row">
                                <label for="voucher_no" class="col-lg-2 col-form-label ">
                                    <h6><strong>رقم الصرف<span class="mr-1 tx-danger">*</span></strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input type="number" class="@error('voucher_no') is-invalid @enderror form-control"
                                            id="voucher_no" name="voucher_no">
                                        @error('voucher_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-1"></div>

                                <label for="voucher_date" class="col-lg-2 col-form-label ">
                                    <h6><strong>تاريخ الصرف<span class="mr-1 tx-danger">*</span></strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input type="date" class="form-control" value="{{ date('Y-m-d') }}"
                                            id="voucher_date" name="voucher_date">
                                    </div>
                                </div>
                            </div>

                            {{-- 2 --}}
                            <div class="p-3 form-group row">
                                <label for="store_id" class="col-lg-2 col-form-label ">
                                    <h6><strong>المخزن<span class="mr-1 tx-danger">*</span></strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <select class="@error('store_id') is-invalid @enderror form-control selectpicker "
                                            data-size="7" tabindex="null" data-live-search="true" title="أدخل المخزن"
                                            name="store_id" id="store_id">
                                            <option value="">اختر اسم المخزن</option>

                                            @foreach ($store as $stores)
                                                <option value="{{ $stores->id }}">
                                                    {{ $stores->store_name }}
                                                </option>
                                            @endforeach
                                            {{-- هاي عشان تعمل تحقق لما تختار عائلة  ولازم تعطي القيمه تعت الاوبشن فاضية --}}
                                            @if ($errors->has('store_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('store_id') }}</strong>
                                                </span>
                                            @endif
                                        </select>

                                    </div>
                                </div>

                                <div class="col-lg-1"></div>

                                <label for="employee_id" class="col-lg-2 col-form-label ">
                                    <h6><strong>الموظفين<span class="mr-1 tx-danger">*</span></strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <select
                                            class="@error('employee_id') is-invalid @enderror form-control selectpicker "
                                            data-size="7" tabindex="null" data-live-search="true" title="أدخل المورد"
                                            name="employee_id" id="employee_id">
                                            <option value="">اختر اسم الموظف</option>
                                            @foreach ($Employee as $Employees)
                                                <option value="{{ $Employees->id }}">
                                                    {{ $Employees->employee_name }}
                                                </option>
                                            @endforeach
                                            @if ($errors->has('employee_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('employee_id') }}</strong>
                                                </span>
                                            @endif
                                        </select>

                                    </div>
                                </div>
                                <a href="{{ url('inventory/department/create') }}" title="اضافة قسم جديد" target="_blank">
                                    <i class="typcn typcn-document-add" style="color: black"></i>
                                </a>
                            </div>

                            {{-- 3 --}}
                            <div class="p-3 form-group row">
                                <label for="description" class="col-lg-2 col-form-label ">
                                    <h6><strong>وصف الفاتورة<span class="mr-1 tx-danger">*</span></strong></h6>
                                </label>
                                <div class="col-lg-9">
                                    <div class="input-group">
                                        <input type="text"
                                            class="@error('description') is-invalid @enderror form-control" id="description"
                                            name="description">
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
                                                <i class="typcn typcn-document-add" style="color: black"></i>
                                            </a>
                                            <a href="{{ url('inventory/item') }}" title="عرض الأصناف" target="_blank">
                                                <i class="far fa-eye" style="color: black"></i>
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
                                                title="أدخل الصنف" data-live-search="true" name="product[]"
                                                id="product[]">
                                                {{-- <option value="0">{{ 'اختر الصنف' }}</option> --}}

                                                @foreach ($products as $product)
                                                    @if ($product->balance > 0)
                                                        <option value="{{ $product->id }}">
                                                            {{ $product->item_name }}
                                                            {{ 'الرصيد: ' . $product->balance }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input type="number" onchange="myFunction( )" name="quantity[]"
                                                class="form-control" id="quantity"></td>

                                        <td> <button type="button" class="btn btn-danger" id="add-row">+</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="mt-3 d-flex" style="margin-right: 215px;">
                                <button type="submit" value="Submit" class="btn btn-success">حفظ البيانات</button>
                                <button type="reset" class="mr-2 btn btn-danger">إلغاء</button>
                            </div>
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

            // تحويل الزر "add-row" لإضافة الصف إلى جدول المنتجات
            $("#add-row").click(function() {
                var html = "<tr>";
                html +=
                    "<td><select name='product[]' title='اختر الصنف' class='form-control' data-live-search='true'>";
                @foreach ($products as $product)
                    @if ($product->balance > 0)
                        html +=
                            "<option value='{{ $product->id }}'>{{ $product->item_name }} {{ ' - الرصيد :' }} {{ $product->balance }}</option>";
                    @endif
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

@endsection
