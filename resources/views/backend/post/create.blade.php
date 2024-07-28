@extends('backend.layout.master')
@section('content')
    <!--The Post Create page -->
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="mb-4 text-gray-800 h3">Dashboard</h1>
        <div class="card">
            <div class="uppercase card-header"> Create Post
                <a href="{{ route('post.index') }}" class="float-right btn btn-light btn-outline-success ">back to posts
                    <i class="float-right pl-1 mt-1 mr-1 material-symbols-outlined">arrow_forward</i></a>
            </div>
            <div class="card-body">
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" placeholder="Enter your post Title" name="title">
                        @error('title')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="sub_title">Sub Title</label>
                        <input type="text" class="form-control" placeholder="Enter your post Subtitle" name="sub_title">
                        @error('sub_title')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control my-editor " cols="30" rows="10"
                            placeholder="Enter your post Description"></textarea>

                    </div>
                    <button type="submit" class="btn btn-success ">Save</button>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
