<?php 
include('koneksi.php');
include('header.php');
include('sidenav.php');

?>
<div id="layoutSidenav_content">
    <main>
        <!-- edit just on main -->
        <div class="container-fluid px-4">
            <h1 class="mt-4">Laporan Detail Penjualan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Laporan Detail Penjualan</li>
            </ol>
            <div class="card border-0 rounded-lg mt-5">
            <div class="row">
                <div class="card-body col-md-12">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Konsumen</th>
                                <th>Quantity</th>
                                <th>Produk</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $id_jual = $_GET["view_detail"];
                                $sql = "SELECT *, B.nama as nama_konsumen,E.nama as nama_produk, C.nama as nama_user 
                                        FROM tbl_penjualan A 
                                        JOIN tbl_konsumen B ON A.id_konsumen = B.id_konsumen
                                        JOIN tbl_user C ON C.id_user = A.id_user
                                        JOIN tbl_detail_jual D ON D.id_penjualan = A.id_penjualan
                                        JOIN tbl_sembako E ON D.id_produk = E.id
                                        WHERE A.id_penjualan = ".$id_jual;
                                
                                $result = $conn->query($sql);
                                
                                if ($result->num_rows > 0) {
                                  // output data of each row
                                  while($row = $result->fetch_assoc()) {
                               ?>
                                <tr>
                                    <td><?=$row['id_detail_jual']?></td>
                                    <td><?=$row['nama_konsumen']?></td>
                                    <td>1</td>
                                    <td><?=$row['nama_produk']?></td>
                                    <td><?="Rp " . number_format($row['harga'],2,',','.')?></td>     
                                 </tr>
                            <?php
                                    }
                                } else {
                                  echo "0 results";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
    </main>
                
<?php 
include('footer.php')
?>

