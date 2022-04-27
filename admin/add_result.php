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

$class_name=$_POST['class_name'];
$student_name=$_POST['student_name'];
$term=$_POST['term'];
$session=$_POST['session'];
$opened=$_POST['opened'];
$present=$_POST['present'];
$absence=$_POST['absence'];
$termBegins=$_POST['termBegins'];
$termEnds=$_POST['termEnds'];
$nextTermBegins=$_POST['nextTermBegins'];
$subject1=$_POST['subject1'];
$test1=$_POST['test1'];
$exam_score1=$_POST['exam_score1'];
$subject2=$_POST['subject2'];
$test2=$_POST['test2'];
$exam_score2=$_POST['exam_score2'];
$subject3=$_POST['subject3'];
$test3=$_POST['test3'];
$exam_score3=$_POST['exam_score3'];
$subject4=$_POST['subject4'];
$test4=$_POST['test4'];
$exam_score4=$_POST['exam_score4'];
$subject5=$_POST['subject5'];
$test5=$_POST['test5'];
$exam_score5=$_POST['exam_score5'];
$subject6=$_POST['subject6'];
$test6=$_POST['test6'];
$exam_score6=$_POST['exam_score6'];
$subject7=$_POST['subject7'];
$test7=$_POST['test7'];
$exam_score7=$_POST['exam_score7'];
$subject8=$_POST['subject8'];
$test8=$_POST['test8'];
$exam_score8=$_POST['exam_score8'];
$subject9=$_POST['subject9'];
$test9=$_POST['test9'];
$exam_score9=$_POST['exam_score9'];
$created_at = date('F, d y h:i:s');

$sql="INSERT INTO  `add_result`(class_name,student_name,term,session,opened,present,absence,termBegins,
termEnds,nextTermBegins,subject1,test1,exam_score1,subject2,test2,exam_score2,subject3,test3,exam_score3,subject4,test4,
exam_score4,subject5,test5,exam_score5,subject6,test6,exam_score6,subject7,test7,exam_score7,subject8,test8,exam_score8,
subject9,test9,exam_score9,created_at)
 VALUES(:class_name,:student_name,:term,:session,:opened,:present,:absence,:termBegins,
 :termEnds,:nextTermBegins,:subject1,:test1,:exam_score1,:subject2,:test2,:exam_score2,:subject3,:test3,
 :exam_score3,:subject4,:test4,:exam_score4,:subject5,:test5,:exam_score5,:subject6,:test6,:exam_score6,
 :subject7,:test7,:exam_score7,:subject8,:test8,:exam_score8,:subject9,:test9,:exam_score9,:created_at)";
$query = $conn->prepare($sql);
$query->bindParam(':class_name',$class_name,PDO::PARAM_STR);
$query->bindParam(':student_name',$student_name,PDO::PARAM_STR);
$query->bindParam(':term',$term,PDO::PARAM_STR);
$query->bindParam(':session',$session,PDO::PARAM_STR);
$query->bindParam(':opened',$opened,PDO::PARAM_STR);
$query->bindParam(':present',$present,PDO::PARAM_STR);
$query->bindParam(':absence',$absence,PDO::PARAM_STR);
$query->bindParam(':termBegins',$termBegins,PDO::PARAM_STR);
$query->bindParam(':termEnds',$termEnds,PDO::PARAM_STR);
$query->bindParam(':nextTermBegins',$nextTermBegins,PDO::PARAM_STR);
$query->bindParam(':subject1',$subject1,PDO::PARAM_STR);
$query->bindParam(':test1',$test1,PDO::PARAM_STR);
$query->bindParam(':exam_score1',$exam_score1,PDO::PARAM_STR);
$query->bindParam(':subject2',$subject2,PDO::PARAM_STR);
$query->bindParam(':test2',$test2,PDO::PARAM_STR);
$query->bindParam(':exam_score2',$exam_score2,PDO::PARAM_STR);
$query->bindParam(':subject3',$subject3,PDO::PARAM_STR);
$query->bindParam(':test3',$test3,PDO::PARAM_STR);
$query->bindParam(':exam_score3',$exam_score3,PDO::PARAM_STR);
$query->bindParam(':subject4',$subject4,PDO::PARAM_STR);
$query->bindParam(':test4',$test4,PDO::PARAM_STR);
$query->bindParam(':exam_score4',$exam_score4,PDO::PARAM_STR);
$query->bindParam(':subject5',$subject5,PDO::PARAM_STR);
$query->bindParam(':test5',$test5,PDO::PARAM_STR);
$query->bindParam(':exam_score5',$exam_score5,PDO::PARAM_STR);
$query->bindParam(':subject6',$subject6,PDO::PARAM_STR);
$query->bindParam(':test6',$test6,PDO::PARAM_STR);
$query->bindParam(':exam_score6',$exam_score6,PDO::PARAM_STR);
$query->bindParam(':subject7',$subject7,PDO::PARAM_STR);
$query->bindParam(':test7',$test7,PDO::PARAM_STR);
$query->bindParam(':exam_score7',$exam_score7,PDO::PARAM_STR);
$query->bindParam(':subject8',$subject8,PDO::PARAM_STR);
$query->bindParam(':test8',$test8,PDO::PARAM_STR);
$query->bindParam(':exam_score8',$exam_score8,PDO::PARAM_STR);
$query->bindParam(':subject9',$subject9,PDO::PARAM_STR);
$query->bindParam(':test9',$test9,PDO::PARAM_STR);
$query->bindParam(':exam_score9',$exam_score9,PDO::PARAM_STR);
$query->bindParam(':created_at',$created_at,PDO::PARAM_STR);

