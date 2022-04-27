<?php include 'inc/header2.php' ?>

<?php error_reporting(0); ?>


<style type="text/css">
.content-wrapper {
    margin: 0 auto;
    max-width: 1336px;
    min-width: 1336px;
}

@media print {
    .content-wrapper .yes_print {
        margin: 0 auto;
        max-width: 1100px;
        min-width: 1100px;
    }

    .print_p {
        padding-top: 0px !important;
    }

    .content-wrapper {
        margin: 0 auto;
        max-width: 100%;
        min-width: 100%;
    }
}
</style>


<?php

if(isset($_GET['res_id'])){

$id = $_GET['res_id'];


$statement = 'SELECT * FROM `add_result` WHERE `id` =  :id';

$stmt = $conn->prepare($statement);

$stmt->execute([

    ':id' => $id
]);

if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $res_id = $row['id'];
    $class_name = $row['class_name'];
    $student_name = $row['student_name'];
    $term = $row['term'];
    $session = $row['session'];
    $opened	 = $row['opened'];
    $present = $row['present'];
    $absence = $row['absence'];
    $termBegins = $row['termBegins'];
    $termEnds = $row['termEnds'];
    $nextTermBegins = $row['nextTermBegins'];
    $subject1 = $row['subject1'];
    $test1 = $row['test1'];
    $exam_score1 = $row['exam_score1'];
    $subject2 = $row['subject2'];
    $test2 = $row['test2'];
    $exam_score2 = $row['exam_score2'];
    $subject3 = $row['subject3'];
    $test3 = $row['test3'];
    $exam_score3 = $row['exam_score3'];
    $subject4 = $row['subject4'];
    $test4 = $row['test4'];
    $exam_score4 = $row['exam_score4'];
    $subject5 = $row['subject5'];
    $test5 = $row['test5'];
    $exam_score5 = $row['exam_score5'];
    $subject6 = $row['subject6'];
    $test6 = $row['test6'];
    $exam_score6 = $row['exam_score6'];
    $subject7 = $row['subject7'];
    $test7 = $row['test7'];
    $exam_score7 = $row['exam_score7'];
    $subject8 = $row['subject8'];
    $test8 = $row['test8'];
    $exam_score8 = $row['exam_score8'];
    $subject9 = $row['subject9'];
    $test9 = $row['test9'];
    $exam_score9 = $row['exam_score9'];
    $status = $row['status'];
    $admin_status = $row['admin_status'];

}

}

?>




<div class="container my-5">


    <div class="row justify-content-center">

        <div class="col-md-12">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">

                <form action="" method="POST">

                    <div class="input-control">

                        <label for="rollNumber">Enter patient case number</label>
                        <input type="text" name="rollNumber" class="form-control" placeholder="Patient case number"
                            required>

                    </div>

                    <div class="input-control">


                        <button type="submit" class="btn btn-outline-primary" name="rollNumber" value="Linces"><i
                                class="fas fa-user-md"></i>Case number</button>

                    </div>


                    <div class="container mr-5">

                        <div class="row ml-5">
                            <div class="col-md-10 ml-5">

                                <!-- /.left-sidebar -->

                                <div class="row page-title-div" style="background: transparent;">

                                    <?php
$stmt = $conn->query("SELECT * FROM settings");
$rowprint = $stmt->fetch(PDO::FETCH_OBJ);
?>
                                    <?php

$sql = "SELECT  student.name,student.student_image,student.exam_pin,
student.created_at,student.name,add_class.class_name,academic_year.session,
add_result.id, add_result.student_name, add_result.rollNumber, add_result.session,add_result.term,add_result.status,
add_result.revision,add_result.admin_status,add_result.created_at,
add_result.updated_at FROM add_result join student on student.name=add_result.student_name  
join add_class on add_class.class_name=add_result.class_name  join academic_year
on academic_year.session=add_result.session
WHERE add_result.id='$id' ORDER BY add_result.id DESC limit 1";

