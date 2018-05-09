@extends('layouts.admin.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>lines</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <a class="btn btn-primary" href="{{route('line.create')}}">Add new</a>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="card-title mb-2">Showing {{$lines->count() }} Records</h3>
                        </div>
                        <div class="col-md-4">
                            <form class="navbar-form card-title" role="search">
                                <div class="input-group add-on">
                                    <input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text">
                                    <div class="input-group-btn">
                                        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead style="background: #0c5460; color: #fff;">
                        <tr>
                            <th>Request line ID</th>
                            <th>Receiver Type</th>
                            <th>Request Line</th>
                            <th>Status</th>
                            <th>Action Menu</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lines as $line)
                        <tr>
                            <td>{{ $line->id  }}</td>
                            <td>{{ $line->receiver_type  }}</td>
                            <td>{{ $line->line  }}</td>
                            <td>
                                @if($line->status == 1)
                                Active
                                @else
                                Inactive
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('line', $line->id)  }}">View Details</a>
                                        <a class="dropdown-item" href="{{  route('line.edit', $line->id)  }}">Edit Details</a>
                                        {{--<a class="dropdown-item" href="#">View Requests</a>--}}
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th colspan="2">Showing to {{ $lines->count()}} of {{ $lines->total()}} Records</th>
                            <th colspan="3">{{ $lines->links() }}</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->


        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
</div>
@endsection