<?php
	include('../../conn.php');

	$role=$_GET['role'];
    switch ($role) {
        //---------------------- case master jadwal ---------------------------------------------------
        case'TAMBAH_JADWAL':
            $tanggal=date("Y-m-d",strtotime($_POST['txt_tanggal']));
            $jam=date("H:i:s",strtotime($_POST['txt_jam']));
            $year=date("Y",strtotime($_POST['txt_tanggal']));
            $tempat=$_POST['txt_tempat'];

            //------------- mencari apakah ada jadwal di jam yang sama
            $sql="select count(*) as TOTAL from jadwal where tanggal_jadwal='".$tanggal."' and waktu_jadwal='".$jam."'";
            $r=mysqli_query($conn,$sql);
            $rs=mysqli_fetch_array($r);
            if ($rs["TOTAL"]>0)
            {
                $_SESSION["message"]="Jadwal Sudah Terisi";
                header  ("location:../jadwal.php");
                exit;
            }
            
            //------------- mencari nomor terkhir untuk penambahan jadwal
            $sql="select count(*) as TOTAL from jadwal where substring(kode_jadwal,2,4)='".$year."'";
            $r=mysqli_query($conn,$sql);
            $rs=mysqli_fetch_array($r);
            if ($rs["TOTAL"]!=0)
            {
                $sql1 = "select substring(kode_jadwal,6,5) as LAST_NO from jadwal WHERE substring(kode_jadwal,2,4)='".$year."' order by substring(kode_jadwal,6,5) desc";
                $result= mysqli_query($conn,$sql1);
                $rs = mysqli_fetch_array($result);
                $run_no = str_pad(strval(intval($rs["LAST_NO"]) + 1), 5, "0", STR_PAD_LEFT);
            }else{
                $run_no = str_pad(strval(intval(1)), 5, "0", STR_PAD_LEFT);
            }
            $doc_no="A".$year.$run_no;

            //------------- menambahkan jadwal ke dalam database
            $sql="INSERT INTO jadwal (kode_jadwal,tempat_jadwal,tanggal_jadwal,waktu_jadwal) values('".$doc_no."','".$tempat."','".$tanggal."','".$jam."')";
            $r=mysqli_query($conn,$sql);
            header  ("location:../jadwal.php");

        break;
        case"DELETE_JADWAL":
            $id=$_POST['idx'];
           $sql="DELETE FROM jadwal where rec_id='".$id."'";
          $r=mysqli_query($conn,$sql);
        break;
        case"EDIT_JADWAL":
            $id=$_POST['id'];
            $sql="SELECT * FROM jadwal where rec_id='".$id."'";
            $r= mysqli_query($conn,$sql);
            $rs = mysqli_fetch_array($r);
            ?>
                <div class="mb-3">
                  <label class="form-label">Kode Jadwal</label>
                  <input type="text" name="txt_kode" class="form-control" placeholder="kode" value="<?php echo $rs['kode_jadwal'];?>" readonly>
                  <input type="hidden" name="txt_rec_id" class="form-control" placeholder="kode" value="<?php echo $id;?>" readonly>

                </div>

                <div class="mb-3">
                  <label class="form-label">Tanggal</label>
                  <input type="date" name="txt_tanggal" class="form-control" placeholder="Tanggal" value="<?php echo $rs['tanggal_jadwal'];?>">
                </div>
             
                <div class="mb-3">
                  <label class="form-label">Jam</label>
                  <input type="time" name="txt_jam" class="form-control" placeholder="Jam" value="<?php echo $rs['waktu_jadwal'];?>">
                </div>
            
                <div class="mb-3">
                  <label class="form-label">Tempat</label>
                  <input type="text" name="txt_tempat" class="form-control" placeholder="Tempat" value="<?php echo $rs['tempat_jadwal'];?>">
                </div>
            <?php
        break;
        case"PROSES_EDIT_JADWAL":
            $rec_id=$_POST['txt_rec_id'];

            $tanggal=date("Y-m-d",strtotime($_POST['txt_tanggal']));
            $jam=date("H:i:s",strtotime($_POST['txt_jam']));
            //$year=date("Y",strtotime($_POST['txt_tanggal']));
            $tempat=$_POST['txt_tempat'];

            $sql="
                UPDATE jadwal SET
                tanggal_jadwal='".$tanggal."',
                waktu_jadwal='".$jam."',
                tempat_jadwal='".$tempat."'

                where rec_id='".$rec_id."'
            ";
            $r=mysqli_query($conn,$sql);
            header  ("location:../jadwal.php");
        break;

        //--------------------------------------------------------- INFORMASI
        case"TAMBAH_INFORMASI":
            $judul=$_POST['txt_judul'];
            $tgl=$_POST['txt_tgl'];
            $deskripsi=$_POST['txt_deskripsi'];

            $tanggal=date("Y-m-d",strtotime($tgl));
            $year=date("Y",strtotime($tgl));

            
            //------------- mencari nomor terkhir untuk penambahan infromasi
             $sql="select count(*) as TOTAL from informasi_gizi where substring(kode_informasi,2,4)='".$year."'";
            $r=mysqli_query($conn,$sql);
            $rs=mysqli_fetch_array($r);
            if ($rs["TOTAL"]!=0)
            {
                $sql1 = "select substring(kode_informasi,6,5) as LAST_NO from informasi_gizi WHERE substring(kode_informasi,2,4)='".$year."' order by substring(kode_informasi,6,5) desc";
                $result= mysqli_query($conn,$sql1);
                $rs = mysqli_fetch_array($result);
                $run_no = str_pad(strval(intval($rs["LAST_NO"]) + 1), 5, "0", STR_PAD_LEFT);
            }else{
                $run_no = str_pad(strval(intval(1)), 5, "0", STR_PAD_LEFT);
            }
             $doc_no="I".$year.$run_no;


            
            $ext = end(explode('.', $_FILES["txt_image"]["name"])); // upload file ext
            
            $name = md5(rand()) . '.' . $ext; // rename nama file gambar
            $path = "../../boostrap/img/informasi/". $name; // image upload path
            $file_name="boostrap/img/informasi/". $name;

            $upload=move_uploaded_file($_FILES["txt_image"]["tmp_name"], $path);
            if($upload){
                 $sql="INSERT INTO informasi_gizi (kode_informasi,judul_informasi,tanggal_informasi,deskripsi_informasi,gambar_informasi)VALUES('".$doc_no."','".$judul."','".$tanggal."','".$deskripsi."','".$file_name."')";
                $r=mysqli_query($conn,$sql);    
                header('location:../informasi.php');
            }
        break;
        case"DETAIL_INFORMASI":
            $id=$_POST['id'];
            //echo$id;
            $sql="SELECT * FROM informasi_gizi where rec_id='".$id."'";
            $r=mysqli_query($conn,$sql);
            $rs=mysqli_fetch_array($r);
            ?>
                <div class="mb-3">
                    <label class="form-label">Kode Informasi</label>
                    <input type="text" name="txt_judul" class="form-control" placeholder="Judul" readonly="" value="<?php echo $rs['kode_informasi']?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Judul Informasi</label>
                    <input type="text" name="txt_judul" class="form-control" placeholder="Judul" readonly="" value="<?php echo $rs['judul_informasi']?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Informasi</label>
                    <input type="date" name="txt_tgl" class="form-control" placeholder="Tanggal" readonly="" value="<?php echo $rs['tanggal_informasi']?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea class="form-control" name='txt_deskripsi' disabled=""> <?php echo $rs['deskripsi_informasi']?></textarea>
                </div>

                <div class="mb-3">
                <label>Gambar</label>
                    <img src="../<?php echo $rs['gambar_informasi']?>" class="img-fluid">
                </div>
            <?php
        break;
        case"DELETE_INFORMASI":
            $id=$_POST['idx'];
            $sql_image="SELECT gambar_informasi FROM informasi_gizi where rec_id='".$id."'";
            $r_image=mysqli_query($conn,$sql_image);
            while($rs_image=mysqli_fetch_array($r_image)){
                $path= "../../".$rs_image['gambar_informasi'];
                //echo $path;
                if(unlink($path)){
                    $sql="DELETE FROM informasi_gizi WHERE rec_id='".$id."'";
                    mysqli_query($conn,$sql);
                }
            }
        break;
        case"EDIT_INFORMASI":
            $id=$_POST['id'];
            $sql="SELECT * FROM informasi_gizi where rec_id='".$id."'";
            $r=mysqli_query($conn,$sql);
            $rs=mysqli_fetch_array($r);
            ?>
            <input type="text" name="txt_kode" class="form-control" placeholder="Judul" readonly="" value="<?php echo $rs['kode_informasi']?>">
                
                <div class="mb-3">
                    <label class="form-label">Judul Informasi</label>
                    <input type="text" name="txt_judul" class="form-control" placeholder="Judul"  value="<?php echo $rs['judul_informasi']?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Informasi</label>
                    <input type="date" name="txt_tgl" class="form-control" placeholder="Tanggal"  value="<?php echo $rs['tanggal_informasi']?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea class="form-control" name='txt_deskripsi'> <?php echo $rs['deskripsi_informasi']?></textarea>
                </div>

                <div class="mb-3">
                <label>&nbsp;</label>
                    <img src="../<?php echo $rs['gambar_informasi']?>" class="img-fluid">
                </div>
                 <div class="mb-3">
                  <label>Gambar</label>
                  <input type="hidden" name="txt_gambar_old" value="<?php echo $rs['gambar_informasi']?>">
                  <input type="file"  class="form-control"  name="txt_image">
                  
                </div>
            <?php
        break;
        case"PROSES_EDIT_INFORMASI":
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
                    $path = "../../boostrap/img/informasi/". $name; // image upload path
                    $file_name="boostrap/img/informasi/". $name;

                    $upload=move_uploaded_file($_FILES["txt_image"]["tmp_name"], $path);
                    if($upload){
                        $sql="UPDATE informasi_gizi SET 
                            judul_informasi='".$judul."',
                            tanggal_informasi='".$tanggal."',
                            deskripsi_informasi='".$deskripsi."',
                            gambar_informasi='".$file_name."'

                            where kode_informasi='".$kode."'
                        ";
                        $r=mysqli_query($conn,$sql);    


                        header('location:../informasi.php');
                    }

                    //}
                }
            }else{

                $sql="UPDATE informasi_gizi SET 
                    judul_informasi='".$judul."',
                    tanggal_informasi='".$tanggal."',
                    deskripsi_informasi='".$deskripsi."'

                    where kode_informasi='".$kode."'
                ";
                $r=mysqli_query($conn,$sql);  
                header('location:../informasi.php');
            }
        break;
        //---------------------------------------------------------------- Makanan
        case"TAMBAH_MAKANAN":
            $judul=$_POST['txt_judul'];
            $tgl=$_POST['txt_tgl'];
            $deskripsi=$_POST['txt_deskripsi'];

            $tanggal=date("Y-m-d",strtotime($tgl));
            $year=date("Y",strtotime($tgl));

            
            //------------- mencari nomor terkhir untuk penambahan makanan
             $sql="select count(*) as TOTAL from menu_makanan where substring(kode_makanan,2,4)='".$year."'";
            $r=mysqli_query($conn,$sql);
            $rs=mysqli_fetch_array($r);
            if ($rs["TOTAL"]!=0)
            {
                $sql1 = "select substring(kode_makanan,6,5) as LAST_NO from menu_makanan WHERE substring(kode_makanan,2,4)='".$year."' order by substring(kode_makanan,6,5) desc";
                $result= mysqli_query($conn,$sql1);
                $rs = mysqli_fetch_array($result);
                $run_no = str_pad(strval(intval($rs["LAST_NO"]) + 1), 5, "0", STR_PAD_LEFT);
            }else{
                $run_no = str_pad(strval(intval(1)), 5, "0", STR_PAD_LEFT);
            }
             $doc_no="M".$year.$run_no;


            
            $ext = end(explode('.', $_FILES["txt_image"]["name"])); // upload file ext
            
            $name = md5(rand()) . '.' . $ext; // rename nama file gambar
            $path = "../../boostrap/img/makanan/". $name; // image upload path
            $file_name="boostrap/img/makanan/". $name;

            $upload=move_uploaded_file($_FILES["txt_image"]["tmp_name"], $path);
            if($upload){
                 $sql="INSERT INTO menu_makanan (kode_makanan,nama_makanan,tanggal_makanan,isi_makanan,gambar_makanan)VALUES('".$doc_no."','".$judul."','".$tanggal."','".$deskripsi."','".$file_name."')";
                $r=mysqli_query($conn,$sql);    
                header('location:../makanan.php');
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
            <input type="text" name="txt_kode" class="form-control" placeholder="Judul" readonly="" value="<?php echo $rs['kode_makanan']?>">
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
        //-------------------------------------------- perhitungan
        case"TAMBAH_PERHITUNGAN":
            $ibu_hamil=$_POST['slc_hamil'];
            $bidan=$_POST['slc_bidan'];
            $aktivitas=$_POST['slc_aktivitas'];
            $tgl=$_POST['txt_tgl'];
            $tb=$_POST['txt_tb'];
            $bb=$_POST['txt_bb'];
            $usia=$_POST['txt_usia'];
            $r_rumus=$_POST['r_rumus'];
            $keluhan=$_POST['txt_keluhan'];
            $catatan=$_POST['txt_catatan'];
            $bee=0;
            $tee=0;
            $sql_kali="SELECT * FROM aktivitas where rec_id='".$aktivitas."'";
            $r_kali=mysqli_query($conn,$sql_kali);
            $rs_kali=mysqli_fetch_array($r_kali);

            if($r_rumus==1){
                $bee=655+(9.6*$bb)+(1.8*$tb)-(4.7*$usia);
                $tee=$bee*$rs_kali['perkalian']+100;
            }else{
                $bee=655+(9.6*$bb)+(1.8*$tb)-(4.7*$usia);
                $tee=$bee*$rs_kali['perkalian']+300;
            }


            $tanggal=date("Y-m-d",strtotime($tgl));
            $year=date("Y",strtotime($tgl));

            
            //------------- mencari nomor terkhir untuk penambahan infromasi
             $sql="select count(*) as TOTAL from laporan where substring(id_laporan,2,4)='".$year."'";
            $r=mysqli_query($conn,$sql);
            $rs=mysqli_fetch_array($r);
            if ($rs["TOTAL"]!=0)
            {
                $sql1 = "select substring(id_laporan,6,5) as LAST_NO from laporan WHERE substring(id_laporan,2,4)='".$year."' order by substring(id_laporan,6,5) desc";
                $result= mysqli_query($conn,$sql1);
                $rs = mysqli_fetch_array($result);
                $run_no = str_pad(strval(intval($rs["LAST_NO"]) + 1), 5, "0", STR_PAD_LEFT);
            }else{
                $run_no = str_pad(strval(intval(1)), 5, "0", STR_PAD_LEFT);
            }
              $doc_no="L".$year.$run_no;

            $sql_ibu="SELECT tanggal_lahir_ibu_hamil from ibu_hamil where id_ibu_hamil='".$ibu_hamil."'";
            $r_ibu=mysqli_query($conn,$sql_ibu);
            $rs_ibu=mysqli_fetch_array($r_ibu);
             $rs_ibu['tanggal_lahir_ibu_hamil'];
           $usia_ibu_hamil= hitung_umur($rs_ibu['tanggal_lahir_ibu_hamil']);
            //echo $usia_ibu_hamil;
             $sql="INSERT INTO laporan ( id_laporan, id_kader_posyandu, id_bidan, id_ibu_hamil, tanggal_laporan, berat_badan, tinggi_badan, usia_ibu_hamil, bee, usia_kehamilan, tee, keluhan, catatan, kehamilan) VALUES ('".$doc_no."','".$_SESSION['user_id']."','".$bidan."','".$ibu_hamil."','".$tanggal."','".$bb."','".$tb."','".$usia_ibu_hamil."','".$bee."','".$usia."','".$tee."','".$keluhan."','".$catatan."','1')";
             $r=mysqli_query($conn,$sql);
             header('location:../perhitungan.php');


        break;
        case"VIEW_LAPORAN":
             $id= $_POST['id'];
            ?>
                <table class="table table-grid" id="scheduleTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Laporan</th>
                                    <th>Tanggal Laporan</th>
                                    <th>ID Pasien</th>
                                    <th>Nama Pasien</th>
                                    <th style="text-align: center;">Tinggi <br>Badan</th> 
                                    <th style="text-align: center;">Berat <br>Badan</th> 
                                    <th style="text-align: center;">Usia <br>kehamilan</th> 
                                    <th style="text-align: center;">BEE</th> 
                                    <th style="text-align: center;">TEE</th> 
                                    <th style="text-align: center;">Aksi</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i=1;
                                     $sql="SELECT * FROM v_laporan where id_ibu_hamil='".$id."'";
                                    $r=mysqli_query($conn,$sql);
                                    while($rs=mysqli_fetch_array($r)){
                                        ?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $rs['id_laporan'];?></td>
                                            <td><?php echo $rs['tanggal_laporan'];?></td>
                                            <td><?php echo $rs['id_ibu_hamil'];?></td>
                                            <td><?php echo $rs['nama_ibu_hamil'];?></td>
                                            <td style="text-align: center;"><?php echo $rs['tinggi_badan'];?></td>
                                            <td style="text-align: center;"><?php echo $rs['berat_badan'];?></td>
                                            <td style="text-align: center;"><?php echo $rs['usia_kehamilan'];?></td>
                                            <td style="text-align: center;"><?php echo $rs['bee'];?></td>
                                            <td style="text-align: center;"><?php echo $rs['tee'];?></td>
                                            <td style="text-align: center;">
                                                <button class="btn btn-sm btn-danger" title="Hitung" href="#" onclick="delete_laporan('<?php echo $rs['rec_id']?>')">Delete</button> 
                                            </td>
                                            
                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                ?>
                            </tbody>
                        </table>
            <?php
        break;
        case"DELETE_LAPORAN":
            $id=$_POST['idx'];
            $sql="DELETE FROM laporan WHERE rec_id='".$id."'";
            mysqli_query($conn,$sql);
             
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

       