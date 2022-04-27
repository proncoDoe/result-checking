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
if(isset($_POST['addClass']))
{


$class_name=$_POST['class_name'];
$c_name_numeric=$_POST['c_name_numeric'];
$term=$_POST['term'];
$created_at = date('F, d y h:i:s');

if(empty(trim($class_name)) || empty(trim($c_name_numeric)) || empty(trim($term))){

    $_SESSION['danger'] = "required";
     $_SESSION['alert-class'] = "Field is";

    
}else{


    
$sql="INSERT INTO `add_class`(class_name,c_name_numeric,term,created_at)
VALUES(:c_class_name,:name_numeric,:c_term,:c_created_at)";
$query = $conn->prepare($sql);
$query->bindParam(':c_class_name',$class_name,PDO::PARAM_STR);
$query->bindParam(':name_numeric',$c_name_numeric,PDO::PARAM_STR);
$query->bindParam(':c_term',$term,PDO::PARAM_STR);
$query->bindParam(':c_created_at',$created_at,PDO::PARAM_STR);

$query->execute();

$lastInsertId = $conn->lastInsertId();
if($lastInsertId)
{

// header('location: add_class.php');
$_SESSION['success'] = "successfully";
$_SESSION['alert-success'] = "Added class";


}
    
}$conn = null;

}



?>


<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">


                <?php if(isset($_SESSION['danger'])): ?>
                <div class="alert alert-danger font-weight-bold alert-dismissible fade show" role="alert">
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
                <div class="alert alert-success font-weight-bold alert-dismissible fade show" role="alert">
                    <strong><?php echo  $_SESSION['alert-success']; ?>!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?php 

echo $_SESSION['success']; 
unset($_SESSION['success']);
unset($_SESSION['alert-success']);


?>

                </div>

                <?php endif; ?>



                <div class="card shadow-lg border-0 rounded-lg mt-5"
                    style="background: linear-gradient(90deg, rgba(194, 63, 120, 1) 11%, rgba(177, 67, 126, 1) 50%, rgba(194, 63, 120, 1) 57%, rgba(72, 95, 167, 1)">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4 font-weight-bold">Add class</h3>
                    </div>
                    <div class="card-body">
                        <form action="add_class.php" method="POST">

                            <div class="form-floating mb-3">
                                <input class="form-control" name="class_name" id="class" type="text"
                                    placeholder="Class name..." />
                                <label for="class_name">Class</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" name="c_name_numeric" id="ClassNameNumeric" type="number"
                                    placeholder="Class Name in Numeric..." />
                                <label for="c_name_numeric">Class Name in Numeric</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" name="term" id="term" type="text" placeholder="Term..." />
                                <label for="term">Term</label>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                <button type="submit" name="addClass"
                                    class="btn btn-outline-warning btn-labeled shadow-lg">Add
                                    class
                                    <span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>

                                <div class="small"><a class="btn btn-dark" href="./manage_class.php">Management</a>
                                </div>
                            </div>


                    </div>

                    <?php echo $msg3; ?>

                    </form>

                    <?php echo $msg7; ?>
                </div>

            </div>
        </div>
    </div>
</main>


<?php include '../admin/inc/footer.php' ?>