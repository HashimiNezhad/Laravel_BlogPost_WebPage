@extends('backend.layout.master')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="card">

            <div class="justify-content-between card-header d-flex">
                <h5 class="mt-2"> Recycle Bin</h5>
                <a href="{{ route('post.index') }}" class="btn btn-light btn-outline-success ">
                    <i class="material-symbols-outlined ">arrow_forward</i></a>
            </div>
            <div class="card-body">
                <table class="table border">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>SubTitle</th>
                            <th>Created Date</th>
                            <th>Deleted Date</th>
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
                                <td>{{ $post->deleted_at }}</td>
                                <td>
                                    <a href="#" class="delete" id="{{ $post->id }}"> <i
                                            class="material-symbols-outlined text-danger">delete_forever</i></a>
                                    <a class="edit" href="{{ route('post.restore', ['id' => $post->id]) }}"> <i
                                            class=" material-symbols-outlined text-warning">restore</i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <tfoot>
                    {{ $posts->links() }}
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
                title: "Are you sure to delete permanently?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    var id = $(this).attr('id');
                    var url = 'force-delete/' + id;

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
