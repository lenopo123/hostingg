<div>
    <div class="container">
        <!-- Navigation Menu -->
        <div class="row my-4">
            <div class="col-12">
                <div class="d-flex flex-wrap gap-3">
                    <button wire:click="pilihMenu('lihat')"
                        class="btn-navigation {{ $pilihanMenu=='lihat' ? 'btn-nav-active' : 'btn-nav-inactive' }}">
                        <span class="btn-icon">👥</span>
                        Semua Pengguna
                    </button>
                    <button wire:click="pilihMenu('tambah')"
                        class="btn-navigation {{ $pilihanMenu=='tambah' ? 'btn-nav-active' : 'btn-nav-inactive' }}">
                        <span class="btn-icon">➕</span>
                        Tambah Pengguna
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
                <!-- User List View -->
                @if ($pilihanMenu == 'lihat')
                <div class="card-container slide-in">
                    <div class="card-header-custom">
                        <h5 class="card-title-custom">
                            <span class="title-icon">📋</span>
                            Daftar Pengguna
                        </h5>
                        <div class="search-box">
                            <input type="text" placeholder="Cari pengguna..." class="search-input">
                            <span class="search-icon">🔍</span>
                        </div>
                    </div>
                    <div class="table-container">
                        <table class="custom-table">
                            <thead>
                                <tr>
                                    <th width="60" class="text-center">No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Peran</th>
                                    <th width="220" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($semuaPengguna as $pengguna)
                                <tr class="table-row">
                                    <td class="text-center serial-number">{{ $loop->iteration }}</td>
                                    <td class="user-name">
                                        <span class="avatar">👤</span>
                                        {{ $pengguna->name }}
                                    </td>
                                    <td class="user-email">{{ $pengguna->email }}</td>
                                    <td>
                                        <span class="role-badge {{ $pengguna->peran == 'admin' ? 'role-admin' : 'role-kasir' }}">
                                            {{ $pengguna->peran }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="action-buttons">
                                            <button wire:click="pilihEdit({{ $pengguna->id }})"
                                                class="btn-action btn-edit">
                                                <span class="action-icon">✏️</span>
                                                Edit
                                            </button>
                                            <button wire:click="pilihHapus({{ $pengguna->id }})"
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

                <!-- Add User Form -->
                @elseif ($pilihanMenu == 'tambah')
                <div class="card-container slide-in">
                    <div class="card-header-custom add-header">
                        <h5 class="card-title-custom">
                            <span class="title-icon">👤</span>
                            Tambah Pengguna Baru
                        </h5>
                    </div>
                    <div class="form-container">
                        <form wire:submit.prevent='simpan' class="custom-form">
                            <div class="form-grid">
                                <div class="form-group">
                                    <label class="form-label-custom">Nama Lengkap</label>
                                    <div class="input-with-icon">
                                        <span class="input-icon">👤</span>
                                        <input type="text" class="form-input-custom" wire:model='nama' placeholder="Masukkan nama lengkap" />
                                    </div>
                                    @error('nama')
                                    <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label-custom">Email</label>
                                    <div class="input-with-icon">
                                        <span class="input-icon">📧</span>
                                        <input type="email" class="form-input-custom" wire:model='email' placeholder="Masukkan alamat email" />
                                    </div>
                                    @error('email')
                                    <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label-custom">Password</label>
                                    <div class="input-with-icon">
                                        <span class="input-icon">🔒</span>
                                        <input type="password" class="form-input-custom" wire:model='password' placeholder="Masukkan password" />
                                    </div>
                                    @error('password')
                                    <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label-custom">Peran</label>
                                    <div class="input-with-icon">
                                        <span class="input-icon">🎭</span>
                                        <select class="form-input-custom" wire:model='peran'>
                                            <option value="">-- Pilih Peran --</option>
                                            <option value="kasir">Kasir</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                    @error('peran')
                                    <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn-submit">
                                    <span class="btn-spin"></span>
                                    SIMPAN PENGGUNA
                                </button>
                                <button type="button" wire:click="pilihMenu('lihat')" class="btn-cancel">
                                    KEMBALI
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Edit User Form -->
                @elseif ($pilihanMenu == 'edit')
                <div class="card-container slide-in">
                    <div class="card-header-custom edit-header">
                        <h5 class="card-title-custom">
                            <span class="title-icon">✏️</span>
                            Edit Data Pengguna
                        </h5>
                    </div>
                    <div class="form-container">
                        <form wire:submit.prevent='simpanEdit' class="custom-form">
                            <div class="form-grid">
                                <div class="form-group">
                                    <label class="form-label-custom">Nama Lengkap</label>
                                    <div class="input-with-icon">
                                        <span class="input-icon">👤</span>
                                        <input type="text" class="form-input-custom" wire:model='nama' placeholder="Masukkan nama lengkap" />
                                    </div>
                                    @error('nama')
                                    <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label-custom">Email</label>
                                    <div class="input-with-icon">
                                        <span class="input-icon">📧</span>
                                        <input type="email" class="form-input-custom" wire:model='email' placeholder="Masukkan alamat email" />
                                    </div>
                                    @error('email')
                                    <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label-custom">Password</label>
                                    <div class="input-with-icon">
                                        <span class="input-icon">🔒</span>
                                        <input type="password" class="form-input-custom" wire:model='password' placeholder="Kosongkan jika tidak diubah" />
                                    </div>
                                    @error('password')
                                    <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label-custom">Peran</label>
                                    <div class="input-with-icon">
                                        <span class="input-icon">🎭</span>
                                        <select class="form-input-custom" wire:model='peran'>
                                            <option value="">-- Pilih Peran --</option>
                                            <option value="kasir">Kasir</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                    @error('peran')
                                    <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn-update">
                                    <span class="btn-spin"></span>
                                    UPDATE PENGGUNA
                                </button>
                                <button type="button" wire:click='batal' class="btn-cancel">
                                    BATAL
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Delete Confirmation -->
                @elseif ($pilihanMenu == 'hapus')
                <div class="card-container slide-in delete-card">
                    <div class="card-header-custom delete-header">
                        <h5 class="card-title-custom">
                            <span class="title-icon">⚠️</span>
                            Konfirmasi Hapus Pengguna
                        </h5>
                    </div>
                    <div class="delete-content">
                        <div class="warning-alert">
                            <span class="warning-icon">❗</span>
                            Apakah Anda yakin akan menghapus pengguna ini?
                        </div>
                        <div class="user-details">
                            <div class="detail-item">
                                <span class="detail-label">Nama:</span>
                                <span class="detail-value">{{ $penggunaTerpilih->name }}</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Email:</span>
                                <span class="detail-value">{{ $penggunaTerpilih->email }}</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Peran:</span>
                                <span class="detail-value role-badge {{ $penggunaTerpilih->peran == 'admin' ? 'role-admin' : 'role-kasir' }}">
                                    {{ $penggunaTerpilih->peran }}
                                </span>
                            </div>
                        </div>
                        <div class="delete-actions">
                            <button class="btn-confirm-delete" wire:click='hapus'>
                                <span class="delete-icon">🗑️</span>
                                HAPUS PENGGUNA
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
            background: linear-gradient(135deg, #10b981, #059669);
        }

        .edit-header {
            background: linear-gradient(135deg, #f59e0b, #d97706);
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

        .user-name {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 500;
        }

        .avatar {
            font-size: 1.2rem;
        }

        .user-email {
            color: #6b7280;
        }

        /* Role Badges */
        .role-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .role-admin {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: white;
        }

        .role-kasir {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
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
            background: linear-gradient(135deg, #f59e0b, #d97706);
        }

        .btn-confirm-delete {
            background: linear-gradient(135deg, #ef4444, #dc2626);
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
            border: 1px solid #f59e0b;
            border-radius: 10px;
            margin-bottom: 25px;
            font-weight: 600;
            color: #92400e;
        }

        .warning-icon {
            font-size: 1.5rem;
        }

        .user-details {
            background: #f8fafc;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        .detail-item {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
        }

        .detail-label {
            font-weight: 600;
            color: #374151;
            min-width: 60px;
        }

        .detail-value {
            color: #6b7280;
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