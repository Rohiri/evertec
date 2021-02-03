# Prueba de desarrollo.

_Prueba de desarrollo para Evertec._

### Paquetes Terceros

- AdminLTE



### Pre-requisitos

- Php 7.3.0 con phpCli habilitado para la ejecución de comando.
- Postgresql > 9.6
- Composer
- Extensión pdo_pgsql habilitada.
- Node & npm

### Instalación

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

4. Configure las variables de entorno para base de datos
- `DB_HOST=` Variable de entorno para el host de BD.
- `DB_PORT=` Variable de entorno para el puerto de BD.
- `DB_DATABASE=` Variable de entorno para el nombre de BD.
- `DB_USERNAME=` Variable de entorno para el usuario de BD.
- `DB_PASSWORD=` Variable de entorno para la contraseña de BD.

### Nota

La variable `APP_URL` se recomienda que sea el punto de entrada
de su aplicacion por lo que se recomienda crear un virtual host ó tambien
puede configurar la variable `asset_url` en el array de configuracion de `liveware.ph`


5. Configure las variables de entorno la aplicacion
- `PRODUCT_PRICE=` Variable de entorno para precio del producto
- `PRODUCT_NAME=` Variable de entorno para el nombre del Producto
- `PAYMENT_GATEWAY=` Variable de entorno para la pasarela de pago

6. Variables de Entorno Place To Pay
- `PLACE_TO_PAY_LOGIN=` Variable de entorno para consumir Place To Pay (Credencial)
- `PLACE_TO_PAY_KEY=` Variable de entorno para consumir Place To Pay (Credencial)
- `PLACE_TO_PAY_URL=` Variable de entorno para consumir la pasarela (URL)


7. En la raíz del sitio ejecutar.
- `php artisan key:generate` Genera la llave para el cifrado del proyecto.
- `composer install` Instala dependencias de PHP
- `npm install` Instala dependencias de javascript
- `npm run dev` Genera la llave para el cifrado del proyecto.
- `php artisan migrate:refresh --seed` Ejecuta migraciones y seeders

8. Usuarios Predefinidos.

Email|Password
 ------ | ------
admin@gmail.com|admin
buyer@gmail.com|buyer

## Autor

**William Ricardo Torres Curtidor**
