# Práctica: patrones de diseño, pruebas y documentación de software

A continuación vamos a integrar patrones de diseño a un desarrollo sencillo como base, realizarle pruebas atumatizadas de software y documentarlo adecuadamente para generar su API.

Para esta practica nos dividiremos en parejas, trabajaremos en conjunto y lo haremos versionando nuestro desarrollo con **GIT**, el repositorio deberá tener las ramas: **master**, **develop**, y **una rama para cada estudiante** compuesta por su apellido y su nombre de la siguiente manera: Pablo Bejarano => pabbej. Cada estudiante  las ramas posteriormente serán integradas a develop a medida que el trabajo de cada quien se termine correctamente (GIT Flow lo trabajaremos para el 3er corte).

Los repositorios serán alojados en GitHub (que ahora permite repositorios privados con contribuidores ilimitados) y el docente será adicionado al repositorio como un cotribuidor.

###1. El juego de ROL

Como todo buen juego de ROL este permite la creación de diferentes personajes en una partida, para nuestro caso es necesario controlar la creación de estos personajes mediante el uso de una **Fábrica abstracta**, de tal manera que podamos realizar la creación de cada una de las clases sin que estas difieran en la manera en que están construidas de la siguiente manera:

1. Crearemos una **Fábrica abstracta** (una interfaz) que defina la creación de los personajes por sus clases, a ella le pondremos el nombre de: **CharacterFactory**.

   ```php 
   <?php
    	
     interface ICharacterFactory {
       //put your code here
   	}
     
    ?>
   ```

   Los métodos que todo personaje deberá tener en nuestro juego son:

   * getStats() :Array
   * setStats($Array$ stats) :void
   * getStat($string$ statName) :float
   * setStat($string$ statName, $float$ value) :void
   * attack($ICharacter$ target) :void
   * getDamage($float$ value) :void
   * die() :void

2. Ahora que tenemos los métodos basicos de nuestros personajes y que sabemos que además requerimos de unos atributos base obligatorios para todos crearemos la clase abstracta **Character** que nos permitirá definir estos detaller para después ser heredada por las fábricas concretas que creemos.

   ```php
   <?php
   	
     abstract class Character implements ICharacterFactory{
       //put your code here
   	}
    
   ?>
   ```

   Esta clase deberá definir los siguientes atributos:

   * name: nombre del personaje
   * level: nivel del personaje, cada clase afectará sus estadísticas por nivel de manera independiente.
   * str: fuerza del personaje
   * intl: intelecto del personaje
   * agi: agilidad del personaje
   * mDef: defensa mágica
   * fDef: defensa física
   * hp

   Encapsule las propiedades de la superclase Character y defina como abstractos todos los métodos de la **Fabrica abstracta** implementada. 

   **Nota**: Recuerde que los atributos de una super clase deberían tener un nivel de acceso `protected` si queremos que sean visibles para sus hijas.

