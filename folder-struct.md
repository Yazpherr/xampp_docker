```bash
xampp_docker/
├── .env                     # Variables de entorno (DB, puertos, etc.)
├── docker-compose.yml
├── Dockerfile
├── composer.json
├── README.md
│
├── public/                  # DocumentRoot del servidor
│   ├── index.php            # Front controller (ruta única)
│   ├── .htaccess            # Rewrite rules si usas Apache
│   └── assets/
│       ├── css/             # bootstrap.min.css, estilos propios
│       ├── js/              # bootstrap.bundle.js, scripts
│       └── images/          # logos, íconos, etc.
│
├── src/                     # Código fuente PHP
│   ├── Core/                # Clases base (Router, Request, Response…)
│   │   └── Database.php
│   │
│   ├── Config/              # Carga de config y env
│   │   └── config.php
│   │
│   ├── Controllers/         # Lógica de endpoints
│   │   └── UserController.php
│   │
│   ├── Models/              # Representación de tablas
│   │   └── User.php
│   │
│   └── Views/               # Templates organizados por recurso
│       └── users/
│           ├── index.php    # Lista
│           ├── create.php   # Formulario creación
│           └── edit.php     # Formulario edición
│
├── database/
│   ├── migrations/          # Scripts SQL de migraciones
│   └── seeds/               # Datos iniciales de prueba
│
├── tests/                   # PHPUnit o tu framework de tests
│   └── UserTest.php
│
└── logs/                    # Archivos de log (rotación si es necesario)
```
