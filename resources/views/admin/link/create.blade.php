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
                            <h3 class="card-title">Quick Create</h3>
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

                        <form role="form" method="post" action="{{route('link.create')}}">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="receiver_id">Receiver Name</label>
                                    <select name="receiver_id" id="receiver_id" class="form-control select2">
                                        @foreach ($receivers as $receiver)
                                            <option value="{{ $receiver->id }}">{{ $receiver->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('receiver_id') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="receiver_type_id">Receiver type</label>
                                    <select name="receiver_type_id" id="receiver_type_id" class="form-control select2">
                                        @foreach ($receiverTypes as $receiverType)
                                            <option value="{{ $receiverType->id }}">{{ $receiverType->type }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('receiver_type_id') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="receiver_sub_type_id">Receiver sub type</label>
                                    <select name="receiver_sub_type_id" id="receiver_sub_type_id" class="form-control select2">
                                        @foreach ($receiverSubTypes as $receiverSubType)
                                            <option value="{{ $receiverSubType->id }}">{{ $receiverSubType->text }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('receiver_sub_type_id') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="number">Request link</label>
                                    <select name="request_line_id" id="request_line_id" class="form-control select2">
                                        @foreach ($requestLines as $requestLine)
                                            <option value="{{ $requestLine->id }}">{{ $requestLine->line }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('request_line_id') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="number">Link Number</label>
                                    <input type="text" name="number" value="{{ old('number') }}" class="form-control"
                                           placeholder="Enter price per month">
                                    <span class="text-danger">{{ $errors->first('number') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="email">Link Email</label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter price per month">
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="number">Preferred Notification</label>
                                    <select name="preferred_notification" id="preferred_notification" class="form-control select2">
                                        <option value="sms">SMS</option>
                                        <option value="email">Email</option>
                                        <option value="sms_email">SMS & Email</option>
                                    </select>
                                    <span class="text-danger">{{ $errors->first('preferred_notification') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" name="status" type="radio" value="1"
                                                   @if(old('status') == 1) checked @endif>
                                            <label class="form-check-label">Active</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="status" type="radio" value="0"
                                                   @if(old('status') == 0) checked @endif>
                                            <label class="form-check-label">Inactive</label>
                                            <span class="text-danger">{{ $errors->first('status') }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="number">link State</label>
                                    <select name="state_id" id="state_id" class="form-control select2">
                                        @foreach ($states as $state)
                                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('state_id') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="number">link Towns</label>
                                    <select name="towns" class="form-control select2" multiple="multiple" data-placeholder="Select a Towns"
                                            style="width: 100%;">
                                        @foreach ($towns as $town)
                                            <option value="{{ $town->name }}">{{ $town->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('towns') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="number">Priority</label>
                                    <select name="priority_id" class="form-control select2"  style="width: 100%;">
                                        @foreach ($priorities as $priority)
                                            <option value="{{ $priority->id }}">{{ $priority->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('priority_id') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="duration">Duration:</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                              <i class="fa fa-calendar"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="duration" value="{{ old('duration') }}" class="form-control float-right active" id="reservation">
                                       
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <span class="text-danger">{{ $errors->first('duration') }}</span>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Create</button>
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