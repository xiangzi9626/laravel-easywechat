<?php
namespace App\Http\Controllers\wechat;
use App\Http\Controllers\Controller;
class WechatController extends Controller
{
    public $app;
    public function __construct(){
        $this->app=app('wechat.official_account');
    }
    //微信服务器验证TOKEN 消息回复请一定要关闭CSRF
    public function serve(){
       // $app=app('wechat.official_account');
        $this->app->server->push(function ($message) {
            $type=$message["MsgType"];
            if (isset($message['Event']) && $message['Event'] == 'subscribe' && $message['EventKey'] == null){
                return "欢迎关注公众号";
            }else if ($type=="text"){
                return "你发送的是文字";
            }
        });
        return $this->app->server->serve();
    }
//  授权登录
    public function oauth(){
        $response =$this->app->oauth->scopes(['snsapi_userinfo']);
        dump($response);
    }
    //公众号菜单
    public function menu(){
        $buttons = [
            [
                "type" => "click",
                "name" => "今日歌曲",
                "key"  => "V1001_TODAY_MUSIC"
            ],
            [
                "name"       => "菜单",
                "sub_button" => [
                    [
                        "type" => "view",
                        "name" => "搜索",
                        "url"  => "http://www.soso.com/"
                    ],
                    [
                        "type" => "view",
                        "name" => "视频",
                        "url"  => "http://v.qq.com/"
                    ],
                    [
                        "type" => "click",
                        "name" => "赞一下我们",
                        "key" => "V1001_GOOD"
                    ],
                ],
            ],
        ];
        $this->app->menu->create($buttons);
    }
    public function str(){
        return "aabb";
    }
}
