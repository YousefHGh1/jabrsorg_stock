@extends('layouts.master')

@section('css') @endsection

@section('title', ' إضافة الموردين ')
@section('sub_title', ' الموردين ')
@section('page_title', ' إضافة الموردين ')

@section('content')
    <!-- \ row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                {{-- card-header --}}
                <div class="card-header d-flex" style="justify-content: space-between;">
                    <div class="card-title">
                        <h3 class="card-label"> بيانات الموردين</h3>
                    </div>
                    <div class="card-toolbar">
                        <button class="btn btn-light">
                            <i class="ml-1 far fa-eye" style="color: black;"></i>
                            <a href="{{ url('inventory/supplier') }}" style="font: bolder; color:black;">
                                عرض الموردين </a>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('supplier.store') }}" method="post" enctype="multipart/form-data"
                        autocomplete="off">
                        {{ csrf_field() }} @csrf

                        {{-- 1 --}}
                        <div class="p-3 form-group row">
                            <label for="supplier_num" class="col-lg-2 col-form-label ">
                                <h6><strong>رقم المورد<span class="mr-1 tx-danger">*</span></strong></h6>
                            </label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <input name="supplier_num" id="supplier_num" type="number" min="0"
                                        class="@error('supplier_num') is-invalid @enderror form-control "
                                        placeholder="ادخل رقم المورد" autofocus>
                                    @error('supplier_num')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <label for="supplier_name" class="col-lg-2 col-form-label ">
                                <h6><strong>اسم المورد<span class="mr-1 tx-danger">*</span></strong></h6>
                            </label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <input name="supplier_name" id="supplier_name" type="text"
                                        class="@error('supplier_name') is-invalid @enderror form-control "
                                        placeholder="ادخل اسم المورد" />
                                    @error('supplier_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- 2 --}}
                        <div class="p-3 form-group row">
                            <label for="address" class="col-lg-2 col-form-label ">
                                <h6><strong>عنوان المورد<span class="mr-1 tx-danger">*</span></strong></h6>
                            </label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <input name="address" id="address" type="text"
                                        class="@error('address') is-invalid @enderror form-control "
                                        placeholder="ادخل عنوان المورد">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <label for="phone" class="col-lg-2 col-form-label ">
                                <h6><strong>هاتف المورد<span class="mr-1 tx-danger">*</span></strong></h6>
                            </label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <input name="phone" id="phone" type="number"
                                        class="@error('phone') is-invalid @enderror form-control "
                                        placeholder="ادخل هاتف المورد">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- 3 --}}
                        <div class="p-3 form-group row">
                            <label for="ipn" class="col-lg-2 col-form-label ">
                                <h6><strong>مرخص تشغيل<span class="mr-1 tx-danger">*</span></strong></h6>
                            </label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <input name="ipn" id="ipn" type="text"
                                        class="@error('ipn') is-invalid @enderror form-control "
                                        placeholder="ادخل مرخص تشغيل">
                                    @error('ipn')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <label for="logo" class="col-lg-2 col-form-label ">
                                <h6><strong>شعار المورد<span class="mr-1 tx-danger">*</span></strong></h6>
                            </label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <input name="logo" id="logo" type="file"
                                        class="@error('logo') is-invalid @enderror form-control "
                                        placeholder="ادخل شعار المورد">
                                    @error('logo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- 4 --}}
                        <div class="p-3 form-group row">
                            <label for="note" class="col-lg-2 col-form-label ">
                                <h6><strong>ملاحظات<span class="mr-1 tx-danger">*</span></strong></h6>
                            </label>
                            <div class="col-lg-8">
                                <div class="input-group">
                                    <textarea name="note" id="note" type="text" class="@error('note') is-invalid @enderror form-control "
                                        placeholder="ادخل الملاحظات"></textarea>
                                    @error('note')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="mt-4 d-flex justify-content-right" style="margin-right: 215px">
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
@endsection
