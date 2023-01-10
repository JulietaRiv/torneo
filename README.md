# Tenis Tournament

According to the challenge received, this project means to be a sample of determined capabilities developing with php language and Laravel framework.
It consists in create the logic to create and play a tenis tournament, given a valid number of players with name and sex, and a set of attributes with random values (between 0 - 100), which determines the winner.

It includes a players index view, with the list of players, a button to add new (with a very basic form) and a delete button foreach. 
Also includes a main view where is displayed a select with each tournament created (2) with 8 player each, to choose and a button to make them play. Under that, the number of the tournament to be displayed and a graph representing every round with the initial players in round 1, and after make them play, all scores are completed, the winners highlighted and the next rounds fulfilled. 

I added a button (manage Players) to redirect to players index view. And thear a back button for navegavility.
The idea was to add also another button in the main view to manage tournaments (create and delete) and give to both the edition functionallity. 
But considering the porpose of the project, and the lack of time, it might be accomplished in a next iteration. 


## Pre requisites

php<br>
git<br>
composer

## How To Use
To clone and run this application, you'll need [Git](https://git-scm.com) and [Node.js](https://nodejs.org/en/download/) (which comes with [npm](http://npmjs.com)) installed on your computer. From your command line:

```bash
# Clone this repository
$ git clone https://github.com/JulietaRiv/torneo

# Go into the repository
$ cd torneo

# Copy .env.example file
$ cp .env.example .env

# Install Sail
$ composer require laravel/sail --dev
$ php artisan sail:install

# Start the app
$./vendor/bin/sail up

# Create Database
# Run migrations and seeders
$ sail artisan migrate --seed
```

> **Note**
> If you're using Linux Bash for Windows, [see this guide](https://www.howtogeek.com/261575/how-to-run-graphical-linux-desktop-applications-from-windows-10s-bash-shell/) or use `node` from the command prompt.


## Getting Started 

Is a must to install PHP, Laravel, Sail and Composer.<br>
-Create local directory <br>
-Download the files or clone the repository <br>
-Create relational database Mysql <br>
-Configure .env file to connect to database (DB_DATABASE=torneo, DB_USERNAME=sail, DB_PASSWORD=password)<br>
-Run ./vendor/bin/sail up to start the app
-And as any other Laravel app deploy according to this instructions -https://laravel.com/docs/7.x/deployment. <br>
-Run migrations and seeders. <br>
Then you will have a basic dummie data to make the app work <br>
(Players, tournaments and their games) <br>


## Technical Notes

I have created 3 models (Player, Tournament and Game) and their controllers, <br> 
4 migration files to create the database scheme<br>
2 seeder files with the use of a factory file and Faker class,<br>
a request file with a separated validation rules for players form,<br>
3 blade templates views, the main tournament view, the players index view and the basic players form


## Challenge 

Se desea modelar el comportamiento de un torneo de tenis:
● La modalidad del torneo es por eliminación directa*
● Puede asumir por simplicidad que la cantidad de jugadores es potencia de 2.
● El torneo puede ser Femenino o Masculino
● Cada jugador tiene un nombre y un nivel de habilidad (entre 0 y 100)
● En un enfrentamiento entre dos jugadores influyen el nivel de habilidad y la suerte para
decidir al ganador del mismo. Es su decisión de diseño de qué forma incide la suerte en
este enfrentamiento.
● En el torneo masculino, se deben considerar la fuerza y la velocidad de desplazamiento
como parámetros adicionales al momento de calcular al ganador.
● En el torneo femenino, se debe considerar el tiempo de reacción como un parámetro
adicional al momento de calcular al ganador.
● No existen los empates
● Se requiere que a partir de una lista de jugadores se simule el torneo y se obtenga
como output al ganador del mismo.
● Se recomienda realizar la solución en su IDE preferido.
● Se valorarán las buenas prácticas de Programación Orientada a Objetos.
● Puede definir por su parte cualquier cuestión que considere que no es aclarada. Puede
agregar las aclaraciones que considere en la entrega del ejercicio
● Cualquier extra que aporte será bienvenido
● Se prefiere el modelado en capas o arquitecturas limpias (Clean Architecture)
● Se prefiere la entrega de la solución mediante un sistema de versionado
(github/bitbucket/etc)
* La eliminación directa, es un sistema en torneos que consiste en que el perdedor de un
encuentro queda inmediatamente eliminado de la competición, mientras que el ganador
avanza a la siguiente fase. Se van jugando rondas y en cada una de ellas se elimina la
mitad de participantes hasta dejar un único competidor que se corona como campeón.
Importante: Se prestará especial énfasis en el correcto modelado y aplicación de buenas
prácticas de la programación orientada a objetos.
Puntos extra:
Apartado 1: Testing de la solución (Unit Test)
Apartado 2: Api rest (Swagger + Integration Testing)

- Con base en una lista de jugadores, retorna el resultado del torneo.
- Permite consultar el resultado de los torneos finalizados exitosamente con
base en alguno de los siguientes criterios:
- Fecha
- Torneo Masculino y/o Femenino
- Otros que usted considere
Apartado 3: Utilizar una base de datos no embebida
Apartado 4: Subir el o los servicios a aws/azure/etc utilizando docker o kubernetes


## Autor ✒️

* **Julieta Riv** - https://github.com/JulietaRiv


## Versions 📌

php 8.0.2
composer 2.4.2
laravel "^9.19"


## Licencia 📄

Under licencia GPL v3.


## Gratitude 🎁

* Specially thanks to Adrian Rivelli 🤓 my mentor https://github.com/arivelli.

 😊
