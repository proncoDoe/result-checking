<?php include 'inc/header2.php' ?>

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

    <div id="layoutSidenav_content">


        <main>
            <div class="container">

                <div class=" jumbotron my-3">

                    <form action="student_result.php" method="POST">

                        <input type="hidden" name="id">

                        <div class="form-group">

                            <label for="term" class="text-capitalize">Select your current term</label>

                            <select name="term" id="term" class="selectpicker form-control show-tick"
                                data-header="Select term" data-style="btn-info">

                                <option value="">Select term</option>

                                <?php $sql = "SELECT `term` from `add_result`";
                            $query = $conn->prepare($sql);
                            $query->execute();
                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                            if($query->rowCount() > 0)
                            {
                            foreach($results as $result)
                            {   ?>
                                <option value="<?php echo htmlentities($result->terms); ?>">
                                    <?php echo htmlentities($result->term); ?>
                                </option>
                                <?php }} ?>

                            </select>

                        </div>


                        <?php
                            $sql = "SELECT  student.name,student.student_image,student.exam_pin,
                            student.created_at,student.name,add_class.class_name,academic_year.session,
                            add_result.id, add_result.student_name, add_result.session,add_result.term,add_result.status,
                            add_result.revision,add_result.admin_status,add_result.created_at,
                            add_result.updated_at FROM add_result join student on student.name=add_result.student_name  
                            join add_class on add_class.class_name=add_result.class_name  join academic_year
                             on academic_year.session =add_result.session
                              GROUP BY student.name ORDER BY add_result.id DESC";

$query = $conn->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{

foreach($results as $result)
{    ?>


                        <tr class="text-white font-weight-bold">
                            <td col="col-none">
                                <a href="student_result.php?res_id=<?php echo htmlentities($result->id);?>"
                                    class="btn btn-outline-info btn-lg">Check</a>

                            </td>

                        </tr>


                        <?php  }  }  ?>



                        <!-- <button type="submit" value="Submit" class="btn btn-outline-info btn-lg">
                            Result</button> -->

                    </form>


                </div>

            </div>

            <!-- ======= Breadcrumbs ======= -->




    </div>
    </div>

    </div>
    </main>


    <?php include 'inc/footer.php' ?>


    <script>
    $(function() {

        $('.delete').on('click', function(e) {

            e.preventDefault();
            const href = $(this).attr('href');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete!'
            }).then((result) => {
                if (result.value) {

                    document.location.href = href;
                    Swal.fire(
                        'Deleted!',
                        'Your booking has been Cancel.',
                        'success'
                    )
                }
            })

        });


    });
    </script>