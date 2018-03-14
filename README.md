# SongNowFinal

SongNow es una red social de musica desarrollada en PHP, con Laravel.

## Guía de instalación

*Es necesario para realizar la instalación tener PHP, composer y Node.js.*

Lo primero que tenemos que hacer es descargar el proyecto en la carpeta donde queramos usarlo: `git clone https://github.com/srnaxter/SongNowFinal.git

Una vez descargado tenemos que instalar los paquetes de PHP necesarios en la aplicación con composer con el comando: `composer install`.
También hará falta instalar los paquetes de Node.js con el comando `npm install` y compilar los archivos a producción o desarrollo con `npm run producción` o `npm run dev`.

Una vez hecho esto, tenemos que crear un archivo .env con el modelo del archivo .env.example que tenemos en el repositorio. Los valores esenciales en esta instalación son: 
1. `APP_NAME`, en el cual damos el nombre de la aplicación.
2. `APP_KEY`, aquí tenemos que poner la key que nos da la salida del comando `php artisan key:generate`.
3. `APP_DEBUG`, en el cual damos `true` o `false` según si estamos en desarrollo.
4. `APP_URL`, damos la url de la aplicación. 
5. `DB_HOST`, la ip del host donde va a estar la aplicación.
6. `DB_PORT`, el puerto de la base de datos.
7. `DB_DATABASE`, el nombre de la base de datos de la aplicación.
8. `DB_USERNAME`, el usuario de la base de datos.
9. `DB_PASSWORD`, la contraseña de la base de datos.

Una vez hecho esto tenemos que crear la base de datos con el nombre que le hemos dado en `DB_DATABASE` del .env y creamos sus tablas posicionandomos en la raiz del proyecto y ejecutando `php artisan migrate` o si queremos tener datos de pruba ejecutamos `php artisan migrate:refresh --seed`.
