<?php
    session_start();
    if(isset($_SESSION["user"])) {
        $message = htmlspecialchars(file_get_contents('php://input'));

        class Message {
            public $text;
            public $date;
            public $user_id;

            public function __construct($text, $date, $user_id) {
                $this->text = $text;
                $this->date = $date;
                $this->user_id = $user_id;
            }
        }

        $db = new PDO ('mysql:host=localhost;dbname=justin_chat','justin','justin');
        $req = $db->prepare('SELECT id FROM user WHERE username=:user');
        $req->bindValue('user', $_SESSION["user"], PDO::PARAM_STR);
        $req->execute();
        $id = $req->fetch();
        $obj = new Message($message, date("d/m/Y H:i:s"), $id['id']);

        $sql = 'INSERT INTO message(text,date,user_id) VALUES ("'.$obj->text.'","'.$obj->date.'",'.$obj->user_id.')';
        $req = $db->exec($sql);

    }
?>