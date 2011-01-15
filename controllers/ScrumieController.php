<?php

require_once ('./core/Service.php');

class ScrumieControllerException extends Exception {}
class ScrumieController extends Controller
{
    public function getService($name) {
        return Service::getService($name);
    }
}