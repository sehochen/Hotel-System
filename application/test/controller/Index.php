<?php
namespace app\test\controller;

use think\Controller;
use QL\QueryList;

class Index extends Controller
{
    public function index()
    {
        //采集某页面所有
        $ql = QueryList::get('http://aaccy.com/vod-detail-id-256.html');
       // $play=QueryList::get('http://aaccy.com/vod-play-id-256-src-1-num-1.html');
        $rt = [];
          // 采集文章标题
        $rt['title'] = $ql->find('.fn-clear h1')->text();
        //采集图片
        $rt['img'] = $ql->find('.fn-left src')->text();
        // 采集文章作者
        $rt['author'] = $ql->find('.fn-clear dl dd')->text();
        // 采集文章内容
        //$rt['content'] = $play->find('.play-list a')->text();
        //打印结果
        print_r($rt);

    }
    public function test(){
        //1.请求地址
        $url='http://aaccy.com/vod-detail-id-256.html';
        //2.请求规则
        $role=array(
            //获取网站title
            'title'=>array('title','text'),
        );
        //3.爬取数据
        //3.1)QueryList::Query()->data只获取数据
        $data=QueryList::Query($url,$role)->data;
        //3.2)QueryList::Query()->data只获取页面
        $data=QueryList::Query($url,$role)->html;
        //4.输出数据
        echo "<pre>";
        print_r($data);
        echo "<pre>";
    }
}
