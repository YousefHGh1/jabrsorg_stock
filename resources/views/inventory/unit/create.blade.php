@extends('layouts.master')

@section('css') @endsection

@section('title', ' إضافة وحدة ')
@section('sub_title', ' الوحدات ')
@section('page_title', ' إضافة وحدة ')

@section('content')

    <!-- \ row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                {{-- card-header --}}
                <div class="card-header d-flex" style="justify-content: space-between;">
                    <div class="card-title">
                        <h3 class="card-label"> إضافة وحدات</h3>
                    </div>
                    <div class="card-toolbar">
                        <button class="btn btn-light">
                            <i class="far fa-eye ml-1" style="color: black;"></i>
                            <a href="{{ url('inventory/unit') }}" style="font: bolder; color:rgb(0, 0, 0);">
                                عرض الوحدات </a>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('unit.store') }}" name="myForm" method="post" novalidate
                        enctype="multipart/form-data" autocomplete="off">
                        {{ csrf_field() }} @csrf

                        {{-- 1 --}}
                        <div class="row g-3 align-items-center p-2 m-1">
                            <div class="col-auto">
                                <label for="unit_num" class=" col-form-label">رقم الوحدة <span
                                        class="tx-danger mr-1">*</span></label>
                            </div>
                            <div class="col-md-4">
                                <input type="number" autofocus name="unit_num" id="unit_num" class="form-control"
                                    value="{{ old('unit_num', $next_num) }}" readonly required>
                            </div>
                            <div class="col-auto">
                                <label for="unit_name" class="col-form-label">اسم الوحدة <span
                                        class="tx-danger mr-1">*</span></label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="unit_name" id="unit_name"
                                    class="@error('unit_name') is-invalid @enderror form-control"
                                    placeholder="ادخل اسم الوحدة" required>
                                @error('unit_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-right mt-4" style="margin-right: 123px">
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
