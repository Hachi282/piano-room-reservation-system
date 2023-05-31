<?php
$ID = $_GET['ID'];
$action = $_GET['action'];

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$link = mysqli_connect('localhost', 'root', '12345678', 'piano');

if($action == "delete"){
    $sql = "delete from 預約 where ID = '$ID'";
    if (mysqli_query($link, $sql)) {
        header("Location:message.php?message=已刪除該筆資料");
    } else {
        header("Location:message.php?message=刪除失敗");
    }
}
else if ($action == "update"){
    $sql = "update 預約 set name='$name', phone='$phone', email='$email' where ID='$ID'";
    if (mysqli_query($link, $sql)) {
        header("Location:message.php?message=已修改該筆資料");
    } else {
        header("Location:message.php?message=修改失敗");
    }
}
