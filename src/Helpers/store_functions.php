<?php

/**
 * Phan loai ton kho
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
 * Tinh tong
 */
function calculateTotalStock(array $products): int {
    return array_reduce($products, function ($carry, $item) {
        return $carry + $item['stock'];
    }, 0);
}

/**
 * Danh sach hang con
 */
function getInStockItems(array $products): array {
    return array_values(array_filter($products, function ($item) {
        return $item['stock'] > 0;
    }));
}
