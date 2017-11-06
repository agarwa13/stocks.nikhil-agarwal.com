@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Add Transaction</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="post" action="/users/{{$user->id}}/transactions">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <select class="form-control" name="stock_id">
                                    @foreach($stocks as $stock)
                                        <option value="{{$stock->id}}">{{$stock->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="number" class="form-control" name="quantity" id="quantity" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="buying">Buying / Selling</label>
                                <select class="form-control" name="buying">
                                    <option value="1">Buying</option>
                                    <option value="0">Selling</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-default">Add Transaction</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-success">
                    <div class="panel-heading">{{$user->name}}'s Current Portfolio</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>


                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <td>Stock</td>
                            <td>Shares Owned</td>
                            {{--<td>Total Bought</td>--}}
                            {{--<td>Total Sold</td>--}}
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($portfolio as $portfolioItem)
                            <tr>
                                <td>{{$portfolioItem->name}}</td>
                                <td>{{$portfolioItem->totalBought - $portfolioItem->totalSold}}</td>
                                {{--<td>{{$portfolioItem->totalBought}}</td>--}}
                                {{--<td>{{$portfolioItem->totalSold}}</td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>




    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a data-toggle="collapse" href="#edit-transactions" aria-expanded="false" aria-controls="edit-transactions">
                            Edit Transactions
                        </a>
                    </div>

                    <div class="panel-body collapse" id="edit-transactions">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>Date</td>
                                    <td>Stock</td>
                                    <td>Bought</td>
                                    <td>Sold</td>
                                    <td>Delete</td>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($user->transactions as $transaction)
                                    <tr>
                                        <td>{{date('d-m-Y', strtotime($transaction->created_at))}}</td>
                                        <td>{{$transaction->stock->name}}</td>
                                        <td>{{$transaction->bought}}</td>
                                        <td>{{$transaction->sold}}</td>
                                        <td>
                                            <form method="post" action="/transactions/{{$transaction->id}}">
                                                {{ method_field('delete') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a data-toggle="collapse" href="#add-new-stock" aria-expanded="false" aria-controls="add-new-stock">
                            Add New Stock
                        </a>
                    </div>

                    <div class="panel-body collapse" id="add-new-stock">
                        <form method="post" action="/stocks">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="name">Stock Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="">
                            </div>

                            <button type="submit" class="btn btn-default">Add Stock</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
