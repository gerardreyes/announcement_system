<?php

class TransactionModel {

    public function insert() {
        $array_input = Input::all();

        $date_now = date('Y-m-d');
        $date_now = date('Y-m-d', strtotime($date_now));
        $date_start = date('Y-m-d', strtotime($array_input['startDate']));
        $date_end = date('Y-m-d', strtotime($array_input['endDate']));

        if (empty($array_input['id'])) {
            $active = $date_now >= $date_start && $date_now <= $date_end ? 1 : 0;
        } else {
            $active = $array_input['active'];
        }

        $array_insert = array(
            'title' => $array_input['title'],
            'content' => $array_input['content'],
            'startDate' => $array_input['startDate'],
            'endDate' => $array_input['endDate'],
            'active' => $active
        );

        DB::beginTransaction();
        try {
            if (!empty($array_input['id'])) {
                DB::table('announcements')->where('id', $array_input['id'])->update($array_insert);
            } else {
                DB::table('announcements')->insert($array_insert);
            }
            DB::commit();
        } catch (Exception $ex) {
            DB::rollback();
        }
    }

    public function delete_id() {
        $id = Input::get('id');
        DB::beginTransaction();
        try {
            DB::table('announcements')->where('id', $id)->delete();
            DB::commit();
        } catch (Exception $ex) {
            DB::rollback();
        }
    }

    public function get_using_id($id) {
        $query = DB::table('announcements')
                ->select('title', 'content', 'id', 'startDate', 'endDate', 'active')
                ->where('id', '=', $id);
        $get = $query->first();
        return $get;
    }

}
