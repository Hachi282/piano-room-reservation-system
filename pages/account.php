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


        select {
            border: none;
            border-bottom: 2px solid gray;
        }

    </style>
</head>

<body>
    <?php session_start(); ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><span class="opacity-5 text-dark" href="javascript:;">Pages</span></li>
                    <li class="breadcrumb-item text-sm text-dark" aria-current="page">帳號管理<br><br></li>
                </ol>
            </nav>
        </div>

        <?php
        if ($_SESSION['level'] != "管理者") {
            echo "<div  style='text-align:center;font-size:40px'>未擁有此權限</div>";
        } else {
        ?>
            <div class="card">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">姓名</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">帳號</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">密碼</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">身分</th>
                                <th class="text-secondary opacity-7"></th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $link = mysqli_connect('localhost', 'root', '12345678', 'piano');
                            $sql = "select * from account";
                            $result = mysqli_query($link, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $name = $row['name'];
                                $account = $row['account'];
                                $password = $row['password'];
                                $level = $row['level'];
                                echo
                                "<tr>
                                <td>
                                    <div class='d-flex1 px-2 py-1'>
                                        <div class='d-flex1 flex-column justify-content-center'>
                                            <h6 class='mb-0 text-s'>" . $name . "</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class='text-sm font-weight-bold mb-0'>" . $account . "</p>
                                </td>
                                <td>
                                    <p class='text-sm font-weight-bold mb-0'>" . $password . "</p>
                                </td>
                                <td>
                                    <p class='text-sm font-weight-bold mb-0'>" . $level . "</p>
                                </td>
                                <td class='align-middle'>
                                    <a href='account_form.php?name=$name&account=$account&password=$password&level=$level' class='btn btn-link text-dark px-3 mb-0' data-toggle='tooltip' data-original-title='Edit user'>
                                        <i class='material-icons text-sm me-2'>edit</i>
                                        Edit
                                    </a>
                                </td>
                                <td class='align-middle'>
                                    <a href='account_X.php?action=delete&account=$account&password=$password' class='btn btn-link text-danger text-gradient px-3 mb-0' data-toggle='tooltip' data-original-title='Delete user'>
                                        <i class='material-icons text-sm me-2'>delete</i>
                                        Delete
                                    </a>
                                </td>
                            </tr>";
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="fixed-plugin">
                <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
                    <i class="material-icons py-2">add</i>
                </a>
                <div class="card shadow-lg">
                    <div class="card-header pb-0 pt-3">
                        <div class="float-start">
                            <h5 class="mt-3 mb-0">新增帳號</h5>
                        </div>
                        <div class="float-end mt-4">
                            <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                                <i class="material-icons">clear</i>
                            </button>
                        </div>
                        <!-- End Toggle Button -->
                    </div>
                    <hr class="horizontal dark my-1">
                    <div class="card-body pt-sm-3 pt-0">
                        <!-- Sidebar Backgrounds -->
                        <form role="form" action="account_X.php" method="post">
                            <input type=hidden name="action" value="insert">
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" required="required">
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Account</label>
                                <input type="text" class="form-control" name="account" required="required">
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" required="required">
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class=" "> &nbsp;&nbsp;&nbsp;身分</label>&nbsp;&nbsp;
                                <select name="level">
                                    <option value="教師">教師</option>
                                    <option value="管理者">管理者</option>
                                </select>
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
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