
1. Создание таблицы товаров

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    quantity INT NOT NULL,
    added_date DATE NOT NULL,
    category ENUM('газированная вода', 'мясо', 'бакалея') NOT NULL
);

2. Найти все товары с ценой от 100 до 500
SELECT *
FROM products
WHERE price BETWEEN 100 AND 500;

3. Найти все товары, которые есть в наличии
SELECT *
FROM products
WHERE quantity > 0;

4. Найти все товары с ценой от 100 до 500, которые есть в наличии
SELECT *
FROM products
WHERE price BETWEEN 100 AND 500
AND quantity > 0;

5. Посчитать остаток каждого товара в рублях (цена × количество)
SELECT name, price * quantity AS total_value
FROM products;

6. Посчитать общий остаток всех товаров в рублях
SELECT SUM(price * quantity) AS total_stock_value
FROM products;

7. Найти самый дорогой товар
SELECT name, price
FROM products
ORDER BY price DESC
LIMIT 1;

8. Найти самый дорогой товар, который есть в наличии
SELECT name, price
FROM products
WHERE quantity > 0
ORDER BY price DESC
LIMIT 1;

9. Найти самый дорогой товар в категории "Мясо", который есть в наличии
SELECT name, price
FROM products
WHERE category = 'мясо'
AND quantity > 0
ORDER BY price DESC
LIMIT 1;

10. Найти самый дешёвый товар
SELECT name, price
FROM products
ORDER BY price ASC
LIMIT 1;

11. Найти среднюю цену товара
SELECT AVG(price) AS average_price
FROM products;

12. Посчитать общую сумму всех товаров (цена × количество)
SELECT SUM(price * quantity) AS total_sum
FROM products;

13. Найти самый дешёвый и самый дорогой товар в каждой категории
SELECT category,
MIN(price) AS min_price,
MAX(price) AS max_price
FROM products
GROUP BY category;

14. Посчитать количество товаров и остатки (в штуках и рублях) по каждой категории
SELECT category,
COUNT(*) AS product_count,
SUM(quantity) AS total_quantity,
SUM(price * quantity) AS total_value
FROM products
GROUP BY category;

15. Найти категорию с самым дорогим товаром
SELECT category
FROM products
ORDER BY price DESC
LIMIT 1;

16. Найти самую дорогую категорию (с самой большой средней ценой товара)
SELECT category,
AVG(price) AS avg_price
FROM products
GROUP BY category
ORDER BY avg_price DESC
LIMIT 1;

17. Найти категорию, в которую давно ничего не добавляли (с самой меньшей датой добавления)
SELECT category,
MIN(added_date) AS last_added_date
FROM products
GROUP BY category
ORDER BY last_added_date ASC
LIMIT 1;