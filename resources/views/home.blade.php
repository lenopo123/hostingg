<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .dashboard-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            border: none;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }
        
        .dashboard-card:hover {
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        }
        
        .card-header {
            background-color: #4361ee;
            color: white;
            border-radius: 8px 8px 0 0 !important;
            padding: 15px 20px;
            font-weight: 600;
        }
        
        .card-body {
            padding: 20px;
        }
        
        .welcome-message {
            background: linear-gradient(135deg, #4361ee, #3a56d4);
            color: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .status-alert {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
            border-radius: 5px;
            padding: 12px 15px;
            margin-bottom: 15px;
        }
        
        .quick-stats {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        
        .stat-item {
            text-align: center;
            padding: 10px;
            flex: 1;
        }
        
        .stat-value {
            font-size: 24px;
            font-weight: bold;
            color: #4361ee;
        }
        
        .stat-label {
            font-size: 14px;
            color: #6c757d;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #4361ee;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            font-weight: bold;
        }
        
        @media (max-width: 768px) {
            .quick-stats {
                flex-direction: column;
            }
            
            .stat-item {
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <!-- Welcome Section -->
                <div class="welcome-message">
                    <div class="user-info">
                        <div class="user-avatar">JD</div>
                        <div>
                            <h5 class="mb-1">Hello, John!</h5>
                            <p class="mb-0">Welcome to your dashboard</p>
                        </div>
                    </div>
                </div>
                
                <!-- Main Dashboard Card -->
                <div class="dashboard-card">
                    <div class="card-header">
                        <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="status-alert">
                                <i class="fas fa-check-circle me-2"></i>
                                {{ session('status') }}
                            </div>
                        @endif

                        <p class="mb-4">You are successfully logged in to your account.</p>
                        
                        <!-- Quick Stats -->
                        <div class="quick-stats">
                            <div class="stat-item">
                                <div class="stat-value">12</div>
                                <div class="stat-label">Tasks</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">5</div>
                                <div class="stat-label">Messages</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">3</div>
                                <div class="stat-label">Projects</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Additional Info Card -->
                <div class="dashboard-card">
                    <div class="card-header">
                        <i class="fas fa-info-circle me-2"></i> Account Information
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Username:</strong> john_doe</p>
                                <p><strong>Email:</strong> john@example.com</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Member since:</strong> January 2023</p>
                                <p><strong>Last login:</strong> Today, 10:30 AM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js"></script>
</body>
</html>