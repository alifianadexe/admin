<?php 
include('koneksi.php');
include('header.php');
include('sidenav.php');

?>
<div id="layoutSidenav_content">
    <main>
        <!-- edit just on main -->
        <div class="container-fluid px-4">
            <h1 class="mt-4">Laporan Penjualan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Laporan Penjualan</li>
            </ol>
            <div class="card border-0 rounded-lg mt-5">
            <div class="row">
                <div class="card-body col-md-12">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Konsumen</th>
                                <th>Nama User</th>
                                <th>Jumlah Beli</th>
                                <th>Jumlah Bayar</th>
                                <th>Jumlah Kembali</th>
                                <th>Tanggal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $sql = "SELECT DISTINCT *, B.nama as nama_konsumen, C.nama as nama_user FROM tbl_penjualan A 
                                        JOIN tbl_konsumen B ON A.id_konsumen = B.id_konsumen
                                        JOIN tbl_user C ON C.id_user = A.id_user";
                                $result = $conn->query($sql);
                                
                                if ($result->num_rows > 0) {
                                  // output data of each row
                                  while($row = $result->fetch_assoc()) {
                               ?>
                                <tr>
                                    <td><?=$row['id_penjualan']?></td>
                                    <td><?=$row['nama_konsumen']?></td>
                                    <td><?=$row['nama_user']?></td>
                                    <td><?="Rp " . number_format($row['jumlah_bayar'],2,',','.')?></td>
                                    <td><?="Rp " . number_format($row['jumlah_beli'],2,',','.')?></td>
                                    <td><?="Rp " . number_format($row['jumlah_kembali'],2,',','.')?></td>
                                    <td><?=$row['tanggal']?></td>
                           
                                    <td>
                                        <?php 
                                            echo "<a href='detail.php?view_detail=".$row['id_penjualan']."'>View</a>";
                                        ?>
                                    </td>
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

