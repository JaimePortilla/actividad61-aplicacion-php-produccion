-- ============================================
--   BASE DE DATOS VALORANT 2026
-- ============================================

CREATE DATABASE IF NOT EXISTS valorant2026
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE valorant2026;

-- ============================================
--   TABLA DE USUARIOS
-- ============================================

CREATE TABLE usuarios (
    usuario_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(50) NOT NULL,
    contraseña VARCHAR(255) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    creacion DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- ============================================
--   TABLA PRINCIPAL: AGENTES (tu tabla CRUD)
-- ============================================

CREATE TABLE agentes (
    agente_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL UNIQUE,           -- campo UNIQUE (no se puede repetir)
    rol VARCHAR(30) NOT NULL,                     -- Duelist, Controller, Sentinel, Initiator
    pais VARCHAR(50) NOT NULL,
    anio_lanzamiento INT NOT NULL,                -- campo numérico
    dificultad INT NOT NULL,                      -- campo numérico (1 = fácil, 5 = muy difícil)
    ultimate VARCHAR(100) NOT NULL
);

-- ============================================
--   DATOS DE EJEMPLO: USUARIOS
--   Contraseñas reales:
--   admin → Admin2026!
--   jettfan → Jett2026!
--   phoenixgod → Phoenix2026!
-- ============================================

INSERT INTO usuarios (nombre_usuario, contraseña, correo)
VALUES
('admin',
 'V4l0r4ntM4st3r2026!@#Secure',
 'admin@valorant.com'),

('jettfan',
 'J3ttD4shW1nd2026Pro$Blade',
 'jett@valorant.com'),

('phoenixgod',
 'Ph03n1xFl4m3Ult!m4t3#2026',
 'phoenix@valorant.com');

-- ============================================
--   DATOS DE EJEMPLO: AGENTES (10 registros)
-- ============================================

INSERT INTO agentes (nombre, rol, pais, anio_lanzamiento, dificultad, ultimate)
VALUES
('Jett',        'Duelist',    'Corea del Sur', 2020, 3, 'Blade Storm'),
('Phoenix',     'Duelist',    'Reino Unido',   2020, 2, 'Run It Back'),
('Sage',        'Sentinel',   'China',         2020, 1, 'Resurrection'),
('Sova',        'Initiator',  'Rusia',         2020, 4, 'Hunter\'s Fury'),
('Viper',       'Controller', 'Estados Unidos',2020, 4, 'Viper\'s Pit'),
('Cypher',      'Sentinel',   'Marruecos',     2020, 3, 'Neural Theft'),
('Brimstone',   'Controller', 'Estados Unidos',2020, 2, 'Orbital Strike'),
('Raze',        'Duelist',    'Brasil',        2020, 3, 'Showstopper'),
('Reyna',       'Duelist',    'México',        2020, 5, 'Empress'),
('Killjoy',     'Sentinel',   'Alemania',      2020, 2, 'Lockdown');