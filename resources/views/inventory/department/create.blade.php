@extends('layouts.master')

@section('css') @endsection

@section('title', ' إضافة الدوائر ')
@section('sub_title', ' الدوائر ')
@section('page_title', ' إضافة الدوائر ')

@section('content')

    <!-- \ row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                {{-- card-header --}}
                <div class="card-header d-flex" style="justify-content: space-between;">
                    <div class="card-title">
                        <h3 class="card-label"> بيانات الدوائر</h3>
                    </div>
                    <div class="card-toolbar">
                        <button class="btn btn-light">
                            <i class="far fa-eye ml-1" style="color: black;"></i>
                            <a href="{{ url('inventory/department') }}" style="font: bolder; color:black;">
                                عرض الدوائر </a>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('department.store') }}" method="post" enctype="multipart/form-data"
                        autocomplete="off">
                        {{ csrf_field() }} @csrf

                        {{-- 1 --}}
                        <div class="p-3 form-group row">
                            <label for="department_num" class="col-lg-2 col-form-label ">
                                <h6><strong>رقم الدائرة<span class="tx-danger mr-1">*</span></strong></h6>
                            </label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <input name="department_num" id="department_num" type="number" min="0"
                                        class="@error('department_num') is-invalid @enderror form-control "
                                        placeholder="ادخل رقم الدائرة">
                                    @error('department_num')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <label for="department_name" class="col-lg-2 col-form-label ">
                                <h6><strong>اسم الدائرة<span class="tx-danger mr-1">*</span></strong></h6>
                            </label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <input name="department_name" id="department_name" type="text"
                                        class="@error('department_name') is-invalid @enderror form-control "
                                        placeholder="ادخل اسم الدائرة">
                                    @error('department_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-right mt-4" style="margin-right: 215px">
                            <button type="submit" value="Submit" class="btn btn-success">حفظ البيانات</button>
                            <button type="reset" class="btn btn-danger mr-2">إلغاء</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- / row -->

@endsection

@section('js')
@endsection
