-- ==========================================================
-- Base de Datos para el proyecto CRUD PHP Puro
-- ==========================================================

-- 1. Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS `PruebaPhP`
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

-- 2. Seleccionar la base de datos
USE `PruebaPhP`;

-- 3. Crear la tabla `productos`
-- El orden de las columnas coincide con el bind_result de views/edit.php:
-- (id, nombre, descripcion, precio, stock)
CREATE TABLE IF NOT EXISTS `productos` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `nombre` VARCHAR(255) NOT NULL,
    `descripcion` TEXT NOT NULL,
    `precio` DECIMAL(10, 2) NOT NULL,
    `stock` INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ==========================================================
-- Datos de prueba iniciales (Opcional)
-- ==========================================================
INSERT INTO `productos` (`nombre`, `descripcion`, `precio`, `stock`) VALUES
('Laptop HP Pavilion', 'Laptop de 15.6 pulgadas con procesador Intel Core i5 y 8GB RAM', 650.00, 10),
('Mouse Inalámbrico Logitech', 'Mouse ergonómico inalámbrico con receptor USB', 25.50, 45),
('Teclado Mecánico Redragon', 'Teclado mecánico con retroiluminación RGB y switches azules', 45.00, 20),
('Monitor Samsung 24"', 'Monitor Full HD IPS de 75Hz con conexiones HDMI y VGA', 130.00, 15),
('Auriculares HyperX Cloud II', 'Auriculares gamer con sonido envolvente 7.1 y micrófono', 80.00, 12);

