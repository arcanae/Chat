<?php

    $db = new PDO('mysql:host=localhost;dbname=justin_chat','justin','justin');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT user.username, message.text, message.date FROM message, user WHERE user.id = message.user_id AND message.id <= (SELECT max(message.id) FROM message) AND message.id >= (SELECT max(message.id) FROM message)-20 ORDER BY message.id;';
    $req = $db->query($sql);
    $data = [];
    while($mess = $req->fetch()) {
        $data[] = $mess;
    }
    echo json_encode($data);
?>