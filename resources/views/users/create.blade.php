@extends('layouts.master')
@section('css')
    <!-- Internal Nice-select css  -->
    <link href="{{ URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />
@endsection

@section('title', ' اضافة المستخدمين ')
@section('sub_title', 'المستخدمين')
@section('page_title', 'اضافة المستخدمين')

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">

            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12 margin-tb">
                        <div class="card-header d-flex" style="justify-content: space-between;">
                            <div class="card-title">
                                <h3 class="card-label"> بيانات المستخدمين </h3>
                            </div>
                            <div class="card-toolbar">
                                <button class="btn btn-light">
                                    <i class="far fa-eye ml-1" style="color: black;"></i>
                                    <a href="{{ route('users.index') }}" style="font: bolder; color:rgb(0, 0, 0);">
                                        عرض المستخدمين </a>
                                </button>
                            </div>
                        </div>
                    </div><br>
                    <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2"
                        action="{{ route('users.store', 'test') }}" method="post">
                        {{ csrf_field() }}
                        {{-- 1 --}}
                        <div class="row g-3 align-items-center p-2 m-1">
                            <div class="col-auto">
                                <label>اسم المستخدم: <span class="tx-danger">*</span></label>
                            </div>
                            <div class="col-md-4">
                                <input class="form-control mg-b-20" data-parsley-class-handler="#lnWrapper" name="name" placeholder="ادخل اسم المستخدم"
                                    required="" type="text">
                            </div>
                            <div class="col-auto">
                                <label>البريد الالكتروني: <span class="tx-danger">*</span></label>
                            </div>
                            <div class="col-md-4">
                                <input class="form-control mg-b-20" data-parsley-class-handler="#lnWrapper" name="email" placeholder="ادخل البريد الالكتروني"
                                    required="" type="email">
                            </div>
                        </div>

                        {{-- 2 --}}
                        <div class="row g-3 align-items-center p-2 m-1">
                            <div class="col-auto">
                                <label>كلمة المرور: <span class="tx-danger">*</span></label>
                            </div>
                            <div class="col-md-4">
                                <input class="form-control" data-parsley-class-handler="#lnWrapper" name="password" placeholder="ادخل كلمة المرور" aria-hidden="true"
                                    required="" type="password">
                            </div>
                            <div class="col-auto">
                                <label> تاكيد كلمة المرور: <span class="tx-danger">*</span></label>
                            </div>
                            <div class="col-md-4">
                                <input class="form-control mg-b-20" data-parsley-class-handler="#lnWrapper"
                                    name="confirm-password" required="" type="password" placeholder="تاكيد كلمة المرور" aria-hidden="true">
                            </div>
                        </div>

                        {{-- 3 --}}
                        <div class="row g-3 align-items-center p-2 m-1">
                            <div class="col-auto">
                                <label>الدائرة: <span class="tx-danger">*</span></label>
                            </div>
                            <div class="col-md-4">
                                <select onclick="console.log($(this).val())" onchange="console.log('change is firing')"
                                class="@error('department_id') is-invalid @enderror form-control mg-b-20"
                                data-size="7" tabindex="null" data-live-search="true" title="أدخل اسم الدائرة"
                                name="department_id" id="department_id">
                                <option value="">اختر اسم الدائرة</option>

                                @foreach ($department as $departments)
                                    <option value="{{ $departments->id }}">
                                        {{ $departments->department_name }}
                                    </option>
                                @endforeach
                            </select>
                            </div>
                            <div class="col-auto">
                                <label> القسم: <span class="tx-danger">*</span></label>
                            </div>
                            <div class="col-md-4">
                                <select data-size="7" tabindex="null"
                                class="@error('sub_department_id') is-invalid @enderror form-control mg-b-20"
                                data-live-search="true" title="أدخل اسم القسم" name="sub_department_id"
                                id="sub_department_id">
                            </select>
                            </div>
                        </div>
                        
                        {{-- 4 --}}
                        <div class="row mg-b-20">
                            <div class="col-xs-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label"> صلاحية / دور المستخدم</label>
                                    {!! Form::select('roles_name[]', $roles, [], ['class' => 'form-control', 'multiple']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button class="btn btn-success pd-x-20" type="submit"> {{ __('حفظ') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
@endsection

@section('js')
    <!-- Internal Nice-select js-->
    <script src="{{ URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js') }}"></script>
    <!--Internal  Parsley.min js -->
    <script src="{{ URL::asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>
    <!-- Internal Form-validation js -->
    <script src="{{ URL::asset('assets/js/form-validation.js') }}"></script>


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
