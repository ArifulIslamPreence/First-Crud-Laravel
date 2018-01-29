@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">List</div>

                    <div class="form-group">
                        <p align="right">
                        <div class="col-md-8 col-md-offset-10">

                            <a  href="{{route('logout')}}"  class="btn btn-primary">
                                logout
                            </a>



                        </div>
                    </p>
                    </div>

                    <div class="panel-body">
                        <table class="table table-responsive">

                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th></th>

                            </tr>
                            @foreach($listreq as $row)
                                <tr>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->address}}</td>
                                    <td>{{$row->email}}</td>

                                    <td><a href="{{ route('view', $row->id) }}" type="button" class="btn btn-primary">View</a></td>
                                    <td><a href="{{ route('edit',$row->id) }}" type="button" class="btn btn-success">Edit</a><td>
                                    <td> <a href="{{ route('delete',$row->id) }}" type="button" class="btn btn-danger">Delete</a><td>



                                </tr>
                            @endforeach
                        </table>

                    </div>
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
