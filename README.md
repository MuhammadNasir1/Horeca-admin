ALTER TABLE `products` ADD `brand` VARCHAR(255) NOT NULL AFTER `unit_quantity`;
ALTER TABLE `products` ADD `purchase_price` VARCHAR(255) NOT NULL AFTER `brand`;
