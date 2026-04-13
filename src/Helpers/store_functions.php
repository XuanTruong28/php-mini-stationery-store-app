<?php

/**
 * Phân loại trạng thái dựa trên số lượng tồn kho
 */
function getProductStatus(int $stock): string {
    if ($stock <= 0) {
        return 'Sold Out';
    } elseif ($stock <= 10) {
        return 'Restock Soon';
    }
    return 'In Stock';
}

/**
 * Tính tổng tất cả vật tư trong kho
 */
function calculateTotalStock(array $products): int {
    return array_reduce($products, function ($carry, $item) {
        return $carry + $item['stock'];
    }, 0);
}

/**
 * Lấy danh sách các mặt hàng còn hàng (stock > 0)
 */
function getInStockItems(array $products): array {
    return array_values(array_filter($products, function ($item) {
        return $item['stock'] > 0;
    }));
}