3. Es hora de crear nuestras fábricas concretas de personajes `MageFactory`, `WarriorFactory`, `RogueFactory`, el juego cuenta las siguientes clases:

   * **Mago (Mage):** Sus estadísticas base son 4 de fuerza, 10 de intelecto, 6 de agilidad, 5 de defensa mágica, 2 de defensa física y 80 puntos de vida.
   * **Guerrero (Warrior):** Sus estadísticas base son 10 de fuerza, 4 de intelecto, 6 de agilidad, 2 de defensa mágica, 6 de defensa física y 110 puntos de vida.
   * **Pícaro (Roge):** Sus estadísticas base son 4 de fuerza, 6 de intelecto, 10 de agilidad, 5 de defensa mágica, 5 de defensa física y 90 puntos de vida.

   Cada clase realiza un reajuste de estadisticas dependiendo de su nivel como se muestra a continuación:

   * **Mago (Mage):** por cada nivel el mago obtiene 1.5X su fuerza base como fuerza total, 2.3X su intelecto base como intelecto total, 1.6X su agilidad base como agilidad total, 1.1X su defensa física como defensa física total, 1.5X su defensa mágica como defensa mágica total y 1.4x sus puntos de vida.
   * **Guerrero (Warrior):** por cada nivel el guerrero obtiene 2.3X su fuerza base como fuerza total, 1.5X su intelecto base como intelecto total, 1.6X su agilidad base como agilidad total, 1.6X su defensa física como defensa física total, 1.1X su defensa mágica como defensa mágica total  y 1.5x sus puntos de vida.
   * **Pícaro (Roge):** por cada nivel el pícaro obtiene 1.6X su fuerza base como fuerza total, 1.5X su intelecto base como intelecto total, 1.9X su agilidad base como agilidad total, 1.6X su defensa física como defensa física total, 1.6X su defensa mágica como defensa mágica total  y 1.3x sus puntos de vida

   Cada clase tiene su propio cálculo de daño de ataque y defensa como se muestra a continuación:

   * **Mago (Mage):** Su daño es equivalente a 1.2X su intelencto total y la probabilidad de un golpe crítico es de 0.5X su intelecto / 100. Todo daño que resulte en un golpe crítico aplicará 2x el valor del golpe. 

     En cuanto a la defensa, si el daño recibido es de tipo mágico el daño total recibido se calcula así: valor del daño - (0.8 * mDef). Para los daños físicos será: valor de daño - fDef.

   * **Guerrero (Warrior):** Su daño es equivalente a 1.4X su fuerza total y la probabilidad de un golpe crítico es de 0.6X su fuerza / 100. Todo daño que resulte en un golpe crítico aplicará 2x el valor del golpe.

     En cuanto a la defensa, si el daño recibido es de tipo mágico el daño total recibido se calcula así: valor del daño - mDef. Para los daños físicos será: valor de daño - ( 0.8 * fDef).

   * **Pícaro (Rogue):** Su daño es equivalente a 1.2X su agilidad total y la probabilidad de un golpe crítico es de 0.8X su agilidad / 100. Todo daño que resulte en un golpe crítico aplicará 2.5x el valor del golpe.

     En cuanto a la defensa, si el daño recibido es de tipo mágico el daño total recibido se calcula así: valor del daño -  mDef. Para los daños físicos será: valor de daño - fDef.

### 2. La Persistencia

Este juego nos permitirá crear nuestros personajes asociados a una cuenta de usuario, lo curioso del juego es que cada personaje que muere es eliminado del juego sin retorno. Los usuarios podrán registrarse en la interfaz de registro, allí con su correo electrónico y contraseña podrán acceder al menú principal que cuenta con las siguientes opciones:

* **Mis Personajes:** desde esta sección el usuario podrá ver una lista de sus personajes (hasta un máximo de 10 personajes podrá tener cada usuario) y el botón para crear un nuevo personaje, en donde podrá selecciónar la clase del personaje y su nombre.

* **Arena**: en la arena se combate, prueba tu suerte en la arena desafiando los personajes de los otros jugadores, cuando entras en la arena se listan los personajes con el mismo nivel al de tu personaje y hasta 2 niveles arriba del mismo en una tabla con los siguientes datos:

  | Personaje | Nivel | Clase   | Jugador               | Acción   |
  | --------- | ----- | ------- | --------------------- | -------- |
  | Foo       | 4     | Mage    | xXxPlayerDestroyerxXx | Desafiar |
  | Bar       | 4     | Warrior | FFF                   | Desafiar |
  | FooBar    | 5     | Rogue   | xXxPlayer             | Desafiar |

* **Historial:** en esta sección podrás ver el historico de las peleas, inicialmente se muestra una tabla de luchas que tiene la opción de ver detalles, con esto el usuario podrá ver el historico de las peleas.

El juego guarda cada pelea, siempre ataca primero el personaje en desafiar, después es turno del personaje desafiado, cada personaje realiza un ataca hasta que uno de los dos muera, el personaje ganador obtendrá un nivel recuperará toda su salud.

Para estas funcionalidades usted debera implementar un patrón **MVC**, además creará un **adaptador** de la clase [PDO](https://www.php.net/manual/es/class.pdo) o [mysqli](https://www.php.net/manual/es/class.mysqli) de PHP para conectarse con la base de datos, asegurandose de aplicar el patrón **singleton** en las conexiones por sesión concurrente. Para logear a los usuarios en la plataforma usted requiere de las [sesiones de PHP](https://www.php.net/manual/es/function.session-start.php).

### 3. La documentación 

Cada componente de software debe estar documentado y el proyecto debe incluir un API.

### 4. Las pruebas automatizadas

Se require que se implementen las siguientes pruebas:

* Pruebas de unidad para cada clase de la plataforma

Las pruebas de aceptación y funcionales darán puntos adicionales.