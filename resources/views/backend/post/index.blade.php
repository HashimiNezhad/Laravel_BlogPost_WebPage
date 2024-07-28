@extends('backend.layout.master')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="card">

            <h5 class="text-blue-800 card-header">Admin Posts
                <a href="{{ route('post.create') }}" class="float-right btn btn-primary" style="background-color:#4985b4;">Add
                    Post</a>
                <a href="{{ route('post.trash') }}" class="float-right mr-2 btn btn-danger">Trash</a>
            </h5>
            <div class="card-body">
                <table class="table border">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>SubTitle</th>
                            <th>Create Date</th>
                            <th class="text-success"> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $index => $post)
                            <tr>
                                <td>{{ $posts->currentPage() * 5 - 5 + $index + 1 }}</td>
                                {{-- <td>{{ ++$index }}</td> --}}
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->sub_title }}</td>
                                <td>{{ $post->created_at }}</td>
                                <td>
                                    <a href="#" class="delete" id="{{ $post->id }}"> <i
                                            class="material-symbols-outlined text-danger">delete</i></a>
                                    <a class="edit" href="{{ route('post.edit', ['post' => $post->id]) }}"> <i
                                            class=" material-symbols-outlined text-warning">edit_square</i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <tfoot>
                    <hr class="my-0 sidebar-divider"><br>
                    {{ $posts->links() }} <br>
                </tfoot>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
@section('script')
    <!--The alert script for Deleting post -->
    <script>
        $('.delete').click(function() {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    var id = $(this).attr('id');
                    var url = 'post/' + id;

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: url,
                        type: 'DELETE',
                        dataType: 'json',

                        success: function(data) {

                            Swal.fire({
                                title: "Deleted!",
                                text: "Your file has been deleted.",
                                icon: "success"
                            });

                        }

                    });
                    location.reload();


                }
            });
        });
    </script>
@endsection
