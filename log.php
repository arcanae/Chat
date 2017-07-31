<?php

    $data = htmlspecialchars(file_get_contents('php://input'));
    echo $data;

?>