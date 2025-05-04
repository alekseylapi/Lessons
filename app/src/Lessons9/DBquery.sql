--1. Создание таблицы товаров

CREATE TABLE products
(
    id         INT AUTO_INCREMENT PRIMARY KEY,
    name       VARCHAR(255)   NOT NULL,
    price      DECIMAL(10, 2) NOT NULL,
    quantity   INT            NOT NULL,
    added_date DATETIME       NOT NULL,
    category   VARCHAR(255)   NOT NULL
);

-- 2. Найти все товары с ценой от 100 до 500
SELECT *
FROM products
WHERE price BETWEEN 100 AND 500;

--3. Найти все товары, которые есть в наличии
SELECT *
FROM products
WHERE quantity > 0;

--4. Найти все товары с ценой от 100 до 500, которые есть в наличии
SELECT *
FROM products
WHERE price BETWEEN 100 AND 500
  AND quantity > 0;

--5. Посчитать остаток каждого товара в рублях (цена × количество)
SELECT name, price * quantity AS total_value
FROM products;

--6. Посчитать общий остаток всех товаров в рублях
SELECT SUM(price * quantity) AS total_stock_value
FROM products;

--7. Найти самый дорогой товар
SELECT name, price
FROM products
ORDER BY price DESC LIMIT 1;

--8. Найти самый дорогой товар, который есть в наличии
SELECT name, price
FROM products
WHERE quantity > 0
ORDER BY price DESC LIMIT 1;

--9. Найти самый дорогой товар в категории "Мясо", который есть в наличии
SELECT name, price
FROM products
WHERE category = 'мясо'
  AND quantity > 0
ORDER BY price DESC LIMIT 1;

--10. Найти самый дешёвый товар
SELECT name, price
FROM products
ORDER BY price ASC LIMIT 1;

--11. Найти среднюю цену товара
SELECT AVG(price) AS average_price
FROM products;

--12. Посчитать общую сумму всех товаров (цена × количество)
SELECT SUM(price * quantity) AS total_sum
FROM products;

--13. Найти самый дешёвый и самый дорогой товар в каждой категории
SELECT category,
       MIN(price) AS min_price,
       MAX(price) AS max_price
FROM products
GROUP BY category;

--14. Посчитать количество товаров и остатки (в штуках и рублях) по каждой категории
SELECT category,
       COUNT(*)              AS product_count,
       SUM(quantity)         AS total_quantity,
       SUM(price * quantity) AS total_value
FROM products
GROUP BY category;

--15. Найти категорию с самым дорогим товаром
SELECT category
FROM products
ORDER BY price DESC LIMIT 1;

--16. Найти самую дорогую категорию (с самой большой средней ценой товара)
SELECT category,
       AVG(price) AS avg_price
FROM products
GROUP BY category
ORDER BY avg_price DESC LIMIT 1;

--17. Найти категорию, в которую давно ничего не добавляли (с самой меньшей датой добавления)
SELECT category,
       MAX(added_date) AS last_added_date
FROM products
GROUP BY category
ORDER BY last_added_date ASC LIMIT 1;

--18 в таблице товаров для каджого товара найти количество других товаров, которые дороже
SELECT p1.id,
       p1.name,
       p1.price,
       COUNT(p2.id) AS more_expensive_count
FROM products AS p1
         LEFT JOIN products AS p2
                   ON p2.price > p1.price
GROUP BY p1.id,
         p1.name,
         p1.price
ORDER BY p1.id;


-- создание таблицы связанной
CREATE TABLE categories
(
    id   INT PRIMARY KEY,
    name VARCHAR(255)
);

-- Пример заполнения категорий
INSERT INTO categories (id, name)
VALUES (1, 'газированная вода'),
       (2, 'мясо'),
       (3, 'бакалея');

-- join
-- 9)Найти самый дорогой товар в категории "мясо", который есть в наличии:
SELECT p.name,
       p.price,
       p.quantity,
       c.name AS category_name
FROM products p
         JOIN
     categories c ON p.category_id = c.id
WHERE c.name = 'мясо'
  AND p.quantity > 0
