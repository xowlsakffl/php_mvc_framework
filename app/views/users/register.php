<?php require APPROOT."/views/includes/head.php";?>
<?php require APPROOT."/views/includes/navigation.php";?>
<link rel="stylesheet" href="<?=URLROOT?>/public/css/login.css">
<div class="login">
    <div class="login_box">
        <h2 class="login_title">Register</h2>
        <form action="<?=URLROOT;?>/users/register" method="POST" class="register_form">

            <div class="form_control">
                <label for="email">Email</label>
                <div class="form_input">
                    <ion-icon name="mail-outline" id="icon"></ion-icon>
                    <input type="text" name="email" placeholder="Email">
                </div>
                <span class="invalid_feedback">
                    <?php echo $data['emailError'];?>
                </span>
            </div>

            <div class="form_control">
                <label for="name">Name</label>
                <div class="form_input">
                    <ion-icon name="person-outline" id="icon"></ion-icon>
                    <input type="text" name="name" placeholder="Name">
                </div>
                <span class="invalid_feedback">
                    <?php echo $data['nameError'];?>
                </span>
            </div>

            <div class="form_control">
                <label for="password">Password</label>
                <div class="form_input">
                    <ion-icon name="lock-closed-outline" id="icon"></ion-icon>
                    <input type="password" name="password" placeholder="Password">
                </div>
                <span class="invalid_feedback">
                    <?php echo $data['passwordError'];?>
                </span>
            </div>

            <div class="form_control">
                <label for="password">Password confirm</label>
                <div class="form_input">
                    <ion-icon name="lock-closed-outline" id="icon"></ion-icon>
                    <input type="password" name="passwordConfirm" placeholder="Password confirm">
                </div>
                <span class="invalid_feedback">
                    <?php echo $data['passwordConfirmError'];?>
                </span>
            </div>

            <div class="form_control">
                <input type="submit" value="Register" class="login_btn">
            </div>
        </form>
        <div class="signup_box">
            <a class="signup" href="<?=URLROOT?>/users/login">SIGN IN</a>
        </div>
    </div>
</div>