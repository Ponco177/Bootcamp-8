-- =====================================
-- MEMBUAT DATABASE
-- =====================================

CREATE DATABASE IF NOT EXISTS ecommerce;

USE ecommerce;


-- =====================================
-- TABEL PRODUCTS
-- =====================================

CREATE TABLE IF NOT EXISTS products (

    id INT AUTO_INCREMENT PRIMARY KEY,

    nama_produk VARCHAR(100) NOT NULL,

    harga INT NOT NULL,

    deskripsi TEXT,

    stok INT NOT NULL

);


-- =====================================
-- TABEL USERS
-- =====================================

CREATE TABLE IF NOT EXISTS users (

    id INT AUTO_INCREMENT PRIMARY KEY,

    nama VARCHAR(100) NOT NULL,

    email VARCHAR(100) NOT NULL,

    password VARCHAR(100) NOT NULL

);


-- =====================================
-- TABEL ORDERS
-- =====================================

CREATE TABLE IF NOT EXISTS orders (

    order_id INT AUTO_INCREMENT PRIMARY KEY,

    user_id INT,

    product_id INT,

    quantity INT NOT NULL,

    total INT NOT NULL,

    FOREIGN KEY (user_id) REFERENCES users(id),

    FOREIGN KEY (product_id) REFERENCES products(id)

);


-- =====================================
-- DATA PRODUCTS (15 PRODUK)
-- =====================================

INSERT INTO products
(nama_produk, harga, deskripsi, stok)

VALUES

(
    'iPhone 15 Pro',
    18000000,
    'Smartphone premium dengan kamera canggih',
    10
),

(
    'Samsung Galaxy S24',
    15500000,
    'HP flagship performa tinggi',
    8
),

(
    'Laptop ASUS ROG',
    22000000,
    'Laptop gaming RTX terbaru',
    5
),

(
    'MacBook Air M2',
    17000000,
    'Laptop tipis dan ringan',
    6
),

(
    'Headset Gaming RGB',
    450000,
    'Headset gaming suara jernih',
    20
),

(
    'Keyboard Mechanical',
    850000,
    'Keyboard RGB switch blue',
    15
),

(
    'Mouse Wireless',
    250000,
    'Mouse wireless nyaman digunakan',
    18
),

(
    'Smartwatch Ultra',
    2100000,
    'Jam tangan pintar modern',
    12
),

(
    'Kaos Oversize',
    120000,
    'Kaos fashion kekinian',
    25
),

(
    'Hoodie Hitam',
    250000,
    'Hoodie nyaman dan hangat',
    14
),

(
    'Jaket Denim',
    350000,
    'Jaket denim casual',
    10
),

(
    'Sneakers Putih',
    780000,
    'Sepatu sneakers stylish',
    9
),

(
    'Rice Cooker',
    450000,
    'Penanak nasi hemat listrik',
    7
),

(
    'Vacuum Cleaner',
    1400000,
    'Pembersih rumah daya kuat',
    4
),

(
    'Sepeda Gunung',
    4800000,
    'Sepeda untuk berbagai medan',
    3
);