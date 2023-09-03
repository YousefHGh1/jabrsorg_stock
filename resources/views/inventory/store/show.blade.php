@extends('layouts.master')

@section('css') @endsection

@section('title', ' عرض المخازن ')
@section('sub_title', ' المخازن ')
@section('page_title', ' عرض المخازن ')

@section('content')

    <!-- \ row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card card-custom gutter-b example example-compact">

                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-label m-3"> عرض بيانات المخزن: {{ $store->store_name }} <i class="mr-2"></i></h3>
                        <div class="card-toolbar">

                            <div class="d-flex justify-content-center  " style="margin-right:124px">
                                <a type="submit" href="{{ route('store.index') }}" class="btn btn-primary mr-2">العودة</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    {{-- 1 --}}
                    <div class="row g-3 align-items-center p-2 m-1">
                        <div class="col-auto">
                            <label for="store_num" class="col-form-label">رقم المخزن </label>
                        </div>
                        <div class="col-md-4">
                            <input name="store_num" id="store_num" type="number" min="0" class="form-control"
                                value="{{ $store->store_num }}" disabled>
                        </div>
                        <div class="col-auto">
                            <label for="store_name" class="col-form-label">اسم المخزن</label>
                        </div>
                        <div class="col-md-4">
                            <input name="store_name" id="store_name" type="text" class="form-control"
                                value="{{ $store->store_name }}" disabled>
                        </div>
                    </div>

                    {{-- 2 --}}
                    <div class="row g-10 align-items-center p-2 ">
                        <div class="col-auto">
                            <label for="address" class="col-form-label">عنوان المخزن</label>
                        </div>
                        <div class="col-md-4">
                            <input name="address" id="address" type="text" class="form-control"
                                value="{{ $store->address }}" disabled>
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
