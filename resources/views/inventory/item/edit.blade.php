@extends('layouts.master')

@section('css') @endsection

@section('title', ' تعديل الأصناف ')
@section('sub_title', ' الأصناف ')
@section('page_title', ' تعديل الأصناف ')

@section('content')

    <!-- \ row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header d-flex" style="justify-content: space-between;">
                    <div class="card-title">
                        <h3 class="card-label"> تعديل الأصناف</h3>
                    </div>
                    <div class="card-toolbar">
                        <button class="btn btn-light">
                            <i class="far fa-eye ml-1" style="color: black;"></i>
                            <a href="{{ url('inventory/item') }}" style="font: bolder; color:rgb(0, 0, 0);">
                                عرض الأصناف </a>
                        </button>
                    </div>
                </div>

                <div class="card-body">

                    <form action="{{ route('item.update', $item->id) }}" method="post" class="needs-validation" novalidate
                        enctype="multipart/form-data">
                        @csrf
                        {!! csrf_field() !!}
                        @method('PUT')

                        {{-- 1 --}}
                        <div class="p-3 form-group row">
                            <label for="item_num" class="col-lg-2 col-form-label ">
                                <h6><strong>رقم الصنف<span class="tx-danger mr-1">*</span></strong></h6>
                            </label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <input name="item_num" id="item_num" type="number" min="0" class="form-control"
                                        value="{{ $item->item_num }}" autofocus>
                                </div>
                            </div>

                            <label for="item_name" class="col-lg-2 col-form-label ">
                                <h6><strong>اسم الصنف<span class="tx-danger mr-1">*</span></strong></h6>
                            </label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <input name="item_name" type="text" class="form-control" id="item_name"
                                        value="{{ $item->item_name }}" />
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
                                    <select class="form-control selectpicker " data-size="7" tabindex="null"
                                        data-live-search="true" name="category_id" id="category_id">
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
                                        data-live-search="true" name="unit_id" id="unit_id">
                                        <option value="0" disabled selected>لوحدات</option>
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
                                        class="form-control" value="{{ $item->open_balance }}" />
                                </div>
                            </div>
                            <label for="low_limit" class="col-lg-2 col-form-label ">
                                <h6><strong>الحد الأدنى<span class="tx-danger mr-1">*</span></strong></h6>
                            </label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <input name="low_limit" id="low_limit" type="number" min="0"
                                        class="form-control" value="{{ $item->low_limit }}" />
                                </div>
                            </div>
                        </div>

                        <div class="p-3 form-group row" hidden>
                            <label for="balance" class="col-lg-2 col-form-label">
                                <h6><strong>الرصيد<span class="tx-danger mr-1">*</span></strong></h6>
                            </label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <input name="balance" id="balance" type="number" min="0"
                                        class="form-control" disabled>
                                </div>
                            </div>
                        </div>

                        {{-- action --}}
                        <div class="d-flex mt-3" style="margin-right:215px">
                            <button type="submit" class="btn btn-success">تعديل</button>
                            <a type="submit" href="{{ route('item.index') }}" class="mr-2 btn btn-danger">العودة</a>
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
