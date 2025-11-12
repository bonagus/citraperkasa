<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>

<div class="main-content">
  <div class="page-content">
    <div class="container-fluid">
      <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Fasilitas</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Fasilitas</a></li>
                            <li class="breadcrumb-item active">Data</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title <a href="add-facility.php" class="btn btn-success btn-sm">+ Add New</a>-->

      <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Data</h5>
        </div>
        <div class="card-body">
          <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
            <thead class="table-light">
              <tr>
                <th>#</th>
                <th>Kategori</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $q = mysqli_query($con, "SELECT f.*, c.name AS catname FROM facility f 
                                        LEFT JOIN facility_category c ON f.category_id=c.id 
                                        ORDER BY f.category_id ASC");
                $no = 1;
                while ($r = mysqli_fetch_assoc($q)) {
                    echo "
                    <tr>
                      <td>{$no}</td>
                      <td>{$r['catname']}</td>
                      <td>{$r['name']}</td>
                      <td>{$r['description']}</td>
                      <td>Rp " . number_format($r['unit_price'], 0, ',', '.') . "</td>
                      <td>
                        <div class='dropdown'>
                          <button class='btn btn-soft-secondary btn-sm' data-bs-toggle='dropdown'>
                            <i class='ri-more-fill align-middle'></i>
                          </button>
                          <ul class='dropdown-menu dropdown-menu-end'>
                            <li><a href='editfacility.php?id={$r['id']}' class='dropdown-item'><i class='ri-pencil-fill me-2 text-muted'></i> Edit</a></li>
                            <li><a href='deletefacility.php?id={$r['id']}' onclick='return confirm(\"Yakin ingin menghapus fasilitas ini?\");' class='dropdown-item text-danger'><i class='ri-delete-bin-fill me-2'></i> Delete</a></li>
                          </ul>
                        </div>
                      </td>
                    </tr>";
                    $no++;
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>

<?php include "footer.php"; ?>
