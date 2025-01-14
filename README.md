# PDF On The Fly

La práctica consiste en crear una aplicación web que permite generar PDF en línea, usando archivos PDF en formato de formulario.

Está práctica tiene funciones como editar las respuestas de cada formulario y un auto-guardado para guardar un formulario como borrador, tiene opciones adiciones como generar el pdf en línea con las respuestas previamente guardado, ver el archivo generado dentro de un modal, permite descargar el archivo PDF generado, además tiene un panel con gráficas y cantidad de Achivos PDF, Formularios, Generado y Borrador.


Este conjunto de tecnologías y características para este sitio web:

- Proyecto dockerizado
- Proyecto vagratizado
- Laravel 8.x
- Laravel BackPack 4.x
- Bootstrap 4
- SweetAlert2
- JQuery
- Chart.js
- Datatables
- etc.

# Requisitos

* Laravel v8.x
* PHP v7.4.33
* Apache v2.4.54
* MySQL v5.7.39

# Arrancar proyecto usando Docker-compose y Vagrant

**Advertencia:** Si se usa Vagrant como máquina virtual, este caja de Vagrant está configurado como una red privada,  con dirección IP de `192.168.33.90`, por lo tanto para acceder a los servicios de este proyecto, es necesario cambiar `localhost` por la dirección IP de la caja de Vagrant (y viceversa), sería de está manera:

- Sitio de servicio Laravel v8.x: [http://192.168.33.90](http://192.168.33.90)

<br>

**NOTA:** Si no se está usando Vagrant como máquina virtual es necesario cambiar la dirección IP (`192.168.33.99`) de la caja de Vagrant 

por `localhost`, en archivos de  Dockerfile y Docker-compose.  



**Paso 1)** Acceder a la ruta raíz (root) el proyecto, a la par de archivo `docker-compose.yml`

Ejecuta el siguiente comando, desde la terminal.

```shell
$ cd workspace
```

**Paso 2)** Convertir el archivo `setup.sh` en un archivo ejecutable o script de Linux y ejecutarlo. 

Además de crear variable de entorno, instalar nodejs, y crear alias para Linux

Ejecuta el siguiente comando, desde la terminal.

```shell
$ dos2unix ./setup.sh && ./setup.sh && source ~/.bashrc 
```

**Paso 3)** Construir todos los servicios de docker-compose

Se construye la imagen, contenedor y ejecuta cada servicio que compone docker-compose 

```shell
$ doc-again
```

**Paso 4)** Comienza a probar el proyecto

Felicidades ya puedes acceder a los sitios del proyecto, que son:

- Sitio de servicio Laravel v8.x: [http://192.168.33.90](http://192.168.33.90)

<br>

# Vista Previas 

![preview_01.jpg](/screenshots/preview_01.jpg)

![preview_02.jpg](/screenshots/preview_02.jpg)

![preview_03.jpg](/screenshots/preview_03.jpg)

![preview_04.jpg](/screenshots/preview_04.jpg)

![preview01.jpg](/screenshots/preview_05.jpg)

![preview05.jpg](/screenshots/preview_06.jpg)
