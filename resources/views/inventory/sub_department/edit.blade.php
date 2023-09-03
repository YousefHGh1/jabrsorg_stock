@extends('layouts.master')

@section('css') @endsection

@section('title', ' تعديل الأقسام ')
@section('sub_title', ' الأقسام ')
@section('page_title', ' تعديل الأقسام ')

@section('content')

    <!-- \ row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header d-flex" style="justify-content: space-between;">
                    <div class="card-title">
                        <h3 class="card-label"> تعديل الأقسام</h3>
                    </div>
                    <div class="card-toolbar">
                        <button class="btn btn-light">
                            <i class="far fa-eye ml-1" style="color: black;"></i>
                            <a href="{{url('inventory/sub_department')}}" style="font: bolder; color:rgb(0, 0, 0);">
                                عرض الأقسام </a>
                        </button>
                    </div>
                </div>

                <div class="card-body">

                    <form action="{{ route('sub_department.update', $sub_department->id) }}" method="post" class="needs-validation" novalidate
                        enctype="multipart/form-data">
                        @csrf
                        {!! csrf_field() !!}
                        @method('PUT')

                        {{-- 1 --}}
                        <div class="p-3 form-group row">
                            <label for="sub_department_num" class="col-lg-2 col-form-label ">
                                <h6><strong>رقم القسم<span class="tx-danger mr-1">*</span></strong></h6>
                            </label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <input name="sub_department_num" id="sub_department_num" type="number" min="0" class="form-control"
                                        value="{{ $sub_department->sub_department_num }}" autofocus>
                                </div>
                            </div>

                            <label for="sub_department_name" class="col-lg-2 col-form-label ">
                                <h6><strong>اسم القسم<span class="tx-danger mr-1">*</span></strong></h6>
                            </label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <input name="sub_department_name" type="text" class="form-control" id="sub_department_name"
                                        value="{{ $sub_department->sub_department_name }}" />
                                </div>
                            </div>
                        </div>

                        {{-- 2 --}}
                        <div class="p-3 form-group row">
                            <label for="department_id" class="col-lg-2 col-form-label ">
                                <h6><strong>الدائرة<span class="tx-danger mr-1">*</span></strong></h6>
                            </label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <select class="form-control selectpicker " data-size="7" tabindex="null"
                                        data-live-search="true" name="department_id" id="department_id">
                                        <option value="0" disabled selected>الدائرة</option>
                                        @foreach ($department as $departments)
                                            <option value="{{ $departments->id }}"
                                                {{ $sub_department->department_id == $departments->id ? 'selected' : '' }}>
                                                {{ $departments->department_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                        </div>

                        {{-- action --}}
                        <div class="d-flex mt-3" style="margin-right:215px">
                            <button type="submit" class="btn btn-success">تعديل</button>
                            <a type="submit" href="{{ route('sub_department.index') }}" class="mr-2 btn btn-danger">العودة</a>
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
