<?php
	include('../../conn.php');

	$role=$_GET['role'];
    switch ($role) {
        //---------------------- case master produk ---------------------------------------------------
        case'TAMBAH_PRODUK':

            $tanggal=date("Y-m-d");
            $year=date("Y");
            $nama=$_POST['txt_nama'];
            $kategori=$_POST['txt_kategori'];
            $satuan=$_POST['txt_satuan'];
            $deskripsi=$_POST['txt_deskripsi'];
            $status='ACTIVE';
            $user_id=$_SESSION['user_id'];

            //------------- mencari nomor terkhir untuk penambahan produk
            $sql="select count(*) as TOTAL from produk where substring(id_produk,3,4)='".$year."'";
            $r=mysqli_query($conn,$sql);
            $rs=mysqli_fetch_array($r);
            if ($rs["TOTAL"]!=0)
            {
                $sql1 = "select substring(id_produk,7,5) as LAST_NO from produk WHERE substring(id_produk,3,4)='".$year."' order by substring(id_produk,7,5) desc";
                $result= mysqli_query($conn,$sql1);
                $rs = mysqli_fetch_array($result);
                $run_no = str_pad(strval(intval($rs["LAST_NO"]) + 1), 5, "0", STR_PAD_LEFT);
            }else{
                $run_no = str_pad(strval(intval(1)), 5, "0", STR_PAD_LEFT);
            }
            $doc_no="P-".$year.$run_no;

            //------------- menambahkan produk ke dalam database
             $sql="INSERT INTO produk (id_produk,nama_produk,kategori,satuan_produk,status_produk,deskripsi_produk,created,id_user) values('".$doc_no."','".$nama."','".$kategori."','".$satuan."','".$status."','".$deskripsi."','".$tanggal."','".$user_id."')";
            $r=mysqli_query($conn,$sql);
            header  ("location:../produk.php");

        break;
        case"DELETE_PRODUK":
         //------------- menghapus produk dari dalam database
            $id=$_POST['idx'];
           $sql="DELETE FROM produk where rec_id='".$id."'";
          $r=mysqli_query($conn,$sql);
        break;
        case"EDIT_PRODUK":
             //------------- mengambil data produk dari dalam database untuk di munculkan di form edit dengan javascript
            $id=$_POST['id'];
            $sql="SELECT * FROM produk where rec_id='".$id."'";
            $r= mysqli_query($conn,$sql);
            $rs = mysqli_fetch_array($r);
            ?>
                <div class="mb-3">
                  <label class="form-label">Kode Produk</label>
                  <input type="text" name="txt_kode" class="form-control" placeholder="Kode Produk" value="<?php echo $rs['id_produk']?>" readonly>
                </div>
                 <div class="mb-3">
                  <label class="form-label">Nama Produk</label>
                  <input type="text" name="txt_nama" class="form-control" placeholder="Nama Produk" value="<?php echo $rs['nama_produk']?>">
                </div>
                 <div class="mb-3">
                  <label class="form-label">Kategori Produk</label>
                  <input type="text" name="txt_kategori" class="form-control" placeholder="Kategori Produk" value="<?php echo $rs['kategori']?>" >
                </div>
                 <div class="mb-3">
                  <label class="form-label">Satuan Produk</label>
                  <input type="text" name="txt_satuan" class="form-control" placeholder="Stuan Produk" value="<?php echo $rs['satuan_produk']?>">
                </div>
                 <div class="mb-3">
                  <label class="form-label">Deskripsi</label>
                  <textarea  name="txt_deskripsi"><?php echo $rs['deskripsi_produk']?></textarea>
                </div>
            <?php
        break;
        case"PROSES_EDIT_PRODUK":
            $kode_produk=$_POST['txt_kode'];
            $nama_produk=$_POST['txt_nama'];
            $kategori=$_POST['txt_kategori'];
            $satuan=$_POST['txt_satuan'];
            $deskripsi=$_POST['txt_deskripsi'];

            $sql="
                UPDATE produk SET
                nama_produk='".$nama_produk."',
                kategori='".$kategori."',
                satuan_produk='".$satuan."',
                deskripsi_produk='".$deskripsi."'
                
                where id_produk='".$kode_produk."'
            ";
            $r=mysqli_query($conn,$sql);
            header  ("location:../produk.php");
        break;
        //----------------------------------------------------- MENU
        case"TAMBAH_MENU":
            $menu=$_POST['txt_menu'];
            $harga=$_POST['txt_harga'];
            $deskripsi=$_POST['txt_deskripsi'];

            $tanggal=date("Y-m-d");
            $year=date("Y");
             $user_id=$_SESSION['user_id'];
            
            //------------- mencari nomor terkhir untuk penambahan makanan
             $sql="select count(*) as TOTAL from menu where substring(kode_menu,2,4)='".$year."'";
            $r=mysqli_query($conn,$sql);
            $rs=mysqli_fetch_array($r);
            if ($rs["TOTAL"]!=0)
            {
                $sql1 = "select substring(kode_menu,6,5) as LAST_NO from menu WHERE substring(kode_menu,2,4)='".$year."' order by substring(kode_menu,6,5) desc";
                $result= mysqli_query($conn,$sql1);
                $rs = mysqli_fetch_array($result);
                $run_no = str_pad(strval(intval($rs["LAST_NO"]) + 1), 5, "0", STR_PAD_LEFT);
            }else{
                $run_no = str_pad(strval(intval(1)), 5, "0", STR_PAD_LEFT);
            }
             $doc_no="M ".$year.$run_no;


            
            $ext = end(explode('.', $_FILES["txt_image"]["name"])); // upload file ext
            
            $name = md5(rand()) . '.' . $ext; // rename nama file gambar
            $path = "../../boostrap/img/menu/". $name; // image upload path
            $file_name="boostrap/img/menu/". $name;

            $upload=move_uploaded_file($_FILES["txt_image"]["tmp_name"], $path);
            if($upload){
                  $sql="INSERT INTO menu (kode_menu,nama_menu,harga,status_menu,created,user_id,deskripsi,gambar_menu)VALUES('".$doc_no."','".$menu."','".$harga."','ACTIVE',NOW(),'".$user_id."','".$deskripsi."','".$file_name."')";
                $r=mysqli_query($conn,$sql);    
                header('location:../menu.php');
            }
        break;
         case"EDIT_MENU":
            $id=$_POST['id'];
            $sql="SELECT * FROM menu where rec_id='".$id."'";
            $r= mysqli_query($conn,$sql);
            $rs = mysqli_fetch_array($r);
            ?>
           
                <input type="hidden" name="txt_kode" value="<?php echo $rs['kode_menu']?>">
                <div class="mb-3">
                  <label class="form-label">Nama Menu</label>
                  <input type="text" name="txt_menu" class="form-control" placeholder="Menu" value="<?php echo $rs['nama_menu']?>">
                </div>
                <div class="mb-3">
                  <label class="form-label">Harga</label>
                  <input type="number" name="txt_harga" class="form-control" placeholder="Harga" value="<?php echo $rs['harga']?>">
                </div>

                <div class="mb-3">
                  <label class="form-label">Isi Makanan</label>
                  <textarea class="form-control" name='txt_deskripsi'><?php echo $rs['deskripsi']?></textarea>
                </div>

                <div class="mb-3">
                  <label>&nbsp;</label>
                    <img src="../<?php echo $rs['gambar_menu']?>" class="img-fluid">
                
                </div>
                <div class="mb-3">
                  <label>Gambar</label>
                  <input type="hidden" name="txt_gambar_old" value="<?php echo $rs['gambar_menu']?>">
                  <input type="file"  class="form-control"  name="txt_image">
                  
                </div>
            <?php
        break;
        
       
        case"DELETE_MENU":
            $id=$_POST['idx'];
            $sql_image="SELECT gambar_menu FROM menu where rec_id='".$id."'";
            $r_image=mysqli_query($conn,$sql_image);
            while($rs_image=mysqli_fetch_array($r_image)){
                $path= "../../".$rs_image['gambar_menu'];
                //echo $path;
                if(unlink($path)){
                   echo  $sql="DELETE FROM menu WHERE rec_id='".$id."'";
                    mysqli_query($conn,$sql);
                }
            }
        break;
        case"PROSES_EDIT_MENU":
             $kode=$_POST['txt_kode'];
             $menu=$_POST['txt_menu'];
            $harga=$_POST['txt_harga'];
            $deskripsi=$_POST['txt_deskripsi'];

            $tanggal=date("Y-m-d",strtotime($tgl));
            $year=date("Y",strtotime($tgl));

            if(!empty($_FILES["txt_image"]["name"]) || $_FILES["txt_image"]["name"]<>""){
                 $path= "../../".$_POST['txt_gambar_old'];

                if(unlink($path)){
                   $ext = end(explode('.', $_FILES["txt_image"]["name"])); // upload file ext
            
                    $name = md5(rand()) . '.' . $ext; // rename nama file gambar
                    $path = "../../boostrap/img/menu/". $name; // image upload path
                    $file_name="boostrap/img/menu/". $name;

                    $upload=move_uploaded_file($_FILES["txt_image"]["tmp_name"], $path);
                    if($upload){
                      
                        $sql="UPDATE menu SET 
                            nama_menu='".$menu."',
                            harga='".$harga."',
                            deskripsi='".$deskripsi."',
                            gambar_menu='".$file_name."'

                            where kode_menu='".$kode."'
                        ";
                        $r=mysqli_query($conn,$sql);    


                        header('location:../menu.php');
                    }

                    //}
                }
            }else{

                 $sql="UPDATE menu SET 
                    nama_menu='".$menu."',
                    harga='".$harga."',
                    deskripsi='".$deskripsi."'

                    where kode_menu='".$kode."'
                ";
                $r=mysqli_query($conn,$sql);  
                header('location:../menu.php');
            }
        break;
        case"TAMBAH_STOCK":
            //------------- mencari nomor terkhir untuk penambahan produk

            $tanggal=date("Y-m-d",strtotime($_POST['txt_date']));
            $year=date("Y",strtotime($_POST['txt_date']));
            $notes=$_POST['txt_notes'];

            $sql="select count(*) as TOTAL from g_stock_adjust where substring(TRANS_NO,3,4)='".$year."'";
            $r=mysqli_query($conn,$sql);
            $rs=mysqli_fetch_array($r);
            if ($rs["TOTAL"]!=0)
            {
                $sql1 = "select substring(TRANS_NO,7,5) as LAST_NO from g_stock_adjust WHERE substring(TRANS_NO,3,4)='".$year."' order by substring(TRANS_NO,7,5) desc";
                $result= mysqli_query($conn,$sql1);
                $rs = mysqli_fetch_array($result);
                $run_no = str_pad(strval(intval($rs["LAST_NO"]) + 1), 5, "0", STR_PAD_LEFT);
            }else{
                $run_no = str_pad(strval(intval(1)), 5, "0", STR_PAD_LEFT);
            }
            $doc_no="S-".$year.$run_no;

            $sql="INSERT INTO g_stock_adjust (TRANS_NO,TRANS_DATE,USER_ID,NOTES,STATUS,CREATED,UPDATED) VALUES('".$doc_no."','".$tanggal."','".$_SESSION['user_id']."','".$notes."','NEW',NOW(),NOW())";
            $r=mysqli_query($conn,$sql);
            $i=0;
            foreach($_POST['slc_produk'] as $prod){
               // echo $prod;
               // echo $_POST['txt_quantity'][$i];
                $sql="INSERT INTO g_stock_adjust_detail (TRANS_NO,PRODUCT_ID,QTY) VALUES('".$doc_no."','".$prod."',".$_POST['txt_quantity'][$i].")";
                mysqli_query($conn,$sql);
                $i++;
            }

            header('location:../stock.php');
        break;
        case"VIEW_DETIAL":
           // echo $_POST['id'];
            $sql="SELECT a.TRANS_NO,a.PRODUCT_ID,a.QTY,b.nama_produk FROM g_stock_adjust_detail   as a
                left outer join produk as b on a.PRODUCT_ID=b.id_produk

            where a.TRANS_NO='".$_POST['id']."'";
            $r=mysqli_query($conn,$sql);
            ?>
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Trans No</th>
                            <th>Produk id</th>
                            <th>Nama Produk</th>
                            <th>QTY (KG)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i=1;
                        while($rs=mysqli_fetch_array($r)){
                            ?>
                            <tr>
                                <td><?php echo $i?></td>
                                <td><?php echo $rs['TRANS_NO']?></td>
                                <td><?php echo $rs['PRODUCT_ID']?></td>
                                <td><?php echo $rs['nama_produk']?></td>
                                <td><?php echo $rs['QTY']?></td>
                            </tr>
                            <?php
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            <?php
            
        break;
        case"DELETE_STOCK":
            $id=$_POST['idx'];
           $sql="DELETE FROM g_stock_adjust where TRANS_NO='".$id."'";
          $r=mysqli_query($conn,$sql);
          $sql="DELETE FROM g_stock_adjust_detail where TRANS_NO='".$id."'";
          $r=mysqli_query($conn,$sql);
        break;
        case"TAMBAH_USER":

           
            $username=$_POST['txt_username'];
            $password=md5($_POST['txt_password']);
            $group=$_POST['slc_group'];
             $initial_group=substr($group, 0,1);
             $date=substr(date('Y'),2,2);
             $month=date('m');

            //------------- mencari nomor terkhir untuk penambahan produk
             $sql="select count(*) as TOTAL from user where substring(id_user,1,1)='".$initial_group."'";
            $r=mysqli_query($conn,$sql);
            $rs=mysqli_fetch_array($r);
            if ($rs["TOTAL"]!=0)
            {
                $sql1 = "select substring(id_user,7,4)  as LAST_NO from produk WHERE substring(id_user,1,1)='".$initial_group."' and substring(id_user,3,2)='".$date."' and substring(id_user,5,2)='".$month."' order by substring(id_user,7,4)  desc";
                $result= mysqli_query($conn,$sql1);
                $rs = mysqli_fetch_array($result);
                $run_no = str_pad(strval(intval($rs["LAST_NO"]) + 1), 4, "0", STR_PAD_LEFT);
            }else{
                $run_no = str_pad(strval(intval(1)), 4, "0", STR_PAD_LEFT);
            }
            $doc_no=$initial_group."-".$date.$month.$run_no;

           $sql="INSERT INTO user (id_user,username,password,user_group,active)values('".$doc_no."','".$username."','".$password."','".$group."',0)";
            // //------------- menambahkan produk ke dalam database
            //  $sql="INSERT INTO produk (id_produk,nama_produk,kategori,satuan_produk,status_produk,deskripsi_produk,created,id_user) values('".$doc_no."','".$nama."','".$kategori."','".$satuan."','".$status."','".$deskripsi."','".$tanggal."','".$user_id."')";
            $r=mysqli_query($conn,$sql);
            header  ("location:../user.php");
        break;
        case"DELETE_USER":
             $id=$_POST['idx'];
           $sql="DELETE FROM user where rec_id='".$id."'";
          $r=mysqli_query($conn,$sql);
         
        break;
        case"VIEW_TRANS":
        $id=$_POST['id'];
           ?>
            <table class="table" id="scheduleTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Transaksi</th>
                        <th>Kode Menu</th>
                        <th>Name Menu</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total bayar</th>
                        
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i=1;
                        $sql="select g_transaksi_detail.*,menu.nama_menu from g_transaksi_detail
                            left outer join menu on g_transaksi_detail.KODE_MENU=menu.kode_menu
                         where TRANS_NO='".$id."'";
                        $r=mysqli_query($conn,$sql);
                        while($rs=mysqli_fetch_array($r)){
                            ?>
                            <tr>
                                <td><?php echo $i?></td>
                                <td><?php echo $rs['TRANS_NO']?></td>  
                                <td><?php echo $rs['KODE_MENU']?></td>  
                                <td><?php echo $rs['nama_menu']?></td>  
                                <td><?php echo number_format($rs['HARGA'],0)?></td>  
                                <td><?php echo $rs['TOTAL']?></td>  
                                <td><?php echo number_format($rs['TOTAL_HARGA'],0)?></td>  

                            </tr>
                            <?php
                            $i++;
                        }
                    ?>
                    
                    
                </tbody>
            </table>
           <?php
        break;
        case"EDIT_USER":
            $id=$_POST['id'];
           // echo $id;
            $sql="SELECT * FROM user where rec_id='".$id."'";
            $r=mysqli_query($conn,$sql);
            $rs=mysqli_fetch_array($r);
            ?>

             <div class="mb-3">
                  <label class="form-label">userid</label>
                  <input type="text" name="txt_userid" class="form-control" placeholder="Username" value="<?php echo $rs['id_user']?>" readonly>
                </div> 
                <div class="mb-3">
                  <label class="form-label">username</label>
                  <input type="text" name="txt_username" class="form-control" placeholder="Username" value="<?php echo $rs['username']?>">
                </div>
             
                <div class="mb-3">
                  <label class="form-label">password</label> <label style="color: red;">*Jika Tidak Berubah Kosongin Saja</label>
                  <input type="password" name="txt_password" class="form-control" placeholder="Password" >
                </div>
            
                <div class="mb-3">
                  <label class="form-label">group</label>
                   <select class="form-control" name="slc_group">
                      <option value="Admin" <?php if($rs['user_group']=="Admin"){echo"selected=''";}?>>Admin</option>
                      <option value="Kasir"  <?php if($rs['user_group']=="Kasir"){echo"selected=''";}?>>Kasir</option>
                      <option value="Owner"  <?php if($rs['user_group']=="Owner"){echo"selected=''";}?>>Owner</option>
                   </select>
                </div>

            <?php
        break;
        case"PROSES_EDIT_USER":
            $userid=$_POST['txt_userid'];
            $username=$_POST['txt_username'];
            $password=md5($_POST['txt_password']);
            $group=$_POST['slc_group'];
           
            if(!empty($_POST['txt_password'])){
                $sql="UPDATE user SET 
                    username='".$username."',
                    user_group='".$group."'
                    where id_user='".$userid."'
                ";
            }else{
                 $sql="UPDATE user SET 
                    username='".$username."',
                    user_group='".$group."',
                    password='".$password."'
                    where id_user='".$userid."'
                ";
            }
             $r=mysqli_query($conn,$sql);    
            header('location:../user.php');

        break;
        case"EXPORT_TRANSAKSI":
            $year=date('Y');
            $month=date('m');
            header("Content-type: application/vnd-ms-excel");
            header("Content-Disposition: attachment; filename=Data Transaksi".$year.$month.".xls");
            ?>
            <table >
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Transaksi</th>
                        <th>Tanggal</th>
                        <th>User Id</th>
                        <th>Status</th>
                        <th>Total</th>
                        <!-- <th>Action</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i=1;
                        $sql="select * from g_transaksi where YEAR(TRANS_DATE)='".$year."' and MONTH(TRANS_DATE)='".$month."' order by TRANS_DATE DESC";
                        $r=mysqli_query($conn,$sql);
                        while($rs=mysqli_fetch_array($r)){
                            ?>
                            <tr>
                                <td><?php echo $i?></td>
                                <td><?php echo $rs['TRANS_NO']?></td>
                                <td><?php echo $rs['TRANS_DATE']?></td>
                                <td><?php echo $rs['USER_ID']?></td>
                                <td><?php echo $rs['STATUS']?></td>
                                <td><?php echo $rs['TOTAL']?></td>
                               
                            </tr>
                            <?php
                            $i++;
                        }
                    ?>
                </tbody>
            </table>
            <?php
        break;
    }


    function hitung_umur($tanggal_lahir){
    $birthDate = new DateTime($tanggal_lahir);
    $today = new DateTime("today");
    if ($birthDate > $today) { 
        exit("0 tahun 0 bulan 0 hari");
    }
    $y = $today->diff($birthDate)->y;
    $m = $today->diff($birthDate)->m;
    $d = $today->diff($birthDate)->d;
    return $y;
}
?>

       