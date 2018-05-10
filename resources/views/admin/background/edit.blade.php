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

                        <form role="form" method="post" action="{{route('background.edit', $background->id)}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="text">Image Name</label>
                                    <input type="text" name="name" value="{{ $background->name }}"  class="form-control" placeholder="Enter IMage Name">
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="code">Advertiser</label>
                                    <select name="advertiser_id" id="advertiser_id" class="form-control">
                                        @foreach($advertisers  as $advertiser )
                                            <option value="{!! $advertiser->id !!}" @if($background->advertiser_id == $advertiser->id ) selected @endif>{!! $advertiser->name !!}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('advertiser_id') }}</span>
                                </div>
                            
                                <div class="form-group">
                                    <label for="text">Image</label>
                                    <input type="file" name="image" value="{{ $background->image }}" class="form-control" placeholder="Select image">
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                    <img src="{{ $background->image  }}" alt="{{ $background->image  }}" width="100%">
                                </div>
                                <div class="form-group">
                                    <label for="number">Image Text</label>
                                    <textarea type="text" name="text"  class="form-control" placeholder="Enter receiver sub type description">{{ $background->text }}</textarea>
                                    <span class="text-danger">{{ $errors->first('text') }}</span>
                                </div>
                       
                                <div class="form-group">
                                    <label for="text">External Link</label>
                                    <input type="text" name="external_link" class="form-control" value="{{ $background->external_link }}" placeholder="Select image">
                                    <span class="text-danger">{{ $errors->first('external_link') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="start_date">Start Date</label>
                                    <input type="date" name="start_date" class="form-control" value="{{ $background->start_date }}" placeholder="Select Start Date">
                                    <span class="text-danger">{{ $errors->first('start_date') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="text">End Date</label>
                                    <input type="date" name="end_date" class="form-control" value="{{ $background->end_date }}" placeholder="Select End Date">
                                    <span class="text-danger">{{ $errors->first('end_date') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" name="status" type="radio" value="1" @if($background->status == 1) checked @endif>
                                            <label class="form-check-label">Active</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="status" type="radio" value="0" @if($background->status == 0) checked @endif>
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