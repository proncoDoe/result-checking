<?php include 'inc/header.php' ?>

<?php





?>




<style>
.wahatsapp:hover {
    animation-delay: 0s;
    animation-duration: 1s;
    animation-iteration-count: 0;
}

.wahatsapp {
    animation-delay: 0s;
    animation-duration: 1s;
    animation-iteration-count: infinite;
}


.container {

    background: #fff;

    -wekit-border-radius: 10px;
    -moz-border-radius: 10px;

    border-radius: 10px;

    margin-bottom: 90px;

    transition: all 1000ms;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);

}

.container:hover {
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    opacity: 0.9;
    transform: scale(1.17);
    transition: all 1000ms;
    cursor: pointer;
}


.welcome-page {

    text-transform: uppercase;

    color: #000;

    font-size: 20px;
}


.welcome-title {

    text-transform: uppercase;

    color: #9a2448;

    font-size: 20px;


}

.nav {

    display: block;
    padding: 20px;
    font-size: 19px;
}

.nav li {

    padding-top: 10px;

}

h1.tittle-header {
    font-weight: 700;
    font-size: 19px;
}

.title-note {

    text-transform: uppercase;
    color: #337ab7;
    font-size: 20px;
    font-weight: bold;

}
</style>




<?php include './logout-modal.php' ?>
<div class="container">



    <div class="row">

        <div class="col-md-8 welcome-page">

            <p class="font-weight-bold welcome-title">Welcome <?php echo $_SESSION['username'] ?></p>

            <h1 class="text-center font-weight-bold tittle-header">Please complete your result details below</h1>

            <div class="jumbotron">


                <?php echo $msg7; ?>









                <form action="" method="POST">

                    <div class="input-control">

                        <label for="card_serial_no">Enter your Card pin</label>
                        <input type="text" name="case_number" class="form-control" placeholder="Patient case number"
                            required>

                    </div>


                    <div class="input-control">

                        <label for="id">Id</label>
                        <input type="text" name="id" class="form-control" placeholder="id" required>

                    </div>

                    <div class="input-control">


                        <button type="submit" class="btn btn-outline-primary" name="Case_number" value="Linces"><i
                                class="fas fa-user-md"></i>Case number</button>

                    </div>

                </form>

            </div>

        </div>


        <?php 


if(isset($_GET['id'])){


    $id = $_GET['id'];


    // $sql = "SELECT  student.name,student.student_image,student.exam_pin,
    //                       student.created_at,student.name,add_class.class_name,academic_year.session,
    //                       add_result.id, add_result.student_name, add_result.session,add_result.term,add_result.status,
    //                       add_result.revision,add_result.admin_status,add_result.created_at,
    //                       add_result.updated_at FROM add_result join student on student.name=add_result.student_name  
    //                       join add_class on add_class.class_name=add_result.class_name  join academic_year
    //                        on academic_year.session =add_result.session
    //                        WHERE LIKE add_result.id='$id%' ORDER BY add_result.id DESC";
                           

      $query = "SELECT * FROM `add_result`  WHERE id LIKE '$id'";
      $doctor_linces_result = mysqli_query($conn, $query);

}



    // if(isset($_POST['id'])){

    //     $id = $_POST['id'];



    // ?>


        <div class="col-md-4">

            <p class="title-note">Please note</p>

            <ul class="list-group" style="padding: 20px; font-size: 19px;">

                <li class="list-group-item list-group-item-dark" style="color: #e6eefc; background-color: #020202">You
                    have to purchase a scratch
                    card from the school
                    to check your result
                </li>
                <li class="list-group-item list-group-item-info">You are welcome to use the card as many times as
                    possible</li>
                <li class="list-group-item list-group-item-danger">The scratch card is valid for the particular term
                </li>
                <li></li>
            </ul>

            <ul class="nav">
                <li class="active"><a href="student_dashboard.php">Student dashboard</a></li>
                <!-- <li><a href="logout.php">Logout</a></li> -->

                <li class="active">
                    <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-sign-out-alt"></i>Logout</a>
                </li>

                <li><a href="proncodoe@gmail.com" target="_blank">@Academy.com</a></li>

            </ul>


        </div>


    </div>

</div>

<div class="container-flid">

    <div class="row">

        <div class="col-md-6">


        </div>

        <div class="col-md-6 clearfix">


            <a class="float-right mr-5 animated rubberBand wahatsapp"
                href="https://api.whatsapp.com/send/?phone=2347065015510" target="_blank"><i
                    class="fab fa-whatsapp fa-4x" style="color: #25d366;"></i></a>

        </div>

    </div>


</div>


<?php include 'inc/footer.php' ?>