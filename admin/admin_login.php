<?php include '../admin/inc/header.php' ?>

<body class="">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Admin Login</h3>
                                </div>
                                <div class="card-body">
                                    <form action="admin_login.php" method="POST">

                                        <input type="hidden" name="admin_id">
                                        <input type="hidden" name="roll">


                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="username" id="inputEmail" type="text"
                                                placeholder="USERNAME..." />
                                            <label for="inputUsername">UserName</label>

                                            <?php echo $msg1; ?>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="password" id="inputPassword"
                                                type="password" placeholder="Password" />
                                            <label for="inputPassword">Password</label>
                                            <?php echo $msg2; ?>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" id="inputRemember" type="checkbox"
                                                value="" />
                                            <label class="form-check-label" name="remember" for="inputRemember">Remember
                                                me</label>
                                        </div>


                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <h4 class="small" href="password.html">Admin Login Area?</h4>
                                            <button type="submit" name="Login"
                                                class="btn btn-outline-success btn-labeled shadow-lg">Sign
                                                in <span class="btn-label btn-label-right"><i
                                                        class="fa fa-check"></i></span></button>
                                        </div>



                                    </form>

                                    <?php echo $msg7; ?>
                                </div>
                                <div
                                    class="card-footer text-center py-3 d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <div class="small"><a href="../index.php">Back To Home!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <?php include '../admin/inc/footer.php' ?>