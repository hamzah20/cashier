<?php
	include('conn.php');
	$role=$_GET['role'];
    switch ($role) {
        case'LOGIN':
             $email=$_POST['txt_email'];
             $password=sha1($_POST['txt_password']);
             $sqlemail="SELECT COUNT(*) AS TOTAL_MEMBER FROM g_member where EMAIL='".$email."' and PASSWORD='".$password."'";
            $r_email=mysqli_query($conn,$sqlemail);
            $rs_email=mysqli_fetch_array($r_email);
             if($rs_email['TOTAL_MEMBER']>0){
                $sql="SELECT * FROM g_member where EMAIL='".$email."' and PASSWORD='".$password."'";
                $r=mysqli_query($conn,$sql);
                $rs=mysqli_fetch_array($r);
                    $_SESSION['member_id']=$rs['MEMBER_ID'];
                    $_SESSION['first_name']=$rs['FIRST_NAME'];
                    $_SESSION['last_name']=$rs['LAST_NAME'];
                    $_SESSION['email']=$rs['EMAIL'];
                    $_SESSION['status']=$rs['STATUS'];
                    $_SESSION['BOD']=$rs['BRITHDATE'];
                    $_SESSION['BOP']=$rs['BRITHPLACE'];
                    $_SESSION['login']=1;
                header('location:index.php');
             }
             else{
                header('location:login.php');
             }
        break;
        case'LOGOUT':
            $_SESSION['member_id']="";
            $_SESSION['first_name']="";
            $_SESSION['last_name']="";
            $_SESSION['email']="";
            $_SESSION['status']="";
            $_SESSION['BOD']="";
            $_SESSION['login']=0;
            header('location:index.php');
        break;
    }
?>

       