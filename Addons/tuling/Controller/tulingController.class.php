<?php

namespace Addons\tuling\Controller;
use Home\Controller\AddonsController;

class tulingController extends AddonsController{
    public function index(){
        $apiurl='http://www.tuling123.com/openapi/api';
        $apikey='cee7cceecfa35e3a21d6e1483853f8b0';
        $openid='434343';
         $url=$apiurl.'?key='.$apikey.'&info=新闻'.'&userid='.$openid;    
        $message = json_decode ( http_get ( $url ), true );
        print_r($message);
    }
    function sss(){
        echo '2121';
    }
}
