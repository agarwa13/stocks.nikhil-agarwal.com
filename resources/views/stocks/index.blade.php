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

                        <h1>Stocks</h1>
                        @foreach($stocks as $stock)
                            <ul>
                                <li>{{$stock->name}}</li>
                            </ul>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
