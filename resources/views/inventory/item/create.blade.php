@extends('layouts.master')

@section('css') @endsection

@section('title', ' اضافة الأصناف ')
@section('sub_title', ' الأصناف ')
@section('page_title', ' إضافة الأصناف ')


@section('content')
    <!-- \ row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                {{-- card-header --}}
                <div class="card-header d-flex" style="justify-content: space-between;">
                    <div class="card-title">
                        <h3 class="card-label"> بيانات الأصناف</h3>
                    </div>
                    <div class="card-toolbar">
                        <button class="btn btn-light">
                            <i class="ml-1 far fa-eye" style="color: black;"></i>
                            <a href="{{ url('inventory/item') }}" style="font: bolder; color:rgb(0, 0, 0);">
                                عرض الأصناف </a>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('item.store') }} " name="myForm" method="post" enctype="multipart/form-data"
                        autocomplete="off">
                        {{ csrf_field() }} @csrf

                        {{-- 1 --}}
                        <div class="p-3 form-group row">
                            <label for="category_id" class="col-lg-2 col-form-label ">
                                <h6><strong>العائلة<span class="mr-1 tx-danger">*</span></strong></h6>
                            </label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <select class="@error('category_id') is-invalid @enderror form-control selectpicker "
                                        data-size="7" tabindex="null" data-live-search="true" title="أدخل اسم العائلة"
                                        name="category_id" id="category_id">
                                        <option value="">اختر اسم العائلة</option>

                                        @foreach ($category as $categorys)
                                            <option value="{{ $categorys->id }}">
                                                {{ $categorys->category_name }}
                                            </option>
                                        @endforeach
                                        {{-- هاي عشان تعمل تحقق لما تختار عائلة  ولازم تعطي القيمه تعت الاوبشن فاضية --}}
                                        @if ($errors->has('category_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('category_id') }}</strong>
                                            </span>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <label for="unit_id " class="col-lg-2 col-form-label ">
                                <h6><strong>الوحدة <span class="mr-1 tx-danger">*</span></strong></h6>
                            </label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <select data-size="7" tabindex="null"
                                        class="@error('unit_id') is-invalid @enderror form-control " data-live-search="true"
                                        title="أدخل اسم الوحدة" name="unit_id" id="unit_id">
                                        <option value="">اختر اسم الوحدة</option>
                                        @foreach ($unit as $units)
                                            <option value="{{ $units->id }}">
                                                {{ $units->unit_name }}
                                            </option>
                                        @endforeach
                                        @if ($errors->has('unit_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('unit_id') }}</strong>
                                            </span>
                                        @endif
                                    </select>

                                </div>
                            </div>
                        </div>

                        {{-- 2 --}}
                        <div class="p-3 form-group row">
                            <label for="item_num" class="col-lg-2 col-form-label ">
                                <h6><strong>رقم الصنف<span class="mr-1 tx-danger">*</span></strong></h6>
                            </label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <input name="item_num" id="item_num" type="number"
                                        min="0"class="@error('item_name') is-invalid @enderror form-control selectpicker "
                                        placeholder="ادخل رقم الصنف" autofocus>
                                    @error('item_num')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <label for="item_name" class="col-lg-2 col-form-label ">
                                <h6><strong>اسم الصنف<span class="mr-1 tx-danger">*</span></strong></h6>
                            </label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <input name="item_name"
                                        type="text"class="@error('item_name') is-invalid @enderror form-control selectpicker "
                                        id="item_name" placeholder="ادخل اسم الصنف" />
                                    @error('item_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- 3 --}}
                        <div class="p-3 form-group row">
                            <label for="open_balance" class="col-lg-2 col-form-label ">
                                <h6><strong>رصيد الافتتاحي<span class="mr-1 tx-danger">*</span></strong></h6>
                            </label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <input name="open_balance" id="open_balance" type="number" min="0"
                                        class="@error('open_balance') is-invalid @enderror form-control"
                                        placeholder="ادخل رصيد الافتتاحي">
                                    @error('open_balance')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <label for="low_limit" class="col-lg-2 col-form-label ">
                                <h6><strong>الحد الأدنى<span class="mr-1 tx-danger">*</span></strong></h6>
                            </label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <input name="low_limit" id="low_limit" type="number" min="0"
                                        class="@error('low_limit') is-invalid @enderror form-control"placeholder="ادخل الحد الأدنى">
                                    @error('low_limit')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- 4 --}}
                        <div class="p-3 form-group row">
                            <label for="status" class="col-lg-2 col-form-label">
                                <h6><strong>نوع الصنف<span class="mr-1 tx-danger">*</span></strong></h6>
                            </label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <select class="@error('status') is-invalid @enderror form-control selectpicker "
                                        data-size="7" tabindex="null" data-live-search="true" title="أدخل اسم العائلة"
                                        name="status" id="status">
                                        <option value="">اختر نوع الصنف</option>
                                        <option value="1">{{ 'أصل' }}</option>
                                        <option value="2">{{ 'استهلاك' }}</option>
                                        
                                        @if ($errors->has('status'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('status') }}</strong>
                                            </span>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        {{-- 5 --}}
                        <div class="p-3 form-group row" hidden>
                            <label for="balance" class="col-lg-2 col-form-label">
                                <h6><strong>الرصيد<span class="mr-1 tx-danger">*</span></strong></h6>
                            </label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <input name="balance" id="balance" type="number" min="0"
                                        class="form-control" disabled>
                                </div>
                            </div>
                        </div>



                        {{-- action --}}
                        <div class="mt-3 d-flex" style="margin-right: 215px;">
                            <button type="submit" value="Submit" class="btn btn-success">حفظ البيانات</button>
                            <button type="reset" class="mr-2 btn btn-danger">إلغاء</button>
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
