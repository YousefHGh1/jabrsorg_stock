@extends('layouts.master2')
@section('title')
    إنشاء حساب - برنامج المخازن
@stop

@section('css')
    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{ URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css') }}"
        rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <!-- The content half -->
            <div class="bg-white col-md-7 col-lg-7 col-xl-7">
                <div class="py-2 login d-flex align-items-center">
                    <!-- Demo content-->
                    <div class="container p-3">
                        <div class="row">
                            <div class="mx-auto col-md-12 col-lg-12 col-xl-12">
                                <div class="card-sigin">
                                    <div class="mb-5 d-flex"> <a href="{{ url('/' . ($page = 'Home')) }}"><img
                                                src="{{ URL::asset('assets/img/stock.png') }}" class="sign-favicon ht-40"
                                                alt="logo"></a>
                                        <h2 class="mr-3">{{ __('التسجيل في برنامج المخازن') }}</h2>
                                    </div>
                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            <form method="POST" action="{{ route('register') }}">
                                                @csrf

                                                <div class="mb-3 row">
                                                    <label for="name"
                                                        class="col-md-4 col-form-label text-md-end">{{ __('اسم المستخدم') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="name" type="text"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            name="name" value="{{ old('name') }}" required
                                                            autocomplete="name" autofocus placeholder="ادخل اسم المستخدم">

                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label for="email"
                                                        class="col-md-4 col-form-label text-md-end">{{ __('البريد الالكتروني') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="email" type="email"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            name="email" value="{{ old('email') }}" required
                                                            autocomplete="email" placeholder="ادخل البريد الالكتروني">

                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label for="password"
                                                        class="col-md-4 col-form-label text-md-end">{{ __('كلمه السر') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="password" type="password"
                                                            class="form-control @error('password') is-invalid @enderror"
                                                            name="password" required autocomplete="new-password"
                                                            placeholder="ادخل كلمه السر">

                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label for="password-confirm"
                                                        class="col-md-4 col-form-label text-md-end">{{ __('تأكيد كلمه السر') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="password-confirm" type="password" class="form-control"
                                                            name="password_confirmation" required
                                                            autocomplete="new-password" placeholder="تأكيد كلمه السر">
                                                    </div>
                                                </div>


                                                <div class="mb-3 row">
                                                    <label for="password-confirm"
                                                        class="col-md-4 col-form-label text-md-end">{{ __(' الدائرة') }}</label>

                                                    <div class="col-md-6">
                                                        <select onclick="console.log($(this).val())"
                                                            onchange="console.log('change is firing')"
                                                            class="@error('department_id') is-invalid @enderror form-control mg-b-20"
                                                            data-size="7" tabindex="null" data-live-search="true"
                                                            title="أدخل اسم الدائرة" name="department_id"
                                                            id="department_id">
                                                            <option value="">اختر اسم الدائرة</option>

                                                            @foreach ($department as $departments)
                                                                <option value="{{ $departments->id }}">
                                                                    {{ $departments->department_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label for="password-confirm"
                                                        class="col-md-4 col-form-label text-md-end">{{ __('  القسم') }}</label>

                                                    <div class="col-md-6">
                                                        <select data-size="7" tabindex="null"
                                                        class="@error('sub_department_id') is-invalid @enderror form-control mg-b-20"
                                                        data-live-search="true" title="أدخل اسم القسم" aria-placeholder="ادخل اسم القسم"
                                                        name="sub_department_id" id="sub_department_id">
                                                    </select>
                                                    </div>
                                                </div>



                                                <div class="mb-0 row">
                                                    <div class="col-md-9 offset-md-4 d-flex justify-content-between">
                                                        <div class="col-md-3"></div>
                                                        <button type="submit" class="btn btn-primary mr-3">
                                                            {{ __('التسجيل') }}
                                                        </button>

                                                        <label class="mr-5 mt-2 form-check-label" for="remember">
                                                            <a href="{{ route('login') }}"style="text-decoration: none">أمتلك
                                                                حساب !!</a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->

            <div class="col-md-5 col-lg-5 col-xl-5">
                <img src="{{ URL::asset('assets/img/Spreadsheets-amico.png') }}" width="100%" height="100%"
                    alt="logo">
            </div>

        </div>
    </div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $('select[name="department_id"]').on('change', function() {
            var department_id = $(this).val();
            if (department_id) {
                $.ajax({
                    url: "{{ URL::to('getdepartment') }}/" + department_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="sub_department_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="sub_department_id"]').append(
                                '<option value="' +
                                value + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
@endsection
