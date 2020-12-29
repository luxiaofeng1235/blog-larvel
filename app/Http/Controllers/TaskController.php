<?php
// ///////////////////////////////////////////////////
// Copyright(c) 2016,父母邦，帮父母
// 日 期：2016年4月12日
// 作　者：卢晓峰
// E-mail :xiaofeng.lu@fumubang.com
// 文件名 :TaskController.php
// 创建时间:下午7:12:00
// 编 码：UTF-8
// 摘 要:测试结果优化
// ///////////////////////////////////////////////////

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class TaskController extends Controller
{
    //配置主目录
    public function home(){
    	return 'Hello, World!';
    }


    //注释代码用，根据当前的需求来对相关额代码进行设置
    public function index()
	{
	    return 11;
	    return view('task.index')
	        ->with('tasks', Task::all());
	}
	//测试用主要对相关记性关联
	public function candy(){
		phpinfo();
	}

	//获取candy2的相关数据，主要用于获取相关数据
	public function candy2(Request $request){ //获取用户的输入
		//获取$-GET的一个值，没有使用默认值
		echo '获取url:'.$request->url();
		echo "<br/>";
        echo "获取PAth地址：".$request->path();
        echo "<br/>";
		echo '获取ip'.$request->ip();
		echo "<br/>";
		$port = $request->getPort();
		echo "port:".$port;
		echo "<br/>";
		$is_value  = $request->has('name'); //监测是否设置有值
		echo '<pre>';
		var_dump($is_value);
		echo '</pre>';
		echo "<hr/>";
		//提取部分参数
		$res = $request->only(['name','email']);
		//剔除部分参数
		$ret = $request->except(['age']);
		//获取cookie
		$cookie = $request->cookie();
//		$arr = $request->email; //动态表单参数获取方式
		if($request->has('oper')){
			echo "1";
		}else{
			echo "2";
		}
		echo '<pre>';
		var_dump($request->all());
		echo '</pre>';
		$sid = $request->input('sid',5555);
		echo '<pre>';
		print_R($sid);
		echo '</pre>';
		exit;

	}
}
