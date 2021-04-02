<?php
session_start();

include "connect.php";

if(isset($_POST['create_admin_btn']))
{
    session_start();

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $firstname = validate($_POST['admin_FirstName']);
    $lastname = validate($_POST['admin_LastName']);
    $username = validate($_POST['admin_Username']);
    $password = validate($_POST['admin_pass']);
    $password2 = validate($_POST['admin_pass2']);

    if (empty($firstname))
    {
        header("Location: ../super_admin_console.php?error=First Name is required");
        exit();
    }
    else if (strlen($firstname) < 3 || strlen($firstname) > 25 )
    {
        header("Location: ../super_admin_console.php?error=First Name must be between length of 3-25");
        exit();
    }
    else if (empty($lastname))
    {
        header("Location: ../super_admin_console.php?error=Last Name is required");
        exit();
    }
    else if (strlen($lastname) < 3 || strlen($lastname) > 25 )
    {
        header("Location: ../super_admin_console.php?error=Last Name must be between length of 3-25");
        exit();
    }
    else if (empty($username))
    {
        header("Location: ../super_admin_console.php?error=Admin Username is required");
        exit();
    }
    else if (strlen($username) < 8 || strlen($username) > 30 )
    {
        header("Location: ../super_admin_console.php?error=Admin Username must be between length of 8-30");
        exit();
    }
    else if (empty($password))
    {
        header("Location: ../super_admin_console.php?error=Password is required");
        exit();
    }
    else if (empty($password2))
    {
        header("Location: ../super_admin_console.php?error=Second Password is required");
        exit();
    }
    else if (strlen($password) < 8 || strlen($password) > 15 )
    {
        header("Location: ../super_admin_console.php?error=Password must be between length of 8-15");
        exit();
    }
    else if (strlen($password2) < 8 || strlen($password2) > 15 )
    {
        header("Location: ../super_admin_console.php?error=Password must be between length of 8-15");
        exit();
    }
    else if($password == $password2)
    {
        $sql = "INSERT INTO adminlogin(adminFirstName, adminLastName, username, passwrd) 
                VALUES('$firstname', '$lastname', '$username', '$password' )";

        $conn->query($sql);
        header("Location: ../super_admin_console.php");
        exit();
    }
    else
    {
        header("Location: ../super_admin_console.php?error=Passwords do not match");
        exit();
    }
}
?>