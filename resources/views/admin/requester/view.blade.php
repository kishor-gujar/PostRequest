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
                            <h3 class="card-title">Requester details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-condensed">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">Name:</th>
                                    <th>{{ $requester->name  }}</th>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td>{{ $requester->email  }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 10px">Number:</th>
                                    <th>{{ $requester->number  }}</th>
                                </tr>
                                <tr>
                                    <td>Status:</td>
                                    <td>
                                        @if($requester->status == 1)
                                            Active
                                        @else
                                            Inactive
                                        @endif
                                    </td>
                                </tr>
                                </tbody>
                            <tfoot>
                            <tr>
                                <td>
                                    <a class="btn btn-danger" href="{{route('requesters')}}">Back</a>
                                </td>
                                <td><a class="btn btn-primary pull-right" href="{{route('requester.edit', $requester->id)}}">Edit</a></td>
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