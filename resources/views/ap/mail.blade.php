@extends('layouts.admin')

@section('content')

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Read Mail</h3>

                            </div>
                            <!-- /.card-header -->

                            <div class="card-body p-0">
                                <div class="mailbox-read-info">
                                    <h5>Subject: {{$mail->subject}}</h5>
                                    <h6>From: {{$mail->email}}
                                        <span class="mailbox-read-time float-right">{{$mail->created_at}}</span></h6>
                                </div>
                                <!-- /.mailbox-read-info -->
                                <div class="mailbox-read-message">
                                    <p>{{$mail->body}}</p>
                                </div>
                                <!-- /.mailbox-read-message -->
                            </div>
                            <!-- /.card-body -->

                            <!-- /.card-footer -->
                            <div class="card-footer">

                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
        </div>

@endsection
