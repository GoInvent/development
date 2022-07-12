<body>
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
							<h1 align="center">Pengiriman Barang</h1>
								<form class="" action="insertDB.php" method="post">
									<div class="form-floating mb-3">
										<input name="ProductID" class="form-control" id="getUID" placeholder=" " required disabled>
										<label for="getUID">ID Produk (Scan RFID to display ID)</label>
									</div>
									<div class="form-floating mb-3">
										<input type="text" name="ProductName" class="form-control" id="floatingInput" placeholder=" " required>
										<label for="floatingInput">Nama Barang</label>
									</div>
									
									<div class="form-floating mb-3">
										<input type="text" name="brand" class="form-control" id="floatingInput" placeholder=" " required>
										<label for="floatingInput">Brand</label>
									</div>
									
									<div class="form-floating mb-3">
										<input type="number" name="price" class="form-control" id="floatingInput" placeholder=" " required>
										<label for="floatingInput">Harga</label>
									</div>
									<div class="form-floating mb-3">
										<input type="number" name="quantity" class="form-control" id="floatingInput" placeholder=" " required>
										<label for="floatingInput">Stok</label>
									</div>
									
									<button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.js"></script>
</body>

</html>