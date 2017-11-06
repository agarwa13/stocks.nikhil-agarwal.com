<?php

namespace App\Http\Controllers;

use App\Stock;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
         * Display a List of Accounts
         */
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user = User::find($id);
        $stocks = Stock::all();

        $portfolio = DB::table('transactions')
            ->select( DB::raw('name, stock_id, sum(bought) as totalBought, sum(sold) as totalSold'))
            ->where('user_id','=',$id)
            ->join('stocks','transactions.stock_id' , '=', 'stocks.id')
            ->groupBy('transactions.stock_id')->get();

        return view('details')
            ->with('user', $user)
            ->with('stocks',$stocks)
            ->with('portfolio', $portfolio);
    }




    public function addTransaction(Request $request, $id){

        $transaction = new Transaction();
        $transaction->stock_id = $request->stock_id;

        if($request->buying == 1){
            $transaction->bought = $request->quantity;
            $transaction->sold = 0;
        }else{
            $transaction->sold = $request->quantity;
            $transaction->bought = 0;
        }

        $transaction->user_id = $id;
        $transaction->save();

        return redirect('/users/'.$id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}