ORDER BY p.price DESC LIMIT 1;

--13) Найти самый дешёвый и самый дорогой товар в каждой категории:
SELECT c.name       AS category_name,
       MIN(p.price) AS min_price,
       MAX(p.price) AS max_price
FROM products p
         JOIN
     categories c ON p.category_id = c.id
GROUP BY c.name;
-- 14)Посчитать количество товаров и остатки (в штуках и рублях) по каждой категории:
SELECT c.name                    AS category_name,
       COUNT(p.id)               AS total_products,
       SUM(p.quantity)           AS total_quantity,
       SUM(p.price * p.quantity) AS total_value
FROM categories c
         LEFT JOIN products p
                   ON p.category_id = c.id
GROUP BY c.name
ORDER BY c.name;


-- 15) Посчитать количество товаров и остатки (в штуках и рублях) по каждой категории:
SELECT c.name                    AS category_name,
       COUNT(p.id)               AS total_products,
       SUM(p.quantity)           AS total_quantity,
       SUM(p.price * p.quantity) AS total_value_in_rubles
FROM products p
         JOIN
     categories c ON p.category_id = c.id
GROUP BY c.name;

--15) Найти категорию с самым дорогим товаром:
SELECT c.name       AS category_name,
       MAX(p.price) AS max_price
FROM products p
         JOIN
     categories c ON p.category_id = c.id
GROUP BY c.name
ORDER BY max_price DESC LIMIT 1;

-- 16)найти самую дорогую категорию (с самой большой средней ценой товара)
SELECT c.id,
       c.name,
       AVG(p.price) AS avg_price
FROM categories AS c
         JOIN products AS p
              ON p.category_id = c.id
GROUP BY c.id,
         c.name
ORDER BY avg_price DESC LIMIT 1;

-- 17) найти категорию в которую давно ничего не добавляли (с самой меньшей датой добавления)
SELECT c.id,
       c.name,
       MAX(p.added_date) AS last_added_date
FROM categories AS c
         LEFT JOIN products AS p
                   ON p.category_id = c.id
GROUP BY c.id,
         c.name
ORDER BY last_added_date ASC LIMIT 1;


-- Добавление товаров категории "газированная вода"
INSERT INTO products (name, price, quantity, added_date, category)
VALUES ('Coca-Cola', 120.50, 50, '2023-01-10', 'газированная вода'),
       ('Sprite', 110.00, 30, '2023-01-15', 'газированная вода'),
       ('Fanta', 115.75, 40, '2023-02-05', 'газированная вода'),
       ('Pepsi', 125.00, 60, '2023-02-20', 'газированная вода');

-- Добавление товаров категории "мясо"
INSERT INTO products (name, price, quantity, added_date, category)
VALUES ('Говядина', 450.00, 100, '2023-03-01', 'мясо'),
       ('Свинина', 380.00, 120, '2023-03-10', 'мясо'),
       ('Курица', 250.00, 200, '2023-03-15', 'мясо'),
       ('Баранина', 500.00, 80, '2023-03-25', 'мясо'),
       ('Индейка', 300.00, 90, '2023-04-05', 'мясо');

-- Добавление товаров категории "бакалея"
INSERT INTO products (name, price, quantity, added_date, category)
VALUES ('Макароны Barilla', 80.00, 300, '2023-04-10', 'бакалея'),
       ('Рис Uncle Ben\'s', 100.00, 250, '2023-04-15', 'бакалея'),
('Сахар', 60.00, 400, '2023-04-20', 'бакалея'),
('Мука пшеничная', 70.00, 350, '2023-05-01', 'бакалея'),
('Чай Ahmad', 200.00, 150, '2023-05-10', 'бакалея'),
('Кофе Lavazza', 500.00, 100, '2023-05-15', 'бакалея'),
('Оливковое масло', 350.00, 80, '2023-05-20', 'бакалея'),
('Соль', 30.00, 500, '2023-06-01', 'бакалея'),
('Хлебцы', 90.00, 200, '2023-06-10', 'бакалея'),
('Крупа гречневая', 120.00, 220, '2023-06-15', 'бакалея');


