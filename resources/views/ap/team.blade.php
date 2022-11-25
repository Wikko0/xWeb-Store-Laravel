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
                            <form action="/team" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter name">
                                    </div>
                                    <div class="form-group">
                                        <label>Position</label>
                                        <input type="text" name="position" class="form-control" placeholder="Enter position">
                                    </div>
                                    <div class="form-group">
                                        <label>Picture</label>
                                        <div class="custom-file">
                                            <input type="file" name="picture" class="custom-file-input" id="customFile">
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
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <!-- seo form elements -->
                        <div class="card card-primary">
                            <!-- /.card-header -->
                            <!-- form start -->

                            @foreach($teams as $team)
                                <form method="post" action="/team">
                                    @method('DELETE')
                                    @csrf

                                    <div class="card-body">
                                        <div class="input-group input-group-lg mb-3">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                                                    Action
                                                </button>

                                                <ul class="dropdown-menu">
                                                    <button type="submit" class="dropdown-item">Delete</button>
                                                </ul>
                                            </div>
                                            <!-- /btn-group -->
                                            <input type="text" readonly class="form-control" name="name"
                                                   value="{{$team->name}}">

                                        </div>
                                    </div>
                                </form>
                        @endforeach

                        <!-- /.card-body -->


                        </div>
                        <!-- /.card -->

                    </div>


                </div>
            </div>
        </section>
        <!-- /.content -->
        </div>


@endsection
