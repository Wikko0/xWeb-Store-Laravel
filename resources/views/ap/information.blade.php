@extends('layouts.admin')

@section('content')

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">
                                Add Information About Us
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="/addinfo" method="post">
                                @csrf
              <textarea name="information" id="summernote">
                {{$config_information->information ?? "Place <em>some</em> <u>text</u> <strong>here</strong>"}}
              </textarea>

                                    <button type="submit" class="btn btn-primary">Submit</button>

                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.col-->
            </div>

        </section>

        <!-- /.content -->
        </div>


@endsection
