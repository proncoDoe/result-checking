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


input[type='checkbox'] {

    height: 40px !important;
    width: 100px !important;
    transform: scale(0.78) !important;


}
</style>


<?php

$fullName = '';  
$username = ''; 
$email = ''; 
$t_image = '';
$phoneNumber = '';  
$password = '';  
$cpassword = '';  
   $id = 0;
   
   if(isset($_GET['edit_id'])){
   
   $id = $_GET['edit_id'];


    $statement = 'SELECT * FROM `teacher` WHERE `t_id` =  :id';

    $stmt = $conn->prepare($statement);

    $stmt->execute([

        ':id' => $id
    ]);

    if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $t_id = $row['t_id'];
        $fullName = $row['fullName'];
        $username = $row['username'];
        $t_image = $row['t_image'];
        $email = $row['email'];
        $phoneNumber = $row['phoneNumber'];
        $password = substr($row['password'], 0,5);
        
    }
    
   }

   
   ?>




<?php


if(isset($_POST['updateTeacher']))
{

    if (isset($_POST["changepassword"])) {

        $id = $_POST["t_id"];
            $fullName = $_POST["fullName"];
            $username=$_POST['username'];
            $email=$_POST['email']; 
            $phoneNumber=$_POST['phoneNumber']; 
        $password = md5($_POST["password"],time());
        $cpassword = md5($_POST["cpassword"],time());
        $updated_at = date('F, d y h:i:s');
       
        //Checking if password matched
        if ($password == $cpassword) {
        
        $sql="UPDATE `teacher` SET fullName=:fullName,username=:username,email=:email,phoneNumber=:phoneNumber,password=:password,updated_at=:updated_at WHERE t_id = :id";
        $query = $conn->prepare($sql);
        $query->bindParam(':fullName',$fullName,PDO::PARAM_STR);
        $query->bindParam(':username',$username,PDO::PARAM_STR);
        $query->bindParam(':email',$email,PDO::PARAM_STR);
        $query->bindParam(':password',$password,PDO::PARAM_STR);
        $query->bindParam(':phoneNumber',$phoneNumber,PDO::PARAM_STR);
        $query->bindParam(':updated_at',$updated_at,PDO::PARAM_STR);
        $query->bindParam(':id',$id,PDO::PARAM_STR);
        $query->execute();

        if($query)
        {
    
        header('location: manage_teacher.php');
        $_SESSION['success'] = "successfully";
        $_SESSION['alert-class'] = "Password successfully ";


        }
        else 
        {
        $_SESSION['danger'] = "Please try again";
        $_SESSION['alert-class'] = "Something went wrong.";
        }   
        }else{//Elseif password not matched
            $_SESSION['danger'] = "match";
            $_SESSION['alert-class'] = "Password do not";
        }       
    }else{
        //If password change is not set
        $id = $_POST["t_id"];
        $fullName = $_POST["fullName"];
        $username=$_POST['username'];
        $email=$_POST['email']; 
        $phoneNumber=$_POST['phoneNumber']; 
        $updated_at = date('F, d y h:i:s');
        //SQL query start
        $sql="UPDATE `teacher` SET fullName=:fullName,username=:username,email=:email,phoneNumber=:phoneNumber,updated_at=:updated_at WHERE t_id = :id";
        $query = $conn->prepare($sql);
        $query->bindParam(':fullName',$fullName,PDO::PARAM_STR);
        $query->bindParam(':username',$username,PDO::PARAM_STR);
        $query->bindParam(':email',$email,PDO::PARAM_STR);
        $query->bindParam(':phoneNumber',$phoneNumber,PDO::PARAM_STR);
        $query->bindParam(':updated_at',$updated_at,PDO::PARAM_STR);
        $query->bindParam(':id',$id,PDO::PARAM_STR);
        $query->execute();

        if($query)
        {
    
        header('location: manage_teacher.php');
        $_SESSION['success'] = "successfully";
        $_SESSION['alert-class'] = "Teacher info update";

        }
        else 
        {
            $_SESSION['danger'] = "required";
            $_SESSION['alert-class'] = "Field is";
        }
    }

}


?>

<?php

