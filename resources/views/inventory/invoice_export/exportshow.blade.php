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

@section('title', ' عرض فاتورة صرف')
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
                                        <a href="{{ url('dashboard') }}" class=" max-w-115px">
                                            <img alt="Logo" src="{{ asset('assets/img/stock.png') }}" width="100px" />
                                        </a>
                                        <!--end::Logo-->
                                    </div>
                                    <h1 class="display-4 font-weight-boldest text-white order-1 order-md-2">
                                        اذن صرف </h1>
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
                                <div class="text-dark-50 font-size-lg font-weight-bold mb-3">تفاصيل الفاتورة
                                </div>

                                <p class="invoice-info-row mb-10 font-size-lg font-weight-bold">
                                    <span style="color: black"> رقم أمر الصرف </span>
                                    <span>{{ $invoiceExport->voucher_no }}</span>
                                </p>

                                <p class="invoice-info-row mb-10 font-size-lg font-weight-bold">
                                    <span style="color: black"> رقم الفاتورة </span>
                                    <span>{{ $invoiceExport->invoice_no }}</span>
                                </p>

                                <p class="invoice-info-row mb-10 font-size-lg font-weight-bold">
                                    <span style="color: black"> تاريخ الصرف </span>
                                    <span>{{ $invoiceExport->voucher_date }}</span>
                                </p>

                                <p class="invoice-info-row mb-10 font-size-lg font-weight-bold">
                                    <span style="color: black"> اسم الموظف </span>
                                    <span>{{ $invoiceExport->Employee->employee_name }}</span>
                                </p>

                            </div>
                        </div>
                        <div class="table-responsive mg-t-40">
                            <table class="table table-invoice border text-md-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="pt-1 pb-9 pl-0 pl-md-5 font-weight-bolder text-muted font-size-lg text-uppercase">
                                            اسم الصنف</th>
                                        <th
                                            class="pt-1 pb-9 text-right font-weight-bolder text-muted font-size-lg text-uppercase">
                                            الكمية</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($invoiceExport_products as $invoiceExportProduct)
                                        <tr class="font-weight-bolder font-size-lg">
                                            <td class="border-top-0 pl-0 pl-md-5 pt-7 d-flex align-items-center">
                                                {{ $invoiceExportProduct->item->item_name }}</td>
                                            <td class="text-right pt-7">{{ $invoiceExportProduct->quantity }}</td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                        <hr class="mg-b-40">

                        <a href="{{ url('inventory/invoice_export/create') }}" type="button" id="print_Button"
                            class="btn btn-warning font-weight-bolder ml-sm-auto my-1">انشاء سند صرف</a>

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
