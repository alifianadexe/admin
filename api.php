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
}

?>