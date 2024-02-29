<?php
session_start();
include "../koneksi/koneksi.php";

$NamaUser = $_SESSION['NamaUser'];
$Level = $_SESSION['Level'];
if ($_SESSION['NamaUser']=="") {
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>warskuy</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <script src="../bootstrap/jquery.min.js"></script>
    <script src="../bootstrap/bootstrap.min.js"></script>
    <style>
        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {height: 640px}
        
        
        /* Set gray background color and 100% height */
        .sidenav {
            background-color: #f1f1f1;
            height: 100%;
        }
            
        /* On small screens, set height to 'auto' for the grid */
        @media screen and (max-width: 767px) {
        .row.content {height: auto;} 
        }
    </style>
</head>
<body>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <h2><?php echo $Level ?></h2>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="index.php">Dashboard</a></li>
        <li><a href="?page=stok">Stok</a></li>
        <li><a href="?page=user">User</a></li>
        <li><a href="logout.php">Log Out</a></li>
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-9">
    <?php
            if (isset($_GET['page'])) {
                $laman = $_GET['page'];

                switch ($laman) {
                    case 'user':
                        include "user.php";
                        break;

                    case 'stok':
                        include "stok.php";
                        break;

                    case 'logout':
                        include "logout.php";
                        break;

                    case 'tambahuser':
                        include "tambahuser.php";
                        break;

                    case 'cari-menu':
                        include "cari-menu.php";
                        break;

                    case 'hapususer':
                        include "hapususer.php";
                        break;

                    case 'tambahbarang':
                        include "tambahbarang.php";
                        break;

                    case 'hapusbaranng':
                        include "hapusbarang.php";
                        break;

                    case 'editbarang':
                        include "editbarang.php";
                        break;

                    case 'edituser':
                        include "edituser.php";
                        break;
                    default:
                        # code...
                        break;
                }
            }
            else {
                include "dashboard.php";
            }
        ?>
     </div>
  </div>
</div>

</body>
</html>



