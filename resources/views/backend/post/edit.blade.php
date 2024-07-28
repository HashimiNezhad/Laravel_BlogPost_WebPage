@extends('backend.layout.master')
@section('content')
    <!--The Post Edit page -->
    <!-- Begin Page Content -->
    <div class="container-fluid">


        <div class="card">
            <div class="card-header">Edit Post
                <a href="{{ route('post.index') }}" class="float-right btn btn-primary" style="background-color:#289dc7;">
                    <i class="material-symbols-outlined ">arrow_forward</i></a>
            </div>
            <div class="card-body">
                <form action="{{ route('post.update', ['post' => $post->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" placeholder="Enter your post Title" name="title"
                            value="{{ $post->title }}">
                        @error('title')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="sub_title">Sub Title</label>
                        <input type="text" class="form-control" placeholder="Enter your post Subtitle" name="sub_title"
                            value="{{ $post->sub_title }}">
                        @error('sub_title')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control my-editor " cols="30" rows="10"
                            placeholder="Enter your post Description"> {{ $post->sub_title }}"</textarea>
                        @error('description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
