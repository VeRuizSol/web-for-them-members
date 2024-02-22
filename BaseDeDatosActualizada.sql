DROP DATABASE IF EXISTS vet_clinic;
CREATE DATABASE IF NOT EXISTS vet_clinic;
USE vet_clinic;

CREATE TABLE IF NOT EXISTS productos (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  codigo_producto VARCHAR(60) NOT NULL,
  nombre_producto VARCHAR(60) NOT NULL,
  descripcion_producto TEXT NOT NULL,
  nombre_imagen_producto VARCHAR(60) NOT NULL,
  cantidad INT UNSIGNED NOT NULL,
  precio DECIMAL(10,2) NOT NULL,
  UNIQUE KEY codigo_producto (codigo_producto)
);


CREATE TABLE IF NOT EXISTS usuarios (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(255) NOT NULL,
  apellido VARCHAR(255) NOT NULL,
  direccion VARCHAR(255) NOT NULL,
  ciudad VARCHAR(100) NOT NULL,
  codigo_postal INT UNSIGNED NOT NULL,
  correo_electronico VARCHAR(255) NOT NULL,
  contrasena VARCHAR(255) NOT NULL,
  tipo VARCHAR(20) NOT NULL DEFAULT 'usuario',
  UNIQUE KEY correo_electronico (correo_electronico)
);


-- Table structure for table orders
CREATE TABLE IF NOT EXISTS pedidos (
  id_pedido int(15) AUTO_INCREMENT PRIMARY KEY,
  codigo_de_producto varchar(255) NOT NULL,
  nombre_de_producto varchar(255) NOT NULL,
  descripcion_de_producto varchar(255) NOT NULL,
  precio int(10) NOT NULL,
  unidades int(5) NOT NULL,
  total int(15) NOT NULL,
  fecha timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  correo_electronico varchar(255) NOT NULL
);

select * from pedidos;

-- Inserción de datos para la tabla productos
INSERT INTO productos (codigo_producto, nombre_producto, descripcion_producto, nombre_imagen_producto, cantidad, precio) VALUES
('M1', 'Acuario', 'Un acuario para crear un hogar acogedor para tus peces.', 'acuario.jpg', 20, 45000.00),
('M2', 'Antipulgas para Perros', 'Tratamiento antipulgas para mantener a tu perro libre de pulgas.', 'antipulgas_perros.jpg', 15, 10500.00),
('M3', 'Arena para Gatos', 'Arena de calidad para mantener la caja de arena de tu gato limpia y fresca.', 'arena_gatos.jpg', 30, 5500.00),
('M4', 'Arena para Roedores', 'Arena especial para jaulas de roedores, proporcionando un entorno limpio.', 'arena_roedores.jpg', 25, 7500.00),
('M5', 'Cama para Gato', 'Una cama cómoda y acogedora para que tu gato descanse plácidamente.', 'cama_gato.jpg', 10, 30000.00),
('M6', 'Cepillo Dental para Gatos', 'Cepillo dental diseñado para mantener los dientes de tu gato limpios y saludables.', 'cepillo_dental_gatos.jpg', 8, 5800.00),
('M7', 'Cepillo para Gatos', 'Cepillo suave para cepillar el pelaje de tu gato y mantenerlo desenredado.', 'cepillo_gatos.jpg', 12, 4800.00),
('M8', 'Chaqueta de Invierno para Perro', 'Chaqueta abrigada para proteger a tu perro del frío invernal.', 'chaqueta_invierno_perro.jpg', 5, 77300.00),
('M9', 'Collar para Gato', 'Collar elegante para darle un toque de estilo a tu gato.', 'collar_gato.jpg', 18, 4400.00),
('M10', 'Comedero para Perros', 'Comedero resistente para facilitar la alimentación de tu perro.', 'comedero_perros.jpg', 22, 23200.00),
('M11', 'Comida Húmeda para Perros', 'Comida húmeda de alta calidad para consentir a tu perro.', 'comida_humeda_perros.jpg', 15, 4425.00),
('M12', 'Comida para Perro', 'Alimento balanceado para mantener a tu perro saludable y feliz.', 'comida_perro.jpg', 20, 12150.00),
('M13', 'Correa para Perro', 'Correa resistente para pasear a tu perro con comodidad y seguridad.', 'correa_perro.jpg', 10, 2950.00),
('M14', 'Jaula para Roedores', 'Jaula espaciosa para proporcionar un hogar cómodo a tus roedores.', 'jaula_roedores.jpg', 5, 45000.00),
('M15', 'Juguete para Perro', 'Juguete duradero para mantener a tu perro entretenido y activo.', 'juguete_perro.jpg', 12, 5550.00),
('M16', 'Pelota para Gatos', 'Pelota interactiva para que tu gato se divierta y haga ejercicio.', 'pelota_gatos.jpg', 15, 4000.00),
('M17', 'Rascador para Gatos', 'Rascador para satisfacer los instintos de rascado de tu gato y cuidar sus garras.', 'rascador_gatos.jpg', 8, 11500.00),
('M18', 'Shampoo para Gatos', 'Shampoo suave para mantener limpio y saludable el pelaje de tu gato.', 'shampoo_gatos.jpg', 10, 3200.00),
('M19', 'Suplemento para Perros', 'Suplemento nutricional para mejorar la salud y vitalidad de tu perro.', 'suplemento_perros.jpg', 5, 13800.00),
('M20', 'Vitaminas para Gatos', 'Vitaminas esenciales para mantener a tu gato en óptimas condiciones de salud.', 'vitaminas_gatos.jpg', 7, 6000.00);



-- Insertar datos en la tabla usuarios
INSERT INTO usuarios (id, nombre, apellido, direccion, ciudad, codigo_postal, correo_electronico, contrasena, tipo) VALUES
(1, 'Steve', 'Jobs', 'Infinite Loop', 'California', 95014, 'sjobs@apple.com', 'steve', 'usuario'),
(2, 'Admin', 'Webmaster', 'Internet', 'Electricity', 101010, 'admin@admin.com', 'admin', 'admin');

select * from usuarios;
SELECT * from pedido where correo_electronico = 'sjobs@apple.com'
