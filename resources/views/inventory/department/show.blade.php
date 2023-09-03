@extends('layouts.master')

@section('css') @endsection

@section('title', ' عرض الدوائر ')
@section('sub_title', ' الدوائر ')
@section('page_title', ' عرض الدوائر ')

@section('content')

    <!-- \ row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card card-custom gutter-b example example-compact">

                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-label m-3"> عرض بيانات الدائرة: {{ $department->department_name }} <i class="mr-2"></i></h3>
                        <div class="card-toolbar">

                            <div class="d-flex justify-content-center  " style="margin-right:124px">
                                <a type="submit" href="{{ route('department.index') }}" class="btn btn-primary mr-2">العودة</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    {{-- 1 --}}
                    <div class="p-3 form-group row">
                        <label for="department_num" class="col-lg-2 col-form-label ">
                            <h6><strong>رقم الدائرة<span class="tx-danger mr-1">*</span></strong></h6>
                        </label>
                        <div class="col-lg-3">
                            <div class="input-group">
                                <input name="department_num" id="department_num" type="number" min="0" class="form-control"
                                    value="{{ $department->department_num }}" disabled>
                            </div>
                        </div>

                        <label for="department_name" class="col-lg-2 col-form-label ">
                            <h6><strong>اسم الدائرة<span class="tx-danger mr-1">*</span></strong></h6>
                        </label>
                        <div class="col-lg-3">
                            <div class="input-group">
                                <input name="department_name" id="department_name" type="text" class="form-control"
                                value="{{ $department->department_name }}" disabled>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- / row -->

@endsection

@section('js')
@endsection
