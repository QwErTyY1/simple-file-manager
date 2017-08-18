<?php defined('BASEPATH') OR exit('No direct script access allowed');


class HomeModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }

    public function getFileData($level=1)
    {

     return   $rootDirectory = directory_map(APPPATH.'/../UserContent/', $level);

    }


}