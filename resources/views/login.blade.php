@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Log In</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('postLogin') }}">

                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>


                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="col-md-4 control-label">Password</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" required autofocus>

<br>
                                            <div class="form-group">
                                                <div class="col-md-8 col-md-offset-4">
                                                    <button type="submit"    class="btn btn-primary">
                                                        Log In !
                                                    </button>
                                                    <br>
                                                    <br>

                                                    <div align="left">

                                                    Didn't Sign up yet?

                                                    <div class="form-group">
                                                        <div class="col-md-8 col-md-offset-4">
                                                            <a   href="{{route('signup')}}"  class="btn btn-primary">
                                                                Sign Up Here!
                                                            </a>
                                                        </div>


                                                </div>



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
                                </form>
                    </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>