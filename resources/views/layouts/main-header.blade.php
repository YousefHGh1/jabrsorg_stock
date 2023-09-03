<!-- main-header opened -->
<div class="sticky main-header side-header nav nav-item">
    <div class="container-fluid">
        <div class="main-header-left ">
            <div class="responsive-logo">
                <a href="{{ url('/' . ($page = 'index')) }}"><img src="{{ URL::asset('assets/img/brand/logo.png') }}"
                        class="logo-1" alt="logo"></a>
                <a href="{{ url('/' . ($page = 'index')) }}"><img
                        src="{{ URL::asset('assets/img/brand/logo-white.png') }}" class="dark-logo-1" alt="logo"></a>
                <a href="{{ url('/' . ($page = 'index')) }}"><img src="{{ URL::asset('assets/img/brand/favicon.png') }}"
                        class="logo-2" alt="logo"></a>
                <a href="{{ url('/' . ($page = 'index')) }}"><img src="{{ URL::asset('assets/img/brand/favicon.png') }}"
                        class="dark-logo-2" alt="logo"></a>
            </div>
            <div class="app-sidebar__toggle" data-toggle="sidebar">
                <a class="open-toggle" href="#"><i class="header-icon fe fe-align-left"></i></a>
                <a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
            </div>
            <div class="mr-3 main-header-center d-sm-none d-md-none d-lg-block">
                {{-- @if (count(Auth::user()->unreadNotifications) > 0)
                <div class="alert alert-success mt-3">
                    لديك {{ count(Auth::user()->unreadNotifications) }} إشعارات غير مقروءة
                    <button type="button" class="close" data-dismiss="alert">×</button>
                </div>
            @endif --}}
            </div>
        </div>
        <div class="main-header-right">
            {{-- flagssssssss --}}
            <ul class="nav">
                <li class="">
                    <div class="dropdown nav-itemd-none d-md-flex">
                        <a href="#" class="pl-0 d-flex nav-item nav-link country-flag1" data-toggle="dropdown"
                            aria-expanded="false">
                            <span class="mr-0 bg-transparent avatar country-Flag align-self-center"><img
                                    src="{{ URL::asset('assets/img/flags/Palestine.png') }}" alt="img"></span>
                            <div class="my-auto">
                                <strong class="my-auto ml-2 mr-2">English</strong>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow" x-placement="bottom-end">
                            <a href="#" class="dropdown-item d-flex ">
                                <span class="ml-3 bg-transparent avatar align-self-center"><img
                                        src="{{ URL::asset('assets/img/flags/Palestine.png') }}" alt="img"></span>
                                <div class="d-flex">
                                    <span class="mt-2">العربية</span>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item d-flex">
                                <span class="ml-3 bg-transparent avatar align-self-center">
                                    <img src="{{ URL::asset('assets/img/flags/us_flag.jpg') }}" alt="img">
                                </span>
                                <div class="d-flex">
                                    <span class="mt-2">English</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="ml-auto nav nav-item navbar-nav-right">
                {{-- <div class="nav-link" id="bs-example-navbar-collapse-1">
                    <form class="navbar-form" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="input-group-btn">
                                <button type="reset" class="btn btn-default">
                                    <i class="fas fa-times"></i>
                                </button>
                                <button type="submit" class="btn btn-default nav-link resp-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-search">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg>
                                </button>
                            </span>
                        </div>
                    </form>
                </div> --}}

                {{-- message --}}
                <div class="dropdown nav-item main-header-message ">
                    <a class="new nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg"
                            class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-mail">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                            </path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg><span class=" pulse-danger"></span></a>
                    <div class="dropdown-menu">
                        <div class="text-right menu-header-content bg-primary">
                            <div class="d-flex">
                                <h6 class="mb-1 text-white dropdown-title tx-15 font-weight-semibold">الرسائل_الأصناف
                                </h6>

                            </div>
                            <p class="pb-0 mb-0 text-white dropdown-title-text subtext op-6 tx-12 ">الأصناف التي أرصدتها
                                أقل من الحد الأدنى</p>
                        </div>
                        <div class="main-message-list chat-scroll">
                            <a href="#" class="p-1 = border-bottom">
                                @foreach ($allitems as $allitem)
                                    <div class="wd-90p">
                                        <div class="d-flex">
                                            @if ($allitem->balance <= $allitem->low_limit)
                                                <P class="mb-1 name" style="color:black">{{ $allitem->item_name }}</P>
                                                <P class="mb-1 name" style="color:black">{{ $allitem->balance }}</P>
                                            @endif

                                        </div>
                                    </div>
                                    <br> <!-- إضافة سطر جديد بعد كل صنف -->
                                @endforeach
                            </a>
                        </div>
                        <div class="text-center dropdown-footer">
                            <a href="{{ route('item.index') }}" style="color:black"> عرض الاصناف</a>
                        </div>
                    </div>
                </div>
                {{-- notification --}}
                <div class="dropdown nav-item main-header-notification">
                    <a class="new nav-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-bell">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                        </svg><span class=" pulse"></span></a>
                    <div class="dropdown-menu">
                        <div class="text-right menu-header-content bg-primary">
                            <div class="d-flex">
                                <h6 class="mb-1 text-white dropdown-title tx-15 font-weight-semibold">Notifications
                                </h6>
                                <span class="float-left my-auto mr-auto badge badge-pill badge-warning">Mark All
                                    Read</span>
                            </div>
                            <p class="pb-0 mb-0 text-white dropdown-title-text subtext op-6 tx-12 ">
                                {{ Auth::User()->unreadNotifications->count() }}</p>
                        </div>

                        <div class=" tab-menu-heading">
                            <div class="tabs-menu1">
                                <!-- Tabs -->
                                <ul class="nav panel-tabs main-nav-line">
                                    <li><a href="#tab1" class="nav-link active" data-toggle="tab">فواتير الشراء</a>
                                    </li>
                                    <li><a href="#tab2" class="nav-link " data-toggle="tab">فواتير الصرف</a></li>
                                    <li><a href="#tab3" class="nav-link " data-toggle="tab"> العهد</a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="border panel-body tabs-menu-body main-content-body-right">
                            <div class="tab-content">
                                {{-- الشراء --}}
                                <div class="tab-pane active" id="tab1">
                                    <div class="main-notification-list Notification-scroll">
                                        @foreach (Auth::User()->unreadNotifications as $bills)
                                            <div class="p-3 d-flex border-bottom">
                                                <div class="notifyimg bg-warning">
                                                    <i class="text-white la la-envelope-open"></i>
                                                </div>
                                                <div class="mr-3">
                                                    @isset($bills->data['invoice_id'])
                                                        <a href="{{ route('invoice.show', $bills->data['invoice_id']) }}" class="mb-1 notification-label">
                                                            {{ $bills->data['invoice_id'] }}
                                                        </a>
                                                    @endisset
                                                    @isset($bills->data['voucher_no'])
                                                        <h5 class="mb-1 notification-label">
                                                            {{ $bills->data['voucher_no'] }}
                                                        </h5>
                                                    @endisset
                                                    @isset($bills->data['voucher_date'])
                                                        <div class="notification-subtext">
                                                            {{ $bills->data['voucher_date'] }}
                                                        </div>
                                                    @endisset
                                                </div>
                                                <div class="mr-auto">
                                                    <i class="text-left las la-angle-left text-muted"></i>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>


                                {{-- الصرف --}}
                                <div class="tab-pane" id="tab2">
                                    <div class="main-notification-list Notification-scroll">
                                        @foreach (Auth::User()->unreadNotifications as $bills1)
                                            <div class="p-3 d-flex border-bottom">
                                                <div class="notifyimg bg-warning">
                                                    <i class="text-white la la-envelope-open"></i>
                                                </div>
                                                <div class="mr-3">
                                                    @isset ($bills1->data['export_id'])
                                                        <a href="{{ route('invoice_export.show', $bills1->data['export_id']) }}"
                                                            class="mb-1 notification-label">
                                                            {{ $bills1->data['export_id'] }}
                                                        </a>
                                                    @endisset
                                                    <h5 class="mb-1 notification-label">
                                                        @isset ($bills1->data['export_voucher_no'])
                                                            {{ $bills1->data['export_voucher_no'] }}
                                                        @endisset
                                                    </h5>
                                                    <div class="notification-subtext">
                                                        @isset ($bills1->data['export_voucher_date'])
                                                            {{ $bills1->data['export_voucher_date'] }}
                                                        @endisset
                                                    </div>
                                                </div>
                                                <div class="mr-auto">
                                                    <i class="text-left las la-angle-left text-muted"></i>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                {{-- العهد --}}
                                <div class="tab-pane" id="tab3">
                                    <div class="main-notification-list Notification-scroll">
                                        @foreach (Auth::User()->unreadNotifications as $bills2)
                                            <div class="p-3 d-flex border-bottom">
                                                <div class="notifyimg bg-warning">
                                                    <i class="text-white la la-envelope-open"></i>
                                                </div>
                                                <div class="mr-3">
                                                    @isset ($bills2->data['custody_id'])
                                                        <a href="{{ route('custody.show', $bills2->data['custody_id']) }}"
                                                            class="mb-1 notification-label">
                                                            {{ $bills2->data['custody_id'] }}
                                                        </a>
                                                    @endisset
                                                    <h5 class="mb-1 notification-label">
                                                        @isset ($bills2->data['custody_num'])
                                                            {{ $bills2->data['custody_num'] }}
                                                        @endisset
                                                    </h5>
                                                    <div class="notification-subtext">
                                                        @isset ($bills2->data['custody_date'])
                                                            {{ $bills2->data['custody_date'] }}
                                                        @endisset
                                                    </div>
                                                </div>
                                                <div class="mr-auto">
                                                    <i class="text-left las la-angle-left text-muted"></i>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="dropdown-footer">
                            <a href="" style="color:black">VIEW ALL</a>
                        </div>
                    </div>
                </div>
                {{-- full screen --}}
                <div class="nav-item full-screen fullscreen-button">
                    <a class="new nav-link full-screen-link" href="#"><svg xmlns="http://www.w3.org/2000/svg"
                            class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-maximize">
                            <path
                                d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3">
                            </path>
                        </svg></a>
                </div>
                {{-- profile --}}
                <div class="dropdown main-profile-menu nav nav-item nav-link">
                    <a class="profile-user d-flex" href=""><img alt=""
                            src="{{ URL::asset('assets/img/faces/person.png') }}"></a>
                    <div class="dropdown-menu">
                        <div class="p-3 main-header-profile bg-primary">
                            <div class="d-flex wd-100p">
                                <div class="main-img-user"><img alt=""
                                        src="{{ URL::asset('assets/img/faces/person.png') }}" class=""></div>
                                <div class="my-auto mr-3">
                                    <h6>{{ Auth::user()->name }}</h6><span>{{ Auth::user()->email }}</span>
                                </div>
                            </div>
                        </div>
                        <a class="dropdown-item" href="{{ url('/profile') }}"><i
                                class="bx bx-user-circle"></i>الحساب الشخصي</a>
                        <a class="dropdown-item" href=""><i class="bx bxs-inbox"></i>Inbox</a>
                        <a class="dropdown-item" href=""><i class="bx bx-envelope"></i>Messages</a>
                        <a class="dropdown-item" href=""><i class="bx bx-slider-alt"></i> Account Settings</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="bx bx-log-out"> </i>تسجيل خروج</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /main-header -->
