<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
        <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>
            {{ config('app.name') }}
        </title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
            name='viewport' />
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <!-- CSS Files -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
        <!-- CSS Just for demo purpose, don't include it in your project -->
    </head>

    <body style="background: rgb(39, 38, 38);margin-top: 100px">
            <!-- Navbar -->
            <div class="container">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                @if ($file->check == -1)

                                <div class="places-buttons">
                                    <div class="row">
                                        <div class="col-md-6 ml-auto mr-auto text-center">
                                            <h4 class="card-title">
                                                Sorry, the file download exceeded the allowed limit !!!
                                            </h4>
                                        </div>
                                    </div>

                                </div>
                                @else

                                <div class="places-buttons">
                                    <div class="row">
                                        <div class="col-md-6 ml-auto mr-auto text-center">
                                            <h4 class="card-title">
                                                {{$file->file_name}}
                                            </h4>
                                            <p class="category">{{$file->description}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 ml-auto mr-auto">
                                            <div class="row">
                                                <div class="col-md-4">
                                                </div>
                                                <div class="col-md-4">
                                                    <a class="btn btn-primary btn-block" href="{{ route('downloadFile', [$file->link_share]) }}" >Download</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    </body>

</html>
