<?php

namespace Addons\BugTest\Controller;
use Home\Controller\AddonsController;

class BugTestController extends AddonsController{
    public function index(){
        var_dump(get_token_appinfo());
    }
}
