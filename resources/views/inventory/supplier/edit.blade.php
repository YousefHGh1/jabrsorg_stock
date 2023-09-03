@extends('layouts.master')

@section('css') @endsection

@section('title', ' تعديل الموردين ')
@section('sub_title', ' الموردين ')
@section('page_title', ' تعديل الموردين ')

@section('content')

    <!-- \ row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">

                <div class="card-header d-flex" style="justify-content: space-between;">
                    <div class="card-title">
                        <h3 class="card-label"> تعديل الموردين</h3>
                    </div>
                    <div class="card-toolbar">
                        <button class="btn btn-light">
                            <i class="ml-1 far fa-eye" style="color: black;"></i>
                            <a href="{{ url('inventory/supplier') }}" style="font: bolder; color:rgb(0, 0, 0);">
                                عرض الموردين </a>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('supplier.update', $supplier->id) }}" method="post" class="needs-validation"
                        novalidate enctype="multipart/form-data">
                        @csrf
                        {!! csrf_field() !!}
                        @method('PUT')

                        {{-- 1 --}}
                        <div class="p-3 form-group row">
                            <label for="supplier_num" class="col-lg-2 col-form-label ">
                                <h6><strong>رقم المورد<span class="mr-1 tx-danger">*</span></strong></h6>
                            </label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <input name="supplier_num" id="supplier_num" type="number" min="0"
                                        class="form-control" value="{{ $supplier->supplier_num }}" autofocus>
                                </div>
                            </div>

                            <label for="supplier_name" class="col-lg-2 col-form-label ">
                                <h6><strong>اسم المورد<span class="mr-1 tx-danger">*</span></strong></h6>
                            </label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <input name="supplier_name" id="supplier_name" type="text" class="form-control"
                                        value="{{ $supplier->supplier_name }}">
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
                                    <input name="address" id="address" type="text" class="form-control"
                                        value="{{ $supplier->address }}">
                                </div>
                            </div>

                            <label for="phone" class="col-lg-2 col-form-label ">
                                <h6><strong>هاتف المورد<span class="mr-1 tx-danger">*</span></strong></h6>
                            </label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <input name="phone" id="phone" type="number" class="form-control"
                                        value="{{ $supplier->phone }}">
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
                                      value="{{ $supplier->ipn }}">
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
                                        value="{{ $supplier->logo }}">
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
                                       value="{{ $supplier->note }}"></textarea>
                                    @error('note')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- action --}}
                        <div class="mt-3 d-flex" style="margin-right:215px">
                            <button type="submit" class="btn btn-success">تعديل</button>
                            <a type="submit" href="{{ route('supplier.index') }}" class="mr-2 btn btn-danger">العودة</a>
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
