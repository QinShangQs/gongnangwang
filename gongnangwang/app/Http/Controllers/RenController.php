<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Ren;
use App\Http\Model\User;
use App\Http\Model\JobDelivers;
use App\Http\Requests;

use DB;
use Session;
use Illuminate\Support\Facades\Redis as Redis;
use App\Http\Model\JobDeliver;

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
        return view('ren.ren_m',['data'=>$par_data,'pname'=>$pname,'partner_extend_id'=>$val[3]]);
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
    	$ren = new Ren();
    	$partner = $ren->partnerByUserId(Session::get('user_id'));
    	//dd($partner->id);
    	$jobCount = $ren->countJobsByParId($partner->id);
    	//控制发布职位数量，公司10个，个人5个
    	if($partner->par_protype == 1 && $jobCount >= 10){
    		echo "<script>alert('您只能发布10个职位'); location.href='/my1'</script>";
    	}else if($partner->par_protype == 2 && $jobCount >= 5){
    		echo "<script>alert('您只能发布5个职位'); location.href='/my1'</script>";
    	}else{
    		return view('ren/pinadd');
    	}
        
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
    
    /*合伙人岗位上下线*/
    public function position_line(Request $request)
    {
    	$input = $request->all();
    	$pos_id = $input['pos_id'];
    	$line_status = $input['line'];
    
    	$Ren = new Ren();
    	$Ren->jobLineStatusUpdate($pos_id, $line_status);
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
        $extend['publish_status'] = _JOB_PUB_STATUS_RECOMMIT;//修改后为须重新审核

        $Ren = new Ren();
        $res = $Ren->partnerExtendUpdate($extend);
        echo $res;
    }
    
    public function deliver(Request $request){
    	$input = $request->all();
    	$par_id = $input['par_id'];
    	$exnted_id = $input['job_id'];
    	$user_id = Session::get('user_id');
    	$user_name = Session::get('user_name');
    	
    	if(!isset($user_id) || !isset($user_name)){
    		echo json_encode(array('code'=> 1,"msg" =>'请您登录后投递简历','href'=>'/login' ));
    		exit;
    	}
    	
    	$userModel = new User();
    	$user = $userModel->getById($user_id);
    	if(empty($user->resume)){
    		echo json_encode(array('code'=> 2,"msg" =>'请您上传简历后投递简历','href'=>'/useredit' ));
    		exit;
    	}
    	
    	$jobDeliversModel = new JobDelivers();
    	$oldDeliver = $jobDeliversModel->getByJobId($exnted_id, $user_id);
    	if(!empty($oldDeliver)){
    		echo json_encode(array('code'=> 3,"msg" =>'您已投递过了！','href'=>'' ));
    	}else{
    		$data = array();
    		$data['user_id'] = $user_id;
    		$data['extend_id'] = $exnted_id;
    		$data['par_id'] = $par_id;
    		$data['resume'] = $user->resume;
    		$newId = $jobDeliversModel->insert($data);
    		
    		if($newId){
    			echo json_encode(array('code'=> 0,"msg" =>'简历投递成功！','href'=>'' ));
    			exit;
    		}else{
    			echo json_encode(array('code'=> 4,"msg" =>'简历投递失败，请稍后重试！','href'=>'' ));
    			exit;
    		}
    	}
    }
}