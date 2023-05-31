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
    session_start();
    $_SESSION['name'] = "";
    $_SESSION['level'] = "";
    $_SESSION['AID'] = "";
    header("Location:message2.php?message=已登出系統");

    ?>
</body>

</html>