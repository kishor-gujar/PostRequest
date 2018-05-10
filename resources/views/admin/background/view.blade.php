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
                            <h3 class="card-title">Background Image details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-condensed">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">Background Imge Nmae:</th>
                                    <th>{{ $background->name  }}</th>
                                </tr>
                                <tr>
                                    <th style="width: 10px">Advertiser Name:</th>
                                    <th>{{ $background->advertiser->name  }}</th>
                                </tr>
                                <tr>
                                    <td>Image:</td>
                                    <td> <img src="{{ $background->image  }}" alt="{{ $background->image  }}" width="300"></td>
                                </tr>
                                <tr>
                                    <td>Image Text:</td>
                                    <td>{{ $background->text  }}</td>
                                </tr>
                                <tr>
                                    <td>External Link:</td>
                                    <td>{{ $background->external_link  }}</td>
                                </tr>
                                <tr>
                                    <td>Start Date:</td>
                                    <td>{{ $background->start_date  }}</td>
                                </tr>
                                <tr>
                                    <td>End Date:</td>
                                    <td>{{ $background->end_date  }}</td>
                                </tr>
                                <tr>
                                    <td>Status:</td>
                                    <td>
                                        @if($background->status == 1)
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
                                    <a class="btn btn-danger" href="{{route('backgrounds')}}">Back</a>
                                </td>
                                <td><a class="btn btn-primary pull-right" href="{{route('background.edit', $background->id)}}">Edit</a></td>
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