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

@foreach($users as $user)
<div class="container" style="margin-bottom: 20px;">
    <div class="row">
        <div class="col-md-4">
            <a style="padding-top: 30px; padding-bottom: 30px;" href="/users/{{$user->id}}" class="btn btn-{{$user->color}} btn-lg btn-block" role="button">{{$user->name}}</a>
        </div>
    </div>
</div>
@endforeach



@endsection
