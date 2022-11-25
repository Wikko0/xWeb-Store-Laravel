@extends('layouts.admin')

@section('content')

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="col-md-12">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                            </button>
                            <h5><i class="icon fas fa-check"></i> Alert!</h5>
                            <ul>{{session('success')}}</ul>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                            </button>
                            <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                            @foreach ($errors->all() as $error)
                                <ul>{{ $error }}</ul>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Website <small>settings</small></h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="/settings" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Website Title</label>
                                        <input type="text" name="title" class="form-control" placeholder="{{$config_settings->title ?? 'Enter title'}}" value="{{$config_settings->title ?? null}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Website Name</label>
                                        <input type="text" name="web_name" class="form-control" placeholder="{{$config_settings->web_name ?? 'Enter website name'}}" value="{{$config_settings->web_name ?? null}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Mail Address</label>
                                        <input type="email" name="email" class="form-control" placeholder="{{$config_settings->email ?? 'Enter email address'}}" value="{{$config_settings->email ?? null}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Web Image</label>
                                        <div class="custom-file">
                                            <input type="file" name="web_image" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Logo</label>
                                        <div class="custom-file">
                                            <input type="file" name="logo" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Footer logo</label>
                                        <div class="custom-file">
                                            <input type="file" name="footer" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">

                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
