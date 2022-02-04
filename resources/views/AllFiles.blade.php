@extends('index')

@section('title', 'All Files')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">

        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">File Name</th>
                                <th scope="col">Size (KB)</th>
                                <th scope="col">Description</th>
                                <th scope="col">Actions</th>
                            </thead>
                            <tbody>
                                @foreach ($files as $key => $file)
                                <tr>
                                    <td>{{$key+1;}}</td>
                                    <td>{{$file->title}}</td>
                                    <td>{{$file->file_name}}</td>
                                    <td>{{$file->size}}</td>
                                    <td>{{$file->description}}</td>
                                    <td><a href="{{ route('share',[$file->link_share]) }}"
                                            class="btn btn-sm btn-outline-primary" target="_blank"
                                            onclick="CopyText('{{config('app.url').$file->link_share}}')">Open
                                            Link</a>
                                        <a class="btn btn-sm btn-outline-primary"
                                            onclick="CopyText('{{config('app.url').$file->link_share}}')">Copy</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    function CopyText(link){
        navigator.clipboard.writeText(link);
    }

</script>
@endsection
