<div> 
    {{-- Container Utama (Root Element) --}}
    <div class="container py-4">
        
        {{-- Tombol Kontrol & Loading --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="col-6">
                @if(!$transaksiAktif)
                    <button class="btn btn-lg btn-primary shadow-lg zoom-effect" wire:click='transaksiBaru'>
                        <i class="fas fa-cart-plus me-2"></i> Mulai Transaksi Baru
                    </button>
                @else
                    <button class="btn btn-lg btn-danger shadow-lg hover-shake" wire:click='batalTransaksi'>
                        <i class="fas fa-ban me-2"></i> Batalkan Transaksi
                    </button>
                @endif
            </div>
            <div class="col-6 text-end">
                {{-- Perubahan di sini: Menggunakan badge/box untuk loading --}}
                <span class="badge bg-primary text-dark px-3 py-2 fw-bold animate__animated animate__pulse animate__infinite" wire:loading>
                    <i class="fas fa-sync-alt fa-spin me-2"></i> Loading
                </span>
            </div>
        </div>

        {{-- Area Transaksi Aktif --}}
        @if($transaksiAktif)
        <div class="row g-4 animate__animated animate__fadeIn">
            
            {{-- KIRI: Detail & Keranjang --}}
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-receipt me-2"></i> Detail Penjualan</h5>
                        <div class="input-group input-group-sm" style="max-width: 150px;">
                            <input type="text" class="form-control" placeholder="No. Invoice" wire:model.live='kode'>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="text-primary mb-3">Invoice: {{ $transaksiAktif->kode }}</h6>

                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-middle mb-0">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th><i class="fas fa-cube"></i> Barang</th>
                                        <th class="text-center"><i class="fas fa-boxes"></i> Qty</th>
                                        <th class="text-end"><i class="fas fa-calculator"></i> Subtotal</th>
                                        <th class="text-center"><i class="fas fa-trash-alt"></i> Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($semuaProduk as $produk)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $produk->produk->nama ?? 'PRODUK NULL' }}</td>
                                        <td class="text-center">
                                            <span class="badge rounded-pill bg-primary">{{ $produk->jumlah }}</span>
                                        </td>
                                        <td class="text-end fw-bold">Rp. {{ number_format($produk->produk->harga * $produk->jumlah, 0, ',', '.') }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-outline-danger" wire:click='hapusProduk({{ $produk->id }})'>
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted py-4">
                                            <i class="fas fa-box-open fa-2x mb-2 d-block"></i>
                                            Keranjang Belanja Kosong. Silakan tambahkan produk.
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- KANAN: Total & Pembayaran --}}
            <div class="col-lg-4">
                
                {{-- Total Belanja --}}
                <div class="card mb-3 bg-success text-white shadow-lg">
                    <div class="card-body">
                        <h4 class="card-title"><i class="fas fa-money-bill-wave me-2"></i> TOTAL BELANJA</h4>
                        <div class="d-flex justify-content-between align-items-baseline">
                            <span class="fs-4">Rp.</span>
                            <span class="fs-2 fw-bold animated-price">{{ number_format($totalSemuaBelanja, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>

                {{-- Uang Dibayar --}}
                <div class="card mb-3 border-warning shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-warning"><i class="fas fa-wallet me-2"></i> Uang Dibayar</h5>
                        <input type="number" class="form-control form-control-lg text-end fw-bold focus-ring" placeholder="Masukkan Jumlah Bayar" wire:model.live='bayar'>
                    </div>
                </div>

                {{-- Kembalian --}}
                <div class="card mb-3 border-info shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-info"><i class="fas fa-exchange-alt me-2"></i> Kembalian</h5>
                        <div class="d-flex justify-content-between align-items-baseline">
                            <span class="fs-4">Rp.</span>
                            <span class="fs-2 fw-bold text-info animated-price">{{ number_format($kembalian, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>

                {{-- Tombol Selesaikan / Status --}}
                @if($bayar)
                    @if ($kembalian < 0)
                        <div class="alert alert-danger text-center shadow-lg animate__animated animate__headShake" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i> UANG KURANG! (Rp. {{ number_format(abs($kembalian), 0, ',', '.') }})
                        </div>
                    @else
                        <button class="btn btn-success btn-lg mt-2 w-100 btn-glow" wire:click='transaksiSelesai'>
                            <i class="fas fa-check-circle me-2"></i> SELESAIKAN TRANSAKSI
                        </button>
                    @endif
                @else
                    <div class="alert alert-light text-center border mt-2">
                        <i class="fas fa-info-circle me-2"></i> Masukkan jumlah bayar untuk melanjutkan.
                    </div>
                @endif
            </div>
        </div>
        @endif
    </div>

    {{-- CSS KUSTOM (Harus tetap di dalam root element) --}}
    <style>
        .zoom-effect:hover { transform: scale(1.05); transition: transform 0.3s ease; }
        .hover-shake:hover { animation: shake 0.5s; animation-iteration-count: infinite; }
        @keyframes shake {
            0% { transform: translate(1px, 1px) rotate(0deg); } 10% { transform: translate(-1px, -2px) rotate(-1deg); } 20% { transform: translate(-3px, 0px) rotate(1deg); } 30% { transform: translate(3px, 2px) rotate(0deg); } 40% { transform: translate(1px, -1px) rotate(1deg); } 50% { transform: translate(-1px, 2px) rotate(-1deg); } 60% { transform: translate(-3px, 1px) rotate(0deg); } 70% { transform: translate(3px, 1px) rotate(-1deg); } 80% { transform: translate(-1px, -1px) rotate(1deg); } 90% { transform: translate(1px, 2px) rotate(0deg); } 100% { transform: translate(1px, -2px) rotate(-1deg); }
        }
        .btn-glow { transition: all 0.3s ease-in-out; }
        .btn-glow:hover { box-shadow: 0 0 15px rgba(40, 167, 69, 0.8); }
        .focus-ring:focus { border-color: #ffc107 !important; box-shadow: 0 0 0 0.25rem rgba(255, 193, 7, 0.5) !important; }
        .animated-price { transition: color 0.3s ease, transform 0.3s ease; }
        /* Tambahkan Animate.css CDN di layout utama Anda */
    </style>
</div>