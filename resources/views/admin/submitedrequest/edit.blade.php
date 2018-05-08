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

                        <form role="form" method="post" action="{{route('request.edit', $request->id)}}">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="number">Sub Type</label>
                                    <input type="text" name="sub_type" value="{{ $request->sub_type }}"  class="form-control" placeholder="Enter Sub Type">
                                    <span class="text-danger">{{ $errors->first('sub_type') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="state">state</label>
                                    <input type="text" name="state" value="{{ $request->state }}" class="form-control " placeholder="Enter state">
                                    <span class="text-danger">{{ $errors->first('state') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="town">town</label>
                                    <input type="text" name="town" value="{{ $request->town }}" class="form-control " placeholder="Enter town">
                                    <span class="text-danger">{{ $errors->first('town') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="line">line</label>
                                    <input type="text" name="line" value="{{ $request->line }}" class="form-control " placeholder="Enter email">
                                    <span class="text-danger">{{ $errors->first('line') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" name="status" type="radio" value="1" @if($request->status == 1) checked @endif>
                                            <label class="form-check-label">Active</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="status" type="radio" value="0" @if($request->status == 0) checked @endif>
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