//Update profile here
if (isset($_POST['updateProfile'])) {
    $id = $_POST["t_id"];
    $target = "upload/".basename($_FILES['t_image']['name']);
    $t_image = $_FILES['t_image']['name'];
    $updated_at = date('F, d y h:i:s');
    //SQL query start
    $sql="UPDATE teacher SET t_image=:t_image,updated_at=:updated_at WHERE t_id = :id";
    $query = $conn->prepare($sql);
    $query->bindParam(':t_image',$t_image,PDO::PARAM_STR);
    $query->bindParam(':updated_at',$updated_at,PDO::PARAM_STR);
    $query->bindParam(':id',$id,PDO::PARAM_STR);
    $query->execute();
    
    if($query)
    {
    
    if (move_uploaded_file($_FILES['t_image']['tmp_name'], $target)) {
    header('location: manage_teacher.php');
    $_SESSION['success'] = "successfully";
    $_SESSION['alert-class'] = "Student info update";
    }
    
    }
    else 
    {
        $_SESSION['danger'] = "to update";
        $_SESSION['alert-class'] = "Profile failed ";
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
                            <li>Update Teacher</li>
                        </ol>
                        <h2>Update teacher</h2>

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

                                        <div class="card-header">
                                            <h3 class="text-center font-weight-light my-4 font-weight-bold">Update
                                                teacher</h3>
                                        </div>
                                        <div class="card-body">



                                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" type="hidden" name="t_id"
                                                        value="<?php echo $t_id; ?>" />

                                                </div>

                                                <div class="form-group" id="imagemi">
                                                    <label>

                                                        <img class="getpic" src="upload/<?php echo($t_image); ?>" style=" width: 100%;height: auto;display:
                                                            inline-block;box-shadow:0px -3px 6px 2px
                                                            rgba(0,0,0,0.2);cursor: pointer;border: 5px solid white;
                                                            border-radius: 100px;">
                                                        <input type="file" name="t_image" style="display: none;"
                                                            id="productimage" onchange="imagepreview(this)">
                                                    </label>
                                                </div>

                                                <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                                    <button type="submit" name="updateProfile"
                                                        class="btn btn-outline-warning btn-labeled shadow-lg">Update
                                                        Profile
                                                        <span class="btn-label btn-label-right"><i
                                                                class="far fa-image"></i></span></button>

                                                </div>

                                            </form>

                                            <form action="edit_teacher.php" method="POST">

                                                <div class="form-floating mb-3">
                                                    <input class="form-control" type="hidden" name="t_id"
                                                        value="<?php echo $t_id; ?>" />

                                                </div>

                                                <div class="form-floating mb-3">
                                                    <input class="form-control"
                                                        value="<?php echo htmlentities($fullName) ?>" name="fullName"
                                                        id="fullName" type="text" placeholder="Full Name..." />
                                                    <label for="fullName">Full Name</label>
                                                </div>

                                                <div class="form-floating mb-3">
                                                    <input class="form-control" name="username" id="username"
                                                        type="text" value="<?php echo htmlentities($username) ?>"
                                                        placeholder="username..." />
                                                    <label for="username">Username</label>
                                                </div>
                                                <div
                                                    class="form-group d-flex align-items-center justify-content-between">
                                                    <label for="default" class="col-sm-4 control-label">Change
                                                        Password</label>
                                                    <div class="col-sm-1">
                                                        <input type="checkbox" class="" name="changepassword"
                                                            id="changepassword" value="changeme"
                                                            onclick="phide(this.value)">
                                                    </div>

                                                </div>
                                                <div id="phide" class="form-group">
                                                    <label for="default" class="col-sm-4 control-label">Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="password"
                                                            value="<?php echo htmlentities($password) ?>"
                                                            class="form-control" id="fullanme" autocomplete="off"
                                                            placeholder="Password">
                                                    </div>
                                                </div>
                                                <div id="pphide" class="form-group">
                                                    <label for="default" class="col-sm-4 control-label">Confirm
                                                        Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="cpassword"
                                                            value="<?php echo htmlentities($cpassword) ?>"
                                                            class="form-control" id="fullanme" autocomplete="off"
                                                            placeholder="Confirm Password">
                                                    </div>
                                                </div>


                                                <div class="form-floating mb-3">
                                                    <input class="form-control" name="email"
                                                        value="<?php echo htmlentities($email) ?>" id="email"
                                                        type="text" placeholder="Email..." />
                                                    <label for="email">Email</label>
                                                </div>

                                                <div class="form-floating mb-3">
                                                    <input class="form-control" name="phoneNumber" id="phoneNumber"
                                                        type="text" value="<?php echo htmlentities($phoneNumber) ?>"
                                                        placeholder="Phone Number..." />
                                                    <label for="email">Phone Number</label>
                                                </div>


                                                <div
                                                    class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                    <button type="submit" name="updateTeacher"
                                                        class="btn btn-outline-warning btn-labeled shadow-lg">Update
                                                        Teacher
                                                        <span class="btn-label btn-label-right"><i
                                                                class="fa fa-check"></i></span></button>

                                                    <div class="small"><a class="btn btn-dark"
                                                            href="./manage_teacher.php">Management</a>
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
            document.getElementById('phide').style.display = "none";
            document.getElementById('pphide').style.display = "none";

            function phide(pvalue) {
                if (pvalue == "changeme") {

                    document.getElementById('phide').style.display = "block";
                    document.getElementById('pphide').style.display = "block";
                    document.getElementById('changepassword').value =
                        "dontchange";
                    console.log(pvalue);
                } else {
                    if (pvalue == "dontchange") {
                        document.getElementById('phide').style.display = "none";
                        document.getElementById('pphide').style.display =
                            "none";
                        document.getElementById('changepassword').value =
                            "changeme";
                        console.log(pvalue);
                    }
                }
            }
            </script>