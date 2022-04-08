<?php
require_once "../app/models/User.php";

class UserController extends Controller 
{
    public function index()
    {   
        $users = User::listAll();

        $this->view('user/index', ["users" => $users]);
    }

    public function show($id)
    {   
        $user = User::show($id);

        $this->view('user/show', ["user" => $user]);
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
        if ($_SERVER['REQUEST_METHOD'] == 'GET') 
        {
            $this->view('user/login', []);
        }
        else if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if (User::validate_login($_POST["username"], $_POST["password"])) {
                $_SESSION["username"] = $_POST["username"];
                $_SESSION["id"] = User::get_id($_SESSION["username"], $_POST["password"]);
                header("Location: http://localhost/ar_ppi/public/home/index");
            } else {
                header("Location: http://localhost/ar_ppi/public/user/login");
            }
        }
    }

    public function logout() {
        session_destroy();
        header("Location: http://localhost/ar_ppi/public/user/login");
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') 
        {
            $this->view('user/register', []);
        } 
        else if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
            $request = $_POST;
            User::insert($request);
            header("Location: http://localhost/ar_ppi/public/user/index");
        }
    }
}
?>