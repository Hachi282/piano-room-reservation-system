<?php
$date = $_GET['date'];
$period = $_GET['period'];
$link = mysqli_connect('localhost', 'root', '12345678', 'piano');
$sql = "delete from 預約 where date='$date' and period='$period'";
if (mysqli_query($link, $sql)) {
    header("Location:message.php?message=已移除該不可預約時段");
} else {
    header("Location:message.php?message=移除失敗");
}
?>