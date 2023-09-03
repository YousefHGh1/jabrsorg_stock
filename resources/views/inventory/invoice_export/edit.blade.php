@extends('layouts.master')

@section('css')
    <style>
        input {
            border: 1px solid #d5c1ff !important;
        }
    </style>
@endsection

@section('title', ' تعديل فاتورة صرف ')
@section('sub_title', 'فاتورة صرف')
@section('page_title', 'تعديل فاتورة صرف')

@section('content')

    <!-- \ row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                {{-- card-header --}}
                <div class="card-header d-flex" style="justify-content: space-between;">
                    <div class="card-title">
                        <h3 class="card-label"> تعديل بيانات الفواتير</h3>
                    </div>
                    <div class="card-toolbar">
                        <button class="btn btn-light">
                            <i class="far fa-eye ml-1" style="color: black;"></i>
                            <a href="{{ url('inventory/invoice_export') }}" style="font: bolder; color:rgb(0, 0, 0);">
                                عرض فاتورة صرف </a>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <!--begin::Form-->
                    <form action="{{ route('invoice_export.update', ['invoice_export' => $invoiceExport->id]) }}"
                        method="post" class="form needs-validation " novalidate enctype="multipart/form-data"
                        id="kt_form">
                        @csrf
                        {!! csrf_field() !!}
                        @method('PUT')

                        <div class="card-body">
                            <div class="p-3 form-group row">
                                <label for="voucher_no" class="col-lg-2 col-form-label ">
                                    <h6> رقم السند:</h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="voucher_no" name="voucher_no"
                                            value="{{ $invoiceExport->voucher_no }}">
                                    </div>
                                </div>

                                <div class="col-lg-1"></div>

                                <label for="voucher_date" class="col-lg-2 col-form-label ">
                                    <h6> تاريخ السند:</h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="voucher_date" name="voucher_date"
                                            value="{{ $invoiceExport->voucher_date }}">
                                    </div>
                                </div>
                            </div>

                            <div class="p-3 form-group row">
                                <label for="invoice_no" class="col-lg-2 col-form-label ">
                                    <h6> رقم الفاتورة:</h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="invoice_no" name="invoice_no"
                                            value="{{ $invoiceExport->invoice_no }}">
                                    </div>
                                </div>
                                <div class="col-lg-1"></div>
                                <label for="employee_id" class="col-lg-2 col-form-label ">
                                    <h6> الموظفين:</h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <select class="form-control selectpicker" data-size="7" tabindex="null"
                                            data-live-search="true" title="أدخل اسم الموظف" name="employee_id"
                                            id="employee_id" selected>
                                            @foreach ($Employee as $Employees)
                                                <option value="{{ $Employees->id }}"
                                                    {{ $invoiceExport->employee_id == $Employees->id ? 'selected' : '' }}>
                                                    {{ $Employees->employee_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <a href="{{ url('inventory/department/create') }}" title="اضافة قسم جديد">
                                    <i class="typcn typcn-document-add" style="color: black"></i>
                                </a>
                            </div>

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="50%">الصنف</th>
                                        <th>الكمية</th>
                                        {{-- <th>السعر</th> --}}
                                        <th width="5%">جديد</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invoiceExport->InvoiceExport_product as $index => $InvoiceExport_product)
                                        <tr>
                                            <td>
                                                <select name="product[]" class="form-control selectpicker">
                                                    <option value="" disabled selected>اختر المنتج</option>

                                                    @foreach ($products as $product)
                                                        <option value="{{ $product->id }}"
                                                            {{ $InvoiceExport_product->item_id == $product->id ? 'selected' : '' }}>
                                                            {{ $product->item_num }} {{ $product->item_name }}
                                                            {{ 'الرصيد:' . $product->balance }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td><input type="number" name="quantity[]"
                                                    value="{{ $InvoiceExport_product->quantity }}" class="form-control">
                                            </td>
                                            {{-- <td><input type="number" name="price[]"
                                                    value="{{ $InvoiceExport_product->price }}" class="form-control"></td> --}}
                                    @endforeach
                                    <td> <button type="button" class="btn btn-danger" id="add-row">+</button>
                                        </tr>

                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-right mt-2 " style="margin-right:124px">
                            <button type="submit" class="btn btn-success">تعديل البيانات</button>
                            <a type="submit" href="{{ route('invoice_export.index') }}"
                                class="btn btn-primary mr-2">العودة</a>
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
                html +=
                    "<td><input type='number' name='price[]' class='form-control'  onchange='calculateTotal(this); calculateTotalAll();'></td>";
                html += "<td> <input type='number' class='form-control' name='Total[]' readonly></td>";
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
