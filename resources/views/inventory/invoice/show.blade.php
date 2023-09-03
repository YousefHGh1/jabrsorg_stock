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
                        <div class="p-5 row justify-content-center bg-primary">
                            <div class="col-md-9">
                                <div class="d-flex justify-content-between align-items-md-center flex-column flex-md-row">
                                    <div class="order-2 px-0 d-flex flex-column order-md-1">
                                        <!--begin::Logo-->
                                        <a href="{{ url('dashboard') }}" class=" max-w-115px">
                                            <img alt="Logo" src="{{ asset('assets/img/stock.png') }}" width="100px" />
                                        </a>
                                        <!--end::Logo-->
                                    </div>
                                    <h1 class="order-1 text-white display-4 font-weight-boldest order-md-2">
                                        فاتورة شراء</h1>
                                </div>
                            </div>
                        </div>
                        <div class="row mg-t-20">
                            <div class="col-md">
                                <label class="tx-gray-600"> جمعية جباليا للتاهيل</label>
                                <div class="billed-to">
                                    <p>معسكر جباليا , مقابل البريد <br>
                                        رقم الهاتف: 0599403805 <br />
                                        البريد الالكتروني: jabrs.org
                                    </p>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="mb-3 text-dark-50 font-size-lg font-weight-bold">تفاصيل الفاتورة
                                </div>

                                <p class="invoice-info-row"><span> رقم السند </span>
                                    <span>{{ $invoice->voucher_no }}</span>
                                </p>
                                <p class="invoice-info-row"><span> رقم الفاتورة</span>
                                    <span>{{ $invoice->invoice_no }}</span>
                                </p>
                                <p class="invoice-info-row"><span>تاريخ السند</span>
                                    <span>{{ $invoice->voucher_date }}</span>
                                </p>
                                <p class="invoice-info-row"><span>المورد</span>
                                    <span> {{ $invoice->supplier->supplier_name }}</span>
                                </p>
                                <p class="invoice-info-row"><span>وصف الفاتورة</span>
                                    <span> {{ $invoice->description }}</span>
                                </p>
                            </div>
                        </div>
                        <div class="table-responsive mg-t-40">
                            <table class="table mb-0 border table-invoice text-md-nowrap">
                                <thead>
                                    <tr>
                                        <th
                                            class="pt-1 pl-0 pb-9 pl-md-5 font-weight-bolder text-muted font-size-lg text-uppercase">
                                            اسم الصنف</th>
                                        <th
                                            class="pt-1 text-right pb-9 font-weight-bolder text-muted font-size-lg text-uppercase">
                                            الكمية</th>
                                        <th
                                            class="pt-1 text-right pb-9 font-weight-bolder text-muted font-size-lg text-uppercase">
                                            السعر</th>
                                        <th
                                            class="pt-1 pr-0 text-right pb-9 font-weight-bolder text-muted font-size-lg text-uppercase">
                                            الاجمالي</th>
                                    </tr>
                                </thead>
                            <tbody>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ($invoiceProducts as $invoiceProduct)
                                        <tr class="font-weight-bolder font-size-lg">
                                            <td class="pl-0 border-top-0 pl-md-5 pt-7 d-flex align-items-center">
                                                {{ $invoiceProduct->item->item_name }}</td>
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
                                    <tr>
                                        <td class="tx-right tx-uppercase tx-bold tx-inverse">اجمالي الفاتورة</td>
                                        <td class="tx-left" colspan="4">
                                            <h4 class="tx-primary tx-bold">{{ number_format($total, 2) }}</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tx-right tx-uppercase tx-bold tx-inverse">الخصم النقدي </td>
                                        <td class="tx-left" colspan="4">
                                            <h4 class="tx-primary tx-bold">{{ number_format($invoice->cash_discount, 2) }}
                                            </h4>
                                        </td>


                                    </tr>
                                    <tr>
                                         <td class="tx-right tx-uppercase tx-bold tx-inverse"> خصم النسبة </td>
                                        <td class="tx-left" colspan="4">
                                            <h4 class="tx-primary tx-bold">{{ number_format($discount, 2) }}</h4>
                                        </td>


                                    </tr>
                                    <tr>
                                        <td class="tx-right tx-uppercase tx-bold tx-inverse">اجمالي للدفع</td>
                                        <td class="tx-left" colspan="4">
                                            <h4 class="tx-primary tx-bold">{{ number_format($total_pay, 2) }}</h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <hr class="mg-b-40">

                        <a href="{{ url('inventory/invoice/create') }}" type="button" id="print_Button"
                            class="my-1 btn btn-warning font-weight-bolder ml-sm-auto">انشاء فاتورة</a>


                        <a href="{{ url('/inventory/invoice/' . $invoice->id . '/edit') }}"
                            class="my-1 btn btn-primary font-weight-bolder ml-sm-auto" title="Edit details">
                            <i class="la la-edit"></i> تعديل </a>

                        <button class="float-left mt-3 mr-2 btn btn-danger" id="print_Button" onclick="printDiv()"> <i
                                class="ml-1 mdi mdi-printer"></i>طباعة</button>
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
