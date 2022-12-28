# Aplicación web de gestión de vehículos

# Contenido
1. [Funciones](#funciones)
2. [Requerimientos](#requerimientos)
3. [Instalación](#instalación)
4. [Datos del vehículo](#datos-del-vehículo) 
5. [Tecnologías y Frameworks Frantend](#tecnologías-y-frameworks-frantend)
6. [Server](#server)
7. [Recursos](#recursos)
8. [Fix errores instalación composer en el contenedor vecfleet_vehicles_api](#fix-errores-instalación-composer-en-el-contenedor-vecfleet_vehicles_api)



## Funciones
 - Lista de vehículos
 - Añadir vehículo
 - Eliminar vehículo
 - Buscar vehículo por modelo y marca
 - Editar vehículo
 - Ordernar lista de vehiclos por columnas
 

## Requerimientos

- Docker instalado
- Postman para pruebas de los endpoints
- composer instalado 
- npm instalado 

## Instalación

1. Abrir terminal de su pc 
2. Acceder a carpeta principal de proyecto
3. Escribir el siguiente comando  docker compose up -d —build 
4. Acceder al contendor del api docker exec -ti vecfleet_vehicles_api bash
5. Una vez dentro del contenedor escribir  migrations php artisan migrate:fresh  —seed
5. Crear usuario con endpoint :  http://localhost:8902/api/register

## Datos del vehículo
 
- Tipo de vehiculo
 - Ruedas
 - Marca
 - Modelo
 - Patente
 - Número de chasis
 - Km recorridos

## Tecnologías y Frameworks Frantend

 - Refine React 
 - Bootstrap 
 - Responsive Design 
 - Javascript 

## Server 

- MariaDB 10.6.11
- Laravel Framework 9.45.1
- PHP 8.1.12

## Recursos

- Postman Collections dentro de la carpeta postman. Importela en su postman
- Documentación API: https://documenter.getpostman.com/view/12703949/2s8Z6x4a15
- Actualmente se ecuentra disponible en http://yoisar.com:8902/api/

## Fix errores instalación composer en el contenedor vecfleet_vehicles_api

1. - abrir terminal
2. - ir a la carpeta princiapl del proyecto.
3. - acceder a la subcarpeta del contenedor api  via "cd ./api/v1/ 
4. - ejecutar comando rm composer.lock
5. - escribir comando composer install y responder yes en la pregunta
6. - regresar a la carpeta princiapl del proyecto escribiendo cd .. dos veces 
7. - repetir los pasos de instalación desde el paso 2   
