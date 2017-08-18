<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Abstact_controller extends CI_Controller
{

    static  $num = 1;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('directory');

        $models = $this->getModels();

        if ($models !== "" || !empty($models)){

            foreach ($models as $model){

                $this->load->model(substr($model,0,9));

            }

        }

    }

    public function buildTwo($rout = "")
    {
        $data = [];
        $home = directory_map($this->config->item('directory_map') . $rout, 1);

        if (!empty($dirName) || $rout !== "") {

            $data["user_content"] = $home;

        }else{
            $data["user_content"] = $home;
        }

        foreach ($data["user_content"] as $key => $content) {

            if (strripos($content, '\\')) {
                $name = substr($content, 0, -1);
                $data["user_content"][$key] = "<button class='goBtn' data-rout='$name' data-level=''>" . $name . "</button>";
            } elseif (strripos($content, 'png') || strripos($content, 'gif') || strripos($content, 'jpg') ){
//                $data["user_content"][$key] = "<span  data-type='img' class='seeFiles'>". $content. "</span>";
                $data["user_content"][$key] = "<span  data-type='img' class='seeFiles'>". $content. "</span>";

            } else{
                $data["user_content"][$key] = "<span class='seeFiles'>". $content. "</span>";
            }
        }

        return $data;
    }


    protected function template($template_name, $vars = array(), $return = FALSE)
    {

        if($return):
            $content  = $this->load->view('_templates/header', $vars, $return);
            $content .= $this->load->view($template_name, $vars, $return);
            $content .= $this->load->view('_templates/footer', $vars, $return);

            return $content;
        else:
            $this->load->view('_templates/header', $vars);
            $this->load->view($template_name, $vars);
            $this->load->view('_templates/footer', $vars);
        endif;

    }


    protected function getModels()
    {
        $dir    = __DIR__.'/../models/';
        $files = scandir($dir);
        $files2 = [];


        foreach ($files as $file){

            if ($file == "." || $file == ".." || $file == "index.html"){
                continue;
            }

            $files2[] = $file;

        }

        return $files2;

    }


}