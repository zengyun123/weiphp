<?php

namespace Addons\Bug\Controller;
use Home\Controller\AddonsController;

class BugController extends AddonsController{
		public function index(){
                    echo '<meta charset="utf-8">';
                    $url=getWeixinUserInfo('oq3rHsw-PefXwoChyJ3RSz-mvv7A');
                    
                    $content = file_get_contents ( $url);
                    $content = json_decode ( $content, true );
                   // var_dump( $content);
                    //print_r( $content);
            
                   // echo json_encode($content['nickname']);
                 //   echo $content['nickname'];
                  var_dump(  deal_emoji($content['nickname'],0));
                    
                 //   print_r($content);
		}
}