$query->execute();
$lastInsertId = $conn->lastInsertId();
if($lastInsertId)
{
header('location: manage_result.php');
$_SESSION['success'] = "successfully";
$_SESSION['alert-class'] = "Student info added";
}
else 
{
    $_SESSION['danger'] = "Please try again";
    $_SESSION['alert-class'] = "Something went wrong.";
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
                            <li>Add result</li>
                        </ol>
                        <h2>Add result</h2>

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
                                            <h3 class="text-center font-weight-light my-4 font-weight-bold">Add result
                                            </h3>
                                        </div>
                                        <div class="card-body">



                                            <form class="form-horizontal" method="post">
                                                <input type="hidden" value="999999999999999">



                                                <div class="form-group">
                                                    <label for="default" class="col-sm-2 control-label">Class</label>
                                                    <div class="col-sm-10">
                                                        <select name="class_name" class="form-control class show-tick"
                                                            id="class_name" data-style="btn-info"
                                                            onChange="getStudent(this.value);">
                                                            <option value="">Select Class</option>
                                                            <?php $sql = "SELECT DISTINCT(`class_name`) FROM add_class";
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
                                                    <label for="default" class="col-md-12 control-label">Student
                                                        Name</label>
                                                    <div class="col-md-12">
                                                        <select name="student_name" class="form-control class show-tick"
                                                            data-style="btn-success" data-live-search="true" id="">
                                                            <option value="">Select Student name</option>

                                                            <?php $sql = "SELECT `name`,`student_image` from  `student`";
                                                $query = $conn->prepare($sql);
                                                $query->execute();
                                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                if($query->rowCount() > 0)
                                                {
                                                foreach($results as $result)
                                                {   ?>
                                                            <option value="<?php echo htmlentities($result->name); ?>"
                                                                data-subtext="<?php echo htmlentities($result->student_image); ?>">

                                                                <?php echo htmlentities($result->name); ?>
                                                            </option>
                                                            <?php }} ?>
                                                        </select>
                                                    </div>
                                                </div>




                                                <div class="form-group">

                                                    <div class="col-sm-10">
                                                        <div id="reslt">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="default" class="col-md-12 control-label">Current
                                                        Term</label>
                                                    <div class="col-md-12">
                                                        <select name="term" class="form-control session show-tick"
                                                            data-style="btn-secondary" id="">
                                                            <option value="">Select Terms</option>

                                                            <?php $sql = "SELECT `terms` from `terms`";
                                                $query = $conn->prepare($sql);
                                                $query->execute();
                                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                if($query->rowCount() > 0)
                                                {
                                                foreach($results as $result)
                                                {   ?>
                                                            <option value="<?php echo htmlentities($result->terms); ?>">
                                                                <?php echo htmlentities($result->terms); ?>
                                                            </option>
                                                            <?php }} ?>

                                                            
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="default" class="col-md-12 control-label">Current
                                                        Session</label>
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
                                                        <label for="opened" class="control-label">No. of Months School
                                                            Opened</label>

                                                        <input type="text" name="opened" class="form-control"
                                                            id="opened" placeholder="EG 09">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label for="present" class="control-label">No. of Days
                                                            Present</label>

                                                        <input type="text" name="present" class="form-control"
                                                            id="present" placeholder="EG 113">
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label for="absence" class="control-label">No. of Days
                                                            Absence</label>

                                                        <input type="text" name="absence" class="form-control"
                                                            id="absence" placeholder="EG 13">
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label for="termBegins" class="control-label">Term Begins
                                                        </label>
                                                        <div class="datepicker date" data-date-format="mm/dd/yyyy"
                                                            data-provide="datepicker">
                                                            <input class="form-control" name="termBegins" type="text"
                                                                placeholder="07/09/2021" />
                                                            <span class="input-group-addon"><i
                                                                    class="glyphicon glyphicon-calendar"></i></span>
                                                        </div>
                                                    </div>

                                                </div>


                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label for="termEnds" class="control-label">Term Ends
                                                        </label>
                                                        <div class="datepicker date" data-date-format="mm/dd/yyyy"
                                                            data-provide="datepicker">
                                                            <input class="form-control" name="termEnds" type="text"
                                                                placeholder="07/09/2021" />
                                                            <span class="input-group-addon"><i
                                                                    class="glyphicon glyphicon-calendar"></i></span>
                                                        </div>
                                                    </div>

                                                </div>


                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label for="nextTermBegins" class="control-label">Next Term
                                                            Begins
                                                        </label>
                                                        <div class="datepicker date" data-date-format="mm/dd/yyyy"
                                                            data-provide="datepicker">
                                                            <input class="form-control" name="nextTermBegins"
                                                                type="text" placeholder="07/09/2021" />
                                                            <span class="input-group-addon"><i
                                                                    class="glyphicon glyphicon-calendar"></i></span>
                                                        </div>
                                                    </div>

                                                </div>


                                                <div class="form-group was-validated">
                                                    <div class="form-row">
                                                        <div class="col-md-4 mb-3">
                                                            <label for="validationServer02">Subject</label>
                                                            <select name="subject1"
                                                                class="subject form-control show-tick" id=""
                                                                data-style="btn-info" data-live-search="true">
                                                                <option value="">Select Subject</option>
                                                                <?php $sql = "SELECT * from `add_subject`";
                                                                    $query = $conn->prepare($sql);
                                                                    $query->execute();
                                                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                                    if($query->rowCount() > 0)
                                                                    {
                                                                    foreach($results as $result)
                                                                    {   ?>

                                                                <option
                                                                    value="<?php echo htmlentities($result->subject); ?>">
                                                                    <?php echo htmlentities(strtoupper($result->subject)); ?>
                                                                </option>
                                                                <?php }} ?>

                                                            </select>

                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label for="validationServer02">Test Assigment
                                                            </label>
                                                            <input type="text" name="test1"
                                                                class="form-control is-valid" id="validationServer02"
                                                                placeholder="Enter marks out of 40" autocomplete="off"
                                                                min="1" max="40">

                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label for="validationServer02">Exam Score</label>
                                                            <input type="text" name="exam_score1"
                                                                class="form-control is-valid" id="validationServer02"
                                                                placeholder="Enter marks out of 60" autocomplete="off"
                                                                min="1" max="60">

                                                        </div>
                                                    </div>

                                                </div>



                                                <div class="form-group was-validated">
                                                    <div class="form-row">
                                                        <div class="col-md-4 mb-3">
                                                            <label for="validationServer02">Subject</label>
                                                            <select name="subject2"
                                                                class="subject form-control show-tick" id=""
                                                                data-style="btn-info" data-live-search="true">
                                                                <option value="">Select Subject</option>
                                                                <?php $sql = "SELECT * from `add_subject`";
                                                                    $query = $conn->prepare($sql);
                                                                    $query->execute();
                                                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                                    if($query->rowCount() > 0)
                                                                    {
                                                                    foreach($results as $result)
                                                                    {   ?>

                                                                <option
                                                                    value="<?php echo htmlentities($result->subject); ?>">
                                                                    <?php echo htmlentities(strtoupper($result->subject)); ?>
                                                                </option>
                                                                <?php }} ?>

                                                            </select>

                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label for="validationServer02">Test Assigment
                                                            </label>
                                                            <input type="text" name="test2"
                                                                class="form-control is-valid" id="validationServer02"
                                                                placeholder="Enter marks out of 40" autocomplete="off"
                                                                min="1" max="40">

                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label for="validationServer02">Exam Score</label>
                                                            <input type="text" name="exam_score2"
                                                                class="form-control is-valid" id="validationServer02"
                                                                placeholder="Enter marks out of 60" autocomplete="off"
                                                                min="1" max="60">

                                                        </div>
                                                    </div>

                                                </div>



                                                <div class="form-group was-validated">
                                                    <div class="form-row">
                                                        <div class="col-md-4 mb-3">
                                                            <label for="validationServer02">Subject</label>
                                                            <select name="subject3"
                                                                class="subject form-control show-tick" id=""
                                                                data-style="btn-info" data-live-search="true">
                                                                <option value="">Select Subject</option>
                                                                <?php $sql = "SELECT * from `add_subject`";
                                                                    $query = $conn->prepare($sql);
                                                                    $query->execute();
                                                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                                    if($query->rowCount() > 0)
                                                                    {
                                                                    foreach($results as $result)
                                                                    {   ?>

                                                                <option
                                                                    value="<?php echo htmlentities($result->subject); ?>">
                                                                    <?php echo htmlentities(strtoupper($result->subject)); ?>
                                                                </option>
                                                                <?php }} ?>

                                                            </select>

                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label for="validationServer02">Test Assigment
                                                            </label>
                                                            <input type="text" name="test3"
                                                                class="form-control is-valid" id="validationServer02"
                                                                placeholder="Enter marks out of 40" autocomplete="off"
                                                                min="1" max="40">

                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label for="validationServer02">Exam Score</label>
                                                            <input type="text" name="exam_score3"
                                                                class="form-control is-valid" id="validationServer02"
                                                                placeholder="Enter marks out of 60" autocomplete="off"
                                                                min="1" max="60">

                                                        </div>
                                                    </div>

                                                </div>



                                                <div class="form-group was-validated">
                                                    <div class="form-row">
                                                        <div class="col-md-4 mb-3">
                                                            <label for="validationServer02">Subject</label>
                                                            <select name="subject4"
                                                                class="subject form-control show-tick" id=""
                                                                data-style="btn-info" data-live-search="true">
                                                                <option value="">Select Subject</option>
                                                                <?php $sql = "SELECT * from `add_subject`";
                                                                    $query = $conn->prepare($sql);
                                                                    $query->execute();
                                                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                                    if($query->rowCount() > 0)
                                                                    {
                                                                    foreach($results as $result)
                                                                    {   ?>

                                                                <option
                                                                    value="<?php echo htmlentities($result->subject); ?>">
                                                                    <?php echo htmlentities(strtoupper($result->subject)); ?>
                                                                </option>
                                                                <?php }} ?>

                                                            </select>

                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label for="validationServer02">Test Assigment
                                                            </label>
                                                            <input type="text" name="test4"
                                                                class="form-control is-valid" id="validationServer02"
                                                                placeholder="Enter marks out of 40" autocomplete="off"
                                                                min="1" max="40">

                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label for="validationServer02">Exam Score</label>
                                                            <input type="text" name="exam_score4"
                                                                class="form-control is-valid" id="validationServer02"
                                                                placeholder="Enter marks out of 60" autocomplete="off"
                                                                min="1" max="60">

                                                        </div>
                                                    </div>

                                                </div>


                                                <div class="form-group was-validated">
                                                    <div class="form-row">
                                                        <div class="col-md-4 mb-3">
                                                            <label for="validationServer02">Subject</label>
                                                            <select name="subject5"
                                                                class="subject form-control show-tick" id=""
                                                                data-style="btn-info" data-live-search="true">
                                                                <option value="">Select Subject</option>
                                                                <?php $sql = "SELECT * from `add_subject`";
                                                                    $query = $conn->prepare($sql);
                                                                    $query->execute();
                                                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                                    if($query->rowCount() > 0)
                                                                    {
                                                                    foreach($results as $result)
                                                                    {   ?>

                                                                <option
                                                                    value="<?php echo htmlentities($result->subject); ?>">
                                                                    <?php echo htmlentities(strtoupper($result->subject)); ?>
                                                                </option>
                                                                <?php }} ?>

                                                            </select>

                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label for="validationServer02">Test Assigment
                                                            </label>
                                                            <input type="text" name="test5"
                                                                class="form-control is-valid" id="validationServer02"
                                                                placeholder="Enter marks out of 40" autocomplete="off"
                                                                min="1" max="40">

                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label for="validationServer02">Exam Score</label>
                                                            <input type="text" name="exam_score5"
                                                                class="form-control is-valid" id="validationServer02"
                                                                placeholder="Enter marks out of 60" autocomplete="off"
                                                                min="1" max="60">

                                                        </div>
                                                    </div>

                                                </div>


                                                <div class="form-group was-validated">
                                                    <div class="form-row">
                                                        <div class="col-md-4 mb-3">
                                                            <label for="validationServer02">Subject</label>
                                                            <select name="subject6"
                                                                class="subject form-control show-tick" id=""
                                                                data-style="btn-info" data-live-search="true">
                                                                <option value="">Select Subject</option>
                                                                <?php $sql = "SELECT * from `add_subject`";
                                                                    $query = $conn->prepare($sql);
                                                                    $query->execute();
                                                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                                    if($query->rowCount() > 0)
                                                                    {
                                                                    foreach($results as $result)
                                                                    {   ?>

                                                                <option
                                                                    value="<?php echo htmlentities($result->subject); ?>">
                                                                    <?php echo htmlentities(strtoupper($result->subject)); ?>
                                                                </option>
                                                                <?php }} ?>

                                                            </select>

                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label for="validationServer02">Test Assigment
                                                            </label>
                                                            <input type="text" name="test6"
                                                                class="form-control is-valid" id="validationServer02"
                                                                placeholder="Enter marks out of 40" autocomplete="off"
                                                                min="1" max="40">

                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label for="validationServer02">Exam Score</label>
                                                            <input type="text" name="exam_score6"
                                                                class="form-control is-valid" id="validationServer02"
                                                                placeholder="Enter marks out of 60" autocomplete="off"
                                                                min="1" max="60">

                                                        </div>
                                                    </div>

                                                </div>


                                                <div class="form-group was-validated">
                                                    <div class="form-row">
                                                        <div class="col-md-4 mb-3">
                                                            <label for="validationServer02">Subject</label>
                                                            <select name="subject7"
                                                                class="subject form-control show-tick" id=""
                                                                data-style="btn-info" data-live-search="true">
                                                                <option value="">Select Subject</option>
                                                                <?php $sql = "SELECT * from `add_subject`";
                                                                    $query = $conn->prepare($sql);
                                                                    $query->execute();
                                                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                                    if($query->rowCount() > 0)
                                                                    {
                                                                    foreach($results as $result)
                                                                    {   ?>

                                                                <option
                                                                    value="<?php echo htmlentities($result->subject); ?>">
                                                                    <?php echo htmlentities(strtoupper($result->subject)); ?>
                                                                </option>
                                                                <?php }} ?>

                                                            </select>

                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label for="validationServer02">Test Assigment
                                                            </label>
                                                            <input type="text" name="test7"
                                                                class="form-control is-valid" id="validationServer02"
                                                                placeholder="Enter marks out of 40" autocomplete="off"
                                                                min="1" max="40">

                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label for="validationServer02">Exam Score</label>
                                                            <input type="text" name="exam_score7"
                                                                class="form-control is-valid" id="validationServer02"
                                                                placeholder="Enter marks out of 60" autocomplete="off"
                                                                min="1" max="60">

                                                        </div>
                                                    </div>

                                                </div>



                                                <div class="form-group was-validated">
                                                    <div class="form-row">
                                                        <div class="col-md-4 mb-3">
                                                            <label for="validationServer02">Subject</label>
                                                            <select name="subject8"
                                                                class="subject form-control show-tick" id=""
                                                                data-style="btn-info" data-live-search="true">
                                                                <option value="">Select Subject</option>
                                                                <?php $sql = "SELECT * from `add_subject`";
                                                                    $query = $conn->prepare($sql);
                                                                    $query->execute();
                                                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                                    if($query->rowCount() > 0)
                                                                    {
                                                                    foreach($results as $result)
                                                                    {   ?>

                                                                <option
                                                                    value="<?php echo htmlentities($result->subject); ?>">
                                                                    <?php echo htmlentities(strtoupper($result->subject)); ?>
                                                                </option>
                                                                <?php }} ?>

                                                            </select>

                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label for="validationServer02">Test Assigment
                                                            </label>
                                                            <input type="text" name="test8"
                                                                class="form-control is-valid" id="validationServer02"
                                                                placeholder="Enter marks out of 40" autocomplete="off"
                                                                min="1" max="40">

                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label for="validationServer02">Exam Score</label>
                                                            <input type="text" name="exam_score8"
                                                                class="form-control is-valid" id="validationServer02"
                                                                placeholder="Enter marks out of 60" autocomplete="off"
                                                                min="1" max="60">

                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="form-group was-validated">
                                                    <div class="form-row">
                                                        <div class="col-md-4 mb-3">
                                                            <label for="validationServer02">Subject</label>
                                                            <select name="subject9"
                                                                class="subject form-control show-tick" id=""
                                                                data-style="btn-info" data-live-search="true">
                                                                <option value="">Select Subject</option>
                                                                <?php $sql = "SELECT * from `add_subject`";
                                                                    $query = $conn->prepare($sql);
                                                                    $query->execute();
                                                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                                    if($query->rowCount() > 0)
                                                                    {
                                                                    foreach($results as $result)
                                                                    {   ?>

                                                                <option
                                                                    value="<?php echo htmlentities($result->subject); ?>">
                                                                    <?php echo htmlentities(strtoupper($result->subject)); ?>
                                                                </option>
                                                                <?php }} ?>

                                                            </select>

                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label for="validationServer02">Test Assigment
                                                            </label>
                                                            <input type="text" name="test9"
                                                                class="form-control is-valid" id="validationServer02"
                                                                placeholder="Enter marks out of 40" autocomplete="off"
                                                                min="1" max="40">

                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label for="validationServer02">Exam Score</label>
                                                            <input type="text" name="exam_score9"
                                                                class="form-control is-valid" id="validationServer02"
                                                                placeholder="Enter marks out of 60" autocomplete="off"
                                                                min="1" max="60">

                                                        </div>
                                                    </div>

                                                </div>



                                                <div
                                                    class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                    <button type="submit" name="submit"
                                                        class="btn btn-outline-warning btn-labeled shadow-lg">Add
                                                        result
                                                        <span class="btn-label btn-label-right"><i
                                                                class="fa fa-check"></i></span></button>

                                                    <div class="small"><a class="btn btn-dark"
                                                            href="./manage_result.php">Management</a>
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

        <script>
        function getresult(val, clid) {

            var clid = $(".clid").val();
            var val = $(".stid").val();;
            var abh = clid + '$' + val;
            //alert(abh);
            $.ajax({
                type: "POST",
                url: "get_student.php",
                data: 'studclass=' + abh,
                success: function(data) {
                    $("#reslt").html(data);

                }
            });
        }
        </script>


        <script>
        function getStudent(val) {
            $.ajax({
                type: "POST",
                url: "get_student.php",
                data: 'classid=' + val,
                success: function(data) {
                    $("#studentid").html(data);

                }
            });


            $.ajax({
                type: "POST",
                url: "get_student.php",
                data: 'classid1=' + val,
                success: function(data) {
                    $("#subject").html(data);

                }
            });
        }
        </script>


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


        <script type="text/javascript">
        $(document).ready(function() {
            $(document).ready(function() {
                $(".subject").selectpicker();
            });

        });
        </script>


        <script>
        $(function() {
            $(".datepicker").datepicker({
                autoclose: true,
                todayHighlight: true,
                format: "mm-dd-yyyy",
            }).datepicker('update', new Date());
        });
        </script>