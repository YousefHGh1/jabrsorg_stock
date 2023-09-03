@extends('layouts.master')

@section('css') @endsection

@section('title', ' تعديل الدوائر ')
@section('sub_title', ' الدوائر ')
@section('page_title', ' تعديل الدوائر ')

@section('content')

    <!-- \ row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">

                <div class="card-header d-flex" style="justify-content: space-between;">
                    <div class="card-title">
                        <h3 class="card-label"> تعديل الدوائر</h3>
                    </div>
                    <div class="card-toolbar">
                        <button class="btn btn-light">
                            <i class="far fa-eye ml-1" style="color: black;"></i>
                            <a href="{{url('inventory/department')}}" style="font: bolder; color:rgb(0, 0, 0);">
                                عرض الدوائر </a>
                        </button>
                    </div>
                </div>

                <div class="card-body">

                    <form action="{{ route('department.update',$department->id) }}" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                        @csrf
                        {!! csrf_field() !!}
                        @method('PUT')

                        {{-- 1 --}}
                        <div class="p-3 form-group row">
                            <label for="department_num" class="col-lg-2 col-form-label ">
                                <h6><strong>رقم الدائرة<span class="tx-danger mr-1">*</span></strong></h6>
                            </label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <input name="department_num" id="department_num" type="number" min="0" class="form-control"
                                    value="{{ $department->department_num }}" autofocus>
                                </div>
                            </div>

                            <label for="department_name" class="col-lg-2 col-form-label ">
                                <h6><strong>اسم الدائرة<span class="tx-danger mr-1">*</span></strong></h6>
                            </label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <input name="department_name" id="department_name" type="text" class="form-control"
                                    value="{{ $department->department_name }}">
                                </div>
                            </div>
                        </div>



                        {{-- action --}}
                        <div class="d-flex mt-3" style="margin-right:215px">
                            <button type="submit" class="btn btn-success">تعديل</button>
                            <a type="submit" href="{{ route('department.index') }}" class="mr-2 btn btn-danger">العودة</a>
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
