<?php
require_once('DataModel.php');

class Sprint extends DataModel 
{
    protected $data = array(
        'id_sprint' => null,
        'name' => null,
    );

    const _CLASS_ = __CLASS__;
    const TABLE = 'sprint';
    const INDEX = 'id_sprint';
}