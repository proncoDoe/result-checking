<?php include 'inc/header.php' ?>
<?php require 'controller/random.php' ?>


<?php 
   
   $regNumber = '';
   
   $id = 0;
   
   if(isset($_GET['edit'])){
   
   $id = $_GET['edit'];


    $statement = 'SELECT * FROM `regno_abbr` WHERE reg_id =  :id';

    $stmt = $conn->prepare($statement);

    $stmt->execute([

        ':id' => $id
    ]);

    if($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        $reg_id = $row['reg_id'];

        $regNumber = $row['regNumber'];

    }
    
   }

   
   ?>




<?php 
  


  if(isset($_POST['update'])){

    $id =  $_POST['reg_id'];

    $regNumber =  $_POST['regNumber'];

   

     if(empty($regNumber)){


        $_SESSION['danger'] = "be blank";
        $_SESSION['alert-class'] = "Field can't ";

         
     }else{

         $statement = 'UPDATE `regno_abbr` SET regNumber =  :reg_regNumber WHERE reg_id = :id';
         
         $stmt = $conn->prepare($statement);

         $stmt->execute([

             ':reg_regNumber' => $regNumber,

             ':id' => $id
             
             
         ]);


         header('location: reg_abbr.php');

         $_SESSION['success'] = "updated";
         $_SESSION['alert-class'] = "Successfuly ";
  
     }
 

 
}

  
  ?>






<div class="content-wrapper">
    <div class="content-container">

        <div class="main-page">
            <div class="container-fluid">

                <div class="row">

                    <div class="col-lg-6 offset-lg-3 col-sm-10 col-sm-12">

                        <form class="form-horizontal" method="post">
                            <input type="hidden" value="<?php echo $reg_id; ?>" name="reg_id">

                            <div class="form-content">

                                <div class="row">

                                    <div class="card">

                                        <div class="card-body">

                                            <input type="hidden" value="<?php echo $reg_id ?>" name="reg_id ">

                                            <div class="form-group">
                                                <div class="col-md-12">

                                                    <input type="text" name="regNumber" value="<?php echo $regNumber ?>"
                                                        class="form-control" id="regNumber" autocomplete="off"
                                                        placeholder="REG No">
                                                </div>
                                            </div>


                                            <div class="form-group">


                                                <div class="row">

                                                    <div class="col-md-5">
                                                        <button type="submit" name="update" id="submitme"
                                                            class="btn btn-primary">Update</button>

                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>


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


                    </div>
                </div>
                <!-- /.col-md-12 -->

            </div>
        </div>
        <!-- /.content-container -->
    </div>
    <!-- /.content-wrapper -->
</div>

<?php include 'inc/footer.php' ?>

<script>
$(function($) {
    $(".js-states").select2();
    $(".js-states-limit").select2({
        maximumSelectionLength: 2
    });
    $(".js-states-hide").select2({
        minimumResultsForSearch: Infinity
    });
});
</script>