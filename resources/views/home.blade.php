@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Accounts</h1>
                    @foreach($users as $user)
                        <ul>
                            <li><a href="/users/{{$user->id}}">{{$user->name}}</a></li>
                        </ul>
                    @endforeach



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
