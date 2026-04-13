<?php
$products = require __DIR__ . '/../src/Data/products.php';
require __DIR__ . '/../src/Helpers/store_functions.php';

$totalTypes = count($products);
$totalQuantity = calculateTotalStock($products);
$availableItems = getInStockItems($products);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Product List</title>
    <style>
        .product-card { border: 1px dashed #333; padding: 10px; margin: 10px 0; border-radius: 5px; }
        .status-sold-out { color: red; font-weight: bold; }
        .status-low { color: orange; }
    </style>
</head>
<body>
    <h1>Danh Sách Sản Phẩm</h1>

    <section>
        <h3>Thống kê kho hàng</h3>
        <p>Tổng số loại mặt hàng: <strong><?php echo $totalTypes; ?></strong></p>
        <p>Tổng số lượng tồn kho: <strong><?php echo $totalQuantity; ?></strong></p>
        <p>Sản phẩm hiện có sẵn: <strong><?php echo count($availableItems); ?></strong></p>
    </section>

    <hr>

    <?php foreach ($products as $item): ?>
        <div class="product-card">
            <p><strong>Sản phẩm:</strong> <?php echo strtoupper($item['name']); ?></p>
            <p>Thương hiệu: <?php echo $item['brand']; ?></p>
            <p>Giá: <?php echo formatCurrency($item['price']); ?></p>
            <p>Tồn kho: <?php echo $item['stock']; ?></p>
            <p>Trạng thái: <span><?php echo getProductStatus($item['stock']); ?></span></p>
        </div>
    <?php endforeach; ?>
</body>
</html>