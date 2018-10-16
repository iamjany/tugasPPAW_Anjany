<?php
session_start();
/**
 * Jika Tidak login atau sudah login tapi bukan sebagai admin
 * maka akan dibawa kembali kehalaman login atau menuju halaman yang seharusnya.
 */
if ( !isset($_SESSION['user_login']) || 
    ( isset($_SESSION['user_login']) && $_SESSION['user_login'] != 'admin' ) ) {

	header('location:./../login.php');
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Tempat Wisata di Jawa Barat</title>
  <!-- BOOTSTRAP STYLES-->
    <link href="bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand">Admin</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"><?php echo $_SESSION['nama'];?> &nbsp; <a href="./../logout.php" class="btn btn-primary square-btn-adjust"><b class="glyphicon glyphicon-off"> Logout</b></a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="index.php"><i class="fa fa-dashboard fa-3x"></i> Halaman Utama</a>
                    </li>
                    <li>
                        <a  href="tentang.php"><i class="fa fa-desktop fa-3x"></i>Tentang Jawa Barat</a>
                    </li>
                      <li>
                        <a  href="kategori_wisata.php"><i class="fa fa-desktop fa-3x"></i> Kategori Wisata</a>
                    </li>
                      <img src="logo.png" class="user-image img-responsive"/>             
            </div>          
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <center><font size="20">DATA WISATA ALAM</font></center>
					<a href="admin_form_simpanAL.php"><button>Tambah Data</button></a></br>
                 
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
   
<body>	
		   
            
			
  
  <table border="1" width="500%" >
   <link href="table.css" rel="stylesheet" />
  <table class="data-table">
 
  <tr>
	<th> Id </th>
	<th> Kota </th>
    <th>Nama Tempat</th>
    <th>Alamat</th>
    <th>Telepon</th>
    <th>Deskripsi</th>
    <th>Harga Tiket</th>
    <th>Jam Kunjungan</th>
	<th> Fasilitas </th>
	<th> Foto </th>
    <th colspan="2">Aksi</th>
  </tr>
  <?php
  // Load file koneksi.php
  include "koneksi.php";
  
  $query = "SELECT * FROM wisata_alam"; // Query untuk menampilkan semua data wisata alam
  $sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
  
  while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
    echo "<tr>";
    echo "<td>".$data['id']."</td>";
	echo "<td>".$data['kota']."</td>";
    echo "<td>".$data['nama_tempat']."</td>";
    echo "<td>".$data['alamat']."</td>";
    echo "<td>".$data['telp']."</td>";
    echo "<td>".$data['deskripsi']."</td>";
	echo "<td>".$data['harga_tiket']."</td>";
	echo "<td>".$data['jam_kunjungan']."</td>";
	echo "<td>".$data['fasilitas']."</td>";
	echo "<td><img src='images/".$data['foto']."' width='100' height='100'></td>";
    echo "<td><a href='admin_form_ubahAL.php?id=".$data['id']."'>Ubah</a></td>";
    echo "<td><a href='proses_hapusAL.php?id=".$data['id']."'>Hapus</a></td>";
    echo "</tr>";
  }
  ?>
  </table>
			
            
    </div>
             <!-- /. PAGE INNER  -->
            </div>
			<div class="col-md-3 col-sm-6 col-xs-6" align="right">           
      <div class="panel panel-back noti-box">
                <div class="text-box" >
                   <div id="output"></div>
                </div>
             </div>
         </div>  
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="js/custom.js"></script>
    
   
</body>
<script type="text/javascript">
    window.setTimeout("waktu()",1000);    
    function waktu() {     
    var tanggal = new Date();    
    setTimeout("waktu()",1000);    
    document.getElementById("output").innerHTML = tanggal.getHours()+":"+tanggal.getMinutes()+":"+tanggal.getSeconds();  
    }   
</script>
</html>