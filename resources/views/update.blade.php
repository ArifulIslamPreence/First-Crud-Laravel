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
                        <form class="form-horizontal" method="POST" action="{{route('update',$input->id)}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$input->id}}">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>
                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control" name="name" value="{{$input->name}}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ $input->email or "" }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control" name="address" value="{{ $input->address }}" required autofocus>

                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <p align="center">
                                <button type="submit"  class="btn btn-primary">
                                    Update
                                </button>
                            </p>
                            @if (session('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
