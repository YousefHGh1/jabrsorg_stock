@extends('layouts.master')

@section('css') @endsection

@section('title', ' عرض الموردين ')
@section('sub_title', ' الموردين ')
@section('page_title', ' عرض الموردين ')

@section('content')

    <!-- \ row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card card-custom gutter-b example example-compact">

                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-label m-3"> عرض بيانات المورد: {{ $supplier->supplier_name }} <i class="mr-2"></i></h3>
                        <div class="card-toolbar">

                            <div class="d-flex justify-content-center  " style="margin-right:124px">
                                <a type="submit" href="{{ route('supplier.index') }}" class="btn btn-primary mr-2">العودة</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    {{-- 1 --}}
                    <div class="p-3 form-group row">
                        <label for="supplier_num" class="col-lg-2 col-form-label ">
                            <h6><strong>رقم المورد<span class="tx-danger mr-1">*</span></strong></h6>
                        </label>
                        <div class="col-lg-3">
                            <div class="input-group">
                                <input name="supplier_num" id="supplier_num" type="number" min="0" class="form-control"
                                    value="{{ $supplier->supplier_num }}" disabled>
                            </div>
                        </div>

                        <label for="supplier_name" class="col-lg-2 col-form-label ">
                            <h6><strong>اسم المورد<span class="tx-danger mr-1">*</span></strong></h6>
                        </label>
                        <div class="col-lg-3">
                            <div class="input-group">
                                <input name="supplier_name" id="supplier_name" type="text" class="form-control"
                                value="{{ $supplier->supplier_name }}" disabled>

                            </div>
                        </div>
                    </div>

                    {{-- 2 --}}
                    <div class="p-3 form-group row">
                        <label for="address" class="col-lg-2 col-form-label ">
                            <h6><strong>عنوان المورد<span class="tx-danger mr-1">*</span></strong></h6>
                        </label>
                        <div class="col-lg-3">
                            <div class="input-group">
                                <input name="address" id="address" type="text"  class="form-control"
                                value="{{ $supplier->address }}" disabled>
                            </div>
                        </div>

                        <label for="phone" class="col-lg-2 col-form-label ">
                            <h6><strong>هاتف المورد<span class="tx-danger mr-1">*</span></strong></h6>
                        </label>
                        <div class="col-lg-3">
                            <div class="input-group">
                                <input name="phone" id="phone" type="number" class="form-control"
                                value="{{ $supplier->phone }}" disabled>
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
