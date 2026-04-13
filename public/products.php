<?php
$products = require __DIR__ . '/../src/Data/products.php';
require __DIR__ . '/../src/Helpers/store_functions.php';

// Lấy chế độ xem từ URL (mặc định là 'list' nếu không có)
$view = $_GET['view'] ?? 'list';

$totalTypes = count($products);
$totalQuantity = calculateTotalStock($products);
$availableItems = count(getInStockItems($products));
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title><?php echo ($view == 'stats') ? 'Thống kê' : 'Danh sách'; ?> Kho hàng</title>
    <style>
        body { font-family: 'Inter', sans-serif; background: #f8f9fa; color: #333; padding: 20px; }
        .container { max-width: 900px; margin: auto; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
        .btn-back { text-decoration: none; color: #64748b; font-size: 0.9rem; font-weight: 500; }
        
        /* CSS cho Thống kê */
        .stats-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
        .stat-card { background: white; padding: 30px; border-radius: 15px; text-align: center; box-shadow: 0 4px 10px rgba(0,0,0,0.05); }
        .stat-card h3 { font-size: 0.8rem; color: #94a3b8; text-transform: uppercase; margin: 0; }
        .stat-card p { font-size: 2rem; font-weight: 800; color: #1e293b; margin: 10px 0 0; }

        /* CSS cho Bảng danh sách */
        .table-container { background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.05); }
        table { width: 100%; border-collapse: collapse; }
        th { background: #f1f5f9; padding: 15px; text-align: left; font-size: 0.85rem; }
        td { padding: 15px; border-bottom: 1px solid #f1f5f9; }
        .badge { padding: 4px 10px; border-radius: 6px; font-size: 0.75rem; font-weight: 700; }
        .status-InStock { background: #dcfce7; color: #15803d; }
        .status-RestockSoon { background: #fef9c3; color: #a16207; }
        .status-SoldOut { background: #fee2e2; color: #b91c1c; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><?php echo ($view == 'stats') ? '📊 Thống kê kho' : '📋 Danh sách hàng'; ?></h1>
            <a href="index.php" class="btn-back">← Quay lại trang chủ</a>
        </div>

        <?php if ($view == 'stats'): ?>
            <div class="stats-grid">
                <div class="stat-card">
                    <h3>Loại sản phẩm</h3>
                    <p><?php echo $totalTypes; ?></p>
                </div>
                <div class="stat-card">
                    <h3>Tổng tồn kho</h3>
                    <p><?php echo $totalQuantity; ?></p>
                </div>
                <div class="stat-card">
                    <h3>Hiện có sẵn</h3>
                    <p><?php echo $availableItems; ?></p>
                </div>
            </div>

        <?php else: ?>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Giá bán</th>
                            <th>Tồn kho</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $item): 
                            $status = getProductStatus($item['stock']);
                            $statusClass = str_replace(' ', '', $status);
                        ?>
                        <tr>
                            <td><strong><?php echo $item['name']; ?></strong><br><small><?php echo $item['brand']; ?></small></td>
                            <td><?php echo number_format($item['price'], 0, ',', '.'); ?>đ</td>
                            <td><?php echo $item['stock']; ?></td>
                            <td><span class="badge status-<?php echo $statusClass; ?>"><?php echo $status; ?></span></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>