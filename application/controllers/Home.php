<?php defined('BASEPATH') OR exit('No direct script access allowed');

require __DIR__ . '/Abstact_controller.php';

class Home extends Abstact_controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('directory');

    }

    public function index()
    {

        $data = $this->buildTwo();

        $this->template("home/index", $data);

    }

    public function getAjaxResponse()
    {

        $nameDir = $this->input->post("rout");

        $data = $this->buildTwo($nameDir);

        $this->template("home/index", $data);

    }

    public function readFile()
    {

        $baseDir = $this->config->item('directory_map');
        $path = $baseDir.''.$this->input->post("path_file");

        $this->load->helper('file');

        $string = read_file($path);

        $response = array('string' => $string, 'status'=> 'string','path' => $path);

        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));

    }



}