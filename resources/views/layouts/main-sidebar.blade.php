<style>
    #profileicon {
        position: absolute;
        top: 50px;
        left: 80px;
    }

    #aaa li a,
    .side-menu__label,
    a,
    #aaa h4,
    #aaa span {
        color: white;
    }
</style>

<!-- main-sidebar -->
<div class="app-sidebar__overlay " data-toggle="sidebar "></div>
<aside class="bg-gray-900 app-sidebar sidebar-scroll ">
    <div class="main-sidebar-header active">
        <a href="{{ url('/') }}"><img src="{{ URL::asset('assets/img/stock.png') }}" class="logo-1"
                style="margin-right:76px" alt="logo" width="50px" height="50px"></a>
        {{-- <h2 class="mt-3 mr-2"><a href="{{ url('/') }}">المخازن</a></h2> --}}
    </div>

    <div class="main-sidemenu color-white" id="sidecolor">

        <div class="clearfix mb-1 app-sidebar__user">
            <div class="dropdown user-pro-body">
                <div class="" id="aaa">

                    <!-- Image -->
                    <img alt="user-img" class="avatar avatar-xl brround" style="margin-top:-10px;"
                        src="{{ URL::asset('assets/img/faces/person.png') }}">
                    <span id="profileicon" class="avatar-status profile-status bg-green"></span>

                    <div class="user-info" style="margin-top:-10px;">
                        <!-- Nmae & Email -->
                        <h4 class="mt-3 mb-0 font-weight-semibold">{{ Auth::user()->name }}</h4>
                        <span class="mb-0">{{ Auth::user()->email }}</span>
                    </div>
                </div>

            </div>
        </div>
        {{-- @can('مدير النظام') --}}
        <ul class="side-menu">

            @can('العائلات')
                <!-- Categories -->
                <li class="slide" id="aaa">
                    <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="ml-2 bi bi-collection" viewBox="0 0 16 16">
                            <path
                                d="M2.5 3.5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm2-2a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7zm1.5.5A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-13z" />
                        </svg>
                        <span class="side-menu__label">العائلات</span><i class="angle fe fe-chevron-down"></i></a>

                    <ul class="slide-menu">
                        @can('اضافة العائلات')
                            <li><a class="slide-item" href="{{ url('/' . ($page = 'inventory/category/create')) }}">إضافة
                                    عائلات</a></li>
                        @endcan
                        @can('عرض العائلات')
                            <li><a class="slide-item" href="{{ url('/' . ($page = 'inventory/category')) }}">عرض العائلات</a>
                            </li>
                        @endcan


                    </ul>
                </li>
            @endcan

            @can('الوحدات')
                <!-- Units -->
                <li class="slide" id="aaa">
                    <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="ml-2 bi bi-unity" viewBox="0 0 16 16">
                            <path
                                d="M15 11.2V3.733L8.61 0v2.867l2.503 1.466c.099.067.099.2 0 .234L8.148 6.3c-.099.067-.197.033-.263 0L4.92 4.567c-.099-.034-.099-.2 0-.234l2.504-1.466V0L1 3.733V11.2v-.033.033l2.438-1.433V6.833c0-.1.131-.166.197-.133L6.6 8.433c.099.067.132.134.132.234v3.466c0 .1-.132.167-.198.134L4.031 10.8l-2.438 1.433L7.983 16l6.391-3.733-2.438-1.434L9.434 12.3c-.099.067-.198 0-.198-.133V8.7c0-.1.066-.2.132-.233l2.965-1.734c.099-.066.197 0 .197.134V9.8L15 11.2Z" />
                        </svg>
                        <span class="side-menu__label">الوحدات</span><i class="angle fe fe-chevron-down"></i></a>

                    <ul class="slide-menu">
                        @can('اضافة الوحدات')
                            <li><a class="slide-item" href="{{ url('/' . ($page = 'inventory/unit/create')) }}">إضافة
                                    الوحدات</a></li>
                        @endcan
                        @can('عرض الوحدات')
                            <li><a class="slide-item" href="{{ url('/' . ($page = 'inventory/unit')) }}">عرض الوحدات</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can('الأصناف')
                <!-- Items -->
                <li class="slide" id="aaa">
                    <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="ml-2 bi bi-diagram-3" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M6 3.5A1.5 1.5 0 0 1 7.5 2h1A1.5 1.5 0 0 1 10 3.5v1A1.5 1.5 0 0 1 8.5 6v1H14a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 2 7h5.5V6A1.5 1.5 0 0 1 6 4.5v-1zM8.5 5a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1zM0 11.5A1.5 1.5 0 0 1 1.5 10h1A1.5 1.5 0 0 1 4 11.5v1A1.5 1.5 0 0 1 2.5 14h-1A1.5 1.5 0 0 1 0 12.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm4.5.5A1.5 1.5 0 0 1 7.5 10h1a1.5 1.5 0 0 1 1.5 1.5v1A1.5 1.5 0 0 1 8.5 14h-1A1.5 1.5 0 0 1 6 12.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm4.5.5a1.5 1.5 0 0 1 1.5-1.5h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z" />
                        </svg>
                        <span class="side-menu__label">الأصناف</span><i class="angle fe fe-chevron-down"></i></a>

                    <ul class="slide-menu">
                        @can('اضافة الأصناف')
                            <li><a class="slide-item" href="{{ url('/' . ($page = 'inventory/item/create')) }}">إضافة
                                    الأصناف</a></li>
                        @endcan
                        @can('عرض الأصناف')
                            <li><a class="slide-item" href="{{ url('/' . ($page = 'inventory/item')) }}">عرض الأصناف</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can('المخازن')
                <!-- store -->
                <li class="slide" id="aaa">
                    <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="ml-2 bi bi-shop" viewBox="0 0 16 16">
                            <path
                                d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z" />
                        </svg>
                        <span class="side-menu__label">المخازن</span><i class="angle fe fe-chevron-down"></i></a>

                    <ul class="slide-menu">
                        @can('اضافة المخازن')
                            <li><a class="slide-item" href="{{ url('/' . ($page = 'inventory/store/create')) }}">إضافة
                                    المخازن</a></li>
                        @endcan
                        @can('عرض المخازن')
                            <li><a class="slide-item" href="{{ url('/' . ($page = 'inventory/store')) }}">عرض المخازن</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can('الموردين')
                <!-- supplier -->
                <li class="slide" id="aaa">
                    <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="ml-2 bi bi-people" viewBox="0 0 16 16">
                            <path
                                d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z" />
                        </svg>
                        <span class="side-menu__label">الموردين</span><i class="angle fe fe-chevron-down"></i></a>

                    <ul class="slide-menu">
                        @can('اضافة الموردين')
                            <li><a class="slide-item" href="{{ url('/' . ($page = 'inventory/supplier/create')) }}">إضافة
                                    الموردين</a></li>
                        @endcan

                        @can('عرض الموردين')
                            <li><a class="slide-item" href="{{ url('/' . ($page = 'inventory/supplier')) }}">عرض الموردين</a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcan

            @can('وارد الأصناف')
                <!-- invoice -->
                <li class="slide" id="aaa">
                    <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}">
                        <i class="ml-2 si si-call-in"></i>
                        <span class="side-menu__label">وارد الأصناف</span><i class="angle fe fe-chevron-down"></i></a>

                    <ul class="slide-menu">
                        @can('اضافة وارد الأصناف')
                            <li><a class="slide-item" href="{{ url('/' . ($page = 'inventory/invoice/create')) }}">إضافة
                                    الأصناف الواردة</a></li>
                        @endcan
                        @can('عرض وارد الأصناف')
                            <li><a class="slide-item" href="{{ url('/' . ($page = 'inventory/invoice')) }}">عرض الأصناف
                                    الواردة</a>
                            @endcan

                        </li>
                    </ul>
                </li>
            @endcan

            @can('صادر الأصناف')
                <!-- invoice_export -->
                <li class="slide" id="aaa">
                    <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}">
                        <i class="ml-2 si si-call-out"></i>
                        <span class="side-menu__label">صادر الأصناف</span><i class="angle fe fe-chevron-down"></i></a>

                    <ul class="slide-menu">
                        @can('اضافة صادر الأصناف')
                            <li><a class="slide-item"
                                    href="{{ url('/' . ($page = 'inventory/invoice_export/create')) }}">إضافة
                                    الأصناف الصادرة</a></li>
                        @endcan

                        @can('عرض صادر الأصناف')
                            <li><a class="slide-item" href="{{ url('/' . ($page = 'inventory/invoice_export')) }}">عرض
                                    الأصناف
                                    الصادرة</a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcan

            @can('العهد')
                <!-- custody -->
                <li class="slide" id="aaa">
                    <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}">
                        <i class="ml-2 mdi mdi-account-key"></i>
                        <span class="side-menu__label"> العهد</span><i class="angle fe fe-chevron-down"></i></a>

                    <ul class="slide-menu">
                        @can('اضافة العهد')
                            <li><a class="slide-item" href="{{ url('/' . ($page = 'inventory/custody/create')) }}">إضافة
                                    العهد</a></li>
                        @endcan

                        @can('عرض العهد')
                            <li><a class="slide-item" href="{{ url('/' . ($page = 'inventory/custody')) }}">عرض العهد
                                </a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcan

            @can('الدائرة')
                <!-- Departments -->
                <li class="slide" id="aaa">
                    <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}">
                        <i class="ml-2 la la-lg la-home"></i>
                        <span class="side-menu__label">الدوائر</span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        @can('اضافة الدائرة')
                            <li><a class="slide-item" href="{{ url('/' . ($page = 'inventory/department/create')) }}">اضافة
                                    دائرة </a></li>
                        @endcan

                        @can('عرض الدائرة')
                            <li><a class="slide-item" href="{{ url('/' . ($page = 'inventory/department')) }}"> عرض الدائرة
                                </a>
                            </li>
                        @endcan

                        @can('القسم')
                            @can('اضافة القسم')
                                <li><a class="slide-item" href="{{ url('/' . ($page = 'inventory/sub_department/create')) }}">
                                        اضافة الأقسام </a></li>
                            @endcan

                            @can('عرض القسم')
                                <li><a class="slide-item" href="{{ url('/' . ($page = 'inventory/sub_department')) }}">عرض
                                        الأقسام
                                    </a>
                                </li>
                            @endcan

                        @endcan

                    </ul>
                </li>
            @endcan

            @can('التقارير')
                <!-- report -->
                <li class="slide" id="aaa">
                    <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}">
                        <i class="ml-2 far fa-file-alt"></i>
                        <span class="side-menu__label">التقارير</span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        @can('تقرير المجاميع')
                            <li><a class="slide-item" href="{{ url('/' . ($page = 'totalreport')) }}">تقرير المجاميع
                                </a></li>
                        @endcan
                        @can('تقرير حركة الأصناف')
                            <li><a class="slide-item" href="{{ url('/' . ($page = 'transactions_report')) }}">تقرير حركة
                                    الأصناف
                                </a>
                            </li>
                        @endcan
                        @can('تقرير الجرد')
                            <li><a class="slide-item" href="{{ url('/' . ($page = 'elgard')) }}">تقرير الجرد
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can('الاعدادات')
                <!-- Setting -->
                <li class="slide" id="aaa">
                    <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}">
                        <i class="ml-2 la la-lg la-cog"></i>
                        <span class="side-menu__label">الإعدادات</span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">

                        @can('الصلاحيات')
                            <li>
                                <a class="slide-item" href="{{ url('/' . ($page = 'permissions')) }}">الصلاحيات</a>
                            </li>
                        @endcan

                        @can('الأدوار')
                            <li>
                                <a class="slide-item" href="{{ url('/' . ($page = 'roles')) }}">أدوار</a>
                            </li>
                        @endcan

                        @can('المستخدمين')
                            <li>
                                <a class="slide-item" href="{{ url('/' . ($page = 'users')) }}">المستخدمين</a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcan

        </ul>
        {{-- @endcan --}}
    </div>
</aside>
<!-- main-sidebar -->
