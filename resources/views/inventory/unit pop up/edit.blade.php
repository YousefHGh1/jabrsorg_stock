    @extends('layouts.master')

@section('css')

@endsection

@section('title')
تعديل الوحدات
@stop

@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الوحدات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    تعديل الوحدات</span>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <!-- \ row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
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
                            <div class="col-md-10">
                                <input type="number" name="unit_num" id="unit_num"  class="form-control"   value="{{ $unit->unit_num }}" autofocus disabled>
                            </div>
                        </div>

                        {{-- 2 --}}
                        <div class="row g-10 align-items-center p-2 m-1">
                            <div class="col-auto">
                                <label for="unit_name" class="col-form-label">اسم الوحدة</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="unit_name" id="unit_name"  class="form-control"   value="{{ $unit->unit_name }}">
                            </div>
                        </div>

                        {{-- action --}}
                        <div class="d-flex justify-content-center m-3">
                            <button type="submit" class="btn btn-success">تعديل</button>
                            <a type="submit" href="{{ route('unit.index') }}" class="mr-2 btn btn-danger">العودة</a>
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
