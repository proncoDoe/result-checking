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


<body class="sb-nav-fixed" id="#signin">


    <?php include './logout-modal.php' ?>

    <!-- post modal delete -->
    <?php include './delete_teacher.php' ?>

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
                                <a class=" nav-link" href="layout-sidenav-light.html">Manage Subjects</a>

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
                            <li>Manage subjects</li>
                        </ol>
                        <h2>Manage subjects</h2>

                    </div>
                </section><!-- End Breadcrumbs -->

                <div class="container-fluid px-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-9">


                            <div class="row">
                                <div class="col-md-12">

                                    <div class="card shadow-lg border-0 rounded-lg mt-5"
                                        style="background: linear-gradient(90deg, rgba(194, 63, 120, 1) 11%, rgba(177, 67, 126, 1) 50%, rgba(194, 63, 120, 1) 57%, rgba(72, 95, 167, 1)">

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


                                        <div class="d-flex align-items-center justify-content-between mt-2 mb-2">
                                            <div class="small"><a class="btn btn-dark" href="./add_teacher.php">Create
                                                    Teacher</a>
                                            </div>

                                        </div>


                                        <div class="card-header">
                                            <h3 class="text-center font-weight-light my-4 font-weight-bold">Manage
                                                Teacher</h3>
                                        </div>
                                        <div class="card-body text-white">
                                            <table id="datatablesSimple">
                                                <thead>
                                                    <tr class="text-white font-weight-bold">
                                                        <th>#</th>
                                                        <th>Teacher image</th>
                                                        <th>Full Name</th>
                                                        <th>Username</th>
                                                        <th>Email</th>
                                                        <th>Phone Number</th>
                                                        <th>Staus</th>
                                                        <th></th>
                                                        <th>Created at</th>
                                                        <th>Updated at</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                            
                            $statement = 'SELECT * FROM `teacher`';

                            $stmt = $conn->prepare($statement);
                            $stmt->execute();

                            if($stmt->rowCount() >= 1){
                                $cnt=1; 
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

                                $t_id = $row['t_id'];
                                $fullName = $row['fullName'];
                                $username = $row['username'];
                                $t_image = $row['t_image'];
                                $email = $row['email'];
                                $phoneNumber = $row['phoneNumber'];
                                $status = $row['status'];
                                $created_at = $row['created_at'];
                                $updated_at = $row['updated_at'];
                              

                              ?>


                                                    <tr class="text-white font-weight-bold">
                                                        <td><?php echo htmlentities($cnt);?></td>
                                                        <?php 
                                                        
                                                        echo "<td> <img class='img-responsive img-fluid img-thumbnail'
                                                        src='./upload/$t_image' alt='image' style='width:3rem !important; margin:auto 20px'>
                                                        </td>";
                                                        
                                                        ?>
                                                        <td><?php echo $fullName ?></td>
                                                        <td><?php echo $username  ?></td>

                                                        <td><?php echo $email  ?></td>
                                                        <td><?php echo $phoneNumber ?></td>

                                                        <td>
                                                            <?php $stts=$status;
                                                        if($stts=='Unapproved')
                                                        {
                                                            echo htmlentities('Unapproved');
                                                        }
                                                        else
                                                        {
                                                            echo htmlentities('Approved');
                                                        }
                                                             ?>
                                                        </td>


                                                        <td class="btn btn-group">


                                                            <?php if($stts=='Unapproved')
                                                            { ?>


                                                            <a class="btn btn-outline-info" data-toggle='tooltip'
                                                                data-placement='top' title='Approved teacher'
                                                                href="manage_teacher.php?app=<?php echo htmlentities($t_id);?>"><i
                                                                    class="fa fa-check"></i>
                                                            </a><?php } else {?>

                                                            <a class="btn btn-outline-warning" data-toggle='tooltip'
                                                                data-placement='top' title='Unapproved teacher'
                                                                href="manage_teacher.php?unap=<?php echo htmlentities($t_id);?>"><i
                                                                    class="fa fa-times"></i>
                                                            </a>

                                                            <?php }?>



                                                        </td>



                                                        <td><?php echo $created_at ?></td>
                                                        <td><?php echo $updated_at ?></td>


                                                        <td class='btn btn-group'>

                                                            <?php 
                                            echo "<a href='edit_teacher.php?edit_teacher&edit_id={$t_id}' data-toggle='tooltip' data-placement='top' title='Edit'
                                                class='btn btn-outline-success edit red-tooltip'><i
                                                    class='fas fa-edit'></i></a>";
                                                    
                                                    ?>

                                                            &nbsp;

                                                            <?php 
                                            
                                            echo "<a rel='$t_id' href='javascript:void(0)' data-toggle='tooltip'
                                            data-placement='top' title='Delete'
                                            class='btn btn-outline-danger delete_link red-tooltip'>
                                            <i class='fas fa-trash-alt'></i> </a>";
                                            
                                            ?>

                                                        </td>
                                                    </tr>

                                                    <?php teacher_delete(); ?>
                                                    <?php approve() ?>
                                                    <?php unapprove() ?>

                                                    <?php $cnt=$cnt+1; } 
                                    
                                }else{

                                    ?>

                                                <tfoot>
                                                    <tr colSpan=" 5">
                                                        <td>Class record is empty</td>

                                                    </tr>
                                                </tfoot>

                                                <?php
                                    
                                }
                                    
                                    ?>
                                                </tbody>



                                                <?php 
                                                
                                                function approve(){

                                                    global $conn;
                                                
                                                 // for activate Subject   	
                                                if(isset($_GET['app']))
                                                {
                                                $app=intval($_GET['app']);
                                                $status='Approved';
                                                $sql="UPDATE `teacher` SET status=:status WHERE t_id=:app";
                                                $query = $conn->prepare($sql);
                                                $query->bindParam(':status',$status,PDO::PARAM_STR);
                                                $query->bindParam(':app',$app,PDO::PARAM_STR);
                                              
                                                $query->execute();
                                                
                                                header('location:manage_teacher.php');

                                                }

                                            }


                                                function unapprove(){

                                                    global $conn;
                                                // for Deactivate Subject
                                                if(isset($_GET['unap']))
                                                {
                                                $unap=intval($_GET['unap']);
                                                $status='Unapproved';
                                                $sql="UPDATE `teacher` SET status=:status WHERE t_id=:unap ";
                                                $query = $conn->prepare($sql);
                                                $query->bindParam(':status',$status,PDO::PARAM_STR);
                                                $query->bindParam(':unap',$unap,PDO::PARAM_STR);
                                                
                                                $query->execute();
                                                
                                                header('location:manage_teacher.php');
                                                
                                                }
                                                
                                            }
                                                
                                                
                                                ?>





                                                <?php

                                function teacher_delete(){

                                global $conn;

                                if(isset($_GET['delete'])){


                                    $the_teacher_id = $_GET['delete'];
    
                                    $statement = "DELETE FROM `teacher` WHERE `t_id` = :id";
    
                                    $stmt = $conn->prepare($statement);
    
                                    $stmt->execute([
    
                                        ':id' => $the_teacher_id
                                    ]);
                                    
                                    header('location: manage_teacher.php');
                                    
                                }



                                
                            }
                         
                                ?>

                                            </table>


                                        </div>


                                    </div>
                                </div>

                            </div>
            </main>


            <?php include '../admin/inc/footer.php' ?>


            <script type="text/javascript">
            $(document).ready(function() {

                $(".delete_link").on('click', function() {

                    let id = $(this).attr("rel");

                    let deleteUrl = "manage_teacher.php?delete=" + id + "";

                    $(".modal_delete_link").attr("href", deleteUrl);
                    // $(".btn-outline-secondary").attr("data-dismiss");

                    $("#myModal").modal('show');

                });

            })
            </script>