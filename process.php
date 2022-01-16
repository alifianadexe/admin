<?php
include("koneksi.php");

if($_POST['type_process'] == "add_product"){
    $sql = "INSERT INTO tbl_sembako (nama, deskripsi, harga, gambar) 
            VALUES ('".$_POST['name_product']."', 
                    '".$_POST['deskripsi']."', 
                    ".$_POST['harga'].", 
                    '".$_POST['gambar']."')";

    if (mysqli_query($conn, $sql)) {
        echo "Data Berhasil Ditambah";
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}elseif($_POST['type_process'] == "add_user"){
    $sql = "INSERT INTO tbl_user (username, password, role, nama) 
            VALUES ('".$_POST['username']."', 
                    '".$_POST['password']."', 
                    '".$_POST['role']."', 
                    '".$_POST['nama_user']."')";

    if (mysqli_query($conn, $sql)) {
        echo "Data Berhasil Ditambah";
        header("Location: add-user.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}elseif($_POST['type_process'] == "add_konsumen"){
    $sql = "INSERT INTO tbl_konsumen (username, password, nama) 
            VALUES ('".$_POST['username']."', 
                    '".$_POST['password']."', 
                    '".$_POST['nama_user']."')";

    if (mysqli_query($conn, $sql)) {
        echo "Data Berhasil Ditambah";
        header("Location: add-user.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}elseif(isset($_GET['delete_produk'])){
    $sql = "DELETE FROM tbl_sembako WHERE id = '".$_GET['delete_produk']."'";
    if (mysqli_query($conn, $sql)) {
        echo "Data Berhasil Dihapus";
        header("Location: add-produk.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}elseif(isset($_GET['delete_user'])){
    $sql = "DELETE FROM tbl_user WHERE id_user = '".$_GET['delete_user']."'";
    if (mysqli_query($conn, $sql)) {
        echo "Data Berhasil Dihapus";
        header("Location: add-user.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>