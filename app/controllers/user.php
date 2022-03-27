<?php
require_once "../app/models/User.php";

class UserController extends Controller 
{
    public function index()
    {   
        $users = User::listAll();

        $this->view('user/index', ["users" => $users]);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->view('user/add', []);
        }
        else if ($_SERVER['REQUEST_METHOD'] === 'POST') 
        {
            $request = $_POST;
            User::insert($request);
            header("Location: http://localhost/ar_ppi/public/user/index");
        }
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->view('user/edit', $id);
        }
        else if ($_SERVER['REQUEST_METHOD'] === 'POST') 
        {
            $request = $_POST;
            User::update($request);
            header("Location: http://localhost/ar_ppi/public/user/index");
        }
    }

    public function delete($id)
    {
        User::delete($id);
        $this->view('user/index', ["users" => $users]);
    }

    public function login() {
        $this->view('user/login', []);
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') 
        {
            $this->view('user/register', []);
        } 
        else if ($_SERVER['REQUEST_METHOD'] === 'POST') 
        {
            $request = $_POST;
            var_dump($request);
            User::insert($request);
            header("Location: http://localhost/ar_ppi/public/user/index");
        }
    }
}
?>