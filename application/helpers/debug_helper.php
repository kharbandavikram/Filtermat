<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
if (!function_exists('debug')) {
    function debug($data,$exit=0,$type=0) {//type->1=exit,2->error show,3->error show
		
        $dub = debug_backtrace();
               
        echo '<pre><span  style="color:blue">';
        echo $dub[0]['file'] . "<br/>On Line Number ";
        echo $dub[0]['line'] . "<br/></span>";
        print_r($data);
        echo '</pre>';
		if($type){
			if($type==1){
				error_reporting(E_ERROR);//error
				ini_set('display_errors', 1);
			}elseif($type==2){
				$this->output->enable_profiler(TRUE);//profiler
			}
		}
		if($exit){ exit; }
    }
}
?>