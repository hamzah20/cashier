<?php
	include('../../conn.php');

	$role=$_GET['role'];
    switch ($role) {
        case'GET_MENU': 
            //echo $_GET['id'];
            $sql="SELECT * FROM menu where kode_menu='".$_GET['id']."'";
            $r=mysqli_query($conn,$sql);
            while($rs=mysqli_fetch_array($r)){
                 $_SESSION['kode_menu']=$rs['kode_menu'];
                 $_SESSION['nama_menu']=$rs['nama_menu'];
                 $_SESSION['harga']=$rs['harga'];
            }
             header('location:../dashboard.php');
        break;
        case'TRANSAKSI':
             $kd_transaksi=$_POST['kd_transaksi'];
             $kd_barang=$_POST['kd_barang'];
             $harga=$_POST['harga'];
             $jumlah=$_POST['jumlah'];

             $sql_count="SELECT COUNT(*) AS TOTAL FROM g_keranjang where TRANS_NO='".$kd_transaksi."' and KODE_MENU='".$kd_barang."'";
             $r_count=mysqli_query($conn,$sql_count);
             $rs_count=mysqli_fetch_array($r_count);

             if($rs_count['TOTAL']>0){
               $sql="UPDATE g_keranjang SET TOTAL=TOTAL+".$jumlah.", TOTAL_HARGA=(TOTAL+".$jumlah.")*HARGA where TRANS_NO='".$kd_transaksi."' AND KODE_MENU='".$kd_barang."'";
             }else{
                
                 $sql="INSERT INTO g_keranjang (TRANS_NO,KODE_MENU,TOTAL,HARGA,TOTAL_HARGA) VALUES('".$kd_transaksi."','".$kd_barang."','".$jumlah."','".$harga."','".$jumlah*$harga."')";
             }
             
            $r=mysqli_query($conn,$sql);
            if($r){
                 $_SESSION['kode_menu']='';
                 $_SESSION['nama_menu']='';
                 $_SESSION['harga']='';
              header('location:../dashboard.php');  
            }
        break;
        case'DELETE_KERANJANG':
             $_POST['idx'];
            $sql="DELETE FROM g_keranjang where REC_ID='".$_POST['idx']."'";
            $r=mysqli_query($conn,$sql);
        break;
        case'INSERT_TRANSAKSI':
             $kd_transaksi=$_POST['kd_transaksi'];
             $bayar=$_POST['bayar'];
             $total_bayar=$_POST['total_bayar'];

             $sql="INSERT INTO g_transaksi (TRANS_NO,TRANS_DATE,TOTAL,CREATED,USER_ID,STATUS,TOTAL_BAYAR) 
            VALUES('".$kd_transaksi."',NOW(),'".$total_bayar."',NOW(),'".$_SESSION['user_id']."','LUNAS','".$bayar."')";
            $r=mysqli_query($conn,$sql);

            $sql_detail="SELECT * FROM g_keranjang where TRANS_NO='".$kd_transaksi."'";
            $r_detail=mysqli_query($conn,$sql_detail);
            while($rs_detail=mysqli_fetch_array($r_detail)){
                // echo $rs_detail['KODE_MENU'];
                // echo $rs_detail['TOTAL'];
                // echo $rs_detail['HARGA'];
                // echo $rs_detail['TOTAL_BAYAR'];
                 $sql_insert_detail="INSERT INTO g_transaksi_detail(TRANS_NO,KODE_MENU,HARGA,TOTAL,TOTAL_HARGA) 
                VALUES('".$kd_transaksi."','".$rs_detail['KODE_MENU']."','".$rs_detail['HARGA']."','".$rs_detail['TOTAL']."','".$rs_detail['TOTAL_HARGA']."')";
                mysqli_query($conn,$sql_insert_detail);
            }

            $sql_keranjang="DELETE FROM g_keranjang where TRANS_NO='".$kd_transaksi."'";
            mysqli_query($conn,$sql_keranjang);
            header('location:../struk.php?kd_transaksi='.$kd_transaksi);  
        break;
    }
?>

       