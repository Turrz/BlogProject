<!-- Login Page -->

<?php

    require "config/database.php";

    if (count($_COOKIE) > 0) {
        header("Location:index.php");
    }
    if (isset($_POST['btnLogin'])){
        $email = $_POST['txtEmail'];
        $pass = $_POST['txtPassword'];

        $sql = "SELECT * FROM users WHERE email = '$email'";

        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)){
            $passHash = $row["password_text"];

            if(password_verify($pass, $passHash)){
                setcookie('email', $email, time() + (86400 * 30), "/"); // 86400 = 1 day
                setcookie('is_logged_in', true, time() + (86400 * 30), "/"); // 86400 = 1 day

                header("Location:index.php");
            }
            else{
                echo "Incorrect Password";
            }
        }
    }
?>

<?php include "includes/header.php"; ?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">*</span>
        <input type="email" class="form-control" placeholder="Email" aria-label="email" aria-describedby="basic-addon1" name="txtEmail" required>
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">*</span>
        <input type="password" class="form-control" placeholder="Password" aria-label="password" aria-describedby="basic-addon1" name="txtPassword" required>
    </div>
    <div>
        <input type="submit" class="btn btn-primary" value="Login" name="btnLogin"/>
    </div>
</form>


<?php include "includes/footer.php"; ?>