$query = $conn->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{

foreach( $results as $result)
{    ?>

                </form>

                <?php 


if(isset($_POST['rollNumber'])){

    $Case_number = $_POST['rollNumber'];



    $Case_number = strtoupper($_POST['rollNumber']);


    $Case_number = $row->rollNumber;
    $sql = "SELECT  student.name,student.student_image,student.exam_pin,
student.created_at,student.student_id,add_class.class_name,academic_year.session,
add_result.id, add_result.student_name, add_result.session,add_result.term,add_result.status,
add_result.revision,add_result.admin_status,add_result.rollNumber,add_result.created_at,
add_result.updated_at FROM add_result join student on student on student.name=add_result.student_name
join add_class on add_class.class_name=add_result.class_name  join academic_year
on academic_year.session=add_result.session
WHERE add_result.id='$id' AND LIKE add_result.rollNumber='$Case_number%'";


// $term = $row->term;
// $stmt = $conn->query("SELECT * FROM add_result WHERE id = '$id' and term = '$term' ");
// $moredata = $stmt->fetch(PDO::FETCH_OBJ);
    
    $Case_number = $row->rollNumber;
    $query = "SELECT * FROM `add_result`  WHERE rollNumber LIKE '$Case_number%' ORDER BY id ASC";
    $doctor_linces_result = mysqli_query($conn, $query);

//     $query = "SELECT * FROM add_result WHERE rollNumber LIKE '?%' ORDER BY id ASC";

//     $params = array($Case_number);
//     $stmt = $conn->prepare($query);
//     $stmt->execute($params);

// //     $query = $conn->prepare($sql);
// // $query->execute();

// $results=$stmt->fetch(PDO::FETCH_OBJ);

    
if ($stmt->rowCount() >= 1) 
{

  ?>


                <!-- For Printing -->
                <div class="yes_print">
                    <div class="printing" style="width: 100%;margin-left: auto;margin-right: auto;">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="admin/images/<?php echo htmlentities($row->logo); ?>"
                                    style="height: 110px;margin-left: 0%;">
                            </div>

                            <div class="col-md-7">
                                <h1
                                    style="text-transform: uppercase;margin: 0px;font-size: 30px;margin-bottom: 7px;font-family: Arial Black;">
                                    <?php echo htmlentities($row->title); ?></h1>
                                <p
                                    style="text-transform: uppercase;font-weight: bold;background: black;color: white;padding: 5px;text-align: left;margin-bottom: 1px;">
                                    <b style="margin-left: 31px;">Motto:</b> <span
                                        style="margin-left:37px; "><?php echo htmlentities($row->description); ?></span>
                                </p>
                                <p style="margin:0px;padding: 0px;">
                                    2, Awotunde Temidire Street, Off Shogbesan Ave, Moshalasi Bus Stop,
                                    Alagbado,
                                    Lagos.
                                </p>
                                <p style="margin:0px;padding: 0px;">
                                    <b>PRIMARY: </b>11, Temidire Street, Off Awolu, Moshalasi Bus Stop,
                                    Alagbado,
                                    Lagos.
                                </p>
                            </div>
                            <div class="col-md-3">
                                <img src="admin/upload/<?php echo htmlentities($row->student_image); ?>" style="height: 113px;
border: 2px solid #d3d3d3;
object-fit: cover;
width: 133px;
object-position: center top;
margin-left: 5px;">
                            </div>


                        </div>
                        <?php } 

?>


                    </div>
                </div>
                <!-- /.row -->

                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

            <div class="row">
                <div class="col-md-8 offset-2 offset-sm-0">
                    <div class="card print_p">
                        <div class="card-header print_p">
                            <div class="card-title print_p">

                                <?php

                $qery = "SELECT  student.name,student.student_image,student.exam_pin,student.dob,student.gender,
                student.created_at,student.name,add_class.class_name,academic_year.session,
                add_result.id, add_result.student_name, add_result.session,add_result.term,add_result.status,
                add_result.revision,add_result.admin_status,add_result.created_at,
                add_result.updated_at FROM add_result join student on student.name=add_result.student_name  
                join add_class on add_class.class_name=add_result.class_name  join academic_year
                on academic_year.session=add_result.session
                WHERE add_result.id='$id' ORDER BY add_result.id DESC limit 1"; 
                                                
                $stmt = $conn->prepare($qery);
                $stmt->execute();
                $resultss=$stmt->fetchAll(PDO::FETCH_OBJ);
                $cnt=1;
                if($stmt->rowCount() > 0)
                { ?>
                                <h2 style="text-align: center;margin-bottom: 5px;font-family: calibri;">
                                    Continous Assessment Report <br>FOR
                                    Academy portal</h2>
                                <?php
                foreach($resultss as $row)
                {   ?>
                                <div class="firsttable" style="float: left;width: 35%;">
                                    <table class="table table-hover table-bordered"
                                        style="width: 100%;text-align: left;">

                                        <thead>
                                            <tr>
                                                <th scope="row" colspan="3" class="p-5 text-uppercase" <h3>Student
                                                    Personal Data</h3>
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td scope="row" colspan="2" style="font-weight: bold;">
                                                    Name
                                                    <em>(Surname First)</em>
                                                </td>
                                                <td id="studentnameid"
                                                    style="text-align: center;text-transform: uppercase;">
                                                    <?php echo htmlentities($row->name);?></td>
                                            </tr>
                                            <tr>
                                                <td scope="row" colspan="2" style="font-weight: bold;">
                                                    Date
                                                    of Birth</td>
                                                <td style="text-align: center;text-transform: uppercase;">
                                                    <?php echo htmlentities(date("F j, Y", strtotime($row->dob)));?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td scope="row" colspan="2" style="font-weight: bold;">
                                                    Sex
                                                </td>
                                                <td style="text-align: center;text-transform: uppercase;">
                                                    <?php echo htmlentities($row->gender);?></td>
                                            </tr>
                                            <tr>
                                                <td scope="row" colspan="2" style="font-weight: bold;">
                                                    Class
                                                </td>
                                                <td id="classname"
                                                    style="text-align: center;text-transform: uppercase;">
                                                    <?php echo htmlentities($row->class_name);?></td>
                                            </tr>
                                            <tr>
                                                <td scope="row" colspan="2" style="font-weight: bold;">
                                                    Session </td>
                                                <td style="text-align: center;text-transform: uppercase;"><?php
                                     
                                         echo htmlentities($row->session);
                             ?></td>
                                            </tr>
                                            <tr>
                                                <td scope="row" colspan="2" style="font-weight: bold;">
                                                    Exam Pin </td>
                                                <td style="text-align: center;text-transform: lowercase;">
                                                    <code><?php echo htmlentities($row->exam_pin);?></code>
                                                </td>
                                            </tr>


                                            <?php }
                }
                    ?>





                                        </tbody>
                                    </table>
                                </div>


                                <div class="secondtable" style="float: right;width: 64%;">
                                    <table class="table table-hover table-bordered"
                                        style="width: 100%;text-align: center;">

                                        <thead>
                                            <tr>
                                                <th scope="row" colspan="3" class="tst"
                                                    style="padding: 10px;text-transform: uppercase;">
                                                    <h3>attendance</h3>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td scope="row" colspan="1"
                                                    style="text-align: center;font-weight: bold;">No. of
                                                    Days School Opened</td>
                                                <td scope="row" colspan="1"
                                                    style="text-align: center;font-weight: bold;">No. of
                                                    Days Present</td>
                                                <td scope="row" colspan="1"
                                                    style="text-align: center;font-weight: bold;">No. of
                                                    Days Absent</td>
                                            </tr>
                                            <tr>


                                                <?php
                            $term = $row->term;
                            $stmt = $conn->query("SELECT * FROM add_result WHERE id = '$id' and term = '$term' ");
                            $row = $stmt->fetch(PDO::FETCH_OBJ);
                            ?>
                                                <td><?php echo htmlentities($row->opened); ?></td>
                                                <td><?php echo htmlentities($moredata->present); ?></td>
                                                <td><?php echo htmlentities($moredata->absence); ?></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <table class="table table-hover table-bordered"
                                        style="width: 100%;text-align: center;">

                                        <thead>
                                            <tr>
                                                <th scope="row" colspan="3" class="tst"
                                                    style="padding: 10px;text-transform: uppercase;">
                                                    <h3>terminal duration</h3>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td scope="row" colspan="1"
                                                    style="text-align: center;font-weight: bold;">Term
                                                    Begins</td>
                                                <td scope="row" colspan="1"
                                                    style="text-align: center;font-weight: bold;">Term
                                                    Ends
                                                </td>
                                                <td scope="row" colspan="1"
                                                    style="text-align: center;font-weight: bold;">Next
                                                    Term
                                                    Begins</td>
                                            </tr>
                                            <tr>
                                                <td><?php echo htmlentities($moredata->termBegins); ?>
                                                </td>
                                                <td><?php echo htmlentities($moredata->termEnds); ?>
                                                </td>
                                                <td><?php echo htmlentities($moredata->nextTermBegins); ?>
                                                </td>
                                            </tr>




                                        </tbody>
                                    </table>
                                </div>




                                <?php
               $termid = $row->term;
               $stmt = $conn->query("SELECT * FROM add_result WHERE id = '$id' and term = '$term' ")  or die();
               $resultterm = $stmt->fetch(PDO::FETCH_OBJ);
              
               ?>
                            </div>
                            <style type="text/css">
                            table {
                                text-align: center;
                            }

                            th {
                                text-align: center;

                            }

                            .tst {
                                background: lightgrey;
                            }
                            </style>
                            <div class="card-body p-5">
                                <table class="table table-hover table-bordered" style="text-align: center;">
                                    <div style="padding: 10px;text-align: center;background:lightgrey;text-transform: uppercase;clear: both;"
                                        class="print_p">
                                        <h3>Academic Performance</h3>
                                    </div>
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Cont. Assess.</th>
                                            <th>Exam Score</th>
                                            <th><?php echo $resultterm->term;?> Score</th>
                                            <th>Grade</th>
                                            <th>Teacher's Comment</th>
                                        </tr>
                                        <tr class="text-muted table-dark">
                                            <th class="tst">Max Obt. Mark</th>
                                            <th class="tst">10%</th>
                                            <th class="tst">20%</th>
                                            <th class="tst">30%</th>
                                            <th class="tst"></th>
                                            <th class="tst"></th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php
            
            $qery = "SELECT  student.name,student.student_image,student.exam_pin,student.dob,student.gender,
            student.created_at,student.name,add_class.class_name,academic_year.session,
            add_result.id, add_result.student_name, add_result.session,add_result.term,add_result.status,
            add_result.subject1,add_result.test1,add_result.exam_score1,
            add_result.subject2,add_result.test2,add_result.exam_score2,
            add_result.subject3,add_result.test3,add_result.exam_score3,
            add_result.subject4,add_result.test4,add_result.exam_score4,
            add_result.subject5,add_result.test5,add_result.exam_score5,
            add_result.subject6,add_result.test6,add_result.exam_score6,
            add_result.subject7,add_result.test7,add_result.exam_score7,
            add_result.subject8,add_result.test8,add_result.exam_score8,
            add_result.subject9,add_result.test9,add_result.exam_score9,
            
            add_result.revision,add_result.admin_status,add_result.created_at,
            add_result.updated_at FROM add_result join student on student.name=add_result.student_name  
            join add_class on add_class.class_name=add_result.class_name  join academic_year
            on academic_year.session=add_result.session
            WHERE add_result.id='$id' ORDER BY add_result.id DESC limit 1"; 
                                            
            $stmt = $conn->prepare($qery);
            $stmt->execute();
            $resultss=$stmt->fetch(PDO::FETCH_OBJ);
            $cnt=1;
            
              
               ?>


                                        <?php
                                if($resultss->test1+$resultss->exam_score1 > 1){
                                ?>

                                        <tr>
                                            <td><?php echo htmlentities($resultss->subject1);?>
                                            </td>
                                            <td><?php echo htmlentities($resultss->test1 < 1 ? "--" : $resultss->test1);?>
                                            </td>
                                            <td><?php echo htmlentities($resultss->exam_score1 < 1 ? "--" : $resultss->exam_score1);?>
                                            </td>

                                            <td><?php echo htmlentities($totalmarks=$resultss->test1+$resultss->exam_score1 < 1 ? "--" : $resultss->test1+$resultss->exam_score1 );?>

                                            <td>

                                                <?php 
                                       if ($resultss->test1+$resultss->exam_score1 >= 29 && $resultss->test1+$resultss->exam_score1 <= 30) { 
                                       echo "A1";
                                       } 
                                       
                                       if ($resultss->test1+$resultss->exam_score1 >= 25 && $resultss->test1+$resultss->exam_score1 <= 27) { 
                                       echo "B1";
                                       } 
                                       
                                       if ($resultss->test1+$resultss->exam_score1 >= 20 && $resultss->test1+$resultss->exam_score1 <= 21) { 
                                       echo "B2";
                                       } 
                                       
                                       if ($resultss->test1+$resultss->exam_score1 >= 19 && $resultss->test1+$resultss->exam_score1 <= 20) { 
                                       echo "C3";
                                       } 
                                       
                                       if ($resultss->test1+$resultss->exam_score1 >= 18 && $resultss->test1+$resultss->exam_score1) { 
                                       echo "C4";
                                       } 
                                       
                                       if ($resultss->test1+$resultss->exam_score1 >= 10 && $resultss->test1+$resultss->exam_score1 <= 18) { 
                                       echo "D";
                                       } 
                                       
                                       if ($resultss->test1+$resultss->exam_score1 >= 0 && $resultss->test1+$resultss->exam_score1 <= 10) { 
                                       echo $resultss->test1+$resultss->exam_score1 < 1 ? "--" : "F";
                                       } 
                                       
                                       ?>

                                            </td>


                                            <td>

                                                <?php 
if ($resultss->test1+$resultss->exam_score1 >= 29 && $resultss->test1+$resultss->exam_score1 <= 30) { 
echo "Excellent";
} 

if ($resultss->test1+$resultss->exam_score1 >= 25 && $resultss->test1+$resultss->exam_score1 <= 27) { 
echo "Very Good";
} 

if ($resultss->test1+$resultss->exam_score1 >= 19 && $resultss->test1+$resultss->exam_score1 <= 20) { 
echo "Good";
} 

if ($resultss->test1+$resultss->exam_score1>= 18 && $resultss->test1+$resultss->exam_score1 <= 17) { 
echo "Credit";
} 


if ($resultss->test1+$resultss->exam_score1 >= 18 && $resultss->test1+$resultss->exam_score1) { 
echo "Credit";
} 

if ($resultss->test1+$resultss->exam_score1 >= 14 && $resultss->test1+$resultss->exam_score1 <= 18) { 
echo "Credit";
} 

if ($resultss->test1+$resultss->exam_score1>= 10 && $resultss->test1+$resultss->exam_score1 <= 14) { 
echo "Pass";
} 

if ($resultss->test1+$resultss->exam_score1>= 0 && $resultss->test1+$resultss->exam_score1 <= 10) { 
echo $resultss->test1+$resultss->exam_score1 < 1 ? "--" : "Fail";
} 

?>

                                            </td>



                                        </tr>

                                        <?php
                                }
                                ?>


                                        <?php
                                if($resultss->test2+$resultss->exam_score2 > 1){
                                ?>

                                        <tr>
                                            <td><?php echo htmlentities($resultss->subject2);?>
                                            </td>
                                            <td><?php echo htmlentities($resultss->test2 < 1 ? "--" : $resultss->test2);?>
                                            </td>
                                            <td><?php echo htmlentities($resultss->exam_score2 < 1 ? "--" : $resultss->exam_score2);?>
                                            </td>

                                            <td><?php echo htmlentities($totalmarks=$resultss->test2+$resultss->exam_score2 < 1 ? "--" : $resultss->test2+$resultss->exam_score2 );?>

                                            </td>


                                            <td>

                                                <?php 
if ($resultss->test2+$resultss->exam_score2 >= 29 && $resultss->test2+$resultss->exam_score2 <= 30) { 
echo "A1";
} 

if ($resultss->test2+$resultss->exam_score2 >= 25 && $resultss->test2+$resultss->exam_score2 <= 27) { 
echo "B1";
} 

if ($resultss->test2+$resultss->exam_score2 >= 20 && $resultss->test2+$resultss->exam_score2 <= 25) { 
echo "B2";
} 

if ($resultss->test2+$resultss->exam_score2 >= 19 && $resultss->test2+$resultss->exam_score2 <= 21) { 
echo "C3";
} 

if ($resultss->test2+$resultss->exam_score2 >= 18 && $resultss->test2+$resultss->exam_score2 <= 19) { 
echo "C4";
} 

if ($resultss->test2+$resultss->exam_score2 >= 10 && $resultss->test2+$resultss->exam_score2 <= 18) { 
echo "D";
} 

if ($resultss->test2+$resultss->exam_score2 >= 0 && $resultss->test2+$resultss->exam_score2 <= 10) { 
echo $resultss->test2+$resultss->exam_score2 < 1 ? "--" : "F";
} 

?>

                                            </td>


                                            <td>

                                                <?php 
if ($resultss->test2+$resultss->exam_score2 >= 29 && $resultss->test2+$resultss->exam_score2 <= 30) { 
echo "Excellent";
} 

if ($resultss->test2+$resultss->exam_score2 >= 25 && $resultss->test2+$resultss->exam_score2 <= 27) { 
echo "Very Good";
} 

if ($resultss->test2+$resultss->exam_score2 >= 19 && $resultss->test2+$resultss->exam_score2 <= 20) { 
echo "Good";
} 

if ($resultss->test2+$resultss->exam_score2 >= 18 && $resultss->test2+$resultss->exam_score2 <= 19) { 
echo "Credit";
} 

if ($resultss->test2+$resultss->exam_score2 >= 14 && $resultss->test2+$resultss->exam_score2 <= 18) { 
echo "Credit";
} 

if ($resultss->test2+$resultss->exam_score2>= 10 && $resultss->test1+$resultss->exam_score2 <= 14) { 
echo "Pass";
} 

if ($resultss->test2+$resultss->exam_score2 >= 0 && $resultss->test2+$resultss->exam_score2 <= 10) { 
echo $resultss->test2+$resultss->exam_score2 < 1 ? "--" : "Fail";
} 

?>

                                            </td>


                                        </tr>

                                        <?php
                                }
                                ?>


                                        <?php
                                if($resultss->test3+$resultss->exam_score3 > 1){
                                ?>

                                        <tr>
                                            <td><?php echo htmlentities($resultss->subject3);?>
                                            </td>
                                            <td><?php echo htmlentities($resultss->test3);?>
                                            </td>
                                            <td><?php echo htmlentities($resultss->exam_score3);?>
                                            </td>

                                            <td><?php echo htmlentities($totalmarks=$resultss->test3+$resultss->exam_score3 < 1 ? "--" : $resultss->test3+$resultss->exam_score3 );?>


                                            <td>

                                                <?php 
if ($resultss->test3+$resultss->exam_score3 >= 29 && $resultss->test3+$resultss->exam_score3 <= 30) { 
echo "A1";
} 

if ($resultss->test3+$resultss->exam_score3 >= 25 && $resultss->test3+$resultss->exam_score3 <= 27) { 
echo "B1";
} 

if ($resultss->test3+$resultss->exam_score3 >= 20 && $resultss->test3+$resultss->exam_score3 <= 19) { 
echo "B2";
} 

if ($resultss->test3+$resultss->exam_score3 >= 19 && $resultss->test3+$resultss->exam_score3 <= 21) { 
echo "C3";
} 

if ($resultss->test3+$resultss->exam_score3 >= 18 && $resultss->test3+$resultss->exam_score3 <= 19) { 
echo "C4";
} 

if ($resultss->test3+$resultss->exam_score3 >= 10 && $resultss->test3+$resultss->exam_score3 <= 18) { 
echo "D";
} 

if ($resultss->test3+$resultss->exam_score3 >= 0 && $resultss->test3+$resultss->exam_score3 <= 10) { 
echo $resultss->test3+$resultss->exam_score3 < 1 ? "--" : "F";
} 

?>

                                            </td>


                                            <td>

                                                <?php 
if ($resultss->test3+$resultss->exam_score3 >= 29 && $resultss->test3+$resultss->exam_score3 <= 30) { 
echo "Excellent";
} 

if ($resultss->test3+$resultss->exam_score3 >= 25 && $resultss->test3+$resultss->exam_score3 <= 27) { 
echo "Very Good";
} 

if ($resultss->test3+$resultss->exam_score3 >= 19 && $resultss->test3+$resultss->exam_score3 <= 20) { 
echo "Good";
} 

if ($resultss->test3+$resultss->exam_score3 >= 18 && $resultss->test3+$resultss->exam_score3 <= 19) { 
echo "Credit";
} 

if ($resultss->test3+$resultss->exam_score3 >= 14 && $resultss->test3+$resultss->exam_score3 <= 18) { 
echo "Credit";
} 

if ($resultss->test3+$resultss->exam_score3 >= 10 && $resultss->test3+$resultss->exam_score3 <= 14) { 
echo "Pass";
} 

if ($resultss->test3+$resultss->exam_score3 >= 0 && $resultss->test3+$resultss->exam_score3 <= 10) { 
echo $resultss->test3+$resultss->exam_score3 < 1 ? "--" : "Fail";
} 

?>

                                            </td>


                                            </td>
                                        </tr>

                                        <?php
                                }
                                ?>


                                        <?php
                                if($resultss->test4+$resultss->exam_score4 > 1){
                                ?>

                                        <tr>
                                            <td><?php echo htmlentities($resultss->subject4);?>
                                            </td>
                                            <td><?php echo htmlentities($resultss->test4);?>
                                            </td>
                                            <td><?php echo htmlentities($resultss->exam_score4);?>
                                            </td>

                                            <td><?php echo htmlentities($totalmarks=$resultss->test4+$resultss->exam_score4 < 1 ? "--" : $resultss->test4+$resultss->exam_score4 );?>

                                            <td>

                                                <?php 
if ($resultss->test4+$resultss->exam_score4 >= 29 && $resultss->test4+$resultss->exam_score4 <= 30) { 
echo "A1";
} 

if ($resultss->test4+$resultss->exam_score4 >= 25 && $resultss->test4+$resultss->exam_score4 <= 27) { 
echo "B1";
} 

if ($resultss->test4+$resultss->exam_score4 >= 20 && $resultss->test4+$resultss->exam_score4 <= 21) { 
echo "B2";
} 

if ($resultss->test4+$resultss->exam_score4 >= 19 && $resultss->test4+$resultss->exam_score4 <= 20) { 
echo "C3";
} 

if ($resultss->test4+$resultss->exam_score4 >= 18 && $resultss->test4+$resultss->exam_score4) { 
echo "C4";
} 

if ($resultss->test4+$resultss->exam_score4 >= 10 && $resultss->test4+$resultss->exam_score4 <= 18) { 
echo "D";
} 

if ($resultss->test4+$resultss->exam_score4 >= 0 && $resultss->test4+$resultss->exam_score4 <= 10) { 
echo $resultss->test4+$resultss->exam_score4 < 1 ? "--" : "F";
} 

?>


                                            </td>


                                            <td>

                                                <?php 
if ($resultss->test4+$resultss->exam_score4 >= 29 && $resultss->test4+$resultss->exam_score4 <= 30) { 
echo "Excellent";
} 

if ($resultss->test4+$resultss->exam_score4 >= 25 && $resultss->test4+$resultss->exam_score4 <= 27) { 
echo "Very Good";
} 

if ($resultss->test4+$resultss->exam_score4 >= 19 && $resultss->test4+$resultss->exam_score4 <= 20) { 
echo "Good";
} 

if ($resultss->test4+$resultss->exam_score4 >= 18 && $resultss->test4+$resultss->exam_score4) { 
echo "Credit";
} 

if ($resultss->test4+$resultss->exam_score4 >= 14 && $resultss->test4+$resultss->exam_score4 <= 18) { 
echo "Credit";
} 

if ($resultss->test4+$resultss->exam_score4 >= 10 && $resultss->test4+$resultss->exam_score4 <= 14) { 
echo "Pass";
} 

if ($resultss->test4+$resultss->exam_score4 >= 0 && $resultss->test4+$resultss->exam_score4 <= 10) { 
echo $resultss->test4+$resultss->exam_score4 < 1 ? "--" : "Fail";
} 

?>

                                            </td>

                                            </td>
                                        </tr>

                                        <?php
                                }
                                ?>



                                        <?php
                                if($resultss->test5+$resultss->exam_score5 > 1){
                                ?>

                                        <tr>
                                            <td><?php echo htmlentities($resultss->subject5);?>
                                            </td>
                                            <td><?php echo htmlentities($resultss->test5);?>
                                            </td>
                                            <td><?php echo htmlentities($resultss->exam_score5);?>
                                            </td>

                                            <td><?php echo htmlentities($totalmarks=$resultss->test5+$resultss->exam_score5 < 1 ? "--" : $resultss->test5+$resultss->exam_score5 );?>

                                            <td>


                                                <?php 
                                   
                                   if ($resultss->test5+$resultss->exam_score5 >= 29 && $resultss->test5+$resultss->exam_score5 <= 30) { 
                                   echo "A1";
                                   } 
                                   
                                   if ($resultss->test5+$resultss->exam_score5 >= 25 && $resultss->test5+$resultss->exam_score5 <= 27) { 
                                   echo "B1";
                                   } 
                                   
                                   if ($resultss->test5+$resultss->exam_score5 >= 20 && $resultss->test5+$resultss->exam_score5 <= 21) { 
                                   echo "B2";
                                   } 
                                   
                                   if ($resultss->test5+$resultss->exam_score5 >= 19 && $resultss->test5+$resultss->exam_score5 <= 20) { 
                                   echo "C3";
                                   } 
                                   
                                   if ($resultss->test5+$resultss->exam_score5 >= 18 && $resultss->test5+$resultss->exam_score5 <= 19) { 
                                   echo "C4";
                                   } 
                                   
                                   if ($resultss->test5+$resultss->exam_score5 >= 10 && $resultss->test5+$resultss->exam_score5 <= 18) { 
                                   echo "D";
                                   } 
                                   
                                   if ($resultss->test5+$resultss->exam_score5 >= 0 && $resultss->test5+$resultss->exam_score5 <= 10) { 
                                   echo $resultss->test5+$resultss->exam_score5 < 1 ? "--" : "F";
                                   } 
                                   
                                   ?>

                                            </td>


                                            <td>


                                                <?php 
if ($resultss->test5+$resultss->exam_score5 >= 29 && $resultss->test5+$resultss->exam_score5 <= 30) { 
echo "Excellent";
} 

if ($resultss->test5+$resultss->exam_score5 >= 25 && $resultss->test5+$resultss->exam_score5 <= 27) { 
echo "Very Good";
} 

if ($resultss->test5+$resultss->exam_score5 >= 19 && $resultss->test5+$resultss->exam_score5 <= 20) { 
echo "Good";
} 

if ($resultss->test5+$resultss->exam_score5 >= 18 && $resultss->test5+$resultss->exam_score5 <= 19) { 
echo "Credit";
} 

if ($resultss->test5+$resultss->exam_score5 >= 14 && $resultss->test5+$resultss->exam_score5 <= 18) { 
echo "Credit";
} 

if ($resultss->test5+$resultss->exam_score5 >= 10 && $resultss->test5+$resultss->exam_score5 <= 14) { 
echo "Pass";
} 

if ($resultss->test5+$resultss->exam_score5 >= 0 && $resultss->test5+$resultss->exam_score5 <= 10) { 
echo $resultss->test5+$resultss->exam_score5 < 1 ? "--" : "Fail";
} 

?>
                                            </td>


                                            </td>
                                        </tr>

                                        <?php
                                }
                                ?>


                                        <?php
                                if($resultss->test6+$resultss->exam_score6 > 1){
                                ?>

                                        <tr>
                                            <td><?php echo htmlentities($resultss->subject6);?>
                                            </td>
                                            <td><?php echo htmlentities($resultss->test6);?>
                                            </td>
                                            <td><?php echo htmlentities($resultss->exam_score6);?>
                                            </td>

                                            <td><?php echo htmlentities($totalmarks=$resultss->test6+$resultss->exam_score6 < 1 ? "--" : $resultss->test6+$resultss->exam_score6 );?>
                                            <td>

                                                <?php 
if ($resultss->test6+$resultss->exam_score6 >= 29 && $resultss->test6+$resultss->exam_score6 <= 30) { 
echo "A1";
} 

if ($resultss->test6+$resultss->exam_score6 >= 25 && $resultss->test6+$resultss->exam_score6 <= 27) { 
echo "B1";
} 

if ($resultss->test6+$resultss->exam_score6 >= 20 && $resultss->test6+$resultss->exam_score6 <= 21) { 
echo "B2";
} 

if ($resultss->test6+$resultss->exam_score6 >= 19 && $resultss->test6+$resultss->exam_score6 <= 18) { 
echo "C3";
} 

if ($resultss->test6+$resultss->exam_score6 >= 15 && $resultss->test6+$resultss->exam_score6 <= 17) { 
echo "C4";
} 

if ($resultss->test6+$resultss->exam_score6 >= 10 && $resultss->test6+$resultss->exam_score6 <= 18) { 
echo "D";
} 

if ($resultss->test6+$resultss->exam_score6 >= 0 && $resultss->test6+$resultss->exam_score6 <= 10) { 
echo $resultss->test6+$resultss->exam_score6 < 1 ? "--" : "F";
} 

?>

                                            </td>


                                            <td>

                                                <?php 
if ($resultss->test6+$resultss->exam_score6 >= 29 && $resultss->test6+$resultss->exam_score6 <= 30) { 
echo "Excellent";
} 

if ($resultss->test6+$resultss->exam_score6 >= 25 && $resultss->test6+$resultss->exam_score6 <= 27) { 
echo "Very Good";
} 

if ($resultss->test6+$resultss->exam_score6 >= 19 && $resultss->test6+$resultss->exam_score6 <= 20) { 
echo "Good";
} 

if ($resultss->test6+$resultss->exam_score6 >= 18 && $resultss->test6+$resultss->exam_score6 <= 19) { 
echo "Credit";
} 

if ($resultss->test6+$resultss->exam_score6 >= 14 && $resultss->test6+$resultss->exam_score6 <= 18) { 
echo "Credit";
} 

if ($resultss->test6+$resultss->exam_score6 >= 10 && $resultss->test6+$resultss->exam_score6 <= 14) { 
echo "Pass";
} 

if ($resultss->test6+$resultss->exam_score6 >= 0 && $resultss->test6+$resultss->exam_score6 <= 10) { 
echo $resultss->test6+$resultss->exam_score6 < 1 ? "--" : "Fail";
} 

?>

                                            </td>


                                            </td>
                                        </tr>

                                        <?php
                                }
                                ?>


                                        <?php
                                if($resultss->test7+$resultss->exam_score7 > 1){
                                ?>

                                        <tr>
                                            <td><?php echo htmlentities($resultss->subject7);?>
                                            </td>
                                            <td><?php echo htmlentities($resultss->test7);?>
                                            </td>
                                            <td><?php echo htmlentities($resultss->exam_score7);?>
                                            </td>

                                            <td><?php echo htmlentities($totalmarks=$resultss->test7+$resultss->exam_score7 < 1 ? "--" : $resultss->test7+$resultss->exam_score7 );?>

                                            <td>

                                                <?php 
if ($resultss->test7+$resultss->exam_score7 >= 29 && $resultss->test7+$resultss->exam_score7 <= 30) { 
echo "A1";
} 

if ($resultss->test7+$resultss->exam_score7 >= 25 && $resultss->test7+$resultss->exam_score7 <= 27) { 
echo "B1";
} 

if ($resultss->test7+$resultss->exam_score7 >= 20 && $resultss->test7+$resultss->exam_score7 <= 21) { 
echo "B2";
} 

if ($resultss->test7+$resultss->exam_score7 >= 19 && $resultss->test7+$resultss->exam_score7 <= 20) { 
echo "C3";
} 

if ($resultss->test7+$resultss->exam_score7  >= 15 && $resultss->test7+$resultss->exam_score7  <= 17) { 
echo "C4";
} 

if ($resultss->test7+$resultss->exam_score7  >= 10 && $resultss->test7+$resultss->exam_score7 <= 18) { 
echo "D";
} 

if ($resultss->test7+$resultss->exam_score7 >= 0 && $resultss->test7+$resultss->exam_score7 <= 10) { 
echo $resultss->test7+$resultss->exam_score7 < 1 ? "--" : "F";
} 

?>



                                            </td>


                                            <td>


                                                <?php 
if ($resultss->test7+$resultss->exam_score7 >= 29 && $resultss->test7+$resultss->exam_score7 <= 30) { 
echo "Excellent";
} 

if ($resultss->test7+$resultss->exam_score7 >= 25 && $resultss->test7+$resultss->exam_score7 <= 27) { 
echo "Very Good";
} 

if ($resultss->test7+$resultss->exam_score7 >= 19 && $resultss->test7+$resultss->exam_score7 <= 20) { 
echo "Good";
} 

if ($resultss->test7+$resultss->exam_score7 >= 18 && $resultss->test7+$resultss->exam_score7) { 
echo "Credit";
} 

if ($resultss->test7+$resultss->exam_score7 >= 14 && $resultss->test7+$resultss->exam_score7 <= 18) { 
echo "Credit";
} 

if ($resultss->test7+$resultss->exam_score7 >= 10 && $resultss->test7+$resultss->exam_score7 <= 14) { 
echo "Pass";
} 

if ($resultss->test7+$resultss->exam_score7 >= 0 && $resultss->test7+$resultss->exam_score7 <= 10) { 
echo $resultss->test7+$resultss->exam_score7 < 1 ? "--" : "Fail";
} 

?>

                                            </td>


                                            </td>
                                        </tr>

                                        <?php
                                }
                                ?>




                                        <?php
                                if($resultss->test8+$resultss->exam_score8 > 1){
                                ?>

                                        <tr>
                                            <td><?php echo htmlentities($resultss->subject8);?>
                                            </td>
                                            <td><?php echo htmlentities($resultss->test8);?>
                                            </td>
                                            <td><?php echo htmlentities($resultss->exam_score8);?>
                                            </td>

                                            <td><?php echo htmlentities($totalmarks=$resultss->test8+$resultss->exam_score8 < 1 ? "--" : $resultss->test8+$resultss->exam_score8 );?>
                                            <td>

                                                <?php 
if ($resultss->test7+$resultss->exam_score7 >= 29 && $resultss->test7+$resultss->exam_score7 <= 30) { 
echo "A1";
} 

if ($resultss->test8+$resultss->exam_score8 >= 25 && $resultss->test8+$resultss->exam_score8 <= 27) { 
echo "B1";
} 

if ($resultss->test8+$resultss->exam_score8 >= 20 && $resultss->test8+$resultss->exam_score8 <= 21) { 
echo "B2";
} 

if ($resultss->test8+$resultss->exam_score8 >= 19 &&$resultss->test8+$resultss->exam_score8 <= 20) { 
echo "C3";
} 

if ($resultss->test8+$resultss->exam_score8  >= 15 && $resultss->test8+$resultss->exam_score8  <= 17) { 
echo "C4";
} 

if ($resultss->test8+$resultss->exam_score8  >= 10 && $resultss->test8+$resultss->exam_score8 <= 18) { 
echo "D";
}

if ($resultss->test8+$resultss->exam_score8 >= 0 && $resultss->test8+$resultss->exam_score8 <= 10) { 
echo $resultss->test8+$resultss->exam_score8 < 1 ? "--" : "F";
} 

?>
                                            </td>


                                            <td>


                                                <?php 
if ($resultss->test8+$resultss->exam_score8 >= 29 && $resultss->test8+$resultss->exam_score8 <= 30) { 
echo "Excellent";
} 

if ($resultss->test8+$resultss->exam_score8 >= 25 && $resultss->test8+$resultss->exam_score8 <= 27) { 
echo "Very Good";
} 

if ($resultss->test8+$resultss->exam_score8 >= 19 && $resultss->test8+$resultss->exam_score8 <= 20) { 
echo "Good";
} 

if ($resultss->test8+$resultss->exam_score8 >= 18 && $resultss->test8+$resultss->exam_score8) { 
echo "Credit";
} 

if ($resultss->test8+$resultss->exam_score8 >= 14 && $resultss->test8+$resultss->exam_score8 <= 18) { 
echo "Credit";
} 

if ($resultss->test8+$resultss->exam_score8 >= 10 && $resultss->test8+$resultss->exam_score8 <= 14) { 
echo "Pass";
} 

if ($resultss->test8+$resultss->exam_score8 >= 0 && $resultss->test8+$resultss->exam_score8 <= 10) { 
echo $resultss->test8+$resultss->exam_score8 < 1 ? "--" : "Fail";
} 

?>

                                            </td>


                                            </td>
                                        </tr>

                                        <?php
                                }
                                ?>


                                        <?php
                                if($resultss->test9+$resultss->exam_score9 > 1){
                                ?>

                                        <tr>
                                            <td><?php echo htmlentities($resultss->subject9);?>
                                            </td>
                                            <td><?php echo htmlentities($resultss->test9);?>
                                            </td>
                                            <td><?php echo htmlentities($resultss->exam_score9);?>
                                            </td>

                                            <td><?php echo htmlentities($totalmarks=$resultss->test9+$resultss->exam_score9 < 1 ? "--" : $resultss->test9+$resultss->exam_score9 );?>
                                            <td>

                                                <?php 
if ($resultss->test9+$resultss->exam_score9 >= 29 && $resultss->test9+$resultss->exam_score9 <= 30) { 
echo "A1";
} 

if ($resultss->test9+$resultss->exam_score9 >= 25 && $resultss->test9+$resultss->exam_score9 <= 27) { 
echo "B1";
} 

if ($resultss->test9+$resultss->exam_score9 >= 20 && $resultss->test9+$resultss->exam_score9 <= 21) { 
echo "B2";
} 

if ($resultss->test9+$resultss->exam_score9 >= 19 && $resultss->test9+$resultss->exam_score9 <= 20) { 
echo "C3";
} 

if ($resultss->test9+$resultss->exam_score9 >= 15 && $resultss->test9+$resultss->exam_score9  <= 17) { 
echo "C4";
} 

if ($resultss->test9+$resultss->exam_score9  >= 10 && $resultss->test9+$resultss->exam_score9 <= 18) { 
echo "D";
}

if ($resultss->test9+$resultss->exam_score9 >= 0 && $resultss->test9+$resultss->exam_score9 <= 10) { 
echo $resultss->test9+$resultss->exam_score9 < 1 ? "--" : "F";
} 

?>


                                            </td>


                                            <td>
                                                <?php 
if ($resultss->test9+$resultss->exam_score9 >= 29 && $resultss->test9+$resultss->exam_score9 <= 30) { 
echo "Excellent";
} 

if ($resultss->test9+$resultss->exam_score9 >= 25 && $resultss->test9+$resultss->exam_score9 <= 27) { 
echo "Very Good";
} 

if ($resultss->test9+$resultss->exam_score9 >= 19 && $resultss->test9+$resultss->exam_score9 <= 20) { 
echo "Good";
} 

if ($resultss->test9+$resultss->exam_score9 >= 18 && $resultss->test9+$resultss->exam_score9 <= 19) { 
echo "Credit";
} 

if ($resultss->test9+$resultss->exam_score9 >= 14 && $resultss->test9+$resultss->exam_score9 <= 18) { 
echo "Credit";
} 

if ($resultss->test9+$resultss->exam_score9 >= 10 && $resultss->test9+$resultss->exam_score9 <= 14) { 
echo "Pass";
} 

if ($resultss->test9+$resultss->exam_score9 >= 0 && $resultss->test9+$resultss->exam_score9 <= 10) { 
echo $resultss->test9+$resultss->exam_score9 < 1 ? "--" : "Fail";
} 

?>

                                            </td>


                                            </td>
                                        </tr>

                                        <?php


                                        $cnt++;

                                        // caclation on totalscore
                                        $totalscore = $totalmarks=$resultss->test1+$resultss->exam_score1 + 
                                        $totalmarks=$resultss->test2+$resultss->exam_score2 + 
                                        $totalmarks=$resultss->test3+$resultss->exam_score3 +
                                        $totalmarks=$resultss->test4+$resultss->exam_score4 +
                                        $totalmarks=$resultss->test5+$resultss->exam_score5 +
                                        $totalmarks=$resultss->test6+$resultss->exam_score6 +
                                        $totalmarks=$resultss->test7+$resultss->exam_score7 +
                                        $totalmarks=$resultss->test8+$resultss->exam_score8 +
                                        $totalmarks=$resultss->test9+$resultss->exam_score9;

                                }
                                ?>


                                        <tr>
                                            <th scope="row" colspan="1" class="tst">Num Of page</th>
                                            <th scope="row" colspan="2" class="tst">Total Marks</th>
                                            <th scope="row" colspan="1" class="tst">Percentage</th>
                                            <th scope="row" colspan="1" class="tst">Grade</th>
                                            <th scope="row" colspan="1" class="tst">Teacher's Comment
                                            </th>
                                        </tr>


                                        <tr>
                                            <th scope="row" colspan="1">
                                                <?php $nud = $cnt-1; echo $nud; ?>
                                            </th>
                                            <th scope="row" colspan="2">
                                                <b><?php echo htmlentities($totalscore); ?></b>
                                            </th>
                                            <td><b><?php 
                                                $nuc = 3;
                                                $num =  $totalscore/ $nuc;
                                                $totalnum =  round($num);
                                                echo htmlentities($totalnum);
                                            ?> %</b></td>
                                            <td>
                                                <?php 
                                    if ($totalnum >= 75 && $totalnum <= 100) { 
                                     echo "A1";
                                    } 

                                    if ($totalnum >= 70 && $totalnum <= 74) { 
                                     echo "B2";
                                    } 

                                    if ($totalnum >= 65 && $totalnum <= 69) { 
                                     echo "B3";
                                    } 

                                    if ($totalnum >= 60 && $totalnum <= 64) { 
                                     echo "C4";
                                    } 

                                    if ($totalnum >= 55 && $totalnum <= 59) { 
                                     echo "C5";
                                    } 

                                    if ($totalnum >= 50 && $totalnum <= 54) { 
                                     echo "C6";
                                    } 

                                    if ($totalnum >= 45 && $totalnum <= 49) { 
                                     echo "D7";
                                    } 

                                     if ($totalnum >= 40 && $totalnum <= 44) { 
                                     echo "D8";
                                    } 

                                    if ($totalnum >= 0 && $totalnum <= 39) { 
                                     echo "F9";
                                    } 

                                    ?>
                                            </td>
                                            <td>
                                                <?php 
                                    if ($totalnum >= 75 && $totalnum <= 100) { 
                                     echo "Excellent";
                                    } 

                                    if ($totalnum >= 70 && $totalnum <= 74) { 
                                     echo "Very Good";
                                    } 

                                    if ($totalnum >= 65 && $totalnum <= 69) { 
                                     echo "Good";
                                    } 

                                    if ($totalnum >= 60 && $totalnum <= 64) { 
                                     echo "Credit";
                                    } 

                                    if ($totalnum >= 55 && $totalnum <= 59) { 
                                     echo "Credit";
                                    } 

                                    if ($totalnum >= 50 && $totalnum <= 54) { 
                                     echo "Credit";
                                    } 

                                    if ($totalnum >= 45 && $totalnum <= 49) { 
                                     echo "Pass";
                                    } 

                                     if ($totalnum >= 40 && $totalnum <= 44) { 
                                     echo "Pass";
                                    } 

                                    if ($totalnum >= 0 && $totalnum <= 39) { 
                                     echo "Fail";
                                    } 

                                    ?></td>
                                        </tr>

                                        <tr>
                                            <th scope="row" colspan="3">Print Result</th>
                                            <td></td>
                                            <th scope="row" colspan="3" onclick="window.print();"
                                                style="cursor: pointer;background: lightgrey;"><i
                                                    class="fa fa-print"></i> Print Result</th>
                                        </tr>


                            </div>
                            <?php 


// ok
                                 } 
                      
                              ?>
                        </div>



                        </tbody>

                        <?php

             
} 


}else {
    echo 'Nothing found';
    }
?>

                        </table>

                    </div>


                </div>
            </div>

            <!-- /.col-md-6 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <a href="manage_result.php">Back to Result</a>
                </div>
            </div>



            <!-- /.section -->

        </div>
        <!-- /.main-page -->

    </div>

</div>


</div>
</div>
</div>
</div>




<!-- /.content-container -->
</div>
<!-- /.content-wrapper -->

</div>
<!-- /.main-wrapper -->
<?php include 'inc/footer.php' ?>


<script>
$(function($) {
    var name = $("#studentnameid").text();
    var data = name.replace(/\s{2,}/g, ' ');
    var className = $("#classname").text();
    var classsub = className.replace(/\s{2,}/g, ' ');
    document.title = data + " :: " + classsub;
});
</script>