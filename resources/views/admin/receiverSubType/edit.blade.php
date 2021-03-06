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

                        <form role="form" method="post" action="{{route('receiver.sub.type.edit', $receiverSubType->id)}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="text">Receiver sub Type</label>
                                    <input type="text" name="text" value="{{ $receiverSubType->text }}"  class="form-control" placeholder="Enter Receiver Type">
                                    <span class="text-danger">{{ $errors->first('text') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="code">Receiver type</label>
                                    <select name="receiver_type_id" id="receiver_type" class="form-control">
                                        @foreach($receiverTypes as $receiverType)
                                            <option value="{!! $receiverType->id !!}" @if($receiverSubType->receiver_type_id == $receiverType->id ) selected @endif>{!! $receiverType->type !!}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('receiver_type_id') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="number">Receiver Type description</label>
                                    <textarea type="text" name="description"  class="form-control" placeholder="Enter receiver sub type description">{{ $receiverSubType->description }}</textarea>
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="text">Image</label>
                                    <input type="file" name="image" class="form-control" placeholder="Select image">
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                    <img src="{{ $receiverSubType->image  }}" alt="{{ $receiverSubType->image  }}" width="100%">
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" name="status" type="radio" value="1" @if($receiverSubType->status == 1) checked @endif>
                                            <label class="form-check-label">Active</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="status" type="radio" value="0" @if($receiverSubType->status == 0) checked @endif>
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