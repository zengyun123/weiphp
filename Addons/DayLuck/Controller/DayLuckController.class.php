<?php

namespace Addons\DayLuck\Controller;
use Home\Controller\AddonsController;

class DayLuckController extends AddonsController{
    function index(){
        $config = getAddonConfig ( 'DayLuck' ); 
        var_dump($config);
    }
}
