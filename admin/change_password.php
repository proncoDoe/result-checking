<?php include '../admin/inc/header.php' ?>

<style type="text/css">
.btn .fa {
    margin-right: 6px;
}

.btn.btn-labeled {
    padding-top: 0;
    padding-bottom: 0;
}

.btn.btn-labeled .fa {
    margin-right: 0px;
}

.btn.btn-labeled .btn-label {
    position: relative;
    background: transparent;
    /* background: rgba(0, 0, 0, 0.15); */
    background: #0275d8;
    display: inline-block;
    padding: 6px 12px;
    left: -12px;
    border-radius: 4px 0 0 4px;
}

.btn.btn-labeled .btn-label.btn-label-right {
    left: auto;
    right: -12px;
    border-radius: 0 4px 4px 0;
}

.btn.btn-labeled.btn-rounded .btn-label {
    border-radius: 30px 0 0 30px;
}

.btn.btn-labeled.btn-rounded .btn-label.btn-label-right {
    left: auto;
    right: -12px;
    border-radius: 0 30px 30px 0;
}
</style>

<?php
if(isset($_POST['changePassword']))
{
$password=$_POST['password'];
$newpassword=$_POST['newpassword'];
$username = $_SESSION['username'];
$sql ="SELECT password FROM admin WHERE username=:username AND password=:password";
$query= $conn->prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="UPDATE admin set password=:newpassword WHERE username=:username";
$chngpwd1 = $conn->prepare($con);
$chngpwd1-> bindParam(':username', $username, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
$_SESSION['success'] = "changed";
$_SESSION['alert-class'] = "Your Password succesfully";
}
else {
$_SESSION['danger'] = "is wrong";
$_SESSION['alert-class'] = "Your current password";
}
}
?>

