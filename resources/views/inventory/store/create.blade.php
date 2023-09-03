@extends('layouts.master')

@section('css') @endsection

@section('title', ' إضافة المخازن ')
@section('sub_title', ' المخازن ')
@section('page_title', ' إضافة المخازن ')

@section('content')
    <!-- \ row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                {{-- card-header --}}
                <div class="card-header d-flex" style="justify-content: space-between;">
                    <div class="card-title">
                        <h3 class="card-label"> بيانات المخازن</h3>
                    </div>
                    <div class="card-toolbar">
                        <button class="btn btn-light">
                            <i class="far fa-eye ml-1" style="color: black;"></i>
                            <a href="{{url('inventory/store')}}" style="font: bolder; color:rgb(0, 0, 0);">
                                عرض المخازن </a>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('store.store') }}" name="myForm" method="post" enctype="multipart/form-data"
                        autocomplete="off">
                        {{ csrf_field() }} @csrf

                        {{-- 1 --}}
                        <div class="p-3 form-group row">
                            <label for="store_num" class="col-lg-2 col-form-label ">
                                <h6><strong>رقم المخزن<span class="tx-danger mr-1">*</span></strong></h6>
                            </label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <input type="number" autofocus name="store_num" id="store_num"
                                    class="@error('store_num') is-invalid @enderror form-control"
                                       placeholder="ادخل رقم المخزن"   >
                                        @error('store_num')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <label for="unit_id " class="col-lg-2 col-form-label ">
                                <h6><strong>اسم المخزن <span class="tx-danger mr-1">*</span></strong></h6>
                            </label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <input type="text" name="store_name" id="store_name"
                                        class="@error('store_name') is-invalid @enderror form-control"
                                        placeholder="ادخل اسم المخزن">
                                    @error('store_name')
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
                                <h6><strong>عنوان المخزن<span class="tx-danger mr-1">*</span></strong></h6>
                            </label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <input type="text" name="address" id="address"
                                        class="@error('address') is-invalid @enderror form-control"
                                        placeholder="ادخل عنوان المخزن">
                                    @error('address')
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
