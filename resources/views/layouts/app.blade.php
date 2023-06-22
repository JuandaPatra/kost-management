{{--
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }} aa
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>
--}}


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>
        {{ config('app.name') }} - @yield('title')
    </title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <!-- todo: css/script -->
    <link rel="stylesheet" href="{{ asset('vendor/my-dashboard/fonts/boxicons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/my-dashboard/css/core.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/my-dashboard/css/theme-default.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/my-auth/css/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/my-dashboard/css/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/my-dashboard/js/perfect-scrollbar/perfect-scrollbar.css') }}">
    <script src="{{ asset('vendor/my-dashboard/js/helpers.js') }}"></script>
    <script src="{{ asset('vendor/my-dashboard/js/config.js') }}"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    

    {{-- css:external --}}
    @stack('css-external')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet" />
</head>

<body>
    <!-- begin:navbar -->
    {{-- @include('admin.layouts._dashboard.navbar') --}}

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('admin.layouts._dashboard.sidebar')
            <div class="layout-page">
                @include('admin.layouts._dashboard.navbar')
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="toast-new"></div>

                        @yield('breadcrumbs')
                        @yield('content')
                    </div>
                    <!-- / Content -->
                    <!-- Footer -->
                    @include('admin.layouts._dashboard.footer')
                    <!-- / Footer -->
                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
        </div>
    </div>

    <!-- scripts -->
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script src="{{ asset('vendor/my-dashboard/js/jquery/jquery.js') }}"></script>
    <script src="{{ asset('vendor/my-dashboard/js/bootstrap.js') }}"></script>
    <script src="{{ asset('vendor/my-dashboard/js/popper/popper.js') }}"></script>
    <script src="{{ asset('vendor/my-dashboard/js/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('vendor/my-dashboard/js/menu.js') }}"></script>
    <script src="{{ asset('vendor/my-dashboard/js/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('vendor/my-dashboard/js/main.js') }}"></script>
    
    <!-- <script src="{{asset('js/app.js')}}"></script> -->

    {{-- sweet alert --}}
    {{--@include('sweetalert::alert') --}}
    {{-- javascript:external --}}
    @stack('javascript-external')
    @stack('javascript-internal')


    <script>
        let base_url = window.location.origin;

        $('.updateSkor').on('click', function() {
            $.ajax({
                url: `${base_url}/admin/updateScore`,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                error: function(xhr, error) {
                    if (xhr.status === 500) {}
                },
                success: (response) => {
                    // console.log(response);
                    location.reload()
                }
            })
        })

        $('.close-notif').on('click', function() {
            let close = $(this).attr('data-close');


            $.ajax({
                url: `${base_url}/notification-close/${close}`,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                error: function(xhr, error) {
                    if (xhr.status === 500) {}
                },
                success: (response) => {
                    $('.badge-notif').empty()
                    $('.badge-notif').text(response[1])

                    let itemList = $(`.item-notif-list-${close}`)
                    itemList.remove()
                }
            })


        })

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('dcfca9ae57e3fd3cee06', {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe('messages');
        channel.bind("App\\Events\\MessageCreated", function(data) {
            // alert(JSON.stringify(data));
            let datas = JSON.stringify(data.pos_invoice)
            var result = datas.slice(1, -1);

            $.ajax({
                url: `${base_url}/notifications`,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                error: function(xhr, error) {
                    if (xhr.status === 500) {}
                },
                success: (response) => {
                    $('.badge-notif').empty()
                    $('.badge-notif').append(response[1])
                    for (let i = 0; i <= response[0].length; i++) {
                        $('.list-group').append(`
                        <li class="list-group-item list-group-item-action dropdown-notifications-item item-notif-list-${response[0][i].id}">
                            <div class="d-flex">
                              <div class="flex-shrink-0 me-3">
                                <div class="avatar">
                                  <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/1.png" alt="" class="w-px-40 h-auto rounded-circle">
                                </div>
                              </div>
                              <div class="flex-grow-1">
                                <h6 class="mb-1">Pembayaran Diterima🎉</h6>
                                <p class="mb-0">${response[0][i].name}</p>
                                <small class="text-muted">${response[0][i].time}</small>
                              
                              </div>
                              <div class="flex-shrink-0 dropdown-notifications-actions">
                                <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                <a href="javascript:void(0)" class="dropdown-notifications-archive close-notif" data-toggle="tooltip" data-placement="right" title="Click to make this notifications read" data-close="${response[0][i].id}" ><span class="bx bx-x"></span></a>
                              </div>
                            </div>
                          </li>
                        `)
                    }
                }
            })
        });

        
    </script>
</body>

</html>