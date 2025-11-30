<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #fff;
        }
        
        @media print {
            body {
                margin: 0;
                padding: 0;
            }
            
            .no-print {
                display: none !important;
            }
            
            .card {
                border: none !important;
                box-shadow: none !important;
            }
        }
        
        .card {
            border: 1px solid #dee2e6;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
        
        .card-title {
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        
        .table th {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px 8px;
        }
        
        .table td {
            padding: 10px 8px;
            border-color: #dee2e6;
        }
        
        .table tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        
        .table tbody tr:hover {
            background-color: #e9f7fe;
        }
        
        .total-row {
            font-weight: bold;
            background-color: #e8f5e9 !important;
        }
        
        .btn-print {
            background-color: #3498db;
            border-color: #3498db;
            color: white;
        }
        
        .btn-print:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }
        
        .header-info {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body onload="window.print()">
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <!-- Header Information -->
                <div class="header-info">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="mb-1">Laporan Transaksi</h5>
                            <p class="mb-0 text-muted">Periode: {{ date('d F Y') }}</p>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <p class="mb-0"><strong>Dicetak pada:</strong> {{ date('d/m/Y H:i') }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="card border-primary">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="20%">Tanggal</th>
                                        <th width="25%">No Invoice</th>
                                        <th width="25%">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $grandTotal = 0;
                                    @endphp
                                    
                                    @foreach ($semuaTransaksi as $transaksi)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ date('d/m/Y H:i', strtotime($transaksi->created_at)) }}</td>
                                        <td>{{ $transaksi->kode }}</td>
                                        <td>Rp {{ number_format($transaksi->total, 2, ',', '.') }}</td>
                                    </tr>
                                    @php
                                        $grandTotal += $transaksi->total;
                                    @endphp
                                    @endforeach
                                    
                                    <!-- Grand Total Row -->
                                    <tr class="total-row">
                                        <td colspan="3" class="text-end"><strong>Total Keseluruhan:</strong></td>
                                        <td><strong>Rp {{ number_format($grandTotal, 2, ',', '.') }}</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- Footer Information -->
                <div class="mt-3 text-center text-muted">
                    <small>Dokumen ini dicetak secara otomatis dari sistem</small>
                </div>
            </div>
        </div>
        
        <!-- Print Button (Hidden when printing) -->
        <div class="row mt-3 no-print">
            <div class="col-12 text-center">
                <button class="btn btn-print" onclick="window.print()">
                    Cetak Laporan
                </button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</body>
</html>