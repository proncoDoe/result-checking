<?php include 'inc/header.php' ?>
<?php require 'controller/random.php' ?>



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

/* .datepicker {
    width: 180px;
    margin: 0 20px 20px 20px;
} */

.datepicker>span:hover {
    cursor: pointer;
}
</style>

<?php

if(isset($_POST['submit']))
{
       $target = "upload/".basename($_FILES['student_image']['name']);
        $student_image = $_FILES['student_image']['name'];
        $name=$_POST['name'];
        $email=$_POST['email'];
        $session=$_POST['session'];
        $phone_number=$_POST['phone_number'];
        $status='Active';
        $how_would_like_to_be_contacted=$_POST['how_would_like_to_be_contacted']; 
        $class_name = $_POST['class_name']; 
        $gender = $_POST['gender'];
        $register_no=$_POST['register_no']; 
        $username=$_POST['username']; 

        $dob=$_POST['mm'].'-'.$_POST['dd'].'-'.$_POST['yy'];

        $exam_pin = rand(1000, 99999);
        $card_serial_no=$_POST['card_serial_no']; 
        $created_at = date('F, d y h:i:s');
        
        $sql="INSERT INTO  `student`(name, email,phone_number,session,status,how_would_like_to_be_contacted,gender,class_name,student_image,register_no,username,exam_pin,dob,card_serial_no,created_at) VALUES(:s_name,:p_email,:p_phone_number,:session,:status,:s_how_would_like_to_be_contacted,:s_gender,:class_name,:s_student_image,:s_register_no,:s_username,:s_exam_pin,:s_dob,:s_card_serial_no,:created_at)";
        $query = $conn->prepare($sql);
        $query->bindParam(':s_name',$name,PDO::PARAM_STR);
         $query->bindParam(':p_email',$email,PDO::PARAM_STR);
        $query->bindParam(':p_phone_number',$phone_number,PDO::PARAM_STR);
        $query->bindParam(':session',$session,PDO::PARAM_STR);
        $query->bindParam(':status',$status,PDO::PARAM_STR);
        $query->bindParam(':s_how_would_like_to_be_contacted',$how_would_like_to_be_contacted,PDO::PARAM_STR);
        $query->bindParam(':class_name',$class_name,PDO::PARAM_STR);
        $query->bindParam(':s_gender',$gender,PDO::PARAM_STR);
        $query->bindParam(':s_student_image',$student_image,PDO::PARAM_STR);
        $query->bindParam(':s_register_no',$register_no,PDO::PARAM_STR);
        $query->bindParam(':s_username',$username,PDO::PARAM_STR);
        $query->bindParam(':s_dob',$dob,PDO::PARAM_STR);
        $query->bindParam(':s_exam_pin',$exam_pin,PDO::PARAM_STR);
        $query->bindParam(':s_card_serial_no',$card_serial_no,PDO::PARAM_STR);
        $query->bindParam(':created_at',$created_at,PDO::PARAM_STR);
        $query->execute();
         if (move_uploaded_file($_FILES['student_image']['tmp_name'], $target)) {
            // header('location: add_student.php');
                    //   $_SESSION['success'] = "changed";
                    //   $_SESSION['alert-class'] = "Profile succesfully";
                    //   exit();
                    }else{

                      
                      $_SESSION['danger'] = "changed";
                      $_SESSION['alert-class'] = "Profile not";
                    
        }
        $lastInsertId = $conn->lastInsertId();
        if($lastInsertId)
        {

            header('location: manage_student.php');
        $_SESSION['success'] = "successfully";
      $_SESSION['alert-success'] = "Student info added";
     

        }
        else 
        {

        $_SESSION['danger'] = "Please try again";
        $_SESSION['alert-class'] = "Something went wrong.";
      
        }$conn = null;



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
                            <li>Aadd student</li>
                        </ol>
                        <h2>Add student</h2>

                    </div>
                </section><!-- End Breadcrumbs -->

                <div class="container-fluid px-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-9">


                            <div class="row">
                                <div class="col-md-6 offset-lg-3 offset-sm-0">

                                    <div class="card shadow-lg border-0 rounded-lg mt-5 text-white"
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
                                            <h3 class="text-center font-weight-light my-4 font-weight-bold">Add student
                                            </h3>
                                        </div>
                                        <div class="card-body">



                                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                                <input type="hidden" value="999999999999999">

                                                <div class="form-group" id="imagemi">
                                                    <label>
                                                        <img class="getpic" src="images/default.gif"
                                                            style="width: 100%;height: auto;display: inline-block;box-shadow:0px -3px 6px 2px rgba(0,0,0,0.2);cursor: pointer;border: 5px solid white; border-radius: 100px;">
                                                        <input type="file" name="student_image" style="display: none;"
                                                            id="productimage" onchange="imagepreview(this)">
                                                    </label>
                                                </div>

                                                <?php 

                                        $getnumber=$_SESSION['randomnumber'];

                                        ?>


                                                <div class="form-group">

                                                    <label for="register_no">REG No</label>
                                                    <div class="col-md-12">
                                                        <div class="row">

                                                            <div class="col-md-7">
                                                                <input type="text" name="register_no"
                                                                    class="form-control"
                                                                    value="<?php echo $getnumber; ?>" placeholder="
                                                   Enter pin or generate random pin">
                                                            </div>

                                                            <div class="col-md-5">

                                                                <div class="input-group-prepend">
                                                                    <button
                                                                        class="input-group-text bg-primary text-light"
                                                                        name="buttonpassvalue">generate</button>
                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label for="default" class="control-label">Full
                                                            Name</label>

                                                        <input type="text" name="name" class="form-control"
                                                            id="fullanme" autocomplete="off"
                                                            placeholder="Student full name">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label for="username" class="control-label">Student
                                                            Username</label>

                                                        <input type="username" name="username" class="form-control"
                                                            id="username" autocomplete="off"
                                                            placeholder="Student username">
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="default" class="col-md-12 control-label">Session</label>
                                                    <div class="col-md-12">
                                                        <select name="session" class="form-control session show-tick"
                                                            data-style="btn-info" id="">
                                                            <option value="">Select Session</option>
                                                            <?php $sql = "SELECT DISTINCT(`session`) from `academic_year`";
                                                $query = $conn->prepare($sql);
                                                $query->execute();
                                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                if($query->rowCount() > 0)
                                                {
                                                foreach($results as $result)
                                                {   ?>
                                                            <option
                                                                value="<?php echo htmlentities($result->session); ?>">
                                                                <?php echo htmlentities($result->session); ?>
                                                            </option>
                                                            <?php }} ?>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label for="email" class="control-label">Email</label>

                                                        <input type="text" name="email" class="form-control" id="email">
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label for="phone_number" class="control-label">
                                                            Parent Phone Number</label>

                                                        <input type="phone_number" name="phone_number"
                                                            class="form-control" id="phone_number" autocomplete="off"
                                                            placeholder="Phone Number">
                                                    </div>
                                                </div>



                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label for="default" class="control-label">How would you
                                                            like to
                                                            be
                                                            contacted?</label>

                                                        <select name="how_would_like_to_be_contacted" id="default"
                                                            class="form-control contactMe show-tick"
                                                            data-header="Select a contact address"
                                                            data-style="btn-info">
                                                            <option value="by phone number">By Phone</option>
                                                            <option value="by email">By Email</option>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group fontradio ">

                                                    <label for="gender" class="textItalic text-white">Gender</label><br>

                                                    <input type="radio" class="mx-2 " name="gender" value="M"><label
                                                        class="text-white">Male</label><i
                                                        class="mx-3 my-4 fa fa-male fa-2x"></i>
                                                    <input type="radio" class="mx-2" name="gender" value="F"><label
                                                        class="text-white">Female</label><i
                                                        class="mx-3 my-4 fas fa-female fa-2x"></i>


                                                </div>

                                                <div class="form-group">
                                                    <label for="default" class="col-md-12 control-label">Class</label>
                                                    <div class="col-md-12">
                                                        <select name="class_name" class="form-control class show-tick"
                                                            data-style="btn-info" id="">
                                                            <option value="">Select Class</option>
                                                            <?php $sql = "SELECT DISTINCT(`class_name`) from `add_class`";
                                                $query = $conn->prepare($sql);
                                                $query->execute();
                                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                if($query->rowCount() > 0)
                                                {
                                                foreach($results as $result)
                                                {   ?>
                                                            <option
                                                                value="<?php echo htmlentities($result->class_name); ?>">
                                                                <?php echo htmlentities($result->class_name); ?>
                                                            </option>
                                                            <?php }} ?>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="dob" class="control-label">DOB</label>

                                                    <div class="row">

                                                        <div class="col-lg-4">
                                                            <label>#Month: </label>
                                                            <div class="datepicker date" data-date-format="mm">
                                                                <input class="form-control" name="mm" type="text" />
                                                                <span class="input-group-addon"><i
                                                                        class="glyphicon glyphicon-calendar"></i></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4">
                                                            <label>#Day: </label>
                                                            <div class="datepicker date" data-date-format="dd">
                                                                <input class="form-control" name="dd" type="text" />
                                                                <span class="input-group-addon"><i
                                                                        class="glyphicon glyphicon-calendar"></i></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4">
                                                            <label>#Year: </label>
                                                            <div class="datepicker date" data-date-format="yyyy">
                                                                <input class="form-control" name="yy" type="text" />
                                                                <span class="input-group-addon"><i
                                                                        class="glyphicon glyphicon-calendar"></i></span>
                                                            </div>
                                                        </div>


                                                    </div>

                                                </div>

                                                <?php 



$getcard=$_SESSION['cardNumber'];

?>


                                                <div class="form-group">

                                                    <label for="card_serial_no">Card Serial Number</label>
                                                    <div class="col-md-12">
                                                        <div class="row">

                                                            <div class="col-md-7">
                                                                <input type="text" name="card_serial_no"
                                                                    class="form-control" value="<?php echo $getcard; ?>"
                                                                    placeholder="
                                                            Card Serial  Number">
                                                            </div>

                                                            <div class="col-md-5">

                                                                <div class="input-group-prepend">
                                                                    <button
                                                                        class="input-group-text bg-primary text-light"
                                                                        name="buttonpassvalue">generate</button>
                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                                <div
                                                    class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                    <button type="submit" name="submit"
                                                        class="btn btn-outline-warning btn-labeled shadow-lg">Add
                                                        Student
                                                        <span class="btn-label btn-label-right"><i
                                                                class="fa fa-check"></i></span></button>

                                                    <div class="small"><a class="btn btn-dark"
                                                            href="./manage_student.php">Management</a>
                                                    </div>
                                                </div>

                                            </form>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <?php include '../admin/inc/footer.php' ?>

        </div>

        <script type="text/javascript">
        $(document).ready(function() {
            $(document).ready(function() {
                $(".class").selectpicker();
            });

        });
        </script>


        <script type="text/javascript">
        $(document).ready(function() {
            $(document).ready(function() {
                $(".contactMe").selectpicker();
            });

        });
        </script>


        <script type="text/javascript">
        $(document).ready(function() {
            $(document).ready(function() {
                $(".session").selectpicker();
            });

        });
        </script>




        <script>
        $(function() {
            $(".datepicker").datepicker({
                autoclose: true,
                todayHighlight: true,
            }).datepicker('update', new Date());
        });
        </script>