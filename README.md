# Adaptación al Ambiente de Trabajo - cuatroenlinea

El clásico juego del "cuatro en línea". Construido en php y utilizando el framework de código abierto **Laravel**. Se juega de a dos jugadores (rojo y azul), los cuales se van turnando secuencialmente para colocar sus piezas. Gana el primer jugador en construir una línea de 4 piezas ininterrumpida. 


## Prerrequisitos
Se necesitan tener previamente las siguientes aplicaciones instaladas.
- DDEV (https://ddev.readthedocs.io/en/stable/)
- Docker Desktop (https://docs.docker.com/desktop/)
- Composer (https://getcomposer.org/download/)

Junto a ellas, se indican los enlaces a la documentación oficial de cada una.

<br/>

## Preparación del proyecto
Previamente a correr el proyecto, se deben configurar e instalar todas las dependencias necesarias.

### 1- Creación de container (entorno de trabajo)
- Abrimos la aplicación de `Docker Desktop`, y posteriormente ejecutamos en la consola la siguiente orden:


> ``ddev config``


Con la cual podremos configurar el contenedor de Docker en el cual se alojará la aplicación. Los campos a informar son: nombre de proyecto (arbitrario), la ruta del documento raíz del proyecto (usualmente se deja el campo vacío) y el tipo de proyecto (el cual **debe** ser laravel).

Una vez tengamos eso configurado, lo podremos inicializar:

> ``ddev start``
<br/>

### 2- Verificación con composer

`Composer` es el gestor de dependencias encargado de php. Tenemos que asegurarnos de tener todos los paquetes actualizados a la fecha:

>``composer update``

Con la línea de arriba puede saltar un error del siguiente estilo:

![Captura de Inconveniente con Composer](https://cdn.discordapp.com/attachments/676993677704298519/981746461861629962/composer_issue.PNG) 

Esto nos indica la ausencia de un paquete php. En particular, nos falta ``php-xml``. Por lo cual tendremos que instalarlo utilizando el gestor de paquetes correspondiente a nuestra version de Linux. En este caso usaré apt-get (Ubuntu):

>``sudo apt-get update``
>``sudo apt install php-xml``

Por último, nos aseguraremos de tener instalado ```sail```, la CLI de laravel que nos permitirá iniciar el hosting de la aplicación. Nos aseguraremos de su instalación con la siguiente línea:
>``composer require laravel/sail --dev``

<br/>

### 3- Crear archivo de ambiente

Un paso importante por hacer previo a intentar correr la aplicación es crear el archivo de ambiente del proyecto, aka ``.env``. La mayoría del contenido de este ya está incluido en ``.env.example``. Sin embargo, le agregaremos dos líneas adicionales para garantizar los permisos de ejecución necesarios durante la ejecución de ``laravel/sail``:

> ``ls -la``
> ``cp .env.example .env ``
>``echo "WWWGROUP=1000" >> .env``
>``echo "WWWUSER=1000" >> .env``

Con estas 4 líneas nos ahorraremos algunos errores de código https 500 al querer ejecutar laravel/sail.

<br/>

### 4- Creación de clave
Importante crear una clave de aplicación para nuestro proyecto. Lo haremos mediante:
> ``php artisan key:generate``

<br/>

### 5- Correr aplicación
Una vez completados todos los pasos de arriba, deberíamos ser capaces de correr sail sin problemas. Desde nuestro directorio de laravel ejecutamos:

> ``sudo ./vendor/bin/sail up -d``

Con ello, podríamos ir a nuestro navegador de preferencia y escribir en la URL ``localhost`` o ``127.0.0.1``, y la pantalla index default de laravel nos tendría que aparecer:

![Página principal de Laravel](https://cdn.discordapp.com/attachments/676993677704298519/981780708257333318/laravelindexpage.PNG) 

Pagina "root" de Laravel. El equivalente al *"It works!"* de apache.

<br/>

Una vez en ella, nos dirigiremos a la dirección del cuatro en línea: ``localhost/jugar/1`` o ``127.0.0.1/jugar/1`` :


![Cuatro en línea](https://cdn.discordapp.com/attachments/676993677704298519/981780708030836826/cuatroenlinealaravel.PNG) 

Cuatro en línea :)

<br/>

> Podemos saber qué documentos están disponibles para ser accedidos inspeccionando con ``cat routes/web.php``

<br/>

### 6- Cerrar aplicación
No es considerada una buena práctica cerrar "a la fuerza" el servidor, como por ejemplo, cerrando la consola de comandos. En cambio, podemos hacer un sail down:

> ``sudo ./vendor/bin/sail down``
