@extends('layouts.master')

@section('css') @endsection

@section('title', ' تعديل المخازن ')
@section('sub_title', ' المخازن ')
@section('page_title', ' تعديل المخازن ')

@section('content')

    <!-- \ row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">

                <div class="card-header d-flex" style="justify-content: space-between;">
                    <div class="card-title">
                        <h3 class="card-label"> تعديل المخازن</h3>
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

                    <form action="{{ route('store.update', $store->id) }}" method="post" class="needs-validation" novalidate
                        enctype="multipart/form-data">
                        @csrf
                        {!! csrf_field() !!}
                        @method('PUT')

                        {{-- 1 --}}
                        <div class="row g-3 align-items-center p-2 m-1">
                            <div class="col-auto">
                                <label for="store_num" class="col-form-label">رقم المخزن<span
                                        class="tx-danger mr-1">*</span></label>
                            </div>
                            <div class="col-md-4 ">
                                <input type="number" name="store_num" id="store_num" class="form-control"
                                   value="{{ $store->store_num }}" >
                            </div>
                               <div class="col-auto">
                                <label for="store_name" class="col-form-label">اسم المخزن<span
                                        class="tx-danger mr-1">*</span></label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="store_name" id="store_name" class="form-control"
                                    value="{{ $store->store_name }}" autofocus>
                            </div>
                        </div>


                        {{-- 3 --}}
                        <div class="row g-10 align-items-center pr-4 ">
                            <div class="col-auto">
                                <label for="address" class="col-form-label">عنوان المخزن<span
                                        class="tx-danger mr-1">*</span></label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="address" id="address" class="form-control"
                                    value="{{ $store->address }}">
                            </div>
                        </div>

                        {{-- action --}}
                        <div class="d-flex mt-5" style="margin-right:130px">
                            <button type="submit" class="btn btn-success">تعديل</button>
                            <a type="submit" href="{{ route('store.index') }}" class="mr-2 btn btn-danger">العودة</a>
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
