<div>
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">Laporan Transaksi</h4>
                            <a href="{{ url('/cetak') }}" target="_blank" class="btn btn-light btn-sm">
                                CETAK
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th width="60" class="text-center">No</th>
                                        <th>Tanggal</th>
                                        <th>No Invoice</th>
                                        <th class="text-end">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($semuaTransaksi as $transaksi)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ date('d/m/Y H:i', strtotime($transaksi->created_at)) }}</td>
                                        <td>{{ $transaksi->kode }}</td>
                                        <td class="text-end fw-semibold">
                                            Rp {{ number_format($transaksi->total, 2, ',', '.') }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                @if($semuaTransaksi->count() > 0)
                                <tfoot class="table-group-divider">
                                    <tr>
                                        <td colspan="3" class="text-end fw-bold">Total Keseluruhan:</td>
                                        <td class="text-end fw-bold text-primary">
                                            Rp {{ number_format($semuaTransaksi->sum('total'), 2, ',', '.') }}
                                        </td>
                                    </tr>
                                </tfoot>
                                @endif
                            </table>
                        </div>
                        
                        @if($semuaTransaksi->count() == 0)
                        <div class="text-center py-5">
                            <p class="text-muted">Tidak ada data transaksi</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Summary Cards -->
        <div class="row mt-3">
            <div class="col-md-4">
                <div class="card bg-light border-0">
                    <div class="card-body text-center">
                        <h5 class="text-primary">{{ $semuaTransaksi->count() }}</h5>
                        <p class="text-muted mb-0">Total Transaksi</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-light border-0">
                    <div class="card-body text-center">
                        <h5 class="text-success">Rp {{ number_format($semuaTransaksi->sum('total'), 0, ',', '.') }}</h5>
                        <p class="text-muted mb-0">Total Nilai</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-light border-0">
                    <div class="card-body text-center">
                        @php
                            $avg = $semuaTransaksi->count() > 0 ? $semuaTransaksi->sum('total') / $semuaTransaksi->count() : 0;
                        @endphp
                        <h5 class="text-info">Rp {{ number_format($avg, 0, ',', '.') }}</h5>
                        <p class="text-muted mb-0">Rata-rata</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>