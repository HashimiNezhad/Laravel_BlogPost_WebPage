<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Administration</title>
    <style>
        .status-online {
            color: #24b940;
            font-weight: 500
                /* Green color for online */
        }

        .status-offline {
            color: #6c757d;
            font-weight: 500
                /* Gray color for offline */
        }
    </style>
    <!-- Custom fonts for this template-->
    <link href="{{ asset('backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css') }}">
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"rel="stylesheet"> --}}
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="{{ asset('backend/css/sb-admin-2.css') }}">
    <link href="{{ asset('backend/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.3-dist/css/bootstrap.min.css') }}">
    <script src="https://cdn.tiny.cloud/1/9n3caxsdngzxns43tqytdfjujvtr76xlajf7c67oqy25msjr/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <li>
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                    <div class="mx-2 mt-5 sidebar-brand-text">
                        <img class="admin-Image" src="{{ asset('backend/img/1715461733774.jpg') }}"
                            alt="ProfileImage"><br>
                    </div>
                </a>
            </li>
            <br>

            <!-- Divider -->


            <h5 class="mt-4 text-center text-gray-400">{{ Auth::user()->name }}</h5>
            <h6 class="mt-0 mb-0 text-xs text-center text-gray-500 ">
                {{ Auth::user()->status == 'active' ? 'Online' : 'Offline' }} <br>
                {{ Auth::user()->last_login_at->diffForHumans() }}
            </h6>
            <hr class=" sidebar-divider">
            <!-- Nav Item - Dashboard -->
            <li class=" nav-item">
                <a class=" nav-link" href="{{ route('dashboard') }}">
                    <i class="ml-2 mr-2 material-symbols-outlined">dashboard</i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('post.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <i class="ml-1 mr-2 material-symbols-outlined">post</i>
                    Post
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile.edit') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <i class="ml-1 mr-2 material-symbols-outlined">manage_accounts</i>
                    User Management
                </a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">
            <!-- Sidebar Toggler (Sidebar) -->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="mb-4 shadow bg-cyan-600 navbar navbar-expand navbar-light topbar static-top">

                    <!-- Topbar Navbar -->
                    <!-- Topbar Search -->
                    <form action="{{ route('posts.search') }}" method="GET"
                        class="my-2 mr-auto d-none d-sm-inline-block form-inline ml-md-3 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input required name="query" type="text" class="border-1 form-control bg-light small"
                                placeholder="Search for post titles" aria-label="Search" maxlength="20"
                                aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-success" type="submit">
                                    <i class="mr-2 text-gray-400 material-symbols-outlined">search</i>
                                </button>
                            </div>
                        </div>
                    </form>



                    <ul class="ml-auto navbar-nav">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mt-3 mr-3 text-gray-600">
                                    @if (Auth::check())
                                        <h6>{{ Auth::user()->name }}</h6>
                                        <p class="text-xs text-center">{{ Auth::user()->email }}</p>
                                    @endif
                                </span>

                                <img class="img-profile rounded-circle"
                                    src="{{ asset('backend/img/20240222_232343.jpg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="shadow dropdown-menu dropdown-menu-right animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item d-flex bg-hover-success" href="{{ route('profile.edit') }}">
                                    <i class="mt-2 text-gray-700 material-symbols-outlined">person</i>
                                    <h6 class="mt-3 text-xs text-right text-gray-700 text-hover-success">
                                        {{ Auth::user()->name }}</h6>
                                </a>


                                <div class="dropdown-divider"></div>
                                <form class="dropdown-item " method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="d-flex text-decoration-none" href="route('logout')"
                                        onclick="event.preventDefault();this.closest('form').submit();">
                                        <i class="mr-1 text-gray-700 material-symbols-outlined "> logout</i>
                                        <h6 class="mt-1 text-xs text-right text-gray-700 text-hover-success">Logout</h6>
                                    </a>
                                    <div class="dropdown-divider"></div>


                                </form>

                            </div>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->
                @yield('searchContent')
                @yield('content')
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="my-auto text-center copyright">
                        <div>Copyright © My Website 2024</div>
                        <i class="ml-1 mr-2 material-symbols-outlined">share</i>
                        <i class="ml-1 mr-2 material-symbols-outlined">language</i>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->


    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('backend/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="   {{ asset('backend/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('backend/js/sb-admin-2.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @yield('script')

    <!-- The below script are for laravel file management -->
    <!-- Given from https://unisharp.github.io/laravel-filemanager/integration-->
    <script>
        var editor_config = {
            path_absolute: "/",
            selector: "textarea.my-editor",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback: function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName(
                    'body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document
                    .getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no"
                });
            }
        };
        tinymce.init(editor_config);
    </script>
    <!--End of file manager script-->

    <!--The script below is for Toat notification< when a post created sucessfuly or updated-->
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        @if (Session::has('success'))
            {
                Toast.fire({
                    icon: "success",
                    title: "{{ Session::get('success') }}"
                });
            }
        @endif
    </script>
    <!--End of Success Toast notificatoin-->

</body>

</html>
