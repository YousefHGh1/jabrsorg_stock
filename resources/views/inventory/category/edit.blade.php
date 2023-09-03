@extends('layouts.master')

@section('css') @endsection

@section('title', ' تعديل العائلات ')
@section('sub_title', ' العائلات ')
@section('page_title', ' تعديل العائلات ')

@section('content')

    <!-- \ row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header d-flex" style="justify-content: space-between;">
                    <div class="card-title">
                        <h3 class="card-label"> تعديل العائلات</h3>
                    </div>
                    <div class="card-toolbar">
                        <button class="btn btn-light">
                            <i class="far fa-eye ml-1" style="color: black;"></i>
                            <a href="{{ url('inventory/category') }}" style="font: bolder; color:rgb(0, 0, 0);">
                                عرض العائلات </a>
                        </button>
                    </div>
                </div>

                <div class="card-body">

                    <form action="{{ route('category.update', $category->id) }}" method="post" class="needs-validation"
                        novalidate enctype="multipart/form-data">
                        @csrf
                        {!! csrf_field() !!}
                        @method('PUT')

                        {{-- 1 --}}
                        <div class="row g-3 align-items-center p-2 m-1">
                            <div class="col-auto">
                                <label for="category_num" class="col-form-label">رقم العائلة</label>
                            </div>
                            <div class="col-md-4">
                                <input type="number" name="category_num" id="category_num"  class="form-control"   value="{{ $category->category_num }}"  readonly required >
                            </div>


                            <div class="col-auto">
                                <label for="category_name" class="col-form-label">اسم العائلة</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="category_name" id="category_name" class="form-control"
                                    value="{{ $category->category_name }}">
                            </div>
                        </div>

                        <div class="d-flex mt-3" style="margin-right:110px">
                            <button type="submit" class="btn btn-success">تعديل البيانات</button>
                            <a type="submit" href="{{ route('category.index') }}" class="btn btn-primary mr-2">العودة</a>
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
