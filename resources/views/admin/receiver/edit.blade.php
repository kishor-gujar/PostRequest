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

                        <form role="form" method="post" action="{{route('receiver.edit', $receiver->id)}}">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="text">Receiver Name</label>
                                    <input type="text" name="name" value="{{ $receiver->name }}"  class="form-control" placeholder="Enter company name">
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="text">Receiver email</label>
                                    <input type="text" name="email" value="{{ $receiver->email }}"  class="form-control" placeholder="Enter email">
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="text">Contact Number</label>
                                    <input type="text" name="contact_number" value="{{ $receiver->contact_number }}"  class="form-control" placeholder="Enter contact number">
                                    <span class="text-danger">{{ $errors->first('contact_number') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="code">Receiver Operation</label>
                                    <select name="operation" id="receiver_type" class="form-control">
                                       <option value="Company" @if($receiver->operation == 'Company')  selected="selected" @endif>Company</option>
                                       <option value="Independent"  @if($receiver->operation == 'Independent')  selected="selected" @endif>Independent</option>
                                    </select>
                                    <span class="text-danger">{{ $errors->first('receiver_type_id') }}</span>
                                </div>

                                <div class="form-group">
                                    <label for="code">Receiver Company</label>
                                    <select name="company_id" id="receiver_type" class="form-control">
                                        @foreach ($companies as $company )
                                        <option value="{{ $company->id }}" @if($receiver->company_id == $company->id)  selected="selected" @endif>{{ $company->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('receiver_type_id') }}</span>
                                </div>

                                <div class="form-group">
                                    <label for="number">Receiver Type description</label>
                                    <textarea type="text" name="description"  class="form-control" placeholder="Enter receiver sub type description">{{ $receiver->description }}</textarea>
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" name="status" type="radio" value="1" @if($receiver->status == 1) checked @endif>
                                            <label class="form-check-label">Active</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="status" type="radio" value="0" @if($receiver->status == 0) checked @endif>
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