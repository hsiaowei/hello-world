<?php
namespace Api\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	//var
		if($_GET['page']){
			$callback = isset($_GET['callback']) ? $_GET['callback'] : '';
			$page = I('page');
			$data['data'] = M('WechatJoke')->limit($page.',10')->select();
			$data['status']=1;
			$data['message']='调用成功';
			
 			if (!empty($callback)) {
 				$json = $callback . '(' .json_encode($data) . ')';
 			}else{
 				$json=json_encode($data);
 			}
 			echo $json;die;
			
		}else{
			$data['status']=0;
			$data['message']='调用失败！';
			die(json_encode($data));
        }
    }
}