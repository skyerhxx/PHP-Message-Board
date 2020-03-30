<?php
namespace app\index\controller;
use think\Controller;
class Index extends Controller
{
    public function index()
    {
    	if(request()->isPost()){
    		$data=input('post.'); //发送过来的数据
            $data['time']=time();
    		//dump($data);  //打印
    		//die();//中断，下面的代码是不运行的
    		$add=db('mess')->insert($data);//写入数据表，这个mess是数据表me_mess,不是数据库的mess
    		if($add){
    			$this->success('留言成功！');
    		}else{
    			$this->error('留言失败！！！！');
    		}
    	}


        //取出所有留言数据
        $messRes=db('mess')->select();

        //分配数据
        $this->assign([
            'messRes'=>$messRes,
        ]);




        return view();
    }
}

