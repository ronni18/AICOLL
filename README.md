# API de Gestión de Empresas

Este proyecto es una API RESTful desarrollada en **Laravel** para gestionar empresas. Incluye funcionalidades para crear, consultar, actualizar y eliminar empresas. Además, cuenta con documentación interactiva usando **Swagger** para facilitar las pruebas y exploración de los endpoints.

## 📋 Funcionalidades principales

- Crear empresas (POST)
- Listar empresas (GET)
- Consultar empresa por NIT (GET)
- Actualizar datos de empresa (PUT)
- Eliminar empresas con estado `Inactivo` (DELETE)
- Documentación interactiva de la API con Swagger (L5 Swagger)

## 🚀 Instalación

Sigue estos pasos para clonar y ejecutar el proyecto en tu máquina local.

### 1. Clonar el repositorio

```bash
git clone https://github.com/tu-usuario/tu-repositorio.git
cd tu-repositorio
```

### 2. Instalar dependencias

```bash
composer install
```

### 3. Copiar el archivo `.env` y configurar

```bash
cp .env.example .env
```

Edita las variables de conexión a tu base de datos en `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_base
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
```

### 4. Generar la clave de la aplicación

```bash
php artisan key:generate
```

### 5. Ejecutar migraciones

```bash
php artisan migrate
```

### 6. Servir el proyecto

```bash
php artisan serve
```

La API estará disponible en:  
📍 `http://localhost:8000`

---

## 🧪 Probar la API con Swagger

Este proyecto usa **L5 Swagger** para documentar y probar los endpoints de forma visual.

### 📄 Acceder al Swagger UI

Abre tu navegador y visita:

👉 `http://localhost:8000/api/documentation`

Desde ahí podrás ver todos los endpoints disponibles, sus parámetros y probarlos directamente.

---

## 🗂️ Estructura de endpoints

| Método | Ruta                        | Descripción                           |
|--------|-----------------------------|---------------------------------------|
| GET    | /api/empresas               | Listar todas las empresas             |
| POST   | /api/empresas               | Crear una nueva empresa               |
| GET    | /api/empresas/{nit}         | Ver detalles de una empresa           |
| PUT    | /api/empresas/{nit}         | Actualizar empresa por NIT            |
| DELETE | /api/empresas/inactivos     | Eliminar empresas con estado Inactivo |

---

## ✅ Requisitos

- PHP >= 8.1
- Composer
- MySQL o compatible
- Laravel >= 10

---

## ✍️ Autor

Desarrollado por **Roni Carrascal Tejedor**  
📍 Cartagena, Colombia  
💼 Desarrollador web con más de 4 años de experiencia

---

## 📜 Licencia

Este proyecto está bajo la licencia [MIT](LICENSE).
