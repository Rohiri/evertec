# Prueba de desarrollo.

_Prueba de desarrollo para Evertec._


### Pre-requisitos

_Ambiente requerido_

- Php 7.3.0 con phpCli habilitado para la ejecución de comando.
- Postgresql > 9.6
- Composer
- Extensión pdo_pgsql habilitada.
- Node & npm

### Instalación 🔧

1. Clonar el repositorio en la carperta del servidor web.

```sh
git clone https://github.com/Rohiri/evertec.git
```

2. Instalar paquetes.

```sh
composer install
```
3. Copiar archivo  `.env.example` a  `.env`

```sh
`cp .env.example .env`
```

4. Configure las variables de entorno
- `DB_HOST="value"` Variable de entorno para el host de BD.
- `DB_PORT="value"` Variable de entorno para el puerto de BD.
- `DB_DATABASE="value"` Variable de entorno para el nombre de BD.
- `DB_USERNAME="value"` Variable de entorno para el usuario de BD.
- `DB_PASSWORD="value"` Variable de entorno para la contraseña de BD.


5. En la raíz del sitio ejecutar.
- `php artisan key:generate` Genera la llave para el cifrado del proyecto.
- `composer install` Instala dependencias de PHP
- `npm install` Instala dependencias de javascript
- `npm run dev` Genera la llave para el cifrado del proyecto.
- `php artisan migrate:refresh --seed` Ejecuta migraciones y seeders


Email|Password
 ------ | ------
admin@evertec.com|password
william@gmail.com|123456789|(Ninguno)| Tiene solo acceso a sus ordenes.

## Autor

**William Ricardo Torres Curtidor** [wiltorc2430@gmail.com](mailto:wiltorc2430@gmail.com)


------------------------