<?php
// Input data
$products = require __DIR__ . '/../src/Data/products.php';
require __DIR__ . '/../src/Helpers/store_functions.php';

$totalTypes = count($products);
$totalQuantity = calculateTotalStock($products);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stationery Management</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f4f7f9; margin: 0; display: flex; justify-content: center; align-items: center; min-height: 100vh; }
        .dashboard-card { background: white; padding: 40px; border-radius: 20px; box-shadow: 0 15px 35px rgba(0,0,0,0.1); width: 100%; max-width: 450px; text-align: center; }
        h1 { color: #2c3e50; margin-bottom: 5px; font-size: 1.8rem; }
        .subtitle { color: #7f8c8d; margin-bottom: 30px; font-size: 0.9rem; }
        
        /* Overview */
        .overview-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 30px; }
        .overview-item { background: #f8fafc; padding: 15px; border-radius: 12px; border: 1px solid #e2e8f0; }
        .overview-label { font-size: 0.8rem; color: #64748b; text-transform: uppercase; display: block; }
        .overview-value { font-size: 1.4rem; font-weight: bold; color: #1e293b; display: block; margin-top: 5px; }

        .btn-main { display: block; background: #3b82f6; color: white; text-decoration: none; padding: 18px; border-radius: 12px; font-weight: 600; transition: all 0.3s; }
        .btn-main:hover { background: #2563eb; transform: translateY(-2px); box-shadow: 0 5px 15px rgba(59, 130, 246, 0.4); }
    </style>
</head>
<body>
    <div class="dashboard-card">
        <h1>Stationery Store</h1>
        <p class="subtitle">Hệ thống quản lý kho nội bộ</p>
        
        <div class="overview-grid">
            <div class="overview-item">
                <span class="overview-label">Sản phẩm</span>
                <span class="overview-value"><?php echo $totalTypes; ?></span>
            </div>
            <div class="overview-item">
                <span class="overview-label">Tổng tồn kho</span>
                <span class="overview-value"><?php echo $totalQuantity; ?></span>
            </div>
        </div>

        <a href="products.php" class="btn-main">📦 Truy cập danh sách chi tiết</a>
    </div>
</body>
</html>