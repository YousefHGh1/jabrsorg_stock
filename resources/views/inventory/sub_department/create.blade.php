@extends('layouts.master')

@section('css') @endsection

@section('title', ' إضافة الأقسام ')
@section('sub_title', ' الأقسام ')
@section('page_title', ' إضافة الأقسام ')

@section('content')

    <!-- \ row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                {{-- card-header --}}
                <div class="card-header d-flex" style="justify-content: space-between;">
                    <div class="card-title">
                        <h3 class="card-label"> بيانات الأقسام</h3>
                    </div>
                    <div class="card-toolbar">
                        <button class="btn btn-light">
                            <i class="far fa-eye ml-1" style="color: black;"></i>
                            <a href="{{url('/inventory/sub_department')}}" style="font: bolder; color:rgb(0, 0, 0);">
                                عرض الأقسام </a>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('sub_department.store') }} " name="myForm" method="post" enctype="multipart/form-data"
                        autocomplete="off">
                        {{ csrf_field() }} @csrf

                        {{-- 1 --}}
                        <div class="p-3 form-group row">
                            <label for="department_id" class="col-lg-2 col-form-label ">
                                <h6><strong>الدائرة<span class="tx-danger mr-1">*</span></strong></h6>
                            </label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <select class="@error('department_id') is-invalid @enderror form-control selectpicker "
                                        data-size="7" tabindex="null" data-live-search="true" title="أدخل اسم الدائرة"
                                        name="department_id" id="department_id">
                                        <option value="">اختر اسم الدائرة</option>

                                        @foreach ($department as $departments)
                                            <option value="{{ $departments->id }}">
                                                {{ $departments->department_name }}
                                            </option>
                                        @endforeach
                                        {{-- هاي عشان تعمل تحقق لما تختار عائلة  ولازم تعطي القيمه تعت الاوبشن فاضية --}}
                                        @if ($errors->has('department_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('department_id') }}</strong>
                                            </span>
                                        @endif
                                    </select>

                                </div>
                            </div>


                        </div>

                        {{-- 2 --}}
                        <div class="p-3 form-group row">
                            <label for="sub_department_num" class="col-lg-2 col-form-label ">
                                <h6><strong>رقم القسم<span class="tx-danger mr-1">*</span></strong></h6>
                            </label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <input name="sub_department_num" id="sub_department_num" type="number"
                                        min="0"class="@error('sub_department_name') is-invalid @enderror form-control selectpicker "
                                        placeholder="ادخل رقم القسم" autofocus>
                                    @error('sub_department_num')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <label for="sub_department_name" class="col-lg-2 col-form-label ">
                                <h6><strong>اسم القسم<span class="tx-danger mr-1">*</span></strong></h6>
                            </label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <input name="sub_department_name"
                                        type="text"class="@error('sub_department_name') is-invalid @enderror form-control selectpicker "
                                        id="sub_department_name" placeholder="ادخل اسم القسم" />
                                    @error('sub_department_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>



                        {{-- action --}}
                        <div class="d-flex mt-3" style="margin-right: 215px;">
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
