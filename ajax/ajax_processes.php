<?php
if(!$_POST){ exit; }
if((!$_POST['process']) || (trim($_POST['process']) == "")){ exit; }
include("../classes/gamify.class.php");

class ajax_processes
{
    public $gamify;
    function __construct()
    {
        $this->gamify = new Gamify;
    }

    public function show_action_buttons()
    {

        $params['token']    = $this->gamify->get_token($this->gamify->salt);
        $params['type']     = "actions";
        $method             = "scheme_get_items";
        $button_array = json_decode($this->gamify->api($method, $params));

        if($button_array)
        {
            $prompt = "Double-click an action to run it.<br />Actions will be awarded to 'Gamify.WS Test User'";


            echo "<p><small>".$prompt."</small></p>";
            foreach($button_array as $button)
            {
                echo "<a href='#' id='btn_".$button->id."' class='btn btn-small run_action' data-action_name='".$button->name."' title='".$button->name."'>".$button->name."</a>";
            }
        }
    }

}

$process = new ajax_processes();

$process_function = $_POST['process'];
$process->$process_function();