<body class="sb-nav-fixed" id="#signin">


    <?php include './logout-modal.php' ?>

    <nav class="sb-topnav navbar navbar-expand" style="background-color: #3c005a;">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="dashboard.php">Academy Result</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <!-- <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button> -->
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4 shadow-lg">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings <i class="fas fa-cog"></i> </a></li>
                    <li><a class="dropdown-item" href="#!">Change password <i class="fa fa fa-server"></i> </a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li class="dropdown-item">
                        <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                            <i class="fas fa-sign-out-alt"></i>Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>


    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-school"></i></div>
                            Classes
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="add_class.php">Add Class</a>
                                <a class="nav-link" href="manage_class.php">Manage Class</a>
                            </nav>
                        </div>

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#subjects"
                            aria-expanded="false" aria-controls="subjects">
                            <div class="sb-nav-link-icon"><i class="fab fa-buromobelexperte"></i></div>
                            Subjects
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="subjects" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="add_subject.php">Add Subjects</a>
                                <a class=" nav-link" href="manage_subject.php">Manage Subjects</a>

                                <a class="nav-link" href="layout-static.html">Add Subject Combination</a>
                                <a class="nav-link" href="layout-sidenav-light.html">Manage Subject Combination</a>
                            </nav>
                        </div>

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#teachers"
                            aria-expanded="false" aria-controls="teachers">
                            <div class="sb-nav-link-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                            Teachers
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="teachers" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="layout-static.html">Create Teachers</a>
                                <a class="nav-link" href="layout-sidenav-light.html">Manage Students</a>
                            </nav>
                        </div>


                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#students"
                            aria-expanded="false" aria-controls="students">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Students
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="students" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="add_student.php">Add Students</a>
                                <a class="nav-link" href="layout-sidenav-light.html">Manage Students</a>
                                <a class="nav-link" href="layout-sidenav-light.html">ENABLE AND DISABLE STUDENTS
                                    CHECKING RESULTS.</a>
                            </nav>
                        </div>

                        <a class="nav-link" href="charts.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            ASSIGN SUBJECTS TO TEACHERS && Class
                        </a>

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#results"
                            aria-expanded="false" aria-controls="results">
                            <div class="sb-nav-link-icon"><i class="fa fa-info-circle"></i></div>
                            Results
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="results" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="layout-static.html">Create Results</a>
                                <a class="nav-link" href="layout-sidenav-light.html">Manage Results</a>
                            </nav>
                        </div>


                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#cbt"
                            aria-expanded="false" aria-controls="cbt">
                            <div class="sb-nav-link-icon"><i class="fas fa-people-arrows"></i></div>
                            CBT
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="cbt" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="layout-static.html">Create CBT</a>
                                <a class="nav-link" href="layout-sidenav-light.html">Manage CBT</a>
                            </nav>
                        </div>


                        <a class="nav-link" href="charts.html"><i class="fas fa-door-closed"></i>
                            <div class="sb-nav-link-icon"><i class="fas fa-door-open"></i></div>
                            RESUMPTION AND CLOSING DATES TO ALL RESULTS
                        </a>


                        <a class="nav-link" href="charts.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            PASS AN UPDATE TO TEACHERS / STUDENTS DASHBOARD.
                        </a>

                        <a class="nav-link" href="reg_abbr.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-thumbtack"></i></div>
                            Reg Number Abbr
                        </a>

                        <a class="nav-link" href="charts.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-thumbtack"></i></div>
                            Generate Pin
                        </a>

                        <a class="nav-link" href="charts.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Background Image
                        </a>


                        <div class="sb-sidenav-footer">
                            <div class="small">Logged in as:</div>
                            <h4 class="text-warning"><?php echo  $_SESSION['username']?></h4>
                        </div>
                    </div>
                </div>

            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>

                <!-- ======= Breadcrumbs ======= -->
                <section id="breadcrumbs" class="breadcrumbs">
                    <div class="container">

                        <ol>
                            <li><a href="dashboard.php">Home</a></li>
                            <li>Change Password</li>
                        </ol>
                        <h2>Change Password</h2>

                    </div>
                </section><!-- End Breadcrumbs -->

                <div class="container-fluid px-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-9">


                            <div class="row">
                                <div class="col-md-6 offset-lg-3 offset-sm-0">

                                    <div class="card shadow-lg border-0 rounded-lg mt-5"
                                        style="background: linear-gradient(90deg, rgba(194, 63, 120, 1) 11%, rgba(177, 67, 126, 1) 50%, rgba(194, 63, 120, 1) 57%, rgba(72, 95, 167, 1)">



                                        <?php if(isset($_SESSION['danger'])): ?>
                                        <div class="alert alert-danger font-weight-bold alert-dismissible fade show"
                                            role="alert">
                                            <strong><?php echo  $_SESSION['alert-class']; ?>!</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <?php 

                                echo $_SESSION['danger']; 
                                unset($_SESSION['danger']);
                                unset($_SESSION['alert-class']);


                                ?>

                                        </div>

                                        <?php endif; ?>


                                        <?php if(isset($_SESSION['success'])): ?>
                                        <div class="alert alert-success font-weight-bold alert-dismissible fade show"
                                            role="alert">
                                            <strong><?php echo  $_SESSION['alert-class']; ?>!</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <?php 

                                echo $_SESSION['success']; 
                                unset($_SESSION['success']);
                                unset($_SESSION['alert-class']);


                                ?>

                                        </div>

                                        <?php endif; ?>

                                        <div class="card-header">
                                            <h3 class="text-center font-weight-light my-4 font-weight-bold">Change
                                                password</h3>
                                        </div>
                                        <div class="card-body">
                                            <form name="chngpwd" method="POST" onSubmit="return valid();">

                                                <div class="form-floating mb-3">
                                                    <input class="form-control" name="password" id="success" type="text"
                                                        placeholder="Current Password..." />
                                                    <label for="password">Current Password</label>
                                                </div>

                                                <div class="form-floating mb-3">
                                                    <input class="form-control" name="newpassword" id="success"
                                                        type="text" placeholder="New password..." />
                                                    <label for="newpassword">New Password</label>
                                                </div>

                                                <div class="form-floating mb-3">
                                                    <input class="form-control" name="confirmpassword" id="success"
                                                        type="text" placeholder="Comfirm password..." />
                                                    <label for="confirmpassword">Comfirm Password</label>
                                                </div>

                                                <div
                                                    class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                    <button type="submit" name="changePassword"
                                                        class="btn btn-outline-warning btn-labeled shadow-lg">Change
                                                        Password
                                                        <span class="btn-label btn-label-right"><i
                                                                class="fa fa-check"></i></span></button>

                                                </div>


                                        </div>

                                        </form>


                                    </div>


                                </div>
                            </div>

                        </div>
            </main>


            <?php include '../admin/inc/footer.php' ?>


            <script type="text/javascript">
            function valid() {
                if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
                    alert("New Password and Confirm Password Field do not match  !!");
                    document.chngpwd.confirmpassword.focus();
                    return false;
                }
                return true;
            }
            </script>