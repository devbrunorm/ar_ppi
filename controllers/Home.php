
<?php

use Application\core\Controller;

class Home extends Controller
{
  public function index()
  {
    $this->view('home/index');
  }
}