<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // $users = DB::connection('sqlite')->select('select * from users');
        // $users = DB::select('select * from users where id = ?', [1]);
        //$users = DB::select('select * from users where id = :id', ['id' => 1]);

        // DB::insert('insert into users (name, email, password) values (?, ?, ?)', ['Mika', 'mika@gmail.com', '555']);
        // $users = DB::connection('sqlite')->select('select * from users');

        // $affected = DB::update('update users set name = ? where id = ?', ['John', 1]);
        // $deleted = DB::delete('delete from users');
        // DB::statement('drop table users');
        // DB::unprepared('update users set name = 'mihaela' where name = "mika"');
        // $users = DB::connection('sqlite')->select('select * from users');
        
        DB::transaction(function () {
            DB::table('users')->update(['votes' => 1]);

            DB::table('posts')->delete();
        }, 5);

        dd($users);
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
