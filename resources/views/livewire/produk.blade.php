<div>
    <div class="container">
        <!-- Navigation Menu -->
        <div class="row my-4">
            <div class="col-12">
                <div class="d-flex flex-wrap gap-3">
                    <button wire:click="pilihMenu('lihat')"
                        class="btn-navigation {{ $pilihanMenu=='lihat' ? 'btn-nav-active' : 'btn-nav-inactive' }}">
                        <span class="btn-icon">📦</span>
                        Semua Produk
                    </button>
                    <button wire:click="pilihMenu('tambah')"
                        class="btn-navigation {{ $pilihanMenu=='tambah' ? 'btn-nav-active' : 'btn-nav-inactive' }}">
                        <span class="btn-icon">➕</span>
                        Tambah Produk
                    </button>
                    <button wire:loading class="btn-loading">
                        <span class="spinner"></span>
                        Loading...
                    </button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <!-- Product List View -->
                @if ($pilihanMenu=='lihat')
                <div class="card-container slide-in">
                    <div class="card-header-custom">
                        <h5 class="card-title-custom">
                            <span class="title-icon">📋</span>
                            Daftar Produk
                        </h5>
                        <div class="search-box">
                            <input type="text" placeholder="Cari produk..." class="search-input">
                            <span class="search-icon">🔍</span>
                        </div>
                    </div>
                    <div class="table-container">
                        <table class="custom-table">
                            <thead>
                                <tr>
                                    <th width="60" class="text-center">No</th>
                                    <th>Kode</th>
                                    <th>Nama Produk</th>
                                    <th class="text-end">Harga</th>
                                    <th class="text-center">Stok</th>
                                    <th width="220" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($SemuaProduk as $produk)
                                <tr class="table-row">
                                    <td class="text-center serial-number">{{ $loop->iteration }}</td>
                                    <td>
                                        <span class="product-code">{{ $produk->kode }}</span>
                                    </td>
                                    <td class="product-name">
                                        <span class="product-icon">📦</span>
                                        {{ $produk->nama }}
                                    </td>
                                    <td class="text-end product-price">
                                        Rp {{ number_format($produk->harga, 0, ',', '.') }}
                                    </td>
                                    <td class="text-center">
                                        <span class="stock-badge {{ $produk->stok > 0 ? 'stock-available' : 'stock-empty' }}">
                                            {{ $produk->stok }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="action-buttons">
                                            <button wire:click="pilihEdit({{ $produk->id }})"
                                                class="btn-action btn-edit">
                                                <span class="action-icon">✏️</span>
                                                Edit
                                            </button>
                                            <button wire:click="pilihHapus({{ $produk->id }})"
                                                class="btn-action btn-delete">
                                                <span class="action-icon">🗑️</span>
                                                Hapus
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Add Product Form -->
                @elseif ($pilihanMenu=='tambah')
                <div class="card-container slide-in">
                    <div class="card-header-custom add-header">
                        <h5 class="card-title-custom">
                            <span class="title-icon">🆕</span>
                            Tambah Produk Baru
                        </h5>
                    </div>
                    <div class="form-container">
                        <form wire:submit.prevent='simpan' class="custom-form">
                            <div class="form-grid">
                                <div class="form-group">
                                    <label class="form-label-custom">Nama Produk</label>
                                    <div class="input-with-icon">
                                        <span class="input-icon">📦</span>
                                        <input type="text" class="form-input-custom" wire:model='nama' placeholder="Masukkan nama produk" />
                                    </div>
                                    @error('nama')
                                    <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label-custom">Kode Produk</label>
                                    <div class="input-with-icon">
                                        <span class="input-icon">🏷️</span>
                                        <input type="text" class="form-input-custom" wire:model='kode' placeholder="Masukkan kode produk" />
                                    </div>
                                    @error('kode')
                                    <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label-custom">Harga</label>
                                    <div class="input-with-icon">
                                        <span class="input-icon">💰</span>
                                        <input type="number" class="form-input-custom" wire:model='harga' placeholder="Masukkan harga" />
                                    </div>
                                    @error('harga')
                                    <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label-custom">Stok</label>
                                    <div class="input-with-icon">
                                        <span class="input-icon">📊</span>
                                        <input type="number" class="form-input-custom" wire:model='stok' placeholder="Masukkan jumlah stok" />
                                    </div>
                                    @error('stok')
                                    <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn-submit">
                                    <span class="btn-spin"></span>
                                    SIMPAN PRODUK
                                </button>
                                <button type="button" wire:click="pilihMenu('lihat')" class="btn-cancel">
                                    KEMBALI
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Edit Product Form -->
                @elseif ($pilihanMenu=='edit')
                <div class="card-container slide-in">
                    <div class="card-header-custom edit-header">
                        <h5 class="card-title-custom">
                            <span class="title-icon">✏️</span>
                            Edit Data Produk
                        </h5>
                    </div>
                    <div class="form-container">
                        <form wire:submit.prevent='simpanEdit' class="custom-form">
                            <div class="form-grid">
                                <div class="form-group">
                                    <label class="form-label-custom">Nama Produk</label>
                                    <div class="input-with-icon">
                                        <span class="input-icon">📦</span>
                                        <input type="text" class="form-input-custom" wire:model='nama' placeholder="Masukkan nama produk" />
                                    </div>
                                    @error('nama')
                                    <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label-custom">Kode Produk</label>
                                    <div class="input-with-icon">
                                        <span class="input-icon">🏷️</span>
                                        <input type="text" class="form-input-custom" wire:model='kode' placeholder="Masukkan kode produk" />
                                    </div>
                                    @error('kode')
                                    <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label-custom">Harga</label>
                                    <div class="input-with-icon">
                                        <span class="input-icon">💰</span>
                                        <input type="number" class="form-input-custom" wire:model='harga' placeholder="Masukkan harga" />
                                    </div>
                                    @error('harga')
                                    <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label-custom">Stok</label>
                                    <div class="input-with-icon">
                                        <span class="input-icon">📊</span>
                                        <input type="number" class="form-input-custom" wire:model='stok' placeholder="Masukkan jumlah stok" />
                                    </div>
                                    @error('stok')
                                    <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn-update">
                                    <span class="btn-spin"></span>
                                    UPDATE PRODUK
                                </button>
                                <button type="button" wire:click="pilihMenu('lihat')" class="btn-cancel">
                                    BATAL
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Delete Confirmation -->
                @elseif ($pilihanMenu=='hapus')
                <div class="card-container slide-in delete-card">
                    <div class="card-header-custom delete-header">
                        <h5 class="card-title-custom">
                            <span class="title-icon">⚠️</span>
                            Konfirmasi Hapus Produk
                        </h5>
                    </div>
                    <div class="delete-content">
                        <div class="warning-alert">
                            <span class="warning-icon">❗</span>
                            Apakah Anda yakin akan menghapus produk ini?
                        </div>
                        <div class="product-details">
                            <div class="detail-grid">
                                <div class="detail-item">
                                    <span class="detail-label">Kode:</span>
                                    <span class="detail-value product-code">{{ $produkTerpilih->kode }}</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">Nama:</span>
                                    <span class="detail-value">{{ $produkTerpilih->nama }}</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">Harga:</span>
                                    <span class="detail-value product-price">Rp {{ number_format($produkTerpilih->harga, 0, ',', '.') }}</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">Stok:</span>
                                    <span class="detail-value">
                                        <span class="stock-badge {{ $produkTerpilih->stok > 0 ? 'stock-available' : 'stock-empty' }}">
                                            {{ $produkTerpilih->stok }}
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="delete-actions">
                            <button class="btn-confirm-delete" wire:click='hapus'>
                                <span class="delete-icon">🗑️</span>
                                YA, HAPUS PRODUK
                            </button>
                            <button class="btn-cancel-delete" wire:click='batal'>
                                BATALKAN
                            </button>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <style>
        /* Animasi Keyframes */
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes glow {
            0% { box-shadow: 0 0 5px rgba(59, 130, 246, 0.5); }
            50% { box-shadow: 0 0 20px rgba(59, 130, 246, 0.8); }
            100% { box-shadow: 0 0 5px rgba(59, 130, 246, 0.5); }
        }

        @keyframes priceGlow {
            0% { text-shadow: 0 0 5px rgba(34, 197, 94, 0.5); }
            50% { text-shadow: 0 0 15px rgba(34, 197, 94, 0.8); }
            100% { text-shadow: 0 0 5px rgba(34, 197, 94, 0.5); }
        }

        /* Navigation Buttons */
        .btn-navigation {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 20px;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-nav-active {
            background: linear-gradient(135deg, #3b82f6, #1e40af);
            color: white;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.4);
            animation: glow 2s infinite;
        }

        .btn-nav-inactive {
            background: white;
            color: #3b82f6;
            border: 2px solid #3b82f6;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-nav-inactive:hover {
            background: #3b82f6;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
        }

        .btn-loading {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 20px;
            background: #6b7280;
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            cursor: wait;
        }

        .spinner {
            width: 16px;
            height: 16px;
            border: 2px solid transparent;
            border-top: 2px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        /* Card Container */
        .card-container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            animation: slideIn 0.5s ease-out;
        }

        .slide-in {
            animation: slideIn 0.5s ease-out;
        }

        /* Card Header */
        .card-header-custom {
            background: linear-gradient(135deg, #3b82f6, #1e40af);
            padding: 20px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .add-header {
            background: linear-gradient(135deg, #1900ffff, #0011ffff);
        }

        .edit-header {
            background: linear-gradient(135deg, #1900ffff, #1900ffff);
        }

        .delete-header {
            background: linear-gradient(135deg, #ef4444, #dc2626);
        }

        .card-title-custom {
            color: white;
            margin: 0;
            font-size: 1.25rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .title-icon {
            font-size: 1.5rem;
        }

        /* Search Box */
        .search-box {
            position: relative;
            width: 300px;
        }

        .search-input {
            width: 100%;
            padding: 10px 40px 10px 15px;
            border: none;
            border-radius: 25px;
            background: rgba(255, 255, 255, 0.9);
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            outline: none;
            background: white;
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.3);
        }

        .search-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6b7280;
        }

        /* Table Styles */
        .table-container {
            padding: 0;
        }

        .custom-table {
            width: 100%;
            border-collapse: collapse;
        }

        .custom-table thead {
            background: linear-gradient(135deg, #f8fafc, #e2e8f0);
        }

        .custom-table th {
            padding: 15px 12px;
            text-align: left;
            font-weight: 600;
            color: #374151;
            border-bottom: 2px solid #e5e7eb;
        }

        .table-row {
            transition: all 0.3s ease;
            border-bottom: 1px solid #f3f4f6;
        }

        .table-row:hover {
            background: #f8fafc;
            transform: scale(1.01);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .custom-table td {
            padding: 15px 12px;
            color: #4b5563;
        }

        .serial-number {
            font-weight: 600;
            color: #3b82f6;
        }

        .product-code {
            background: linear-gradient(135deg, #6b7280, #4b5563);
            color: white;
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            font-family: 'Courier New', monospace;
        }

        .product-name {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 500;
        }

        .product-icon {
            font-size: 1.2rem;
        }

        .product-price {
            font-weight: 700;
            color: #059669;
            font-size: 14px;
            animation: priceGlow 3s infinite;
        }

        /* Stock Badges */
        .stock-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            color: white;
        }

        .stock-available {
            background: linear-gradient(135deg, #107bb9ff, #059669);
        }

        .stock-empty {
            background: linear-gradient(135deg, #ef4444, #dc2626);
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 8px;
            justify-content: center;
        }

        .btn-action {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            border: none;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-edit {
            background: linear-gradient(135deg, #fbbf24, #f59e0b);
            color: white;
        }

        .btn-edit:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.4);
        }

        .btn-delete {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
        }

        .btn-delete:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.4);
        }

        /* Form Styles */
        .form-container {
            padding: 30px;
        }

        .custom-form {
            max-width: 100%;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-label-custom {
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .input-with-icon {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6b7280;
            font-size: 1.1rem;
        }

        .form-input-custom {
            width: 100%;
            padding: 12px 15px 12px 45px;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: white;
        }

        .form-input-custom:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            transform: translateY(-1px);
        }

        .error-message {
            color: #ef4444;
            font-size: 12px;
            margin-top: 5px;
            font-weight: 500;
        }

        /* Form Actions */
        .form-actions {
            display: flex;
            gap: 15px;
            justify-content: flex-start;
        }

        .btn-submit, .btn-update, .btn-confirm-delete {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-update {
            background: linear-gradient(135deg, #00ccffff, #00c3ffff);
        }

        .btn-confirm-delete {
            background: linear-gradient(135deg, #0084ffff, #00d9ffff);
        }

        .btn-submit:hover, .btn-update:hover, .btn-confirm-delete:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
            animation: pulse 0.5s ease-in-out;
        }

        .btn-cancel, .btn-cancel-delete {
            padding: 12px 24px;
            background: white;
            color: #6b7280;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-cancel:hover, .btn-cancel-delete:hover {
            background: #f8fafc;
            border-color: #d1d5db;
            transform: translateY(-2px);
        }

        /* Delete Confirmation */
        .delete-card {
            border: 2px solid #ef4444;
        }

        .delete-content {
            padding: 30px;
        }

        .warning-alert {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 20px;
            background: #fef3c7;
            border: 1px solid #0270ffff;
            border-radius: 10px;
            margin-bottom: 25px;
            font-weight: 600;
            color: #006effff;
        }

        .warning-icon {
            font-size: 1.5rem;
        }

        .product-details {
            background: #f8fafc;
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .detail-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .detail-label {
            font-weight: 600;
            color: #0062ffff;
            min-width: 80px;
        }

        .detail-value {
            color: #6b7280;
            font-weight: 500;
        }

        .delete-actions {
            display: flex;
            gap: 15px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
            
            .detail-grid {
                grid-template-columns: 1fr;
            }
            
            .form-actions, .delete-actions {
                flex-direction: column;
            }
            
            .card-header-custom {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
            
            .search-box {
                width: 100%;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .btn-navigation {
                flex: 1;
                min-width: 150px;
            }
        }
    </style>
</div>