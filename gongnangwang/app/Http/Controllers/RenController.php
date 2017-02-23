<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Ren;
use App\Http\Model\User;
use App\Http\Requests;

use DB;
use Session;
use Illuminate\Support\Facades\Redis as Redis;

header("Content-Type:text/html;charset=utf-8");
class RenController extends Controller
{
    /**
     *
     * @渲染合伙人列表页面
     * @wei
     * @2016-10-
     */
    public function ren()
    {
        $Ren = new Ren();
        $data = $Ren->positionMoreSelect();
        $ren_data = $Ren->partnerIndexSelect();

//        print_r($data);
//        die;
       // $arr = get_object_vars($data);
        return view('ren/ren',['data'=>$data,'ren_data'=>$ren_data]);
    }


    /**
     *
     * @渲染合伙人添加页面
     * @wei
     * @2016-11-
     */
    public function renadd()
    {
        $id = Session::get('user_id');
        $user_name = Session::get('user_name');

        $User = new User();
        $data = $User->userSelect($id);

        $Ren = new Ren();
        $ren_title = $Ren->partnerOne($id);


        if(!isset($id) || !isset($user_name))
        {
            echo "<script>alert('请先登录'); location.href='/login'</script>";
        }
        elseif($data=='' || empty($data))
        {
            echo "<script>alert('请先完善个人信息'); location.href='/useradd'</script>";
        }
        elseif($ren_title=='' || empty($ren_title))
        {
            return view('ren/renadd');
        }
        else
        {
            echo "<script>alert('您只能发布一个合伙人项目'); location.href='/ren';</script>";
        }

    }


    /**
     *
     * @合伙人添加功能
     * @wei
     * @2016-10-
     */
    public function rendo(Request $request)
    {
        $input = $request->all();

        $data['par_title'] = $input['par_title'];
        $data['par_proname'] = $input['par_project'];
        $data['par_protype'] = $input['par_protype'];
        $data['par_website'] = $input['par_website'];
        $data['par_team'] = $input['par_team'];
        $data['par_finance'] = $input['trading'];
        $data['par_address'] = $input['s_province'].','.$input['s_city'].','.$input['s_county'];
        //合伙人logo
        $data['par_logo'] = $input['par_logo'];
        //合伙人视频
        $data['par_video'] = $input['par_video'];
        $data['par_datetime'] = date('Y-m-d H:i:s',time());

        $User = new User();
        $user_id = $User->userinfoID(Session::get('user_id')) ;

        $data['user_id'] =  $user_id[0]->id;
        $Ren = new Ren();
        $res = $Ren->partnerInsert($data);

        Redis::set(Session::get('user_id').'pin',$res);
        if($res){
            echo "<script>alert('请继续添加合伙人岗位');location.href='/pinadd'</script>";
        }
    }

    //渲染合伙人修改页面
    public function renedit()
    {
        $user_id = Session::get('user_id');
        $Ren = new Ren();
        $res = $Ren->partnerUpdate($user_id);

        return view('ren/renedit',['ren_data'=>$res]);
    }


    //合伙人修改处理
    public function renedit_do(Request $request)
    {
        $input = $request->all();

        $Ren = new Ren();
        $user_id = Session::get('user_id');
        $ren_data = $Ren->partnerUpdate($user_id);

        $data['id'] = $ren_data[0]->pid;
        $data['par_title'] = $input['par_title'];
        $data['par_proname'] = $input['par_project'];
        $data['par_protype'] = $input['par_protype'];
        $data['par_website'] = $input['par_website'];
        $data['par_team'] = $input['par_team'];
        $data['par_finance'] = $input['trading'];
        $data['par_address'] = $input['s_province'].','.$input['s_city'].','.$input['s_county'];
        //合伙人logo
        $data['par_logo'] = $input['par_logo'];
        //合伙人视频
        $data['par_video'] = $input['par_video'];
        $data['par_datetime'] = date('Y-m-d H:i:s',time());

        $User = new User();
        $user_id = $User->userinfoID(Session::get('user_id'));

        $data['user_id'] =  $user_id[0]->id;
        $Ren = new Ren();
        $res = $Ren->partnerUpdateDo($data);
        if($res){
            return redirect('/my1');
        }
    }

    /**
     *
     * @合伙人单展示页面
     * @wei
     * @2016-10-2
     */
    public function ren_m()
    {
        $input = $_SERVER["REQUEST_URI"];
        $val =  explode("/",urldecode($input));

        $Ren = new Ren();
        $data = $Ren->extendParID($val[3]);

        $par_data = $Ren->partnerSelect($val[2],$data[0]->par_id);
        $pname = $Ren->positionName($val[2],$data[0]->par_id);

        //$arr = $chou->partnerExtendSelect();
        //$a=array_merge_recursive($data,$arr);
        return view('ren/ren_m',['data'=>$par_data,'pname'=>$pname]);
    }


