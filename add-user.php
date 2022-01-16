<?php 
include('koneksi.php');
include('header.php');
include('sidenav.php');

?>
<div id="layoutSidenav_content">
    <main>
        <!-- edit just on main -->
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah User</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Tambah User</li>
            </ol>
            <div class="card border-0 rounded-lg mt-5">
            <div class="row">
                <div class="card-body col-md-6">
                    <form action="process.php" method="post">
                        <input type="hidden" name="type_process" value="add_user" id="type_process">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="nama_user" name="nama_user" type="text" placeholder="Enter Name" />
                                    <label for="name_product">Nama</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="username" name="username" type="text" placeholder="Enter Username" />
                                    <label for="inputFirstName">Username</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="password" name="password" type="password" placeholder="" />
                                    <label for="inputFirstName">Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <select name="role" class="form-control" >
                                        <option value="user">User</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                            <div class="d-grid"><input class="btn btn-primary btn-block" value="Tambah User" type="submit"></div>
                            </div>
                        </div>
                        <div class="mt-4 mb-0">
                        </div>
                    </form>
                </div>
                <div class="card-body col-md-6">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Fullname</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php 
                                $sql = "SELECT * FROM tbl_user";
                                $result = $conn->query($sql);
                                
                                if ($result->num_rows > 0) {
                                  // output data of each row
                                  while($row = $result->fetch_assoc()) {
                               ?>
                                <tr>
                                    <td><?=$row['id_user']?></td>
                                    <td><?=$row['username']?></td>
                                    <td><?=$row['role']?></td>
                                    <td><?=$row['nama']?></td>
                                    <td>
                                        <?php 
                                            echo "<a href='process.php?delete_user=".$row['id_user']."'>Delete</a>";
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

