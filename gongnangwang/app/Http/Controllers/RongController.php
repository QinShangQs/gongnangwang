<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Ren;
use App\Http\Requests;
use DB;

class RongController extends Controller
{
    /**
     *
     * @渲染融资顾问页面
     * @wei
     * @2016-11-18
     */
    public function rong()
    {
        return view('rong/rong');
    }


    /**
     *
     * @渲染融资顾问添加页面
     * @wei
     * @2016-11-18
     */
    public function rongadd()
    {
        return view('rong/rongadd');
    }
}