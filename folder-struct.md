```bash
C:\projects\xampp_docker\
└── xampp/              ← carpeta que montas hoy en /var/www/html
    ├── public/         ← ✨ webroot: todo lo que sirves al navegador
    │   ├── index.php
    │   ├── .htaccess
    │   └── assets/
    │       ├── css/
    │       ├── js/
    │       └── images/
    │
    ├── src/            ← lógica PHP, controladores, modelos, vistas “no públicas”
    │   ├── Core/
    │   ├── Config/
    │   ├── Controllers/
    │   ├── Models/
    │   └── Views/
    │
    ├── database/       ← migraciones, seeds
    ├── tests/          ← tests unitarios
    ├── logs/
    └── config.php      ← carga de .env, etc.
```
