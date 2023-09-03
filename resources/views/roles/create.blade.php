@extends('layouts.master')
@section('css')
    <!--Internal  Font Awesome -->
    <link href="{{ URL::asset('assets/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!--Internal  treeview -->
    <link href="{{ URL::asset('assets/plugins/treeview/treeview-rtl.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('title', ' اضافة أدوار ')
@section('sub_title', 'أدوار')
@section('page_title', 'اضافة أدوار')

@section('content')
    {!! Form::open(['route' => 'roles.store', 'method' => 'POST']) !!}
    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mg-b-20">
                <div class="card-body">
                        <div class="card-header d-flex" style="justify-content: space-between;">
                            <div class="card-title">
                                <h3 class="card-label"> بيانات الأدوار </h3>
                            </div>
                            <div class="card-toolbar">
                                <button class="btn btn-light">
                                    <i class="far fa-eye ml-1" style="color: black;"></i>
                                    <a href="{{ route('roles.index') }}" style="font: bolder; color:rgb(0, 0, 0);">
                                        عرض الأدوار </a>
                                </button>
                            </div>
                        </div>
                    <div class="main-content-label mg-b-5">
                        <div class="row g-3 align-items-center p-2 m-1">
                            <div class="col-auto">
                                <label for="name" class="col-form-label">{{ __('اسم الدور  :  ') }} <span
                                        class="tx-danger mr-1">*</span></label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" autofocus class="form-control" name="name" id="name"
                                    value="{{ old('name') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- col -->
                        <div class="col-lg-7">
                            <ul id="treeview1">
                                <li><a href="#">الصلاحيات</a>
                                    <ul>
                                </li>
                                @foreach ($permission as $value)
                                    <label
                                        style="font-size: 16px;">{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name']) }}
                                        {{ $value->name }}</label>
                                @endforeach
                                </li>

                            </ul>
                            </li>
                            </ul>
                        </div>
                        <!-- /col -->
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-main-primary">تاكيد</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->
    {!! Form::close() !!}
@endsection

@section('js')
    <!-- Internal Treeview js -->
    <script src="{{ URL::asset('assets/plugins/treeview/treeview.js') }}"></script>
@endsection
