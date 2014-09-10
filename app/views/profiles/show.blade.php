@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $user->name }}</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 " align="center">
                            <img alt="User Pic" src="http://www.gravatar.com/avatar/{{ md5($user->email) }}?s=150" class="img-circle">
                        </div>

                        <div class=" col-md-9 col-lg-9 ">
                            <table class="table table-user-information">
                                <tbody>
                                <tr>
                                    <td>Campus:</td>
                                    <td>{{ $user->campus }}</td>
                                </tr>
                                <tr>
                                    <td>Data de Nascimento:</td>
                                    <td>{{ $user->birthday }}</td>
                                </tr>
                                <tr>
                                <tr>
                                    <td>Email</td>
                                    <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                </div>

            </div>
        </div>
    </div>
</div>
@stop