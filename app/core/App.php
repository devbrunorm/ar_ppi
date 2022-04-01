<?php

class App
{
    protected $controller  = 'home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();
        if(file_exists('../app/controllers/'.$url[0].'.php'))
        {
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once '../app/controllers/'.$this->controller.'.php';
        $this->controller = $this->controller."Controller";
        $this->controller = new $this->controller;

        if(isset($url[1]))
        {
            if(method_exists($this->controller, $url[1]))
            {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl()
    {
        if(isset($_GET['url']))
        {
            if (isset($_SESSION["username"]) || $_GET['url'] == "user/login" || $_GET['url'] == "user/register" || $_POST['url'] == "user/login" || $_POST['url'] == "user/register") {
                return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
            } else {
                header("Location: http://localhost/ar_ppi/public/user/login");
            }
        }
    }
}
?>