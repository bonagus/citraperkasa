<?php include"header.php";?>
<?php include"sidebar.php";?>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
       <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Destinasi</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Destinasi</a></li>
                                <li class="breadcrumb-item active">Data</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Data</h5>
                        </div>
                        <div class="card-body">
                            <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th data-ordering="false">Nama Destinasi</th>
                                        <th>Jumlah Lokasi Wisata</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $q="SELECT d.id, d.dest_title, COUNT(l.id) AS total_lokasi FROM destination d LEFT JOIN location l ON l.destination_id = d.id GROUP BY d.id, d.dest_title ORDER BY d.dest_title ASC";
                                        $r123 = mysqli_query($con,$q);
                                        while($ro = mysqli_fetch_array($r123)){
                                            $id="$ro[id]";
                                            $dest_title="$ro[dest_title]";
                                            $total_lokasi="$ro[total_lokasi]";
                                            print "<tr>
                                            <td>
                                                $dest_title
                                            </td>
                                            <td>
                                                $total_lokasi
                                            </td>
                                            <td>
                                                <div class='dropdown d-inline-block'>
                                                    <button class='btn btn-soft-secondary btn-sm dropdown' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                                        <i class='ri-more-fill align-middle'></i>
                                                    </button>
                                                    <ul class='dropdown-menu dropdown-menu-end'>
                                                        <li>
                                                            <a href='editdest.php?id=$id' class='dropdown-item edit-item-btn'><i class='ri-pencil-fill align-bottom me-2 text-muted'></i> Edit</a>
                                                        </li>
                                                        <li>
                                                            <a href='deletedest.php?id=$id' onclick=\"return confirm('Yakin ingin menghapus data ini? (menghapus destinasi akan membuat lokasi wisata juga terhapus)');\" class='dropdown-item text-danger'><i class='ri-delete-bin-fill me-2'></i> Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td></tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

<?php include"footer.php";?>