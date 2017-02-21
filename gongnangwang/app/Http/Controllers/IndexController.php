<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Index;
use App\User;
use Validator;
use Illuminate\Http\Request;
use Redirect, Input, Response;
use DB;
use Session;
header("Content-Type:text/html;charset=utf-8");
class IndexController extends Controller
{
    /**
     *
     * @渲染众筹列表页面
     * @wei
     * @2016-10-25
     */
    public function Index()
    {
    	
        $index = new Index();
        $pro = $index->proSelect();
        $par = $index->parSelect();
        return view('index2',['pro'=>$pro,'par'=>$par]);
    }
}