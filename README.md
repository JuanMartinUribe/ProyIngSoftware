# Authors:
## Juan Martin Uribe & Daniel Giraldo
### Access the [wiki](https://github.com/JuanMartinUribe/ProyIngSoftware/wiki) to view the coding rules and conventions plus additional information

#### Ignore this
Ejecucion del programa:

Asegurarse de realizar todas las migraciones

php artisan serve

La ruta por defecto / llevará a la pagina principal de navegacion

La barra de navegacion lleva a las demas partes de la pagina

Para acceder a la seccion de administrador hay que ir a /admin y
asegurarse de estar registrado con un usuario con rol de admin

Para cambiar el rol se debe hacer directamente en la base de datos, ya que por defecto no es admin.

Si se corre en gcp, es necesario garantizar permisos a la carpeta /public/uploads/games
para poder subir imagenes como administrador al crear o actualizar juegos

