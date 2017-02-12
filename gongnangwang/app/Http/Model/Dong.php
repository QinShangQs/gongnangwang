<?php

namespace App\Http\Model;
use DB;
use Validator;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Database\Eloquent\Model;

class Dong extends Model
{
    /**
     *
     * @活动信息insert
     * @wei
     * @2016-11-1
     */
    public function activityInsert($data)
    {
        $id = DB::table('gon_activity')->insertGetId($data);
        return $id;
    }


    /**
     *
     * @活动信息select
     * @wei
     * @2016-11-1
     */
    public function activitySelect()
    {
        $users = DB::table('gon_activity')
            ->where('id', '=', 1)
            ->get();
        return $users;
    }

}