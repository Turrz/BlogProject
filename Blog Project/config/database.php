<!-- Database -->

<?php
    
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_NAME", "blogprojectdb");

    $conn;

    try
    {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }
    catch (Exception $ex)
    {
        echo "Connection Failed!" .$ex;
    }
?>
