<?php
	include('../../conn.php');

	$role=$_GET['role'];
    switch ($role) {
        //---------------------- CASE PROFILE KADER POSYANDU ---------------------------------------------------
        case'TAMBAH_KADER': 
            $nama       = $_POST['txt_nama']; 
            $telp       = $_POST['txt_telp']; 
            $username   = $_POST['txt_username']; 
            $password   = md5($_POST['txt_password']); 

            // Ambil tahun dan bulan sekarang
            $year  = date("y"); 
            $month = date("m");  

            //------------- mencari apakah ada username yang sama pada table user
            $countUsername = "select count(*) as TOTAL from user where username='".$username."'";
            $queryCountUsername = mysqli_query($conn,$countUsername);
            $fetchCountUsername = mysqli_fetch_array($queryCountUsername); 
            if ($fetchCountUsername["TOTAL"] > 0)
            {
                $_SESSION["message"]="Username Sudah Pernah Dipakai";
                header  ("location:../kader.php");
                exit();
            } 
            
            //------------- Mencari nomer terakhir, untuk memberikan id kader
            $LastNum      = "select count(*) as TOTAL from kader_posyandu where substring(id_kader,3,2)='".$year."'";
            $queryLastNum = mysqli_query($conn,$LastNum);
            $fetchLastNum = mysqli_fetch_array($queryLastNum);
            if ($fetchLastNum["TOTAL"] != 0)
            {
                $proLastNum = "select substring(id_kader,7,4) as LAST_NO from kader_posyandu WHERE substring(id_kader,3,2)='".$year."' order by substring(id_kader,7,4) desc";
                $queryProLastNum = mysqli_query($conn,$proLastNum);
                $fetchProLastNum = mysqli_fetch_array($queryProLastNum);
                $run_no = str_pad(strval(intval($fetchProLastNum["LAST_NO"]) + 1), 4, "0", STR_PAD_LEFT);
            }else{
                $run_no = str_pad(strval(intval(1)), 4, "0", STR_PAD_LEFT);
            }
            $doc_no="A-".$year.$month.$run_no;

            //------------- Insert data kader kedalam table kader
            $insKader      = "INSERT INTO kader_posyandu (id_kader,nama_kader,no_telp_kader) values('".$doc_no."','".$nama."','".$telp."')";
            $queryInsKader = mysqli_query($conn,$insKader); 

            //------------- Insert data kader kedalam table user
            $insUser       = "INSERT INTO user (id_user,username,password,user_group) values('".$doc_no."','".$username."','".$password."','Kader Posyandu')";
            $queryInsUser = mysqli_query($conn,$insUser);
            header  ("location:../kader.php");

        break;

        case"DELETE_KADER":

            // Get ID Kader
            $id            = $_POST['id_kader'];

            // Cek apakah ID Kader ada pada table laporan
            $cekKaderLap    = "SELECT COUNT(*) AS TOTAL_USER FROM laporan where id_kader_posyandu='".$id."'";
            $r_cekKaderLap  = mysqli_query($conn,$cekKaderLap);
            $rs_cekKaderLap = mysqli_fetch_array($r_cekKaderLap);

            // Cek apakah user sedang login atau tidak
            $cekLogUser    = "SELECT active  FROM user where id_user='".$id."'";
            $r_cekLogUser  = mysqli_query($conn,$cekLogUser);
            $rs_cekLogUser = mysqli_fetch_array($r_cekLogUser);

            // Jika ada atau == 0 maka akan ada alert
            // Data berhasil dihapus, selain itu
            // Gagal hapus data, data sudah pernah dipakai

            if($rs_cekKaderLap['TOTAL_USER'] == 0){
                if($rs_cekLogUser == '0'){
                    $delKader      = "DELETE FROM kader_posyandu where id_kader='".$id."'";
                    $queryDelKader = mysqli_query($conn,$delKader);

                    $delUser      = "DELETE FROM user where id_user='".$id."'";
                    $queryDelUser = mysqli_query($conn,$delUser);
                } else{
                     // Kirim alert, gagal menghapus data 
                }

            } else{
                // Kirim alert, gagal menghapus data
            }
            header  ("location:../kader.php");

        break;

        case"EDIT_KADER":
            $id = $_POST['id_kader'];
            $getDataEdit        = "SELECT * FROM kader_posyandu where id_kader='".$id."'";
            $r_getDataEdit      = mysqli_query($conn,$getDataEdit);
            $rs_getDataEdit   = mysqli_fetch_array($r_getDataEdit);
?>
                <div class="mb-3">
                  <label class="form-label">ID Kader</label>
                  <input type="text" name="txt_id" class="form-control" value="<?php echo $rs_getDataEdit['id_kader'];?>" readonly>  
                </div> 
                <div class="mb-3">
                  <label class="form-label">Nama Lengkap</label>
                  <input type="text" name="txt_nama" class="form-control" placeholder="Nama Lengkap" value="<?php echo $rs_getDataEdit['nama_kader'];?>">
                </div>
                <div class="mb-3">
                  <label class="form-label">No Telp</label>
                  <input type="text" name="txt_telp" class="form-control" placeholder="Nomor Telpon" value="<?php echo $rs_getDataEdit['no_telp_kader'];?>">
                </div>
             
               
<?php
        break;
        case"PROSES_EDIT_KADER":
            $id     = $_POST['txt_id'];
            $nama   = $_POST['txt_nama']; 
            $telp   = $_POST['txt_telp']; 

            $updateKader = "UPDATE `kader_posyandu` SET `nama_kader`='".$nama."',`no_telp_kader`='".$telp."' WHERE `id_kader`='".$id."'";
            $r_updateKader = mysqli_query($conn,$updateKader);

            if($r_updateKader){

            } else{

            }

            header  ("location:../kader.php");

        break;

        //---------------------- END CASE PROFILE KADER POSYANDU ---------------------------------------------------
        //---------------------- CASE PROFILE BIDAN POSYANDU ---------------------------------------------------
        case'TAMBAH_BIDAN': 
            $nama       = $_POST['txt_nama']; 
            $nip        = $_POST['txt_nip']; 
            $agama      = $_POST['txt_agama']; 
            $tempat     = $_POST['txt_tempat']; 
            $tanggal    = $_POST['txt_tanggal']; 
            $telp       = $_POST['txt_telp']; 
            $pendidikan = $_POST['txt_pendidikan']; 
            $username   = $_POST['txt_username']; 
            $password   = md5($_POST['txt_password']); 

            // Ambil tahun dan bulan sekarang
            $year  = date("y"); 
            $month = date("m");  

            //------------- mencari apakah ada username yang sama pada table user
            $countUsername = "select count(*) as TOTAL from user where username='".$username."'";
            $queryCountUsername = mysqli_query($conn,$countUsername);
            $fetchCountUsername = mysqli_fetch_array($queryCountUsername); 
            if ($fetchCountUsername["TOTAL"] > 0)
            {
                $_SESSION["message"]="Username Sudah Pernah Dipakai";
                header  ("location:../bidan.php");
                exit();
            } 
            
            //------------- Mencari nomer terakhir, untuk memberikan id bidan
            $LastNum      = "select count(*) as TOTAL from bidan where substring(id_bidan,3,2)='".$year."'";
            $queryLastNum = mysqli_query($conn,$LastNum);
            $fetchLastNum = mysqli_fetch_array($queryLastNum);
            if ($fetchLastNum["TOTAL"] != 0)
            {
                $proLastNum = "select substring(id_bidan,7,4) as LAST_NO from bidan WHERE substring(id_bidan,3,2)='".$year."' order by substring(id_bidan,7,4) desc";
                $queryProLastNum = mysqli_query($conn,$proLastNum);
                $fetchProLastNum = mysqli_fetch_array($queryProLastNum);
                $run_no = str_pad(strval(intval($fetchProLastNum["LAST_NO"]) + 1), 4, "0", STR_PAD_LEFT);
            }else{
                $run_no = str_pad(strval(intval(1)), 4, "0", STR_PAD_LEFT);
            }
            $doc_no="B-".$year.$month.$run_no;

            //------------- Insert data kader kedalam table kader
            $insBidan      = "INSERT INTO bidan (`id_bidan`, `nama_bidan`, `nip_bidan`, `tanggal_lahir_bidan`, `tempat_lahir_bidan`, `pendidikan_bidan`, `agama_bidan`, `no_telp_bidan`) values('".$doc_no."','".$nama."','".$nip."','".$tanggal."','".$tempat."','".$pendidikan."','".$agama."','".$telp."')";
            $queryInsKader = mysqli_query($conn,$insBidan); 

            //------------- Insert data kader kedalam table user
            $insUser       = "INSERT INTO user (id_user,username,password,user_group) values('".$doc_no."','".$username."','".$password."','Bidan Posyandu')";
            $queryInsUser = mysqli_query($conn,$insUser);
            header  ("location:../bidan.php");

        break;

        case"DELETE_BIDAN": 

            // Get ID Kader
            $id            = $_POST['id_bidan'];

            // Cek apakah ID Kader ada pada table laporan
            $cekBidanLap    = "SELECT COUNT(*) AS TOTAL_USER FROM laporan where id_bidan='".$id."'";
            $r_cekBidanLap  = mysqli_query($conn,$cekBidanLap);
            $rs_cekBidanLap = mysqli_fetch_array($r_cekBidanLap);

            // Cek apakah user sedang login atau tidak
            $cekLogUser    = "SELECT active  FROM user where id_user='".$id."'";
            $r_cekLogUser  = mysqli_query($conn,$cekLogUser);
            $rs_cekLogUser = mysqli_fetch_array($r_cekLogUser);

            // Jika ada atau == 0 maka akan ada alert
            // Data berhasil dihapus, selain itu
            // Gagal hapus data, data sudah pernah dipakai

            if($rs_cekBidanLap['TOTAL_USER'] == 0){
                if($rs_cekLogUser == '0'){
                    $delBidan      = "DELETE FROM bidan where id_bidan='".$id."'";
                    $queryDelBidan = mysqli_query($conn,$delBidan);

                    $delUser      = "DELETE FROM user where id_user='".$id."'";
                    $queryDelUser = mysqli_query($conn,$delUser);
                } else{
                    // Kirim alert, berhasil menghapus data 
                }
            } else{
                // Kirim alert, gagal menghapus data
            }
            header  ("location:../bidan.php");

        break;

        case"PROSES_EDIT_BIDAN":
            $id         = $_POST['txt_id'];
            $nama       = $_POST['txt_nama']; 
            $nip        = $_POST['txt_nip']; 
            $agama      = $_POST['txt_agama']; 
            $tempat     = $_POST['txt_tempat']; 
            $tanggal    = $_POST['txt_tanggal']; 
            $telp       = $_POST['txt_telp']; 
            $pendidikan = $_POST['txt_pendidikan']; 

            $updateBidan = "UPDATE `bidan` SET `nama_bidan`='".$nama."',`nip_bidan`='".$nip."',`tanggal_lahir_bidan`='".$tanggal."',`tempat_lahir_bidan`='".$tempat."',`pendidikan_bidan`='".$pendidikan."',`agama_bidan`='".$agama."',`no_telp_bidan`='".$telp."' WHERE `id_bidan`='".$id."'";
            $r_updateBidan = mysqli_query($conn,$updateBidan);

            if($r_updateBidan){

            } else{

            }

            header  ("location:../bidan.php");

        break;
        
        //---------------------- END CASE PROFILE BIDAN POSYANDU -----------------------------------------------
        //---------------------- CASE PROFILE PASIEN POSYANDU --------------------------------------------------
        case'TAMBAH_PASIEN': 
            $nama       = $_POST['txt_nama'];   
            $tempat     = $_POST['txt_tempat']; 
            $tanggal    = $_POST['txt_tanggal']; 
            $telp       = $_POST['txt_telp']; 
            $pekerjaan  = $_POST['txt_pekerjaan']; 
            $alamat     = $_POST['txt_alamat']; 
            $darah      = $_POST['txt_darah']; 
            $kehamilan  = $_POST['txt_kehamilan']; 
            $suami      = $_POST['txt_suami']; 
            $username   = $_POST['txt_username']; 
            $password   = md5($_POST['txt_password']); 

            // Ambil tahun dan bulan sekarang
            $year  = date("y"); 
            $month = date("m");  

            //------------- mencari apakah ada username yang sama pada table user
            $countUsername = "select count(*) as TOTAL from user where username='".$username."'";
            $queryCountUsername = mysqli_query($conn,$countUsername);
            $fetchCountUsername = mysqli_fetch_array($queryCountUsername); 
            if ($fetchCountUsername["TOTAL"] > 0)
            {
                $_SESSION["message"]="Username Sudah Pernah Dipakai";
                header  ("location:../add_ibu_hamil.php");
                exit();
            } 
            
            //------------- Mencari nomer terakhir, untuk memberikan id bidan
            $LastNum      = "select count(*) as TOTAL from ibu_hamil where substring(id_ibu_hamil,3,2)='".$year."'";
            $queryLastNum = mysqli_query($conn,$LastNum);
            $fetchLastNum = mysqli_fetch_array($queryLastNum);
            if ($fetchLastNum["TOTAL"] != 0)
            {
                $proLastNum = "select substring(id_ibu_hamil,7,4) as LAST_NO from ibu_hamil WHERE substring(id_ibu_hamil,3,2)='".$year."' order by substring(id_ibu_hamil,7,4) desc";
                $queryProLastNum = mysqli_query($conn,$proLastNum);
                $fetchProLastNum = mysqli_fetch_array($queryProLastNum);
                $run_no = str_pad(strval(intval($fetchProLastNum["LAST_NO"]) + 1), 4, "0", STR_PAD_LEFT);
            }else{
                $run_no = str_pad(strval(intval(1)), 4, "0", STR_PAD_LEFT);
            }
            $doc_no="P-".$year.$month.$run_no;

            //------------- Insert data kader kedalam table kader
            $insPasien      = "INSERT INTO ibu_hamil (`id_ibu_hamil`, `nama_ibu_hamil`, `tempat_lahir_ibu_hamil`, `tanggal_lahir_ibu_hamil`, `gol_darah_ibu_hamil`, `alamat_ibu_hamil`, `pekerjaan_ibu_hamil`, `kehamilan`, `no_telp_ibu_hamil`, `nama_suami`) values('".$doc_no."','".$nama."','".$tempat."','".$tanggal."','".$darah."','".$alamat."','".$pekerjaan."','".$kehamilan."','".$telp."','".$suami."')";
            $queryInsPasien = mysqli_query($conn,$insPasien); 

            //------------- Insert data kader kedalam table user
            $insUser       = "INSERT INTO user (id_user,username,password,user_group) values('".$doc_no."','".$username."','".$password."','Pasien')";
            $queryInsUser = mysqli_query($conn,$insUser);
            header  ("location:../ibu_hamil.php");

        break;

        case"DELETE_PASIEN":
            // Get ID Pasien
            $id            = $_POST['id_pasien'];

            // Cek apakah ID Kader ada pada table laporan
            $cekPasienLap    = "SELECT COUNT(*) AS TOTAL_USER FROM laporan where id_ibu_hamil='".$id."'";
            $r_cekPasienLap  = mysqli_query($conn,$cekPasienLap);
            $rs_cekPasienLap = mysqli_fetch_array($r_cekPasienLap);

             // Cek apakah user sedang login atau tidak
            $cekLogUser    = "SELECT active  FROM user where id_user='".$id."'";
            $r_cekLogUser  = mysqli_query($conn,$cekLogUser);
            $rs_cekLogUser = mysqli_fetch_array($r_cekLogUser);

            // Jika ada atau == 0 maka akan ada alert
            // Data berhasil dihapus, selain itu
            // Gagal hapus data, data sudah pernah dipakai

            if($rs_cekPasienLap['TOTAL_USER'] == 0){
                if($rs_cekLogUser == '0'){
                    $delPasien      = "DELETE FROM ibu_hamil where id_ibu_hamil='".$id."'";
                    $queryDelBidan = mysqli_query($conn,$delPasien);

                    $delUser      = "DELETE FROM user where id_user='".$id."'";
                    $queryDelUser = mysqli_query($conn,$delUser);
                } else{
                    // Kirim alert, berhasil menghapus data 
                }
            } else{
                // Kirim alert, gagal menghapus data
            }
            header  ("location:../ibu_hamil.php");

        break; 

        case"PROSES_EDIT_PASIEN":
            $id         = $_POST['txt_id'];
            $nama       = $_POST['txt_nama'];   
            $tempat     = $_POST['txt_tempat']; 
            $tanggal    = $_POST['txt_tanggal']; 
            $telp       = $_POST['txt_telp']; 
            $pekerjaan  = $_POST['txt_pekerjaan']; 
            $alamat     = $_POST['txt_alamat']; 
            $darah      = $_POST['txt_darah']; 
            $kehamilan  = $_POST['txt_kehamilan']; 
            $suami      = $_POST['txt_suami'];  

            $updatePasien = "UPDATE `ibu_hamil` SET `nama_ibu_hamil`='".$nama."',`tempat_lahir_ibu_hamil`='".$tempat."',`tanggal_lahir_ibu_hamil`='".$tanggal."',`gol_darah_ibu_hamil`='".$darah."',`alamat_ibu_hamil`='".$alamat."',`pekerjaan_ibu_hamil`='".$pekerjaan."',`kehamilan`='".$kehamilan."',`no_telp_ibu_hamil`='".$telp."',`nama_suami`='".$suami."' WHERE `id_ibu_hamil`='".$id."'";
            $r_updatePasien = mysqli_query($conn,$updatePasien);

            if($r_updatePasien){

            } else{

            }

            header  ("location:../ibu_hamil.php");
           
        break;
    }
?>

       