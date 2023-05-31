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
</head>

<body class="">
    <?php session_start(); ?>

    <div class="main-content position-relative max-height-vh-100 h-100">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><span class="opacity-5 text-dark" href="javascript:;">Pages</span></li>
                    <li class="breadcrumb-item text-sm text-dark" aria-current="page">個人資料<br><br></li>
                </ol>
            </nav>
        </div>

        <?php
        if (empty($_SESSION['level'])) {
            echo "<div style='text-align:center;font-size:40px'>請先登入帳號</div>";
        } else {
        ?>
        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
                <span class=" bg-gradient-primary  opacity-6"></span>
            </div>

            <?php
            $n = $_SESSION['AID'] % 9;
            $img = "$n.jpg";
            ?>

            <div class="card card-body mx-3 mx-md-4 mt-n6">
                <div class="row gx-4 mb-2">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="../assets/img/<?php echo $img;?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                <?php echo $_SESSION['name']; ?>
                            </h5>
                            <p class="mb-0 font-weight-normal text-sm">
                                <?php echo $_SESSION['level']; ?>
                            </p>
                        </div>
                    </div>
                </div>

                <?php
                $AID = $_SESSION['AID'];
                $link = mysqli_connect('localhost', 'root', '12345678', 'piano');
                $sql  = "select  * from account where AID='$AID'";
                $result = mysqli_query($link, $sql);
                if ($row = mysqli_fetch_assoc($result)) {
                    $name = $row['name'];
                    $account = $row['account'];
                    $password = $row['password'];
                }
                ?>

                <div class="row">
                    <div class="col-12 col-xl-4">
                        <div class="card card-plain h-100">
                            <div class="card-header pb-0 p-3">
                                <div class="row">
                                    <div class="col-md-8 d-flex1 align-items-center">
                                        <h5 class="mb-0" style="padding-right:20px">Profile Information</h5>
                                        <a href='<?php echo "profile_form.php?name=$name&account=$account&password=$password"; ?>'>
                                            <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-3">

                                <ul class="list-group">
                                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Name:</strong> &nbsp; <?php echo $name; ?></li>
                                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Account:</strong> &nbsp; <?php echo $account; ?></li>
                                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Password:</strong> &nbsp; <?php echo $password; ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
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