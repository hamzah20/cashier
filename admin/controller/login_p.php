<?php
	include('../../conn.php');

	$role=$_GET['role'];
    switch ($role) {
        case'LOGIN_ADMIN': 
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $group    = $_POST['slc_group'];

            $sqlemail="SELECT COUNT(*) AS TOTAL_USER FROM user where (id_user='".$username."' or username='".$username."') and password='".$password."' and user_group='".$group."' ";

            $r_email    = mysqli_query($conn,$sqlemail);
            $rs_email   = mysqli_fetch_array($r_email);

            if($rs_email['TOTAL_USER'] > 0){
                $sql="SELECT * FROM user where (id_user='".$username."' or username='".$username."') and password='".$password."' and user_group='".$group."'";
                $r  = mysqli_query($conn,$sql);
                $rs = mysqli_fetch_array($r);
                    $_SESSION['member_id']  = $rs['rec_id'];
                    $_SESSION['user_id']    = $rs['id_user'];
                    $_SESSION['username']   = $rs['username'];
                    $_SESSION['nama_user']  = $rs['nama_kader'];
                    $_SESSION['no_telp']    = $rs['no_telp_kader'];
                    $_SESSION['user_group'] = $rs['user_group'];
                    $_SESSION['login']      = 1;

                // Ubah status menjadi "1" (Sedang Login)
                $sqlUpdStatus ="UPDATE `user` SET `active`='1' WHERE (id_user='".$username."' or username='".$username."')";
                $r_updStatus    = mysqli_query($conn,$sqlUpdStatus);
                $rs_updStatus   = mysqli_fetch_array($r_updStatus); 
                header('location:../index.php');
            }
            else{
                header('location:../login.php');
            }
        break;

        case'LOGOUT':
            // Ubah status menjadi "0" (Sedang Tidak Login)
            $sqlUpdStatus ="UPDATE `user` SET `active`='0' WHERE (id_user='".$_SESSION['user_id']."' or username='".$_SESSION['username']."')";
            $r_updStatus    = mysqli_query($conn,$sqlUpdStatus);
            $rs_updStatus   = mysqli_fetch_array($r_updStatus);

            $_SESSION['member_id']  = "";
            $_SESSION['user_id']    = "";
            $_SESSION['username']   = "";
            $_SESSION['nama_user']  = "";
            $_SESSION['no_telp']    = "";
            $_SESSION['group']      = "";
            $_SESSION['login']      = 0;

            header('location:../index.php');
        break;
    }
?>

       