<?php

namespace App\Http\Model;
use DB;
use Validator;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Database\Eloquent\Model;

class Pai extends Model
{
    /**
     *
     * @活动信息insert
     * @wei
     * @2016-11-1
     */
    public function auctionInsert($data)
    {
        $id = DB::table('gon_auction')->insertGetId($data);
        return $id;
    }


    /**
     *
     * @活动信息insert
     * @wei
     * @2016-11-1
     */
    public function contactInsert($data)
    {
        $id = DB::table('gon_contact')->insertGetId($data);
        return $id;
    }


    /**
     *
     * @活动信息select
     * @wei
     * @2016-11-1
     */
    public function auctionSelect()
    {
        $users = DB::table('gon_auction')
            ->join('gon_contact', 'gon_auction.id', '=', 'gon_contact.auc_id')
            ->where('gon_auction.id', '=', 1)
            ->get();
        return $users;
    }

}