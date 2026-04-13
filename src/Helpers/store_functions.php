<?php

function getProductStatus(int $stock): string {
    if ($stock <= 0) return 'Sold Out';
    if ($stock <= 10) return 'Restock Soon';
    return 'In Stock';
}

function formatCurrency(float $amount): string {
    return number_format($amount, 0, ',', '.') . ' VND';
}

function calculateTotalStock(array $products): int {
    return array_reduce($products, function ($total, $item) {
        return $total + $item['stock'];
    }, 0);
}

function getInStockItems(array $products): array {
    return array_values(array_filter($products, function ($item) {
        return $item['stock'] > 0;
    }));
}