@extends('layouts.master')

@section('css')
    <style>
        @media print {
            #print_Button {
                display: none;
            }
        }
    </style>
@endsection

@section('title', ' عرض الفاتورة ')
@section('sub_title', 'الفواتير')
@section('page_title', 'عرض الفاتورة')


@section('content')

    <!-- row -->
    <div class="row row-sm">
        <div class="col-md-12 col-xl-12">
            <div class=" main-content-body-invoice" id="print">
                <div class="card card-invoice">
                    <div class="card-body">
                        <div class="row justify-content-center p-5  bg-primary">
                            <div class="col-md-9">
                                <div class="d-flex justify-content-between align-items-md-center flex-column flex-md-row">
                                    <div class="d-flex flex-column px-0 order-2 order-md-1">
                                        <!--begin::Logo-->
                                        {{-- <a href="{{ url('dashboard') }}" class=" max-w-115px">
                                            <img alt="Logo" src="{{ asset('assets/img/stock.png') }}"
                                                width="100px" />
                                        </a> --}}
                                        <h2 class="tx-black-9   00"> جمعية جباليا للتاهيل</h2>
                                        <div class="billed-to">
                                            <p>معسكر جباليا , مقابل البريد <br>
                                                رقم الهاتف: 0599403805 <br />
                                                البريد الالكتروني: jabrs.org
                                            </p>
                                        </div>
                                        <!--end::Logo-->
                                    </div>
                                    <h1 class="display-4 font-weight-boldest text-black order-1 order-md-2">
                                        فاتورة شراء</h1>
                                </div>
                            </div>
                        </div>
                        <div class="row mg-t-20">
                            <div class="col-md-5">
                                {{-- <label class="tx-gray-600"> جمعية جباليا للتاهيل</label> --}}
                                <div class="billed-to" style="border-radius: 20px; border: 1px solid; padding: 15px">
                                    <p class="invoice-info-row"><span>اسم المورد</span>
                                        <span> {{ $invoice->supplier->supplier_name }}</span>
                                    </p>
                                    <p class="invoice-info-row"><span>عنوان المورد</span>
                                        <span> {{ $invoice->supplier->address }}</span>
                                    </p>
                                    <p class="invoice-info-row"><span>هاتف المورد</span>
                                        <span> {{ $invoice->supplier->phone }}</span>
                                    </p>
                                    <p class="invoice-info-row"><span>متغل مرخص</span>
                                        <span> {{ $invoice->supplier->ipn }}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <div class="text-dark-50 font-size-lg font-weight-bold mb-3"
                                    style="border-radius: 20px; border: 1px solid black; padding: 15px; text-align:center; color:red;">
                                    تفاصيل الفاتورة رقم :
                                    {{ $invoice->id }}
                                </div>
                                <p class="invoice-info-row"><span> رقم الفاتورة</span>
                                    <span>{{ $invoice->invoice_no }}</span>
                                </p>
                                <p class="invoice-info-row"><span>تاريخ الفاتورة</span>
                                    <span>{{ $invoice->voucher_date }}</span>
                                </p>

                                <p class="invoice-info-row"><span>وصف الفاتورة</span>
                                    <span> {{ $invoice->description }}</span>
                                </p>
                            </div>
                        </div>
                        <div class="table-responsive mg-t-40">
                            <table class="table table-invoice border text-md-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="pt-1 pb-9 text-right font-weight-bolder text-muted font-size-lg text-uppercase">
                                            اسم الصنف</th>

                                        <th
                                            class="pt-1 pb-9 text-right font-weight-bolder text-muted font-size-lg text-uppercase">
                                            رقم الصنف</th>
                                        <th
                                            class="pt-1 pb-9 text-right font-weight-bolder text-muted font-size-lg text-uppercase">
                                            الوحدة</th>
                                        <th
                                            class="pt-1 pb-9 text-right font-weight-bolder text-muted font-size-lg text-uppercase">
                                            الكمية</th>
                                        <th
                                            class="pt-1 pb-9 text-right font-weight-bolder text-muted font-size-lg text-uppercase">
                                            السعر</th>
                                        <th
                                            class="pt-1 pb-9 text-right font-weight-bolder text-muted font-size-lg text-uppercase">
                                            الاجمالي</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ($invoiceProducts as $invoiceProduct)
                                        <tr class="font-weight-bolder font-size-lg">
                                            <td class="border-top-0 pl-0 pl-md-5 pt-7 d-flex align-items-center">
                                                {{ $invoiceProduct->item->item_name }}</td>
                                            <td class="text-right pt-7">{{ $invoiceProduct->item->item_num }}</td>
                                            <td class="text-right pt-7">{{ $invoiceProduct->item->unit->unit_name }}</td>
                                            <td class="text-right pt-7">{{ $invoiceProduct->quantity }}</td>
                                            <td class="text-right pt-7">{{ $invoiceProduct->price }}</td>
                                            <td class="pr-0 text-right pt-7 font-size-h6 font-weight-boldest">
                                                {{ $subtotal = $invoiceProduct->quantity * $invoiceProduct->price }}
                                                @php
                                                    $total += $subtotal;
                                                    $discount = $total * $invoice->percentage_discount;
                                                    $total_discount = $discount + $invoice->cash_discount;
                                                    $total_pay = $total - $total_discount;
                                                @endphp
                                            </td>
                                        </tr>
                                    @endforeach

                                    <tr> {{-- total --}}
                                        <td colspan="1"></td>
                                        <td colspan="5">
                                            <div class="col-md-12">
                                                <div class="billed-to"
                                                    style=" padding: 15px; width:300px; margin-right:250px">
                                                    <p class="invoice-info-row"><span>المجموع</span>
                                                        <span class="tx-primary tx-bold">
                                                            {{ number_format($total, 2) }}</span>
                                                    </p>
                                                    <p class="invoice-info-row"><span>مبلغ الخصم</span>
                                                        <span class="tx-primary tx-bold">
                                                            {{ $invoice->cash_discount }}</span>
                                                    </p>
                                                    <p class="invoice-info-row"><span>نسبة الخصم %</span>
                                                        <span class="tx-primary tx-bold">
                                                            {{ number_format($discount, 2) }}</span>
                                                    </p>
                                                    <p class="invoice-info-row"><span>المبلغ بعد الخصم</span>
                                                        <span class="tx-primary tx-bold">
                                                            {{ number_format($total_pay, 2) }}</span>
                                                    </p>
                                                    <p class="invoice-info-row"><span>مبلغ الفاتورة</span>
                                                        <span class="tx-primary tx-bold">
                                                            {{ number_format($total_pay, 2) }}</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="3">
                                            <div class="col-md-12">
                                                <div class="billed-to"
                                                    style="border-radius: 20px; border: 1px solid; padding: 15px">
                                                    <p class="invoice-info-row"><span>اسم المورد</span>
                                                        <span> {{ $invoice->supplier->supplier_name }}</span>
                                                    </p>
                                                    <p class="invoice-info-row"><span>اسم المورد</span>
                                                        <span> {{ $invoice->supplier->adress }}</span>
                                                    </p>
                                                    <p class="invoice-info-row"><span>اسم المورد</span>
                                                        <span> {{ $invoice->supplier->supplier_name }}</span>
                                                    </p>
                                                    <p class="invoice-info-row"><span>اسم المورد</span>
                                                        <span> {{ $invoice->supplier->supplier_name }}</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td colspan="3">
                                            <div class="col-md-12">


                                                    <fieldset>الملاحظات</fieldset>
                                                    <textarea style="border-radius: 10px; border: 1px solid; "
                                                     name="" id="" cols="70" rows="6" ></textarea>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="3" class="text-right pt-7 font-weight-bolder">{{ __('توقيع المشتغل المرخص') }}</td>
                                        <td  colspan="3"  class="text-left pt-7 font-weight-bolder">{{ __('الاسم وتوقيع المستلم') }}</td>
                                    </tr>
                                </tbody>


                            </table>

                        </div>

                        <hr class="mg-b-40">

                        <a href="{{ url('inventory/invoice/create') }}"
                            class="btn btn-success font-weight-bolder ml-sm-auto my-1">انشاء فاتورة</a>
                        <a href="{{ url('inventory/invoice') }}"
                            class="btn btn-primary font-weight-bolder ml-sm-auto my-1">عرض الفواتير</a>

                        <button class="btn btn-danger  float-left mt-3 mr-2" id="print_Button" onclick="printDiv()"> <i
                                class="mdi mdi-printer ml-1"></i>طباعة</button>
                    </div>


                </div>
            </div>
        </div><!-- COL-END -->
    </div>
    <!-- row closed -->

@endsection

@section('js')

    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <script type="text/javascript">
        function printDiv() {
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
    </script>

@endsection
