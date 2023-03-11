<?php 
session_start();
include('../config/dbcon.php');
include('myfunctions.php');


/*---------------------------------REGISTRATION-------------------------------- */
if(isset($_POST['register_btn']))
{
    //take data by form
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    //check if email already registered
    $check_email_query = "SELECT email FROM users WHERE email='$email' ";
    $check_email_query_run = mysqli_query($conn, $check_email_query);

    if(mysqli_num_rows($check_email_query_run) > 0)
    {
        $_SESSION['message'] = "Email already registered";
        header('Location: ../register.php');
    }
    else{
        if($password == $confirm_password)
        {
            //insert user data
            $insert_query = "INSERT INTO users(name, email, phone, password) VALUES ('$name', '$email', '$phone', '$password')";
            $insert_query_run = mysqli_query($conn, $insert_query);
    
            if($insert_query_run)
            {
                $_SESSION['message'] = "Registered Successfully";
                header('Location: ../login.php');
            }else{
                $_SESSION['message'] = "Something went wrong";
                header('Location: ../register.php');
            }
    
        }else{
            $_SESSION['message'] = "Password do not match";
            header('Location: ../register.php');
        }
    }
}
/*---------------------------------LOGIN-------------------------------- */
else if(isset($_POST['login_btn']))
{
    //take data by form
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    //check if email already registered
    $login_query = "SELECT * FROM users WHERE email='$email' AND password='$password' ";
    $login_query_run = mysqli_query($conn, $login_query);

    if(mysqli_num_rows($login_query_run) > 0)
    {
       $_SESSION['auth'] = true;

       $userdata = mysqli_fetch_array($login_query_run);
       $userid = $userdata['id'];
       $username = $userdata['name'];
       $useremail = $userdata['email'];
       $role_as = $userdata['role_as'];

       $_SESSION['auth_user'] = [
        'user_id' => $userid,
        'name' => $username,
        'email' => $useremail
       ];
       $_SESSION['role_as'] = $role_as;

       // admin = 1
       if($role_as == 1)
       {
        $_SESSION['message'] = "Welcome to Admin Dashboard";
        header('Location: ../admin/index.php');
       }else{
        $_SESSION['message'] = "Logged in Successfully";
        header('Location: ../index.php');
       }
    }
    else{
        $_SESSION['message'] = "Invalid Credentials";
        header('Location: ../login.php');
    }
}

?>