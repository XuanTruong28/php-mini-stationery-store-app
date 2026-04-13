<?php
$products = require __DIR__ . '/../src/Data/products.php';
require __DIR__ . '/../src/Helpers/store_functions.php';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh mục sản phẩm</title>
    <style>
        body { font-family: sans-serif; background: #f8f9fa; padding: 20px; color: #333; }
        .container { max-width: 900px; margin: auto; }
        .nav-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; background: white; border-radius: 10px; overflow: hidden; }
        th, td { padding: 15px; text-align: left; border-bottom: 1px solid #edf2f7; }
        th { background: #f1f5f9; color: #475569; font-size: 0.9rem; }
        
        /* Badge trạng thái */
        .badge { padding: 4px 10px; border-radius: 6px; font-size: 0.8rem; font-weight: 600; }
        .status-InStock { background: #dcfce7; color: #166534; }
        .status-RestockSoon { background: #fef9c3; color: #854d0e; }
        .status-SoldOut { background: #fee2e2; color: #991b1b; }

        .btn-back { text-decoration: none; color: #3b82f6; font-size: 0.9rem; }
    </style>
</head>
<body>
    <div class="container">
        <div class="nav-header">
            <h1>Kho hàng chi tiết</h1>
            <a href="index.php" class="btn-back">← Quay lại Tổng quan</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Tồn kho</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $item): 
                    $status = getProductStatus($item['stock']);
                    // Xóa khoảng trắng để làm CSS class (ví dụ: "In Stock" -> "InStock")
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
</body>
</html>