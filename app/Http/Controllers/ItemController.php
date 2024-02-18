<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB; #引入DB操作类
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Foundation\Auth\User as Authenticatable;


class ItemController extends Controller
{

	//查询解析器构建
	public function select(){
        //开启sql的log跟踪
//      DB::enableQueryLog()->enableQueryLog();#开启执行日志;
        #定义表名称的基本属性信息
    	$db = Db::table('a_table');
    	//查询转换为对应的数组
    	$result = $db->select('*')
    			      ->where('a_id','>','1')
    			      ->groupBy('a_name')
    			      ->orderBy('a_id','desc')
    	              ->get()
    	              ->map(function ($value){
    	              		return (array) $value;
    	              })->toArray();
//    	echo '<pre>';
//    	print_R($result);
//    	echo '</pre>';
    	 if($result){
    	 	foreach($result as $v){
    	 		 echo '<pre>';
    	 		 print_R($v['a_id'].'--'.$v['a_name'].'--'.$v['a_part']);
    	 		 echo '</pre>';
    	 	}
    	 }
    	$data = $db->where('a_id',5)->value('a_part');
     	echo '<pre>';
     	print_R($data);
     	echo '</pre>';

        //print_r(DB::connection());  //获取查询语句、参数和执行时间
        exit;

    }

    //插入数据
    public function add(){
    	#定义关联操作表
    	$db = DB::table('a_table');
    	//使用insert来增加记录数据  --多条数据
    	//插入数据
    	 $result = $db->insert([
    	 	'a_name'=>'来吧你的菜11','a_part'=>'调侃三人组' ,
    	 ]);

    	 echo '<pre>';
    	 var_dump($result);
    	 echo '</pre>';
    	 exit;

    	//插入一条--不建议这么用
    	$result = $db->insertGetId([
    		'a_name'=>'刘皇叔',
    		'a_part'=>'上市CEO'
    	]);
    	//使用insertGetId
    	echo '<pre>';
    	var_dump($result);
    	echo '</pre>';
    	exit;


//    	DB::insert('insert into users (id, name) values (?, ?)', [1, '学院君']);
//    	测试数据库连接是否成功
//    	 $users = Db::table('a_table')
//    	 		->select('a_id','a_name as username')
//    	 		->where(['a_id'=>1])
//    	 		->orderBy('a_id','desc')
//    	 		->get();
//    	 echo '<pre>';
//    	 var_dump($users);
//    	 echo '</pre>';
//    	 exit;
//    	 phpinfo();
//    	 echo 33;exit;
//    	 //定义指定的数据库表操作
//    	 $db  = DB::table('a_table');
//    	 echo '<pre>';
//    	 print_R($db);
//    	 echo '</pre>';
//    	 exit;
    }

    //编辑
	public function edit(){
        #實例化Model對象
		$db  = DB::table('a_table');
		//修改数据操作
		$ret = $db->where('a_id',5)
				->update(['a_part'=>'2224']);
		// $ret = $db->where('a_id',5)->increment('age'，10); #对相关字段做递增操作
		// $ret = $db->where('a_id',5)->decrement('age'，10); #递减操作
		echo '<pre>';
		var_dump($ret);
		echo '</pre>';
		exit;
	}

	//删除
    public function del(){
    	$db  = DB::table('a_table');
    	$id = 5;
    	//删除某个条件下的数组 可以按照条件来进行
    	$ret  = $db->where('a_id','<',$id)->delete();
    	//清空整张表
    	// $ret = $db->truncate(); // 清空整张表
    	echo '<pre>';
    	dd($ret);
    	echo '</pre>';
    	exit;
    }
}
