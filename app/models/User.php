<?php
require_once '../app/core/PDO.php';
class User
{
    public $id;
    public $username;
    public $password;

    public function __construct($id,$username,$password)
    {
        $this->id              = $id; 
        $this->username        = $username;
        $this->password        = $password;
    }

    public function __get($atrib)
    {
        return $this->$atrib;
    }

    public static function query($sql)
    {
            $pdo = new usePDO();
            $cnx = $pdo->getInstance();
            $cnx->exec(
            "CREATE TABLE IF NOT EXISTS user (
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                username VARCHAR(50) NOT NULL,
                password VARCHAR(50) NOT NULL)"
            );
            $result = $cnx->query($sql);
            return $result;
    }

    public static function view($id) {
        $user = User::query("SELECT id, username FROM user WHERE id = $id");
        $user = $user->fetchAll()[0];
        $user = new User(
            $user["id"], 
            $user["username"],
            null
        );
        return $user;
    }

    public static function listAll() {
        $users = User::query("SELECT id, username FROM user");
        $users = $users->fetchAll();
        $users_array=[];
        foreach ($users as $result_user){
            $result_user = new User(
                $result_user["id"],
                $result_user["username"],
                null
            );
            array_push($users_array, $result_user);
        }
        return $users_array;
    }

    public static function insert($request) {
        $product = new User(null, $request["username"], $request["password"]);

        try{
            $product = User::query("INSERT INTO user(username, password) VALUES ('$product->username', '$product->password');");
        }
        catch(Exception $e){
            echo $e;
        }
    }

    public static function update($request) {
      $user = new User($request["id"], $request["username"], $request["password"]);
      if (empty($request["password"])) {
        try
        {
          echo "UPDATE user SET username = '$product->username' WHERE id = $product->id";
          $user = User::query("UPDATE user SET 
          username = '$user->username'
          WHERE id = $user->id");
          return $user;
        }
        catch(Exception $e)
        {
          echo $e;
        } 
      } 
      else 
      {
        try
        {
          $user = User::query("UPDATE user SET 
          username = '$user->username', 
          password = '$user->password'
          WHERE id = $user->id");
          return $user;
        }
        catch(Exception $e)
        {
          echo $e;
        } 
      }
    }

    public static function delete($id) {
        try{
            $user = User::query("DELETE FROM user WHERE id=$id;");
        }
        catch(Exception $e){
            echo $e;
        }
    }
}
?>