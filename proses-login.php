<?php 
    if($_POST){
        $username=$_POST['username'];
        $password=$_POST['password'];
        if(empty($username)){
            echo "<script>alert('Username tidak boleh kosong');location.href='login.php';</script>";
        } elseif(empty($password)){
            echo "<script>alert('Password tidak boleh kosong');location.href='login.php';</script>";
        } else {
            include "connection.php";
            $qry_login=mysqli_query($conn,"select * from user where username = '".$username."' and password = '".md5($password)."'");
            if(mysqli_num_rows($qry_login)>0){
                $dt_login=mysqli_fetch_array($qry_login);
                session_start();
                $_SESSION['id_user']=$dt_login['id_user'];
                $_SESSION['first_name']=$dt_login['first_name'];
                $_SESSION['status_login']=true;
                header("location: homp.php");
            } else {
                echo "<script>alert('Username dan Password tidak benar');location.href='login.php';</script>";
            }
        }
    }
?>
