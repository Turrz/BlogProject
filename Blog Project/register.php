<?php
    require "config/database.php";
    if(isset($_POST['btnRegister']))
    {
        $first_name = $_POST['txtFirstName']; 
        $last_name = $_POST['txtLastName'];
        $email = $_POST['txtEmail'];
        $password = password_hash($_POST['txtPassword'], CRYPT_BLOWFISH);

        $sql = "INSERT INTO users (first_name, last_name, email, password_text) VALUES ('$first_name', '$last_name', '$email', '$password')";

        $result = mysqli_query($conn, $sql);
    }
?>


<?php include "includes/header.php"; ?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">1</span>
        <input type="text" class="form-control" placeholder="First Name" aria-label="firstName" aria-describedby="basic-addon1" name="txtFirstName" required>
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">2</span>
        <input type="text" class="form-control" placeholder="Last Name" aria-label="lastName" aria-describedby="basic-addon1" name="txtLastName" required>
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">3</span>
        <input type="email" class="form-control" placeholder="Email" aria-label="email" aria-describedby="basic-addon1" name="txtEmail" required>
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">4</span>
        <input type="password" class="form-control" placeholder="Password" aria-label="password" aria-describedby="basic-addon1" name="txtPassword" required>
    </div>
    <div>
        <input type="submit" class="btn btn-primary" value="Register" name="btnRegister"/>
    </div>
</form>

<?php include "includes/footer.php"; ?>

