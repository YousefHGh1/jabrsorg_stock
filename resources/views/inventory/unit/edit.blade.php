@extends('layouts.master')

@section('title', ' تعديل الوحدات ')
@section('sub_title', ' الوحدات ')
@section('page_title', ' تعديل الوحدات ')

@section('content')

    <!-- \ row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">

                <div class="card-header d-flex" style="justify-content: space-between;">
                    <div class="card-title">
                        <h3 class="card-label"> تعديل الوحدات</h3>
                    </div>
                    <div class="card-toolbar">
                        <button class="btn btn-light">
                            <i class="far fa-eye ml-1" style="color: black;"></i>
                            <a href="{{url('inventory/unit')}}" style="font: bolder; color:rgb(0, 0, 0);">
                                عرض الوحدات </a>
                        </button>
                    </div>
                </div>

                <div class="card-body">

                    <form action="{{ route('unit.update',$unit->id) }}" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                        @csrf
                        {!! csrf_field() !!}
                        @method('PUT')

                        {{-- 1 --}}
                        <div class="row g-3 align-items-center p-2 m-1">
                            <div class="col-auto">
                                <label for="unit_num" class="col-form-label">رقم الوحدة</label>
                            </div>
                            <div class="col-md-4">
                                <input type="number" name="unit_num" id="unit_num"  class="form-control"   value="{{ $unit->unit_num }}" readonly required >
                            </div>
                            <div class="col-auto">
                                <label for="unit_name" class="col-form-label">اسم الوحدة</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="unit_name" id="unit_name"  class="form-control"   value="{{ $unit->unit_name }}" autofocus>
                            </div>
                        </div>

                        <div class="d-flex justify-content-right mt-2 " style="margin-right:124px">
                            <button type="submit" class="btn btn-success">تعديل البيانات</button>
                        <a type="submit" href="{{ route('unit.index') }}" class="btn btn-primary mr-2">العودة</a>
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
