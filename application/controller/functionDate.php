<?php
    session_start();
    $date = $_POST['date'];
    $_SESSION['date'] = $date;
?>