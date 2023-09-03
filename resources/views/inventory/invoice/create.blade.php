@extends('layouts.master')

@section('css') @endsection

@section('title', ' اضافة فاتورة شراء ')
@section('sub_title', 'الفواتير')
@section('page_title', 'اضافة فاتورة شراء')

@section('content')

    <!-- \ row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                {{-- card-header --}}
                <div class="card-header d-flex" style="justify-content: space-between;">
                    <div class="card-title">
                        <h3 class="card-label"> بيانات الفواتير (فاتورة شراء)</h3>
                    </div>
                    <div class="card-toolbar">
                        <button class="btn btn-light">
                            <i class="ml-1 far fa-eye" style="color: black;"></i>
                            <a href="{{ url('inventory/invoice') }}" style="font: bolder; color:rgb(0, 0, 0);">
                                عرض الفواتير </a>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('invoice.store') }}" method="post" class="form needs-validation " novalidate
                        enctype="multipart/form-data">
                        @csrf
                        {!! csrf_field() !!}
                        <div class="card-body">

                            {{-- 1 --}}
                            <div class="p-3 form-group row">
                                <label for="invoice_no" class="col-lg-2 col-form-label ">
                                    <h6><strong>رقم الفاتورة<span class="mr-1 tx-danger">*</span></strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="invoice_no" id="invoice_no" type="number" min="0"
                                            class="@error('invoice_no') is-invalid @enderror form-control"placeholder="ادخل رقم الفاتورة">
                                        @error('invoice_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <label for="voucher_date" class="col-lg-2 col-form-label ">
                                    <h6><strong>تاريخ الفاتورة<span class="mr-1 tx-danger">*</span></strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input name="voucher_date" id="voucher_date" type="date" min="0"
                                            value="{{ date('Y-m-d') }}"
                                            class="@error('voucher_date') is-invalid @enderror form-control"placeholder="ادخل تاريخ الفاتورة">
                                        @error('voucher_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- 2 --}}
                            <div class="p-3 form-group row">
                                <label for="supplier_id" class="col-lg-2 col-form-label ">
                                    <h6><strong>المورد<span class="mr-1 tx-danger">*</span></strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <select
                                            class="@error('supplier_id') is-invalid @enderror form-control selectpicker "
                                            data-size="7" tabindex="null" data-live-search="true" title="أدخل المورد"
                                            name="supplier_id" id="supplier_id">
                                            <option value="">اختر اسم المورد</option>

                                            @foreach ($supplier as $suppliers)
                                                <option value="{{ $suppliers->id }}">
                                                    {{ $suppliers->supplier_name }}
                                                </option>
                                            @endforeach
                                            {{-- هاي عشان تعمل تحقق لما تختار عائلة  ولازم تعطي القيمه تعت الاوبشن فاضية --}}
                                            @if ($errors->has('supplier_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('supplier_id') }}</strong>
                                                </span>
                                            @endif
                                        </select>

                                    </div>
                                </div>

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
                            </div>

                            {{-- 3 --}}
                            <div class="p-3 form-group row">
                                <label for="percentage_discount" class="col-lg-2 col-form-label ">
                                    <h6><strong> خصم نسبة <span class="mr-1 tx-danger">%</span></strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input type="number"
                                            class="@error('percentage_discount') is-invalid @enderror form-control"
                                            id="percentage_discount" name="percentage_discount" placeholder=" ادخل الخصم %">
                                        @error('percentage_discount')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <label for="cash_discount" class="col-lg-2 col-form-label ">
                                    <h6><strong>خصم مبلغ<span class="mr-1 tx-danger">*</span></strong></h6>
                                </label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input type="number"
                                            class="@error('cash_discount') is-invalid @enderror form-control"
                                            id="cash_discount" name="cash_discount" placeholder="ادخل الخصم">
                                        @error('cash_discount')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- 4 --}}
                            <div class="p-3 form-group row">
                                <label for="description" class="col-lg-2 col-form-label ">
                                    <h6><strong>وصف الفاتورة</strong></h6>
                                </label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <textarea type="text"
                                            class="@error('description') is-invalid @enderror form-control"
                                            id="description" name="description" placeholder="ادخل وصف الفاتورة"></textarea>
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
                                        <th>السعر</th>
                                        <th>الاجمالي</th>
                                        <th width="5%">جديد</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            {{-- <select name="product[]" class="form-control"> --}}
                                            <select class="form-control selectpicker" data-size="7" tabindex="null"
                                                title="أدخل الصنف" data-live-search="true" name="product[]"
                                                id="product[]">
                                                {{-- <option value="0">{{ 'اختر الصنف' }}</option> --}}
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}">
                                                        {{ $product->item_name }}
                                                        {{ 'الرصيد: ' . $product->balance }}</option>
                                                @endforeach
                                            </select>
                                            {{-- <input type="text"> --}}

                                        </td>
                                        {{-- <td><input type="text" name="balance[]" class="form-control"></td> --}}
                                        <td><input type="number" name="quantity[]" class="form-control" id="quantity"
                                                onchange="myFunction( )"></td>
                                        <td><input type="number" name="price[]" class="form-control" id="price"
                                                onchange="myFunction( )"></td>
                                        <td> <input type="text" class="form-control" id="Total" name="Total"
                                                readonly>
                                        </td>


                                        <td> <button type="button" class="btn btn-danger" id="add-row">+</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>

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
                    html +=
                        "<option value='{{ $product->id }}'> {{ $product->item_name }} {{ ' - الرصيد :' }} {{ $product->balance }}</option>";
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

    {{-- <script>
        $(document).ready(function() {
            // السماح بحذف صف من جدول المنتجات
            $(document).on('click', '.delete-row', function() {
                $(this).closest('tr').remove();
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
                    "<td><input type='number' name='quantity[]' class='form-control'  onchange='calculateTotal(this)'></td>";
                html +=
                    "<td><input type='number' name='price[]' class='form-control'  onchange='calculateTotal(this)'></td>";
                html += "<td> <input type='number' class='form-control' name='Total[]' readonly></td>";
                html += "<td><button type='button' class='btn btn-danger delete-row'>حذف</button></td>";
                html += "</tr>";
                $("table tbody").append(html);
            });
        });

        function calculateTotal(element) {
            var tr = $(element).closest('tr');
            var quantity = parseFloat(tr.find("input[name='quantity[]']").val());
            var price = parseFloat(tr.find("input[name='price[]']").val());
            var total = quantity * price;
            tr.find("input[name='Total[]']").val(total);
        }
    </script> --}}

@endsection
