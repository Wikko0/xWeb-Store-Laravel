@extends('layouts.admin')

@section('content')

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Inbox</h3>

                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">

                            <div class="table-responsive mailbox-messages">
                                <table class="table table-hover table-striped">

                                    <tbody>
                                    @foreach($contact as $contacts)
                                    <tr class='clickable-row' data-href='/mail/{{$contacts->id}}'>

                                        <td class="mailbox-name"><a href="/mail/{{$contacts->id}}">{{$contacts->subject}}</a></td>
                                        <td class="mailbox-subject">
                                                {!! \Illuminate\Support\Str::words($contacts->body, 4, '....') !!}
                                        </td>
                                        <td class="mailbox-date">{{$contacts->created_at->diffForHumans()}}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                                <!-- /.table -->
                            </div>
                            <!-- /.mail-box-messages -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer p-0">
                            <div class="mailbox-controls">
                                <!-- Check all button -->
                                <div class="float-right">
                                    {{$contact->links('pagination.apagi')}}

                                    <!-- /.btn-group -->
                                </div>
                                <!-- /.float-right -->
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
        </div>


@endsection
