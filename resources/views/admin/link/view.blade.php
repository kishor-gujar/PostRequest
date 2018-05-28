@extends('layouts.admin.master')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>General Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">General Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Link details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-condensed">
                                <tbody>
                                <tr>
                                    <th style="width: 20px">Receiver Name:</th>
                                    <th>{{ $link->receiver->name  }}</th>
                                </tr>
                                <tr>
                                    <td style="width: 20px">Receiver Type:</th>
                                    <td>{{ $link->receiver->receiverType->type  }}</th>
                                </tr>
                                <tr>
                                    <td>Receiver Sub Type:</td>
                                    <td>{{ $link->receiverSubType->text  }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 20px">Request Line:</th>
                                    <th>{{ $link->requestLine->line  }}</th>
                                </tr>
                                <tr>
                                    <th style="width: 20px">Line Number:</th>
                                    <th>{{ $link->number  }}</th>
                                </tr>
                                <tr>
                                    <th style="width: 20px">Line Email:</th>
                                    <th>{{ $link->email  }}</th>
                                </tr>
                                <tr>
                                    <th style="width: 20px">Preferred Notification:</th>
                                    <th>{{ $link->preferred_notification  }}</th>
                                </tr>
                                <tr>
                                    <td>Status:</td>
                                    <td>
                                        @if($link->status == 1)
                                            Active
                                        @else
                                            Inactive
                                        @endif
                                    </td>
                                </tr>
                                </tr>
                                <tr>
                                    <th style="width: 20px">Link State:</th>
                                    <th>{{ $link->state->name  }}</th>
                                </tr>
                                </tr>
                                <tr>
                                    <th style="width: 20px">Link Towns:</th>
                                    <th>{{ $link->towns  }}</th>
                                </tr>
                                </tr>
                                <tr>
                                    <th style="width: 20px">Link Priority:</th>
                                    <th>{{ $link->priority->name  }}</th>
                                </tr>
                                </tr>
                                <tr>
                                    <th style="width: 20px">Link Duration:</th>
                                    <th>{{ $link->duration  }}</th>
                                </tr>
                                </tr>
                                <tr>
                                    <th style="width: 20px">Total Amount:</th>
                                    <th>{{ $link->preferred_notification  }}</th>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td>
                                        <a class="btn btn-danger" href="{{route('links')}}">Back</a>
                                    </td>
                                    <td><a class="btn btn-primary pull-right" href="{{route('link.edit', $link->id)}}">Edit</a>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection