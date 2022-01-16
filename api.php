<?php
include("koneksi.php");
header('Content-type: application/json');

if(isset($_GET["get_user"])){
    $sql = "SELECT * FROM tbl_user WHERE username = '".$_GET["get_user"]."' AND password = '".$_GET["password"]."'";
    $result = $conn->query($sql);
    $list_user = array();
    if($result){
        while($row = $result->fetch_assoc()) {
            array_push($list_user, $row);    
        }
    }
    $hasil = array();
    $hasil["result"] = count($list_user);
    echo json_encode($hasil);
}elseif(isset($_GET["get_produk"])){
    $sql = "SELECT * FROM tbl_sembako";
    $result = $conn->query($sql);
    
    $list_produk = array();
    while($row = $result->fetch_assoc()) {
        array_push($list_produk, $row);    
    }

    echo json_encode($list_produk);
}elseif(isset($_GET["get_produk_detail"])){
    $sql = "SELECT * FROM tbl_sembako WHERE id = '".$_GET["get_produk_detail"]."'";
    $result = $conn->query($sql);
    $list_user = array();
    if($result){
        while($row = $result->fetch_assoc()) {
            array_push($list_user, $row);    
        }
    }
    $hasil = array();
    $hasil["result"] = $list_user[0];
    echo json_encode($hasil);
}elseif(isset($_GET['save_post'])){
    $hasil_post = json_decode($_GET["save_post"]);
    $the_total = array_pop($hasil_post);
    $sql = "INSERT INTO tbl_penjualan (id_konsumen, id_user, tanggal, jumlah_bayar, jumlah_beli, jumlah_kembali) 
            VALUES ('1', 
                    '1', 
                    NOW(),
                    ".$the_total->total_pembayaran.",
                    ".$the_total->total_trans.",
                    ".$the_total->total_kembalian.")";
    try{
        if (mysqli_query($conn, $sql)) {
            $last_id = $conn->insert_id;
            foreach($hasil_post as $hasil){
                $sql1 = "INSERT INTO tbl_detail_jual (id_penjualan, id_produk) 
                VALUES (".$last_id.", ".$hasil->idku.")";
                mysqli_query($conn, $sql1);
            }    
        }
    }catch(Exception $e){
        echo $e;
    }
    
}

?>