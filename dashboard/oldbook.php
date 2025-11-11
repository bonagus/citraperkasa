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
                    <h4 class="mb-sm-0">Booking Proses</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">All</a></li>
                            <li class="breadcrumb-item active">Booking Proses</li>
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
                        <h5 class="card-title mb-0">Data Konfirmasi</h5>
                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                            <thead>
                                <tr>
                                    <th data-ordering="false">Kode Booking</th>
                                    <th>Nama Pemesan</th>
                                    <th>Destinasi</th>
                                    <th>Tanggal</th>
                                    <th>Peserta</th>
                                    <th>Harga Estimasi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $q="SELECT b.id AS booking_id, b.booking_code, b.name AS customer_name, b.phone AS customer_phone, b.travel_date, b.pax, b.estimated_price, b.status, d.dest_title AS destination_name FROM booking b LEFT JOIN destination d ON b.destination_id = d.id WHERE b.status='followup' ORDER BY b.id DESC;";
                                    $r123 = mysqli_query($con,$q);
                                    while($ro = mysqli_fetch_array($r123))
                                        {
                                            $id="$ro[booking_id]";
                                            $booking_code="$ro[booking_code]";
                                            $destination_name="$ro[destination_name]";
                                            $booking_name="$ro[customer_name]";
                                            $pax="$ro[pax]";
                                            $booking_price=number_format($ro["estimated_price"], 0, ',', '.');
                                            $datetime = $ro["travel_date"];
                                            $travel_date = date("d M Y", strtotime($datetime));
                                            print "<tr>
                                                    <td>
                                                        $booking_code
                                                    </td>
                                                    <td>
                                                        $booking_name
                                                    </td>
                                                    <td>
                                                        $destination_name
                                                    </td>
                                                    <td>
                                                        $travel_date
                                                    </td>
                                                    <td>
                                                        $pax
                                                    </td>
                                                    <td>$booking_price
                                                    </td>
                                            <td>
                                                <div class='dropdown d-inline-block'>
                                                    <button class='btn btn-soft-secondary btn-sm dropdown' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                                        <i class='ri-more-fill align-middle'></i>
                                                    </button>
                                                    <ul class='dropdown-menu dropdown-menu-end'>

                                                        <li>
                                                            <a href='editbooking.php?id=$id' class='dropdown-item edit-item-btn'><i class='ri-pencil-fill align-bottom me-2 text-muted'></i> Edit</a>
                                                        </li>
                                                        <li>
                                                            <a href='followup.php?id=$id' class='dropdown-item edit-item-btn'><i class='ri-phone-fill align-bottom me-2 text-muted'></i> Follow Up</a>
                                                        </li>
                                                        <li>
                                                            <a href='deletebooking.php?id=$id' class='dropdown-item remove-item-btn'>
                                                                <i class='ri-delete-bin-fill align-bottom me-2 text-muted'></i> Delete
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                            </tr>";
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