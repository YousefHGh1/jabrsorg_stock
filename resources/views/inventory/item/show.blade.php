@extends('layouts.master')

@section('css') @endsection

@section('title', ' عرض الأصناف ')
@section('sub_title', ' الأصناف ')
@section('page_title', ' عرض الصنف ')

@section('content')

    <!-- \ row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card card-custom gutter-b example example-compact">

                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-label m-3"> عرض بيانات الصنف : {{ $item->item_name }} <i class="mr-2"></i></h3>
                        <div class="card-toolbar">

                            <div class="d-flex justify-content-center  " style="margin-right:124px">
                                <a type="submit" href="{{ route('item.index') }}" class="btn btn-primary mr-2">العودة</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    {{-- 1 --}}
                    <div class="p-3 form-group row">
                        <label for="item_num" class="col-lg-2 col-form-label ">
                            <h6><strong>رقم الصنف<span class="tx-danger mr-1">*</span></strong></h6>
                        </label>
                        <div class="col-lg-3">
                            <div class="input-group">
                                <input name="item_num" id="item_num" type="number" min="0" class="form-control"
                                    placeholder="ادخل رقم الصنف" value="{{ $item->item_num }}" disabled>
                            </div>
                        </div>

                        <label for="item_name" class="col-lg-2 col-form-label ">
                            <h6><strong>اسم الصنف<span class="tx-danger mr-1">*</span></strong></h6>
                        </label>
                        <div class="col-lg-3">
                            <div class="input-group">
                                <input name="item_name" type="text" class="form-control" id="item_name"
                                    placeholder="ادخل اسم الصنف" value="{{ $item->item_name }}" disabled>
                            </div>
                        </div>
                    </div>

                    {{-- 2 --}}
                    <div class="p-3 form-group row">
                        <label for="category_id" class="col-lg-2 col-form-label ">
                            <h6><strong>العائلة<span class="tx-danger mr-1">*</span></strong></h6>
                        </label>
                        <div class="col-lg-3">
                            <div class="input-group">
                                <select class="form-control selectpicker " data-size="7" tabindex="null" disabled
                                    data-live-search="true" title="أدخل اسم العائلة" name="category_id" id="category_id">
                                    <option value="0" disabled selected>العائلات</option>
                                    @foreach ($category as $categorys)
                                        <option value="{{ $categorys->id }}"
                                            {{ $item->category_id == $categorys->id ? 'selected' : '' }}>
                                            {{ $categorys->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <label for="unit_id " class="col-lg-2 col-form-label ">
                            <h6><strong>الوحدة <span class="tx-danger mr-1">*</span></strong></h6>
                        </label>
                        <div class="col-lg-3">
                            <div class="input-group">
                                <select class="form-control selectpicker " data-size="7" tabindex="null"
                                    data-live-search="true" ر name="unit_id" id="unit_id" disabled>
                                    <option value="0" disabled selected>الوحدة</option>
                                    @foreach ($unit as $units)
                                        <option value="{{ $units->id }}"
                                            {{ $item->unit_id == $units->id ? 'selected' : '' }}>
                                            {{ $units->unit_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- 3 --}}
                    <div class="p-3 form-group row">
                        <label for="open_balance" class="col-lg-2 col-form-label ">
                            <h6><strong>رصيد الافتتاحي<span class="tx-danger mr-1">*</span></strong></h6>
                        </label>
                        <div class="col-lg-3">
                            <div class="input-group">
                                <input name="open_balance" id="open_balance" type="number" min="0"
                                    class="form-control" value="{{ $item->open_balance }}" disabled>
                            </div>
                        </div>
                        <label for="low_limit" class="col-lg-2 col-form-label ">
                            <h6><strong>الحد الأدنى<span class="tx-danger mr-1">*</span></strong></h6>
                        </label>
                        <div class="col-lg-3">
                            <div class="input-group">
                                <input name="low_limit" id="low_limit" type="number" min="0" class="form-control"
                                    placeholder="ادخل الحد الأدنى" value="{{ $item->low_limit }}" disabled>
                            </div>
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
