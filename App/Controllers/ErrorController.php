<?php

namespace Ti\Cardfraudsm\App\Controllers;



class ErrorController extends Controller{
   public function getErrorPage()
   {
        $this->view("errors/error", "erheader", "erfooter", []);
   }
}