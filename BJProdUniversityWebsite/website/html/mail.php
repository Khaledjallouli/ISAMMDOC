<?php
if($_POST){
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $phone = $_POST['phone'];

//send email
    mail("j.andrew.sears@gmail.com", "51 Deep comment from" .$mail, $phone);
}
?>