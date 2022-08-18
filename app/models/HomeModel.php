<?php

class HomeModel {

    public function GET_DATA() {
        $query = DB::table('announcements')
                ->select('title', 'content', 'id')
                ->where('active', '=', 1)
                ->orderBy('id', 'desc');
        $get = $query->distinct()->get();
        return $get;
    }

}
