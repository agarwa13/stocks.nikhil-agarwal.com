@extends('layouts.app')

@section('content')
{{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">Accounts</div>--}}

                {{--<div class="panel-body">--}}
                    {{--@if (session('status'))--}}
                        {{--<div class="alert alert-success">--}}
                            {{--{{ session('status') }}--}}
                        {{--</div>--}}
                    {{--@endif--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}


<div class="container">
    <div class="row">
        @foreach($users as $user)
            <div class="col-md-4">
                <a href="/users/{{$user->id}}" class="btn btn-{{$user->color}} btn-lg btn-block" role="button">{{$user->name}}</a>
            </div>
        @endforeach
    </div>
</div>



@endsection
