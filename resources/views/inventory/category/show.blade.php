@extends('layouts.master')

@section('css') @endsection

@section('title', ' عرض العائلات ')
@section('sub_title', ' العائلات ')
@section('page_title', ' عرض العائلات ')

@section('content')

    <!-- \ row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card card-custom gutter-b example example-compact">

                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-label m-3"> عرض بيانات العائلة: {{ $category->category_name }} <i class="mr-2"></i>
                        </h3>
                        <div class="card-toolbar">

                            <div class="d-flex justify-content-center  " style="margin-right:124px">
                                <a type="submit" href="{{ route('category.index') }}"
                                    class="btn btn-primary mr-2">العودة</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    {{-- 1 --}}
                    <div class="row g-3 align-items-center p-2 m-1">
                        <div class="col-auto">
                            <label for="category_num" class="col-form-label">رقم العائلة</label>
                        </div>
                        <div class="col-md-4">
                            <input name="category_num" id="category_num" type="number" min="0" class="form-control"
                                value="{{ $category->category_num }}" disabled>
                        </div>
                        <div class="col-auto">
                            <label for="category_name" class="col-form-label">اسم العائلة</label>
                        </div>
                        <div class="col-md-4">
                            <input name="category_name" id="category_name" type="text" class="form-control"
                                value="{{ $category->category_name }}" disabled>
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
