@extends('backend.layout.master')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <span class="mb-4 text-gray-800 h3">Dashboard View</span>
        {{-- <p>Last Login: {{ $user->last_login_at ? $user->last_login_at->diffForHumans() : 'Never logged in' }}</p>
        <p>LogoutDate{{ 'Last Seen:' . $user->last_logout_at ? \Carbon\Carbon::parse($user->last_logout_at)->diffForHumans() : 'Welcome to our website' }}
        </p> --}}
        <br><br>
        <div class=" row d-flex">
            <div class="ml-5 card col-md-7 border-l-cyan-950">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="mt-2">Websites Admins</h5>
                    <a href="#" class="float-right btn btn-primary " style="background-color:#289dc7;">Add</a>
                </div>
                <div class="card-body">
                    <form action="">
                        <table class="table border">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>name</th>
                                    <th>status</th>
                                    <th>Last Seen</th>
                                    <th class="text-success"> Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td><span
                                                class="{{ $user->status == 'active' ? 'status-online' : 'status-offline' }}">
                                                {{ $user->status == 'active' ? 'Online' : 'Offline' }}
                                            </span></td>
                                        <td>{{ $user->last_login_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('profile.destroy') }}" class="delete"> <i
                                                    class="material-symbols-outlined text-danger">delete</i></a>
                                            <a class="edit" href="{{ route('profile.edit') }}"> <i
                                                    class=" material-symbols-outlined text-warning">edit_square</i></a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </form>
                </div>



            </div>
            <!-- Circular bar-->
            <div class="container col-md-4 ">
                <div class="shadow card card-custom border-success">
                    <div class="mx-auto text-center card-body">
                        <h5 class="card-title">Online Admins</h5>
                        <div class="circle">
                            <div class=" circle-text h3">{{ $userCount }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <!--Card Row-->
        <div class="row">
            <!-- Number of Admin Users Card Example -->
            <div class="mb-4 col-xl-3 col-md-6">
                <div class="py-2 shadow card border-left-primary h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="mx-auto mr-2 col">
                                <div class="mb-1 ml-2 text-xs font-weight-bold text-primary text-uppercase">
                                    Website Admins</div>
                                <div class="mb-0 ml-5 text-gray-800 h4 font-weight-bold">
                                    {{ $userCount }}</div>

                            </div>
                            <div class="col-auto">
                                <i class="mr-5 text-gray-400 h1 material-symbols-outlined">account_circle</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Number of Posts -->
            <div class="mb-4 col-xl-3 col-md-6">
                <div class="py-2 shadow card border-left-warning h-100">
                    <div class=" card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="mr-2 col">
                                <div class="mb-1 ml-3 text-xs font-weight-bold text-warning text-uppercase">
                                    Number of Posts</div>
                                <div class="mb-0 ml-5 text-gray-800 h4 font-weight-bold">{{ $totalPosts }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="mr-5 text-gray-400 h1 material-symbols-outlined">post_add</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Trashed Post Perentage -->
            <div class="mb-4 col-xl-3 col-md-6">
                <div class="py-2 shadow card border-left-danger h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="mr-2 col">
                                <div class="mb-1 text-xs font-weight-bold text-info text-uppercase text-danger">Trashed
                                    Posts
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="mb-0 ml-3 mr-1 text-gray-800 h5 font-weight-bold">
                                            {{ $trashedPosts }}%</div>
                                    </div>
                                    <div class="col">
                                        <div class="mr-0 progress progress-sm">
                                            <div class="progress-bar bg-danger" role="progressbar"
                                                style="width: {{ $trashedPosts }}%" aria-valuenow="{{ $trashedPosts }}%"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto mb-1">
                                <i class="mb-4 text-gray-300 material-symbols-outlined">restore_from_trash</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Tasks Card Example -->
            <div class="mb-4 col-xl-3 col-md-6">
                <div class="py-2 shadow card border-left-info h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="mr-2 col">
                                <div class="mb-1 text-xs font-weight-bold text-info text-uppercase">Tasks
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="mb-0 ml-3 mr-3 text-gray-800 h5 font-weight-bold">
                                            77%</div>
                                    </div>
                                    <div class="col">
                                        <div class="mr-2 progress progress-sm">
                                            <div class="progress-bar bg-info" role="progressbar" style="width:77%"
                                                aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="text-gray-300 fas fa-clipboard-list fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Circular -->


        </div>


    </div>
    <!-- /.container-fluid -->
@endsection
