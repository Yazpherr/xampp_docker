# xampp_docker

## Configuración de puertos

Los puertos de los servicios están definidos en el archivo `.env`:

- `WEB_PORT`: Puerto para Apache (por defecto 8080)
- `DB_PORT`: Puerto para MySQL en el host (por defecto 3307)
- `PHPMYADMIN_PORT`: Puerto para phpMyAdmin (por defecto 8081)

Si el puerto 3306 ya está ocupado (por ejemplo, por MySQL de XAMPP), puedes cambiar el valor de `DB_PORT` en `.env` a otro puerto disponible, como 3308, y reiniciar los contenedores.

## Levantar los servicios

```bash
# En PowerShell o CMD
cd c:\projects\xampp_docker

docker compose up -d
```

Accede a:
- Apache: http://localhost:8080
- phpMyAdmin: http://localhost:8081
- MySQL: localhost:3307 (o el puerto que definas)

---

> Si necesitas usar el puerto 3306, asegúrate de detener el servicio MySQL de XAMPP antes de levantar los contenedores.