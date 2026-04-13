<?php
$products = require __DIR__ . '/../src/Data/products.php';
require __DIR__ . '/../src/Helpers/store_functions.php';

// Tính toán số liệu thống kê
$stats = [
    'total_types' => count($products),
    'total_items' => calculateTotalStock($products),
    'available' => count(getInStockItems($products))
];
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh mục sản phẩm</title>
    <style>
        body { font-family: sans-serif; background: #f8f9fa; color: #333; padding: 30px; }
        .container { max-width: 1100px; margin: auto; }
        .header-flex { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
        
        /* 1. Khu vực thống kê tổng quan */
        .stats-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 30px; }
        .stat-card { background: white; padding: 20px; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); text-align: center; border-top: 4px solid #1a73e8; }
        .stat-card h3 { font-size: 0.9em; color: #70757a; margin: 0; text-transform: uppercase; }
        .stat-card p { font-size: 2em; font-weight: bold; margin: 10px 0 0; color: #202124; }

        /* 2. Trang danh sách dữ liệu */
        table { width: 100%; border-collapse: collapse; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        th { background: #f1f3f4; padding: 18px; text-align: left; color: #5f6368; }
        td { padding: 18px; border-bottom: 1px solid #f1f3f4; }
        tr:last-child td { border: none; }
        tr:hover { background: #f8f9fa; }

        /* 3. Phân loại trạng thái */
        .badge { padding: 6px 12px; border-radius: 50px; font-size: 0.85em; font-weight: 500; }
        .status-instock { background: #e6f4ea; color: #1e8e3e; }
        .status-low { background: #fef7e0; color: #f9ab00; }
        .status-soldout { background: #fce8e6; color: #d93025; }

        .back-link { text-decoration: none; color: #1a73e8; font-weight: 500; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header-flex">
            <h1>Kho Vật Tư</h1>
            <a href="index.php" class="back-link">← Quay về Dashboard</a>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <h3>Loại sản phẩm</h3>
                <p><?php echo $stats['total_types']; ?></p>
            </div>
            <div class="stat-card" style="border-top-color: #34a853;">
                <h3>Tổng tồn kho</h3>
                <p><?php echo $stats['total_items']; ?></p>
            </div>
            <div class="stat-card" style="border-top-color: #fbbc05;">
                <h3>Hiện còn hàng</h3>
                <p><?php echo $stats['available']; ?></p>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Danh mục</th>
                    <th>Giá bán</th>
                    <th>Số lượng</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $item): 
                    $status = getProductStatus($item['stock']);
                    $class = ($status == 'In Stock') ? 'status-instock' : (($status == 'Sold Out') ? 'status-soldout' : 'status-low');
                ?>
                <tr>
                    <td>
                        <strong><?php echo $item['name']; ?></strong><br>
                        <small style="color: #80868b;"><?php echo $item['brand']; ?></small>
                    </td>
                    <td><?php echo $item['category']; ?></td>
                    <td><?php echo number_format($item['price'], 0, ',', '.'); ?>đ</td>
                    <td><?php echo $item['stock']; ?></td>
                    <td><span class="badge <?php echo $class; ?>"><?php echo $status; ?></span></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>