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
                            <thead class=" text-success">
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">File Name</th>
                                <th scope="col">Size (KB)</th>
                                <th scope="col">Count Visits</th>
                                <th scope="col">Actions</th>
                            </thead>
                            <tbody>
                                @foreach ($files as $key => $file)
                                <tr>
                                    <td>{{$key+1;}}</td>
                                    <td>{{$file->title}}</td>
                                    <td>{{$file->file_name}}</td>
                                    <td>{{$file->size}}</td>
                                    <td>{{$file->visits->count()}}</td>
                                    <td>
                                        <a href="{{ route('share',[$file->link_share]) }}"
                                            class="btn btn-sm btn-outline-success btn-round btn-icon"
                                            target="_blank" data-toggle="tooltip" title="Open Link">
                                            <i class="nc-icon nc-send"></i></a>
                                        <btn class="btn btn-sm btn-outline-success btn-round btn-icon"
                                            onclick="CopyText('{{config('app.url').$file->link_share}}')"
                                            data-toggle="tooltip" title="Copy Link">
                                            <i class="nc-icon nc-single-copy-04"></i></btn>

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
