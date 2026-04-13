<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stationery Management Dashboard</title>
    <style>
        body { font-family: 'Inter', system-ui, sans-serif; background: #27908e92; margin: 0; display: flex; justify-content: center; align-items: center; min-height: 100vh; }
        .card { background: white; padding: 80px; border-radius: 24px; box-shadow: 0 20px 40px rgba(0,0,0,0.05); width: 100%; max-width: 400px; text-align: center; }
        h1 { font-size: 1.8rem; color: #1e293b; margin-bottom: 30px; }
        
        .action-group { display: flex; flex-direction: column; gap: 15px; }
        .btn { 
            text-decoration: none; padding: 20px; border-radius: 12px; font-weight: 600; 
            font-size: 1rem; transition: 0.3s; display: flex; align-items: center; 
            justify-content: center; gap: 12px; border: none;
        }
        
        .btn-list { background: #ee0f0f; color: white; }
        .btn-list:hover { background: #9c0b0b; transform: scale(1.02); }
        
        .btn-stats { background: #10b981; color: white; }
        .btn-stats:hover { background: #095f42; transform: scale(1.02); }

        .icon { font-size: 1.2rem; }
    </style>
</head>
<body>
    <div class="card">
        <h1>Stationery Store</h1>
        
        <div class="action-group">
            <a href="products.php?view=list" class="btn btn-list">
                <span class="icon">📋 Danh sách chi tiết</span>
            </a>
            
            <a href="products.php?view=stats" class="btn btn-stats">
                <span class="icon">📊 Xem Thống kê</span>
            </a>
        </div>
    </div>
</body>
</html>     