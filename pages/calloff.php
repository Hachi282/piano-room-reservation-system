<!--
=========================================================
* Material Dashboard 2 - v3.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/piano.png">
    <link rel="icon" type="image/png" href="../assets/img/piano.png">

    <title>琴房借用系統</title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />

    <style>
        .mid {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        input[type=text] {
            border: none;
            border-bottom: 2px solid gray;
        }

        input[type=email] {
            border: none;
            border-bottom: 2px solid gray;
        }

        select {
            border: none;
            border-bottom: 2px solid gray;
        }

        input[type=date] {
            border: none;
            border-bottom: 2px solid gray;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    $name = $_GET['name'];
    $phone = $_GET['phone'];
    $email = $_GET['email'];
    $date = $_GET['date'];
    $period = $_GET['period'];

    ?>

    <main>
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><span class="opacity-5 text-dark" href="javascript:;">Pages</span></li>
                    <li class="breadcrumb-item text-sm text-dark" aria-current="page">取消預約<br><br></li>
                </ol>
            </nav>
        </div>

        <?php
        if (empty($_SESSION['level'])) {
            echo "<div style='text-align:center;font-size:40px'>請先登入帳號</div>";
        } else {
        ?>
            <div class="card mid" style="padding:20px">
                <form action="action.php" method="post">
                    <input type=hidden name="action" value="delete">
                    預約人:&nbsp;&nbsp; <input type="text" name="name" placeholder="輸入姓名" value="<?php echo $name ?>" required="required"> <br><br>
                    聯絡電話:&nbsp; &nbsp; <input type="text" name="phone" placeholder="輸入電話" value="<?php echo $phone ?>" required="required"> <br><br>
                    電子郵件: &nbsp; &nbsp; <input type="email" name="email" placeholder="輸入email" value="<?php echo $email ?>" required="required"><br><br>
                    日期: &nbsp; &nbsp; <input type="date" name="date" required="required"> <?php echo $emailErr ?><br><br>
                    時段: &nbsp; &nbsp;
                    <select name="period">
                        <option value="0">09:00 ~ 10:00</option>
                        <option value="1">10:00 ~ 11:00</option>
                        <option value="2">11:00 ~ 12:00</option>
                        <option value="3">13:00 ~ 14:00</option>
                        <option value="4">14:00 ~ 15:00</option>
                        <option value="5">15:00 ~ 16:00</option>
                        <option value="6">16:00 ~ 17:00</option>
                        <option value="7">17:00 ~ 18:00</option>
                    </select> <br><br>

                    <input type="submit" style="width:100%;background:cornflowerblue" name="submit" value="取消預約">
                </form>
                <?php if($_SESSION['level'] == "管理者"){?>
                <a href="calloff_d.php"><button style="margin-top:10px; background-color:#02C874">&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;修改刪除所有預約資料&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;</button></a>
                <?php }?>
            </div>
        <?php } ?>
    </main>

    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/material-dashboard.min.js?v=3.0.4"></script>
</body>

</html>