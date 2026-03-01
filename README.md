# 🎯 Valorant - Sistema de Gestión (DB)

Este repositorio contiene la configuración de la base de datos MariaDB para una aplicación web CRUD en Vanilla PHP dockerizada.  
La temática principal es la gestión de **agentes oficiales de Valorant** y sus características dentro del universo competitivo del juego.

---

## 📊 Estructura de la Base de Datos

La base de datos se llama `valorant_jaime_portilla` y consta de dos tablas independientes.

```
conf/
 └── 000-default.conf
docker-compose.yml
Dockerfile
.env
sql/
 └── database.sql
src/
 ├── add.php
 ├── add_action.php
 ├── config.php
 ├── delete.php
 ├── edit.php
 ├── edit_action.php
 ├── home.php
 ├── index.php
 ├── login.php
 ├── login_action.php
 ├── logout.php
 ├── registro.php
 └── registro_action.php
```

---

### 1️⃣ Tabla: usuarios

Gestiona el acceso de los usuarios al sistema.

- **usuario_id**: Clave primaria autoincremental.
- **nombre_usuario**: Identificador único del usuario.
- **contrasena**: Almacena la contraseña hasheada mediante `password_hash()` (VARCHAR 255).
- **correo**: Correo electrónico único.
- **creacion**: Marca de tiempo automática de registro.

---

### 2️⃣ Tabla Principal: agentes

Almacena los agentes oficiales del juego.

- **agente_id**: Clave primaria (formato nombreTabla_id).
- **nombre**: Nombre oficial del agente.
- **rol**: Duelist, Controller, Sentinel o Initiator.
- **pais**: País de origen del agente.
- **anio_lanzamiento**: Año en que fue añadido al juego.
- **dificultad**: Valor numérico (1–5).
- **ultimate**: Nombre de la habilidad definitiva.

---

## 🔐 Seguridad y Credenciales

Siguiendo las instrucciones obligatorias, el acceso se configura de la siguiente manera:

- **Usuario Root**: Acceso habilitado para cualquier host (`'root'@'%'`).
- **Contraseña Root/Usuario**: Formato `NombreApellido@Año` (Sin tildes ni ñ).
- **Usuario de Aplicación**: Formato `usuario_inicialNombre_inicialesApellidos`  
  (ej: `usuarioJPa`).
- **Hashing**: Las contraseñas se gestionan en PHP con `password_hash()` y `password_verify()`.  
  ❌ Nunca se guarda texto plano.

---

## 🚀 Requisitos de la Aplicación (CRUD)

La aplicación conectada a esta base de datos debe cumplir con:

- ✔ Mantenimiento completo: Listado, altas, bajas y modificaciones de la tabla **agentes**.
- ✔ Formularios: Deben incluir campos de texto, numéricos y combos de opciones (`select`).
- ✔ Validación: Control de duplicados en el campo **UNIQUE (nombre)** antes de insertar.
- ✔ Estilos: Uso obligatorio de **Bootstrap** y recursos visuales relacionados con **Valorant**.

---

## 👨‍💻 Autor

**Jaime Portilla**  
Proyecto académico – Desarrollo Web con PHP y MariaDB  
2026