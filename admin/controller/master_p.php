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
                 $sql="INSERT INTO menu (kode_makanan,nama_makanan,tanggal_makanan,isi_makanan,gambar_makanan)VALUES('".$doc_no."','".$judul."','".$tanggal."','".$deskripsi."','".$file_name."')";
                $r=mysqli_query($conn,$sql);    
                header('location:../menu.php');
            }
        break;
        case"DETAIL_MAKANAN":
            $id=$_POST['id'];
            //echo$id;
            $sql="SELECT * FROM menu_makanan where rec_id='".$id."'";
            $r=mysqli_query($conn,$sql);
            $rs=mysqli_fetch_array($r);
            ?>
                <div class="mb-3">
                    <label class="form-label">Kode Makanan</label>
                    <input type="text" name="txt_judul" class="form-control" placeholder="Judul" readonly="" value="<?php echo $rs['kode_makanan']?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Makanan</label>
                    <input type="text" name="txt_judul" class="form-control" placeholder="Judul" readonly="" value="<?php echo $rs['nama_makanan']?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Makanan</label>
                    <input type="date" name="txt_tgl" class="form-control" placeholder="Tanggal" readonly="" value="<?php echo $rs['tanggal_makanan']?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Isi Makanan</label>
                    <textarea class="form-control" name='txt_deskripsi' disabled=""> <?php echo $rs['isi_makanan']?></textarea>
                </div>

                <div class="mb-3">
                <label>Gambar</label>
                    <img src="../<?php echo $rs['gambar_makanan']?>" class="img-fluid">
                </div>
            <?php
        break;
        case"EDIT_MAKANAN":
            $id=$_POST['id'];
            $sql="SELECT * FROM menu_makanan where rec_id='".$id."'";
            $r= mysqli_query($conn,$sql);
            $rs = mysqli_fetch_array($r);
            ?>
           
                <div class="mb-3">
                  <label class="form-label">Kode Makanan</label>
                  <input type="text" name="txt_kode" class="form-control" placeholder="Judul" readonly="" value="<?php echo $rs['kode_makanan']?>">
                </div>
                <div class="mb-3">
                  <label class="form-label">Nama Makanan</label>
                  <input type="text" name="txt_judul" class="form-control" placeholder="Judul"  value="<?php echo $rs['nama_makanan']?>">
                </div>

                <div class="mb-3">
                  <label class="form-label">Tanggal</label>
                  <input type="date" name="txt_tgl" class="form-control" placeholder="Tanggal" value="<?php echo $rs['tanggal_makanan']?>">
                </div>

                <div class="mb-3">
                  <label class="form-label">Isi Makanan</label>
                  <textarea class="form-control" name='txt_deskripsi'><?php echo $rs['isi_makanan']?></textarea>
                </div>

                <div class="mb-3">
                  <label>&nbsp;</label>
                    <img src="../<?php echo $rs['gambar_makanan']?>" class="img-fluid">
                
                </div>
                <div class="mb-3">
                  <label>Gambar</label>
                  <input type="hidden" name="txt_gambar_old" value="<?php echo $rs['gambar_makanan']?>">
                  <input type="file"  class="form-control"  name="txt_image">
                  
                </div>
            <?php
        break;
        case"DELETE_MAKANAN":
            $id=$_POST['idx'];
            $sql_image="SELECT gambar_makanan FROM menu_makanan where rec_id='".$id."'";
            $r_image=mysqli_query($conn,$sql_image);
            while($rs_image=mysqli_fetch_array($r_image)){
                $path= "../../".$rs_image['gambar_makanan'];
                //echo $path;
                if(unlink($path)){
                    $sql="DELETE FROM menu_makanan WHERE rec_id='".$id."'";
                    mysqli_query($conn,$sql);
                }
            }
        break;
        case"PROSES_EDIT_MAKANAN":
            $kode=$_POST['txt_kode'];
            $judul=$_POST['txt_judul'];
            $tgl=$_POST['txt_tgl'];
            $deskripsi=$_POST['txt_deskripsi'];

            $tanggal=date("Y-m-d",strtotime($tgl));
            $year=date("Y",strtotime($tgl));

            if(!empty($_FILES["txt_image"]["name"]) || $_FILES["txt_image"]["name"]<>""){
                 $path= "../../".$_POST['txt_gambar_old'];

                if(unlink($path)){
                   $ext = end(explode('.', $_FILES["txt_image"]["name"])); // upload file ext
            
                    $name = md5(rand()) . '.' . $ext; // rename nama file gambar
                    $path = "../../boostrap/img/makanan/". $name; // image upload path
                    $file_name="boostrap/img/makanan/". $name;

                    $upload=move_uploaded_file($_FILES["txt_image"]["tmp_name"], $path);
                    if($upload){
                      
                        $sql="UPDATE menu_makanan SET 
                            nama_makanan='".$judul."',
                            tanggal_makanan='".$tanggal."',
                            isi_makanan='".$deskripsi."',
                            gambar_makanan='".$file_name."'

                            where kode_makanan='".$kode."'
                        ";
                        $r=mysqli_query($conn,$sql);    


                        header('location:../makanan.php');
                    }

                    //}
                }
            }else{

                $sql="UPDATE menu_makanan SET 
                    nama_makanan='".$judul."',
                    tanggal_makanan='".$tanggal."',
                    isi_makanan='".$deskripsi."'

                    where kode_makanan='".$kode."'
                ";
                $r=mysqli_query($conn,$sql);  
                header('location:../makanan.php');
            }
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

       