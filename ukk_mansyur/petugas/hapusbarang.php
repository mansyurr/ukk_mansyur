<?php
include_once("../koneksi/koneksi.php");
$id = $_GET['idproduk'];
$result = mysqli_query($koneksi, "DELETE FROM produk WHERE idproduk=$id");
header("Location:index.php?page=stok");
?>