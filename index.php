<?php include 'inc/header.php' ?>


<!-- section -->
<section class="register">
    <div class="register-full">
        <div class="register-right">
            <div class="register-in">
                <h1>Academy Result Checking Portal</h1>
                <p>Please login with your portal crentials to continue.</p>
                <div class="register-form">

                    <?php echo $msg6; ?>
                    <?php echo $msg7; ?>
                    <form action="index.php" method="post">

                        <input type="hidden">
                        <div class="fields-grid">

                            <div class="styled-input" name="student_id">
                                <input type="text" name="username" value="<?php echo $username ?>">
                                <label>Student username</label>
                                <span></span>
                                <?php echo $msg1; ?>
                            </div>
                            <div class="styled-input">
                                <input type="password" name="register_no" value="<?php echo $register_no ?>">
                                <label>Student REG NO</label>
                                <span></span>
                                <?php echo $msg2; ?>

                            </div>
                            <div class="styled-input">
                                <input type="text" name="phone_number">
                                <label>Parent Phone Number</label>
                                <span></span>

                                <?php echo $msg3; ?>
                            </div>

                            <p class="middlepara">How would you like to be contacted?</p>
                            <div class="styled-input">
                                <div class="agileits_w3layouts_grid">
                                    <select id="category3" name="how_would_like_to_be_contacted">
                                        <option value="by phone number">By Phone</option>
                                        <option value="by email">By Email</option>
                                    </select>
                                </div>
                                <span></span>

                                <?php echo $msg4; ?>
                            </div>

                            <div class="clear"> </div>
                            <label class="checkbox"><input type="checkbox" name="checkbox" checked><i></i>I agree to
                                the <a href="#">Terms and Conditions</a></label>
                            <?php echo $msg5; ?>
                        </div>
                        <input type="submit" name="Login" value="Submit and continue">
                    </form>
                </div>
                <div class="registerimg">
                    <img src="assets/images/img.png" alt="" />
                </div>
                <div class="clear"> </div>
            </div>
        </div>
        <div class="clear"> </div>
    </div>

    <?php include 'inc/footer.php' ?>