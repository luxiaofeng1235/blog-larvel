<?php
namespace App\Http\Controllers;

class MemberController extends Controller
{


	//单独顶一个一个控制器
	public function info($sid){

		return 'member-info-sid:'.$sid;
	}

	//设置相关的函数说明
    public  function  addIndex(){
	    return phpinfo();
    }
}
?>
