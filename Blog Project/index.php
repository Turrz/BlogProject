<!-- Home Page -->

<?php include "includes/header.php"; ?>

<?php 

    require 'config/database.php';

    $page = 1;
    $start = 0;

    if(isset($_GET['page']))
    {
        $page = $_GET['page'];
        $start = ($page - 1) * 10;
    }

    $end = $page * 10;

    $sql = "SELECT * FROM blogs ORDER BY release_date DESC LIMIT 10 $start";

    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result))
    {
        var_dump($row);
        echo "<br><br>";
    }

?>

<?php include "includes/footer.php"; ?>
