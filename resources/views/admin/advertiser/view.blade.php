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
                            <h3 class="card-title">advertiser details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-condensed">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">Advertiser Name:</th>
                                    <th>{{ $advertiser->name  }}</th>
                                </tr>
                                <tr>
                                    <th style="width: 10px">Advertiser Number:</th>
                                    <th>{{ $advertiser->number  }}</th>
                                </tr>
                                <tr>
                                    <td>Advertiser Email:</td>
                                    <td>{{ $advertiser->email  }}</td>
                                </tr>
                                <tr>
                                    <td>Advertiser Address:</td>
                                    <td>{{ $advertiser->address  }}</td>
                                </tr>
                                <tr>
                                    <td>Contact Person:</td>
                                    <td>{{ $advertiser->contact_person  }}</td>
                                </tr>
                                <tr>
                                    <td>Status:</td>
                                    <td>
                                        @if($advertiser->status == 1)
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
                                    <a class="btn btn-danger" href="{{route('advertisers')}}">Back</a>
                                </td>
                                <td><a class="btn btn-primary pull-right" href="{{route('advertiser.edit', $advertiser->id)}}">Edit</a></td>
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