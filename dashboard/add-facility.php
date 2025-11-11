<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>

<div class="main-content">
  <div class="page-content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Tambah Layanan</h4>
            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="facility">Layanan</a></li>
                <li class="breadcrumb-item active">Tambah</li>
              </ol>
            </div>
          </div>
        </div>
      </div>

      <?php
      $status = "OK";
      $msg = "";
      if (isset($_POST['save'])) {
          $category_id = mysqli_real_escape_string($con, $_POST['category_id']);
          $name = mysqli_real_escape_string($con, $_POST['name']);
          $description = mysqli_real_escape_string($con, $_POST['description']);
          $unit_price = mysqli_real_escape_string($con, $_POST['unit_price']);

          if (strlen($name) < 3) {
              $msg .= "Facility name must be at least 3 characters long.<br>";
              $status = "NOTOK";
          }

          if ($status == "OK") {
              $qb = mysqli_query($con, "INSERT INTO facility (category_id, name, description, unit_price) VALUES ('$category_id', '$name', '$description', '$unit_price')");
              if ($qb) {
                  $errormsg = "<div class='alert alert-success alert-dismissible alert-outline fade show'>
                      Facility added successfully.
                      <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                      </div>";
              }
          } else {
              $errormsg = "<div class='alert alert-danger alert-dismissible alert-outline fade show'>
                  $msg
                  <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                  </div>";
          }
      }
      ?>

      <div class="row">
        <div class="col-xxl-9">
          <div class="card mt-xxl-n5">
            <div class="card-header">
              <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                    <i class="fas fa-home"></i> Tambah Layanan
                  </a>
                </li>
              </ul>
            </div>

            <div class="card-body p-4">
              <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') echo $errormsg; ?>

              <form method="post">
                <div class="row">
                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Kategori</label>
                    <select class="form-select" name="category_id" required>
                      <option value="">-- Pilih Kategori --</option>
                      <?php
                      $qcat = mysqli_query($con, "SELECT * FROM facility_category ORDER BY name ASC");
                      while ($r = mysqli_fetch_assoc($qcat)) {
                          echo "<option value='{$r['id']}'>{$r['name']}</option>";
                      }
                      ?>
                    </select>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Nama Layanan</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter facility name" required>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="description" rows="2"></textarea>
                  </div>

                  <div class="col-lg-6 mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" step="0.01" class="form-control" name="unit_price" placeholder="0.00">
                  </div>

                  <div class="col-lg-12 text-end">
                    <button type="submit" name="save" class="btn btn-primary">Tambah Layanan</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<?php include "footer.php"; ?>
