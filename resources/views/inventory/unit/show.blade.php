@extends('layouts.master')

@section('css') @endsection

@section('title', ' عرض الوحدة ')
@section('sub_title', ' الوحدات ')
@section('page_title', ' عرض الوحدة ')

@section('content')

    <!-- \ row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card card-custom gutter-b example example-compact">

                {{-- <div class="card-title">
                    <h3 class="card-label m-3"> عرض بيانات الوحدة : {{$unit->unit_name}} <i class="mr-2"></i></h3>

                </div> --}}
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-label m-3"> عرض بيانات الوحدة : {{ $unit->unit_name }} <i class="mr-2"></i></h3>
                        <div class="card-toolbar">

                            <div class="d-flex justify-content-center  " style="margin-right:124px">
                                <a type="submit" href="{{ route('unit.index') }}" class="btn btn-primary mr-2">العودة</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    {{-- 1 --}}
                    <div class="row g-3 align-items-center p-2 m-1">
                        <div class="col-auto">
                            <label for="unit_num" class="col-form-label">رقم الوحدة</label>
                        </div>
                        <div class="col-md-4">
                            <input name="unit_num" id="unit_num" type="number" min="0" class="form-control"
                                value="{{ $unit->unit_num }}" disabled>
                        </div>
                        <div class="col-auto">
                            <label for="unit_name" class="col-form-label">اسم الوحدة</label>
                        </div>
                        <div class="col-md-4">
                            <input name="unit_name" id="unit_name" type="text" class="form-control"
                                value="{{ $unit->unit_name }}" disabled>
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
