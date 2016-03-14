<?php

namespace Addons\Bug\Controller;
use Home\Controller\AddonsController;

class BugController extends AddonsController{
		public function index(){
        $apiurl='http://www.tuling123.com/openapi/api';
        $apikey='cee7cceecfa35e3a21d6e1483853f8b0';
        $openid='434343';
        echo '<meta charset="utf-8">';
         $url=$apiurl.'?key='.$apikey.'&info=青椒炒肉丝'.'&userid='.$openid;    
        $message = json_decode ( http_get ( $url ), true );
        print_r( $message['list']);
        //print_r($message);
    }
}
