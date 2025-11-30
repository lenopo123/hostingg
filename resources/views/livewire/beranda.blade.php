<div>
    <div class="container-fluid">
        <!-- Header -->
       
        </div>

        <!-- Widgets -->
        <div class="row">
            <!-- Kotak 1: Total User -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card widget-card widget-user shadow-lg h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <div class="widget-count text-primary">{{ $totalUser }}</div>
                                <div class="widget-title">Total User</div>
                                <div class="widget-subtitle">Pengguna Sistem</div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="widget-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                        </div>
                        <div class="widget-progress mt-3">
                            <div class="progress" style="height: 6px;">
                                <div class="progress-bar bg-primary" style="width: 85%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kotak 2: Total Produk -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card widget-card widget-product shadow-lg h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <div class="widget-count text-success">{{ $totalProduk }}</div>
                                <div class="widget-title">Total Produk</div>
                                <div class="widget-subtitle">Jenis Barang</div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="widget-icon">
                                    <i class="fas fa-boxes"></i>
                                </div>
                            </div>
                        </div>
                        <div class="widget-progress mt-3">
                            <div class="progress" style="height: 6px;">
                                <div class="progress-bar bg-success" style="width: 70%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kotak 3: Total Transaksi -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card widget-card widget-transaction shadow-lg h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <div class="widget-count text-warning">{{ $totalTransaksi }}</div>
                                <div class="widget-title">Total Transaksi</div>
                                <div class="widget-subtitle">Penjualan</div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="widget-icon">
                                    <i class="fas fa-shopping-cart"></i>
                                </div>
                            </div>
                        </div>
                        <div class="widget-progress mt-3">
                            <div class="progress" style="height: 6px;">
                                <div class="progress-bar bg-warning" style="width: 60%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kotak 4: Total Stok -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card widget-card widget-stock shadow-lg h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <div class="widget-count text-danger">{{ $totalStok }}</div>
                                <div class="widget-title">Total Stok</div>
                                <div class="widget-subtitle">Barang Tersedia</div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="widget-icon">
                                    <i class="fas fa-warehouse"></i>
                                </div>
                            </div>
                        </div>
                        <div class="widget-progress mt-3">
                            <div class="progress" style="height: 6px;">
                                <div class="progress-bar bg-danger" style="width: 90%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Area -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card welcome-card shadow-lg">
                    <div class="card-header bg-gradient-primary text-white">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-star me-2"></i>Selamat Datang di kasir sekolah
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="fs-6 mb-3">
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    Sistem ini digunakan untuk mengelola data user, produk, transaksi, dan laporan di SMK Plus Pelita Nusantara.
                                </p>
                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>