@extends('index')
@section('title', 'Add New File')

@section('content')

<section class="content">
    <div class="container">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <!-- /.card-header -->
            <form id="fileUploadForm" action="{{ route('store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" placeholder="Title" name="title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="description" placeholder="Description"
                                name="description">
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="form-group row">
                        <label for="file" class="col-sm-2 col-form-label">File input</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file" name="file">
                                    <label class="custom-file-label" for="exampleInputFile" id="lbl_file">Choose
                                        file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Add File</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.container-fluid -->
</section>
@push('scripts')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script> --}}

<script>
    document.getElementById('file').addEventListener('change', function(e) {
        if (this.files && this.files[0]) {
           $('#lbl_file').text(this.files[0].name);
        }
    });
</script>
@endpush
@endsection
