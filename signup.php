<?php

if(isset($_POST['user'])) {

    class User {
        public $username;
        public $pass;
        public $ver_pass;

        public function __construct($username, $pass, $ver_pass) {
            $this->username = $username;
            $this->pass = $pass;
            $this->ver_pass = $ver_pass;
        }
    }

    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $obj = new User($post['user'], $post['pass'], $post['verifpass']); 
    $obj->username = str_replace(" ", "", $obj->username);
    function createAcc($obj) {
        $return = verifErrorSQL($obj);
        if ($return == false) {
            addUserSQL($obj);
        }
        session_start();
        $db = new PDO ('mysql:host=localhost;dbname=justin_chat','justin','justin');
        $req = $db->prepare('SELECT * FROM user WHERE username=:user');
        $req->bindValue('user', $obj->username, PDO::PARAM_STR);
        $req->execute();
        $data = $req->fetch();
        $_SESSION['user'] = $obj->username;
        header("location:index.php");
    }

    function addUserSQL($user) {
        try {
            $db = new PDO('mysql:host=localhost;dbname=justin_chat','justin','justin');
            $sql = 'INSERT INTO user(username,pass) VALUES ("'.$user->username.'","'.md5($user->pass).'");'; 
            $req = $db->exec($sql); 
            $db = null;
        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }
    }

    function verifErrorSQL($obj) {
        $continue = true;
        if ($obj->username == "") {
            echo "Entrer un nom d'utilisateur";
            exit();
        }
        try {

            $db = new PDO('mysql:host=localhost;dbname=justin_chat','justin','justin');
            $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql = 'SELECT * FROM user;';
            $req = $db->query($sql);
            while($data = $req->fetch()) {
                $ver_user = htmlspecialchars($data['username']);
                if (strtolower($obj->username) == strtolower($ver_user)) {
                    echo "Ce pseudo est déjà utilisé";
                    $continue = false;
                    exit();
                }
            } 
        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }

        $db = null;
        
        if ($obj->pass == "") {
            echo "Entrer un mot de passe";
            exit();
        } elseif ($obj->pass != $obj->ver_pass){
            var_dump($obj->pass);
            var_dump($obj->ver_pass);
            echo "Les mots de passe ne correspondent pas";
            exit();
        }
        else {
            $error = false;
            return $error;
        }
        
    }

    createAcc($obj);
}

?>
