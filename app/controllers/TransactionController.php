<?php

class TransactionController extends BaseController {

    public function add() {
        if (Auth::check()) {
            return Redirect::to('add');
        }
        return View::make('sessions.create');
    }

    public function insert() {
        if (Auth::attempt(Input::only('username', 'password'))) {
            return Redirect::to('home');
        }
        return Redirect::back()->withInput()->withErrors('Incorrect username & password combination');
    }

    public function store() {
        $model_transaction = new TransactionModel();
        $model_transaction->insert();
        return Redirect::to('home');
    }

    public function edit_id() {
        $model_transaction = new TransactionModel();
        $model_transaction->insert();
        return Redirect::to('home');
    }

    public function destroy() {
        Auth::logout();
        return Redirect::to('home');
    }

}
