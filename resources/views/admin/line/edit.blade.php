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

                        <form role="form" method="post" action="{{route('line.edit', $line->id)}}">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="line">line</label>
                                    <input type="text" name="line" value="{{ $line->line }}"  class="form-control" placeholder="Enter line">
                                    <span class="text-danger">{{ $errors->first('line') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="receiver_type">Receiver type</label>
                                    <input type="text" name="receiver_type" value="{{ $line->receiver_type }}" class="form-control " placeholder="Enter Receiver type">
                                    <span class="text-danger">{{ $errors->first('receiver_type') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="receiver_sub_type">Receiver sub type</label>
                                    <input type="text" name="receiver_sub_type" value="{{ $line->receiver_sub_type }}" class="form-control " placeholder="Enter Receiver sub type">
                                    <span class="text-danger">{{ $errors->first('receiver_sub_type') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="number">Request line description</label>
                                    <textarea type="text" name="request_line_description"  class="form-control" placeholder="Enter Request line description">{{ $line->request_line_description }}</textarea>
                                    <span class="text-danger">{{ $errors->first('request_line_description') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="number">Price per month</label>
                                    <input type="number" name="price_per_month" value="{{ $line->price_per_month }}"  class="form-control" placeholder="Enter price per month">
                                    <span class="text-danger">{{ $errors->first('price_per_month') }}</span>
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" name="status" type="radio" value="1" @if($line->status == 1) checked @endif>
                                            <label class="form-check-label">Active</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="status" type="radio" value="0" @if($line->status == 0) checked @endif>
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