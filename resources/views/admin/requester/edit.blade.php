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
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Quick Update</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @if(count($errors))
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.
                                <br/>
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form role="form" method="post" action="{{route('requester.edit', $requester->id)}}">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Requester Name</label>
                                    <input type="text" name="name" value="{{ $requester->name }}"  class="form-control" placeholder="Enter name">
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" name="email" value="{{ $requester->email }}" class="form-control " placeholder="Enter email">
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="number">Requester Number</label>
                                    <input type="text" name="number" value="{{ $requester->number }}"  class="form-control" placeholder="Enter Number">
                                    <span class="text-danger">{{ $errors->first('number') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" name="status" type="radio" value="1" @if($requester->status == 1) checked @endif>
                                            <label class="form-check-label">Active</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="status" type="radio" value="0" @if($requester->status == 0) checked @endif>
                                            <label class="form-check-label">Inactive</label>
                                            <span class="text-danger">{{ $errors->first('status') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
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