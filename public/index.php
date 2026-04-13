<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stationery Store Management</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f0f2f5; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .main-card { background: white; padding: 40px; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); text-align: center; max-width: 500px; width: 90%; }
        h1 { color: #1a73e8; margin-bottom: 10px; }
        p { color: #5f6368; margin-bottom: 30px; }
        .btn-group { display: flex; flex-direction: column; gap: 15px; }
        .btn { text-decoration: none; padding: 15px 25px; border-radius: 8px; font-weight: 600; transition: 0.3s; border: none; cursor: pointer; }
        .btn-primary { background: #1a73e8; color: white; }
        .btn-primary:hover { background: #1557b0; transform: translateY(-2px); }
        .btn-secondary { background: #e8f0fe; color: #1a73e8; }
        .btn-secondary:hover { background: #d2e3fc; }
        .footer { margin-top: 30px; font-size: 0.8em; color: #9aa0a6; }
    </style>
</head>
<body>
    <div class="main-card">
        <h1>Stationery Store</h1>
        <p>Hệ thống quản lý vật tư văn phòng phẩm - Phiên bản Lab Week 1</p>
        
        <div class="btn-group">
            <a href="products.php" class="btn btn-primary">📦 Quản lý Kho hàng</a>
            <a href="#" class="btn btn-secondary">📊 Báo cáo Doanh thu (Sắp có)</a>
            <a href="#" class="btn btn-secondary">👤 Quản lý Nhân viên</a>
        </div>

        <div class="footer">
            HCMUS - Data Science Course Project
        </div>
    </div>
</body>
</html>