    //ren_m 职位
    public function position(Request $request)
    {
        $ren = new Ren();
        $input = $request->all();

        $par_id = $input['par_id'];
        $pos_id = $ren->positionFirst($par_id);

        $pid = isset($input['pid']) ? $input['pid'] : $pos_id->id;
        $arr = $ren->positionSelect($pid,$par_id);


        $a=get_object_vars($arr);

        echo json_encode($a) ;
    }


    //ren 职位分页
    public function position_page(Request $request)
    {
        $input = $request->all();
        $page = $input['page'];

        $Ren = new Ren();
        $pos_data = $Ren->position_page($page);

    /*    $arr = json_encode($pos_data);
        $data = json_decode($arr,true);*/

        return view('ren/position_reply',['data'=>$pos_data]);
    }

    /**
     *
     * @单展示页面
     * @wei
     * @2016-10-2
     */
    public function ren_s()
    {
        $Ren = new Ren();

        $ren_data = $Ren->ren_sSelect();
//        print_r($ren_data);
//        die;
        return view('ren/ren_s',['ren_data'=>$ren_data]);
    }


    public function ren_p()
    {
        $Ren = new Ren();
        $pos_data = $Ren->companyPositionSelect();

//        print_r($pos_data);
//        die;

        return view('ren/ren_p',['pos_data'=>$pos_data]);

    }


    /**
     *
     * @渲染职位添加页面
     * @wei
     * @2016-11-8
     */
    public function pinadd()
    {
        return view('ren/pinadd');
    }


    /**
     *
     * @职位添加入库处理
     * @wei
     * @2016-11-8
     */
    public function pindo(Request $request)
    {
        $input = $request->all();
        //合伙人/工作岗位
        $extend['par_position'] = $input['par_position'];
        $extend['par_work'] = $input['par_work'];
        $extend['par_education'] = $input['par_education'];
        $extend['par_age'] = $input['par_age'];
        $extend['par_mode'] = $input['par_mode'];
        $extend['par_pay_type'] = $input['par_pay_type'];
        if($input['par_mon']=="" || $input['par_mon']=="undefined"){
            $extend['par_pay'] = $input['par_ann'];
        }else{
            $extend['par_pay'] = $input['par_mon'];
        }
        $extend['par_return_type'] = $input['par_return_type'];

        if($input['par_shares']=="" || $input['par_shares']=="undefined"){
            $extend['par_return'] = $input['par_other'];
        }else{
            $extend['par_return'] = $input['par_shares'];
        }
        $extend['par_duty']=$input['par_duty'];
        $extend['par_ask']=$input['par_ask'];

        $extend['par_datetime'] = date('Y-m-d H:i:s',time());
        $extend['par_id'] = Redis::get(Session::get('user_id').'pin');

        $Ren = new Ren();
        $res = $Ren->partnerExtendInsert($extend);
        echo $res;
    }


    /**
     *
     * @合伙人项目评论入库处理
     * @wei
     * @2016-11-11
     */
    public function comment(Request $request)
    {
        $input = $request->all();
        $data['com_content'] = $input['com_content']; //评论内容
        $data['par_id'] = $input['par_id']; //评论内容
        $data['user_id'] = Session::get('user_id'); //用户id
        $Ren = new Ren();
        $res = $Ren->partnerCommentInsert($data);
        echo $res;
    }

    /*合伙人职位删除*/
    public function position_delete(Request $request)
    {
        $input = $request->all();
        $pos_id = $input['pos_id'];

        $Ren = new Ren();
        $Ren->position_delete($pos_id);
    }


    /*渲染合伙人职位编辑页面*/
    public function position_edit(Request $request)
    {
        $input = $request->all();
        $pos_id = $input['pos_id'];

        $Ren = new Ren();
        $pos_data = $Ren->position_per($pos_id);

        return view('ren/position_edit',['pos_data'=>$pos_data]);
    }


    /**
     *
     * @职位添加入库处理
     * @wei
     * @2016-11-8
     */
    public function position_edit_do(Request $request)
    {
        $input = $request->all();

        $extend['par_position'] = $input['par_position'];
        $extend['par_work'] = $input['par_work'];
        $extend['par_education'] = $input['par_education'];
        $extend['par_age'] = $input['par_age'];
        $extend['par_mode'] = $input['par_mode'];
        $extend['par_pay_type'] = $input['par_pay_type'];
        if($input['par_mon']=="" || $input['par_mon']=="undefined"){
            $extend['par_pay'] = $input['par_ann'];
        }else{
            $extend['par_pay'] = $input['par_mon'];
        }
        $extend['par_return_type'] = $input['par_return_type'];

        if($input['par_shares']=="" || $input['par_shares']=="undefined"){
            $extend['par_return'] = $input['par_other'];
        }else{
            $extend['par_return'] = $input['par_shares'];
        }
        $extend['par_duty']=$input['par_duty'];
        $extend['par_ask']=$input['par_ask'];

        $extend['par_datetime'] = date('Y-m-d H:i:s',time());
        $extend['par_id'] = Redis::get(Session::get('user_id').'pin');
        $extend['pos_id'] = $input['pos_id'];

        $Ren = new Ren();
        $res = $Ren->partnerExtendUpdate($extend);
        echo $res;
    }
}