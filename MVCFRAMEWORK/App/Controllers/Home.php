<?php
namespace App\Controllers;
use \Core\View;
    class Home extends \Core\Controller
    {
        protected function before(){
            //echo "(before)";
           //return false;
        }
        protected function after(){
            //echo "(after)";
        }
        public function indexAction(){
            //echo "Hello From the indexAction in the Home Controller";
            $data = ['name'=>'Bhakti Vagadia','fruits'=>['Apple','Orange','Grapes']];
            View::renderTemplate("Home/index.html",$data);
        }
    }
?>