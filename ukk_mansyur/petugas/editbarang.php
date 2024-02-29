<?php
include_once("../koneksi/koneksi.php");

if (isset($_POST['update'])) {
    $id = $_GET['idproduk'];
    $name = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    if ($_FILES["foto"]["name"]) {
        $target = "../foto/";
        $time = date('dmYHis');
        $type = strtolower(pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION));
        $targetfile = $target . $time . '.' . $type;
        $filename = $time . '.' . $type;

        $uploadOk = 1;

        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $targetfile)) {
            $foto = $filename;
        } else {
            echo "Maaf, terjadi kesalahan saat mengupload file gambar.";
        }
    }
    
    if (!isset($foto)) {
        $foto = $_POST['existing_foto'];
    }
    
    $result = mysqli_query($koneksi, "UPDATE produk SET nama='$name', harga='$harga', stok='$stok', foto='$foto' WHERE idproduk=$id");

    if ($result) {
        echo "<script>alert('Berhasil Mengedit Produk');window.location.href='?page=stok';</script>";
        exit();

    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
} 

$id = $_GET['idproduk'];

$result1 = mysqli_query($koneksi, "SELECT * FROM produk WHERE idproduk=$id");

while ($barang_data = mysqli_fetch_array($result1)) {
    $name = $barang_data['nama'];
    $harga = $barang_data['harga'];
    $stok = $barang_data['stok'];
    $foto = $barang_data['foto'];
}
$koneksi->close();
?>

<div class="row well">
    <div class="col-md-4">
        <div class="card well">
            <h3 class="">Update Barang</h3>
        </div>

        <div class="card-body">
            <from action="" method="POST" entype="multipart/form-data">
                
            <div class="mb-3 mt-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" clas="form-control" id="NamaUser" value="<?php echo $name; ?>" placeholder="Masukkan Nama" name="nama">
            </div> 
            <div class="mb-3">
                <label for="harga" class="form-label">Harga:</label>
                <input type="text" clas="form-control" id="harga" value="<?php echo $name; ?>" placeholder="Masukkan Nama" name="harga">
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">stok:</label>
                <input type="text" clas="form-control" id="stok" value="<?php echo $name; ?>" placeholder="Masukkan Stok" name="stok">
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto<span style="color: red;"> *</span></label>
                <input type="file" clas="form-control" id="foto" name="foto">
                <input type="hidden" name="existing_foto" value="<?php echo $foto;?>">
                <p style="color: blue;">Hanya bisa menginput foto dengan ekstensi PNG, JPG, JPEG, SVG</p>
            </div>
            <button type="sumbit" name="update" class="btn btn-primary">Update</button> 
         </from>
       </div>
     </div>
   </div>
</div>       