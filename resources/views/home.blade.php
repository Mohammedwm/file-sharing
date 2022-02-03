@extends('index')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">

      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $files->count() }}</h3>

                        <p>Number Files</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$files->sum('size') }}</h3>

                        <p>Size all files</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>44</h3>

                        <p>User Registrations</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>65</h3>

                        <p>Unique Visitors</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <section class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Files</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">File Name</th>
                        <th scope="col">Size (KB)</th>
                        <th scope="col">Description</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i=1;
                    @endphp
                    @foreach ($files as $file)
                    <tr>
                        <th scope="row">{{$i++;}}</th>
                        <td>{{$file->title}}</td>
                        <td>{{$file->file_name}}</td>
                        <td>{{$file->size}}</td>
                        <td>{{$file->description}}</td>
                        <td><a href="{{ route('share',[$file->link_share]) }}"
                            class="btn btn-sm btn-outline-primary" target="_blank"
                                onclick="CopyText('{{config('app.url').$file->link_share}}')">Open Link</a>
                            <a class="btn btn-sm btn-outline-primary"
                                onclick="CopyText('{{config('app.url').$file->link_share}}')">Copy</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<script>
    function CopyText(link){
        navigator.clipboard.writeText(link);
    }

</script>
@endsection
