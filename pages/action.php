<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Document</title>
 </head>
 <body>
  <?php
    $action = $_POST['action'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
	$email = $_POST['email'];
	$date = $_POST['date'];
	$period = $_POST['period'];
    $date_now = date("Y-m-d");

    $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
  <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
</svg>';

    $link = mysqli_connect('localhost','root','12345678','piano');
    if($action=="insert"){
        if(strtotime($date) < strtotime($date_now)){
            header("Location:message.php?message=無法預約過去時段");
        }else{
            $sql_a = "select * from 預約 where date = '$date' and period = '$period'";
            $result = mysqli_query($link, $sql_a);
            $num = mysqli_num_rows($result);
            if ($num == 0) {
                $sql  = "insert into 預約 (ID, name, phone, email, date, period) values (null, '$name', '$phone', '$email', '$date', '$period')";
                if (mysqli_query($link, $sql)) {
                    header("Location:message.php?message=新增完成");
                } else {
                    header("Location:message.php?message=新增失敗");
                }
            } else {
                header("Location:message.php?message=此時段不可預約");
            }
        }
    }
    else if($action=="delete"){
        $sql1  = "select * from 預約 where date = '$date' and period = '$period'";
        $result = mysqli_query($link, $sql1);
        if ($row = mysqli_fetch_assoc($result)) {
            $ifname = $row['name'];
            $ifphone = $row['phone'];
            $ifemail = $row['email'];
            $ID = $row['ID'];
        }

        if(($name == $ifname) and ($phone == $ifphone) and ($email == $ifemail)){
            $sql  = "delete from 預約 where ID='$ID'";
            if (mysqli_query($link, $sql)) {
                header("Location:message.php?message=取消成功");
            } 
            else {
                header("Location:message.php?message=取消失敗");
            }
        }
        else{
            header("Location:message.php?message=查無預約資料");
        }
    } 
    else if ($action == "dperiod") {
        $sql_b = "select * from 預約 where date = '$date' and period = '$period' and name= '$svg'";
        $result = mysqli_query($link, $sql_b);
        $num = mysqli_num_rows($result);
        if ($num == 0) {
            $sql  = "insert into 預約 (ID, name, phone, email, date, period) values (null, '$name', '$phone', '$email', '$date', '$period')";
            if (mysqli_query($link, $sql)) {
                header("Location:message.php?message=設置成功");
            } else {
                header("Location:message.php?message=設置失敗");
            }
        } else {
            header("Location:message.php?message=此時段已被設置不可預約");
        }
    }
  ?>
 </body>
</html>
