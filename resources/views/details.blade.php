@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Current Portfolio</div>

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
                            <td>Total Bought</td>
                            <td>Total Sold</td>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($portfolio as $portfolioItem)
                            <tr>
                                <td>{{$portfolioItem->name}}</td>
                                <td>{{$portfolioItem->totalBought - $portfolioItem->totalSold}}</td>
                                <td>{{$portfolioItem->totalBought}}</td>
                                <td>{{$portfolioItem->totalSold}}</td>
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
                <div class="panel panel-default">
                    <div class="panel-heading">Transactions</div>

                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>Date</td>
                                    <td>Stock</td>
                                    <td>Bought</td>
                                    <td>Sold</td>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($user->transactions as $transaction)
                                    <tr>
                                        <td>{{date('d-m-Y', strtotime($transaction->created_at))}}</td>
                                        <td>{{$transaction->stock->name}}</td>
                                        <td>{{$transaction->bought}}</td>
                                        <td>{{$transaction->sold}}</td>
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
                    <div class="panel-heading">Add Stock</div>

                    <div class="panel-body">


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
