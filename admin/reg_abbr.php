<?php include 'inc/header.php' ?>
<?php require 'controller/random.php' ?>


<?php

if(isset($_POST['submit'])){

$error = '';

$regNumber = $_POST['regNumber'];
$reg_id = $_POST['reg_id'];


if(!empty(trim($regNumber))){


$statement = "INSERT INTO `regno_abbr`(`regNumber`)
Values(:regno_regNumber)";

$stmt = $conn->prepare($statement);

$stmt->execute([

':regno_regNumber' => $regNumber

]);

$_SESSION['success'] = "submited";
$_SESSION['alert-class'] = "Successfuly ";

}else{

$_SESSION['danger'] = "be blank";
$_SESSION['alert-class'] = "Field can't ";
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
                            <input type="hidden" name="reg_id" value="<?php echo $reg_id; ?>">

                            <div class="form-content">

                                <div class="row">

                                    <div class="card">

                                        <div class="card-body">

                                            <div class="form-group">
                                                <div class="col-md-12">

                                                    <input type="text" name="regNumber" class="form-control"
                                                        id="regNumber" autocomplete="off" placeholder="REG No">
                                                </div>
                                            </div>


                                            <div class="form-group">


                                                <div class="row">

                                                    <div class="col-md-5">
                                                        <button type="submit" name="submit" id="submitme"
                                                            class="btn btn-primary">Add Student</button>

                                                    </div>

                                                    <div class="col-md-7">

                                                        <?php 


                                                $statement = 'SELECT * FROM `regno_abbr`';

                                                $stmt = $conn->prepare($statement);

                                                while($row = $stmt->fetchAll(PDO::FETCH_OBJ)){

                                                    $reg_id  = $row['reg_id'];
                                                  


                                            

                                                }

?>

                                                        <a href='reg_abbr_update.php?edit=<?php echo  $reg_id ?>'
                                                            style='border-radius: 5%;' data-toggle='tooltip'
                                                            data-placement='right' title='Print patient document'
                                                            title='View document file'
                                                            class='btn btn-info pdf red-tooltip'><i
                                                                class='fas fa-edit'>&nbsp;</i>Update</a>

                                                    </div>

                                                </div>

                                            </div>
                                        </div>




                                        <table class="table table-borderless table-responsive-sm table-responsive-md">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">RegNumber</th>

                                                </tr>
                                            </thead>


                                            <tbody>

                                                <?php 


                                        $statement = 'SELECT * FROM regno_abbr';

                                        $stmt = $conn->prepare($statement);

                                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

                                            $reg_id  = $row['reg_id'];
                                            $regNumber  = $row['regNumber'];

                                                }

                                                ?>

                                                <tr>

                                                    <td scope="col"><?php  echo $reg_id; ?></td>
                                                    <td scope="col"><?php echo $regNumber; ?></td>


                                                </tr>





                                            </tbody>
                                        </table>

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