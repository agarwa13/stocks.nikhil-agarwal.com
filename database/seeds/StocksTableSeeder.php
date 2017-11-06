<?php

use Illuminate\Database\Seeder;

class StocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'name' => 'Chandani Agarwal',
            'email' => 'chandani@bloggercasts.com',
            'password' => bcrypt('SYCN22sycn'),
        ]);

        DB::table('users')->insert([
            'name' => 'Surender Agarwal',
            'email' => 'surender@bloggercasts.com',
            'password' => bcrypt('SYCN22sycn'),
        ]);

        DB::table('users')->insert([
            'name' => 'Yogini Agarwal',
            'email' => 'yogini@bloggercasts.com',
            'password' => bcrypt('SYCN22sycn'),
        ]);


        DB::table('stocks')->insert([
            'name' => 'Cigniti'
        ]);

        DB::table('stocks')->insert([
            'name' => 'Indosolar'
        ]);

        DB::table('stocks')->insert([
            'name' => 'Jackson'
        ]);

        DB::table('stocks')->insert([
            'name' => 'Mangl Crdt'
        ]);

        DB::table('stocks')->insert([
            'name' => 'Moser'
        ]);

        DB::table('stocks')->insert([
            'name' => 'Syncom'
        ]);

        DB::table('stocks')->insert([
            'name' => 'Tatamotor'
        ]);

        DB::table('stocks')->insert([
            'name' => 'Yes Bank'
        ]);

        DB::table('stocks')->insert([
            'name' => 'Zen Tech'
        ]);

        DB::table('stocks')->insert([
            'name' => 'Sintex'
        ]);

        DB::table('stocks')->insert([
            'name' => 'Zylog'
        ]);

        DB::table('stocks')->insert([
            'name' => 'Reliance'
        ]);

        DB::table('stocks')->insert([
            'name' => 'GIC'
        ]);

        DB::table('stocks')->insert([
            'name' => 'DCHL'
        ]);

        DB::table('stocks')->insert([
            'name' => 'Flow Diamond'
        ]);

        DB::table('stocks')->insert([
            'name' => 'Suzlon'
        ]);


    }
}
