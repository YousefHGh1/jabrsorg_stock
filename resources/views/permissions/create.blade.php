@extends('layouts.master')
@section('css')
    <!--Internal  Font Awesome -->
    <link href="{{ URL::asset('assets/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!--Internal  treeview -->
    <link href="{{ URL::asset('assets/plugins/treeview/treeview-rtl.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('title', ' اضافة صلاحية')
@section('sub_title', ' الصلاحيات')
@section('page_title', 'اضافة صلاحية')




@section('content')

    {!! Form::open(['route' => 'permissions.store', 'method' => 'POST']) !!}

    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mg-b-20">
                <div class="card-body">

                    <div class="card-header d-flex" style="justify-content: space-between;">
                        <div class="card-title">
                            <h3 class="card-label"> بيانات الصلاحيات </h3>
                        </div>
                        <div class="card-toolbar">
                            <button class="btn btn-light">
                                <i class="far fa-eye ml-1" style="color: black;"></i>
                                <a href="{{ route('permissions.index') }}" style="font: bolder; color:rgb(0, 0, 0);">
                                    عرض الصلاحيات </a>
                            </button>
                        </div>
                    </div>

                    <div class="row g-3 align-items-center p-2 m-1">
                        <div class="col-auto">
                            <label for="name" class="col-form-label">{{ __('اسم الصلاحية  :  ') }} <span
                                    class="tx-danger mr-1">*</span></label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" autofocus class="form-control" name="name" id="name"
                                value="{{ old('name') }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <!-- col -->
                        <div class="col-lg-4">
                            <ul id="treeview1">
                                <li><a href="#">الدور</a>
                                    <ul>
                                </li>

                                @if ($roles->count())
                                    <div class="space-y-2">
                                        <div class="space-x-2">
                                            @foreach ($roles as $id => $name)
                                                <div class="inline-flex space-x-1">
                                                    <input class="rounded-md border-gray-300 shadow-sm" type="checkbox"
                                                        name="roles[]" id="role-{{ $id }}"
                                                        value="{{ $id }}" @checked(old('role-' . $id))>
                                                    <label class="text-sm font-medium text-gray-700"
                                                        for="role-{{ $id }}">{{ $name }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                        @error('roles')
                                            <span class="text-sm text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                @endif
                                </li>

                            </ul>
                            </li>
                            </ul>
                        </div>
                    </div>



                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button class="btn btn-success pd-x-20" type="submit"> {{ __('حفظ') }}
                        </button>
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
