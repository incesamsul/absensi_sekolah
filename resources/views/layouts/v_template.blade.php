@include('layouts.v_header')
@include('layouts.v_nav')
@include('layouts.v_sidebar')
      <div class="main-panel">
        <div class="content">
            <div class="panel-header bg-primary-gradient">
                <div class="page-inner py-5">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                        <div>
                            <h2 class="text-white pb-2 fw-bold">{{ isset($headerTitle) ? $headerTitle : '' }}</h2>
                            <h5 class="text-white op-7 mb-2">{{ isset($headerSubTitle) ? $headerSubTitle : '' }}</h5>
                        </div>
                        <div class="ml-md-auto py-2 py-md-0">
                            @yield('btn1')
                            @yield('btn2')
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-inner mt--5">
                @yield('content')


            </div>
        </div>


@include('layouts.v_footer')
<script src="{{ asset('js/script.js') }}"></script>
@yield('script')
