@extends('backend.layout.master')
@section('searchContent')
    <div class="mx-3 card">
        <div class="card-header">
            <h4 class="text-success">Search Results
                <i class="mt-1 material-symbols-outlined">check_circle</i>
                <a href="{{ route('post.index') }}" class="float-right pr-2 btn btn-light btn-outline-success ">
                    <i class="float-right material-symbols-outlined ">arrow_forward</i></a>
            </h4>
        </div>
        <div class="card-body">
            <table class="table border">
                <thead style="border-right: 1px solid #dee2e6">
                    <th>ID</th>
                    <th>Post Title</th>
                    <th>Created date</th>
                    <th>More details</th>
                    <th><i class="mt-1 material-symbols-outlined"></i></th>
                </thead>
                <tbody>

                    @if ($posts->isEmpty())
                        <h5 class="text-danger"> <i class="mt-1 mb-0 material-symbols-outlined">error </i>
                            Not found any title with this name ' {{ $query }}' </h5>
                    @else
                        @foreach ($posts as $post)
                            <tr style="border-right: 1px solid #dee2e6">
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->created_at }}</td>
                                <i class="mt-1 material-symbols-outlined btn btn-outline-success">settings</i>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
