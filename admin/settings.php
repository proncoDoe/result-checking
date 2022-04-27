<?php include 'inc/header.php' ?>


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
$title = $_POST["title"];
$description = $_POST["description"];
$address1 = $_POST["address1"];
$address2 = $_POST["address2"];
$term = $_POST["term"];
$session = $_POST["session"];


$con="UPDATE `settings` SET title=:title,description=:description,address1=:address1,address2=:address2,
term=:term,session=:session";
$chngpwd1 = $conn->prepare($con);
$chngpwd1-> bindParam(':title', $title, PDO::PARAM_STR);
$chngpwd1-> bindParam(':description', $description, PDO::PARAM_STR);
$chngpwd1-> bindParam(':address1', $address1, PDO::PARAM_STR);
$chngpwd1-> bindParam(':address2', $address2, PDO::PARAM_STR);
$chngpwd1-> bindParam(':term', $term, PDO::PARAM_STR);
$chngpwd1-> bindParam(':session', $session, PDO::PARAM_STR);
$chngpwd1->execute();
if($chngpwd1)
{

$_SESSION['success'] = "updated";
$_SESSION['alert-class'] = "Settings successfully ";


}
else 
{
$_SESSION['danger'] = "Please try again";
$_SESSION['alert-class'] = "Something went wrong.";
} 
}

//Update logo here
if (isset($_POST['UpdateLogo'])) {
$target = "images/".basename($_FILES['logo']['name']);
$logo = $_FILES['logo']['name'];

if(empty($logo)){
    $_SESSION['danger'] = "change";
    $_SESSION['alert-class'] = "Profile failed to";
    
}else{

$sql = "UPDATE `settings` SET logo=:logo";
$query= $conn->prepare($sql);
$query->bindParam(':logo',$logo, PDO::PARAM_STR);
$query->execute();

if (move_uploaded_file($_FILES['logo']['tmp_name'], $target)) {
$_SESSION['success'] = "change";
$_SESSION['alert-class'] = "Profile succesfully";
}else{
    $_SESSION['danger'] = "Please try again";
    $_SESSION['alert-class'] = "Something went wrong.";
  }
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
                            <li>Settings</li>
                        </ol>
                        <h2>Settings</h2>

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
                                            <h3 class="text-center font-weight-light my-4 font-weight-bold">Settings
                                            </h3>
                                        </div>
                                        <div class="card-body">


                                            <?php

$title = '';
$description = '';
$address1 =  '';
$address2 = '';
$session = '';
$term = '';
$logo = '';

                                        $stmt = $conn->query("SELECT * FROM `settings`");
                                   

                                        if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                            $title = $row['title'];
                                            $description = $row['description'];
                                            $address1 = $row['address1'];
                                            $address2 = $row['address2'];
                                            $session = $row['session'];
                                            $term = $row['term'];
                                            $logo = $row['logo'];
                                          
                                            
                                        }


                                        ?>

                                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                                <input type="hidden" value="999999999999999">

                                                <div class="form-group" id="imagemi">
                                                    <label>
                                                        <img class="getpic" src="images/<?php echo($logo); ?>" style=" width: 100%;height: auto;display:
                                                            inline-block;box-shadow:0px -3px 6px 2px
                                                            rgba(0,0,0,0.2);cursor: pointer;border: 5px solid white;
                                                            border-radius: 100px;">
                                                        <input type="file" name="logo" style="display: none;"
                                                            id="productimage" onchange="imagepreview(this)">
                                                    </label>
                                                </div>


                                                <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                                    <button type="submit" name="UpdateLogo"
                                                        class="btn btn-outline-warning btn-labeled shadow-lg">
                                                        Logo
                                                        <span class="btn-label btn-label-right"><i
                                                                class="fa fa-image"></i></span></button>
                                                </div>

                                            </form>

                                            <form class="form-horizontal" method="post">
                                                <input type="hidden" name="id">

                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label for="default" class="control-label">Title
                                                        </label>

                                                        <input type="text" name="title" class="form-control" id="title"
                                                            value="<?php echo htmlentities($title) ?>"
                                                            autocomplete="off" placeholder="Title">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label for="description" class="control-label">Description
                                                        </label>

                                                        <input type="text" name="description" class="form-control"
                                                            id="description" autocomplete="off"
                                                            value="<?php echo htmlentities($description) ?>"
                                                            placeholder="Description">
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label for="address1" class="control-label">Address 1
                                                        </label>

                                                        <input type="text" name="address1" class="form-control"
                                                            id="address1" autocomplete="off"
                                                            value="<?php echo htmlentities($address1) ?>"
                                                            placeholder="Address 1">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label for="address2" class="control-label">Address 2
                                                        </label>

                                                        <input type="text" name="address2"
                                                            class="form-control text-black" id="address2"
                                                            autocomplete="off"
                                                            value="<?php echo htmlentities($address2) ?>"
                                                            placeholder="Address 2">
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
                                                    <label for="default" class="col-md-12 control-label">Current
                                                        Term</label>
                                                    <div class="col-md-12">
                                                        <select name="term" class="form-control session show-tick"
                                                            data-style="btn-info" id="">
                                                            <option value="">Select Terms</option>
                                                            <?php $sql = "SELECT DISTINCT(`terms`) from `terms`";
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

                                                <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                                    <button type="submit" name="submit"
                                                        class="btn btn-outline-warning btn-labeled shadow-lg">
                                                        Settings
                                                        <span class="btn-label btn-label-right"><i
                                                                class="fa fa-check"></i></span></button>
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
        ClassicEditor.create(document.querySelector("#body")).catch((error) => {
            console.error(error);
        });
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

        <script>
        $(function() {
            $(".datepicker").datepicker({
                autoclose: true,
                todayHighlight: true,
            }).datepicker('update', new Date());
        });
        </script>