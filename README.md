Tareas App

Aplicación web construida con Laravel 12, Vue 3, Inertia.js, MySQL y Jetstream (stack Inertia) para la gestión de tareas con autenticación, CRUD completo, buscador y paginación.

Requisitos

PHP >= 8.2

Node.js y NPM

Composer

MySQL

Laravel 12

Instalación

# clonar repositorio
git clone https://github.com/aruisan/tasks_demo.git
cd tasks_demo

# instalar dependencias back
composer install

#  instalar dependencias de frontend
npm install && npm run dev

# copiar y configurar variables de entorno
cp .env.example .env
php artisan key:generate

# configurar base de datos
DB_DATABASE = 'tareas_demo'
DB_USERNAME = 'tu_usuario'
DB_PASSWORD = 'tu_contraseña'


# Iniciar servidor
php artisan serve

Funcionalidades

Registro e inicio de sesión con Jetstream (Inertia).

CRUD de tareas por usuario autenticado.

Marcar tareas como completadas.

Autorización basada en políticas para evitar modificar tareas de otros usuarios.

Buscador de tareas por título.

Paginación.

Estructura del proyecto

app/
  Http/
    Controllers/
      TaskController.php
  Models/
    Task.php
  Policies/
    TaskPolicy.php
resources/
  js/
    Pages/
      Tasks/
        Index.vue
routes/
  web.php

Justificación técnica

Jetstream + Inertia + Vue 3: Para tener autenticación segura con SPA moderna.

Policies: Para aplicar control de acceso a los recursos (tareas) a nivel de backend.

Bootstrap: Utilizado por simplicidad y compatibilidad inmediata.

Laravel Eloquent: Facilita relaciones entre usuario y tareas.

Control de versiones (Git): Se utilizaron commits descriptivos por cada avance (migraciones, vistas, controladores, etc).

Diagrama de base de datos

users
  id
  name
  email
  ...

tasks
  id
  user_id (FK a users)
  title
  description
  completed
  timestamps

  
Autor

Oscar Amortegui

Licencia

MIT