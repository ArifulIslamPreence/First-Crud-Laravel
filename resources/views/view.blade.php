@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">View List</div>
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
                        <ul>
                            <li>Name: {{$admin->name}}</li>
                            <li>Email: {{$admin->email}}</li>
                            <li>Address: {{$admin->address}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection