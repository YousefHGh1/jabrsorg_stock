@extends('layout.master')

@section('title', 'تقارير الصادر')
@section('sub_title', 'الصادر')
@section('page_title', 'صفحة الصادر')

@section('css')
    <style>
        div.dt-buttons {
            float: none;
            width: 222px;
            text-align: center;
            margin-bottom: 0.5em;
            position: absolute;
        }

        .btn:hover {
            background-color: #2c2e3e !important;
        }

        div.dt-buttons:hover {
            background-color: #2c2e3e !important;
        }

        .btn.btn-default,
        .btn.btn-secondary {
            background: #2c2e3e;
            border-color: #1b1c1d;
            color: rgb(255, 255, 255);
        }

        .btn.btn-default:hover,
        .btn.btn-secondary:hover {
            background-color: none !important;
        }

        .form-control[readonly],
        .form-control {
            border-color: #2c2e3e;
            color: #161616;
        }
    </style>
@endsection

@section('content')

    <!-- search date -->
    <form action="{{ url('diesel/search') }}" method="POST" class="form-group pl-5">
        @csrf
        <div class="form-group row">
            <label for="start_date" class="col-form-label">
                <h5><strong>تاريخ البدء :</strong></h5>
            </label>
            <div class="col-3 pr-5">
                <input name="start_date" type="date" class="form-control" id="start_date" />
            </div>

            <label for="end_date" class="col-form-label">
                <h5><strong>تاريخ الإنتهاء :</strong></h5>
            </label>
            <div class="col-3 pr-5">
                <input name="end_date" type="date" class="form-control" id="end_date" />
            </div>

            <div class="col-3">
                <input type="submit" class="btn btn-secondary form-control" value="بحث" />
            </div>
        </div>
    </form>
    <!-- search date /-->

    <!-- Main content -->
    <div class="m-content">
        @include('layout.error')
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__body">
                <center>
                    <h4 class="m-subheader__title m-subheader__title--separator"><strong>تقارير الوارد</strong></h4>
                </center>
                <hr>
                <!--begin: table Form -->
                <div class="table-responsive-xl">
                    <table class="table table-striped table-bordered table-hover table-checkable" id="myTable">

                        <thead>
                            <tr>
                                <th>{{ '#' }}</th>
                                <th>{{ 'اسم المورد' }}</th>
                                <th>{{ 'كمية التوريد' }} </th>
                                <th>{{ 'جهة التوريد' }} </th>
                                <th>{{ 'سند التوريد' }} </th>
                                <th>{{ 'رقم الفاتورة' }} </th>
                                <th>{{ 'الملف' }}</th>
                                <th>{{ 'تاريخ التوريد ' }} </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($diesel as $diesels)
                                <tr>
                                    <td>{{ $diesels->id }}</td>
                                    <td>{{ $diesels->supplier_id }}</td>
                                    <td>{{ $diesels->quantity }}
                                        <span>لتر </span>
                                    </td>
                                    <td>{{ $diesels->type }}</td>

                                    <td>{{ $diesels->voucher }}</td>
                                    <td>{{ $diesels->invoice_num }}</td>

                                    <td>{{ $diesels->date }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!--End: table Form -->

            </div>
        </div>
        {{-- ************************************************** --}}
        <div class="card text-center">
            <div class="card-header card text-white mb-3" style="background-color: #2c2e3e">
                كميات السولار
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover table-checkable" id="myTable">

                    <thead style="background-color: #2c2e3e; color:rgb(255, 255, 255)">
                        <tr>

                            <th>{{ 'شهر 1' }} </th>
                            <th>{{ 'شهر 2' }}</th>
                            <th>{{ 'شهر 3' }} </th>
                            <th>{{ 'شهر 4' }} </th>
                            <th>{{ 'شهر 5' }} </th>
                            <th>{{ 'شهر 6 ' }} </th>
                            <th>{{ 'شهر 7 ' }} </th>
                            <th>{{ 'شهر 8 ' }} </th>
                            <th>{{ 'شهر 9 ' }} </th>
                            <th>{{ 'شهر 10 ' }} </th>
                            <th>{{ 'شهر 11 ' }} </th>
                            <th>{{ 'شهر 12 ' }} </th>
                            <th>{{ 'عدد الوارد' }}</th>
                            <th>{{ 'مجموع الوارد' }}</th>
                            <th>{{ 'مجموع المتبقي من السولار' }} </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                {{-- <li class="list-group-item">   --}}
                                {{ \App\Models\Diesel::select('quantity')->whereRaw('MONTH(diesels.date) = 1')->sum('quantity') }}
                                <span>لتر</span>
                                </li>
                            </td>

                            <td>
                                {{-- <li class="list-group-item">  --}}
                                {{ \App\Models\Diesel::select('quantity')->whereRaw('MONTH(diesels.date) = 2')->sum('quantity') }}
                                <span>لتر</span>
                            </td>

                            <td>
                                {{-- <li class="list-group-item">  --}}
                                {{ \App\Models\Diesel::select('quantity')->whereRaw('MONTH(diesels.date) = 3')->sum('quantity') }}
                                <span>لتر</span>
                            </td>

                            <td>
                                {{-- <li class="list-group-item">  --}}
                                {{ \App\Models\Diesel::select('quantity')->whereRaw('MONTH(diesels.date) = 4')->sum('quantity') }}
                                <span>لتر</span>
                            </td>

                            <td>
                                {{-- <li class="list-group-item">  --}}
                                {{ \App\Models\Diesel::select('quantity')->whereRaw('MONTH(diesels.date) = 5')->sum('quantity') }}
                                <span>لتر</span>
                            </td>

                            <td>
                                {{-- <li class="list-group-item">  --}}
                                {{ \App\Models\Diesel::select('quantity')->whereRaw('MONTH(diesels.date) = 6')->sum('quantity') }}
                                <span>لتر</span>
                            </td>

                            <td>
                                {{-- <li class="list-group-item">  --}}
                                {{ \App\Models\Diesel::select('quantity')->whereRaw('MONTH(diesels.date) = 7')->sum('quantity') }}
                                <span>لتر</span>
                            </td>

                            <td>
                                {{-- <li class="list-group-item">   --}}
                                {{ \App\Models\Diesel::select('quantity')->whereRaw('MONTH(diesels.date) = 8')->sum('quantity') }}
                                <span>لتر</span>
                            </td>


                            <td>
                                {{-- <li class="list-group-item"> --}}
                                {{ \App\Models\Diesel::select('quantity')->whereRaw('MONTH(diesels.date) = 9')->sum('quantity') }}
                                <span>لتر</span>
                            </td>

                            <td>
                                {{-- <li class="list-group-item">   --}}
                                {{ \App\Models\Diesel::select('quantity')->whereRaw('MONTH(diesels.date) = 10')->sum('quantity') }}
                                <span>لتر</span>
                            </td>

                            <td>
                                {{-- <li class="list-group-item">   --}}
                                {{ \App\Models\Diesel::select('quantity')->whereRaw('MONTH(diesels.date) = 11')->sum('quantity') }}
                                <span>لتر</span>
                            </td>

                            <td>
                                {{-- <li class="list-group-item">   --}}
                                {{ \App\Models\Diesel::select('quantity')->whereRaw('MONTH(diesels.date) = 12')->sum('quantity') }}
                                <span>لتر</span>
                            </td>

                            <td>
                                {{ \App\Models\Diesel::count('id') }}</li>
                            </td>
                            <td> {{ \App\Models\Diesel::sum('quantity') }} <span>لتر</span> </li>
                            </td>
                            <td> {{ \App\Models\Diesel::sum('quantity') - \App\Models\DieselExport::sum('quantity') }}
                                <span>لتر</span>
                                </li>
                            </td>

                        </tr>

                    </tbody>
                </table>
            </div>


            <div class="card-footer text-muted ">
                <strong>
                    <a href="http://127.0.0.1:8000/diesel/create">اضافة الوارد</a>
                </strong>
            </div>
        </div>
    </div>
    </div>
    <!-- /.content -->

@endsection

@section('scripts')
    <script src="{{ asset('assets/js/jquery-3.3.1.slim.min.js') }}"></script>

    <script src="{{ asset('assets/js/popper.min.js') }}"></script>

    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>

    <script src="{{ asset('assets/js/jquery.dataTables1.min.js') }}"></script>

    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5', 'excelHtml5', 'pdfHtml5', 'csvHtml5'
                ]
            });
        });
    </script>
@endsection
