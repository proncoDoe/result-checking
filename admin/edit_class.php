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

$class_name = '';
 $c_name_numeric = '';
 $term = '';
   
   $id = 0;
   
   if(isset($_GET['edit_id'])){
   
   $id = $_GET['edit_id'];


    $statement = 'SELECT * FROM `add_class` WHERE `class_id` =  :id';

    $stmt = $conn->prepare($statement);

    $stmt->execute([

        ':id' => $id
    ]);

    if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $class_id  = $row['class_id'];
        $class_name = $row['class_name'];
        $c_name_numeric = $row['c_name_numeric'];
        $term = $row['term'];

    }
    
   }

   
   ?>




<?php 
  
  if(isset($_POST['update'])){

    $id  = $_POST['class_id'];

    $class_name =  $_POST['class_name'];

    $c_name_numeric =  $_POST['c_name_numeric'];

    $term =  $_POST['term'];

    $updated_at = date('F, d y h:i:s');

     if(empty($class_name) || empty($c_name_numeric)){


        $_SESSION['danger'] = "be blank";
        $_SESSION['alert-class'] = "Field can't ";

         
     }else{

         $statement = 'UPDATE `add_class` SET class_name = :c_class_name,c_name_numeric = :name_numeric,term = :c_term,updated_at = :c_updated_at WHERE class_id = :id';
         
         $stmt = $conn->prepare($statement);

         $stmt->execute([

             ':c_class_name' => $class_name,
             ':name_numeric' => $c_name_numeric,
             ':c_term' => $term,
             ':c_updated_at' => $updated_at,

             ':id' => $id
             
             
         ]);


         header('location: manage_class.php');

         $_SESSION['success'] = "updated";
         $_SESSION['alert-success'] = "Successfuly ";
  
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

                <div class="card shadow-lg border-0 rounded-lg mt-5"
                    style="background: linear-gradient(90deg, rgba(194, 63, 120, 1) 11%, rgba(177, 67, 126, 1) 50%, rgba(194, 63, 120, 1) 57%, rgba(72, 95, 167, 1)">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4 font-weight-bold">Update class</h3>
                    </div>
                    <div class="card-body">
                        <form action="edit_class.php" method="POST">


                            <div class="form-floating mb-3">
                                <input class="form-control" type="hidden" name="class_id"
                                    value="<?php echo $class_id; ?>" />

                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" name="class_name" value="<?php echo $class_name; ?>"
                                    id="class" type="text" placeholder="Class name..." />
                                <label for="class_name">Class</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" name="c_name_numeric" value="<?php echo $c_name_numeric; ?>"
                                    id="ClassNameNumeric" type="number" placeholder="Class Name in Numeric..." />
                                <label for="c_name_numeric">Class Name in Numeric</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" name="term" value="<?php echo $term; ?>" id="term"
                                    type="text" placeholder="term..." />
                                <label for="term">Term</label>
                            </div>



                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                <button type="submit" name="update"
                                    class="btn btn-outline-warning btn-labeled shadow-lg">Update
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