<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */

Route::get('edit/{id_main?}', function($id_main) {
    $model_transaction = new TransactionModel();
    $array_data = $model_transaction->get_using_id($id_main);
    return View::make('edit')->with('array_data', $array_data);
})->before('auth');

Route::get('api/delete', function() {
    $model_transaction = new TransactionModel();
    return $model_transaction->delete_id();
});

Route::controller('home', 'HomeController');

Route::get('add', function() {
    return View::make('add');
})->before('auth');

Route::get('login', 'SessionsController@create');

Route::get('logout', 'SessionsController@destroy');

Route::resource('sessions', 'SessionsController');

Route::resource('transactions', 'TransactionController');

Route::get('/initialize', function() {
    Schema::dropIfExists('announcements');
    Schema::create('announcements', function($table) {
        $table->increments('id');
        $table->char('title', 200);
        $table->text('content');
        $table->date('startDate');
        $table->date('endDate');
        $table->char('active', 1);
    });
    $array_insert[] = array(
        'title' => 'Title 1',
        'content' => 'Content 1',
        'startDate' => '2021-07-01',
        'endDate' => '2021-08-31',
        'active' => 1
    );
    $array_insert[] = array(
        'title' => 'Title 2',
        'content' => 'Content 2',
        'startDate' => '2021-07-11',
        'endDate' => '2021-08-21',
        'active' => 1
    );
    $array_insert[] = array(
        'title' => 'Title 3',
        'content' => 'Content 3',
        'startDate' => '2021-06-01',
        'endDate' => '2021-08-02',
        'active' => 1
    );
    DB::beginTransaction();
    try {
        DB::table('announcements')->insert($array_insert);
        DB::commit();
    } catch (Exception $ex) {
        DB::rollback();
    }

    Schema::dropIfExists('users');
    Schema::create('users', function($table) {
        $table->increments('id');
        $table->char('username', 60);
        $table->char('password', 60);
        $table->char('access', 1);
        $table->timestamps();
        $table->rememberToken();
        $table->unique('username');
    });
    User::create([
        'username' => 'gerard',
        'access' => 1,
        'password' => Hash::make('gerard')
    ]);
    User::create([
        'username' => 'user',
        'access' => 0,
        'password' => Hash::make('user')
    ]);
    User::create([
        'username' => 'puser',
        'access' => 1,
        'password' => Hash::make('puser')
    ]);
    return 'OK';
});

Route::get('/', function() {
    return View::make('hello');
});
