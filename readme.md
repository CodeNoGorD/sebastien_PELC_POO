Donner 5 méthodes magiques que vous avez étudié en PHP OO. Expliquez les éléments
déclencheurs de l’exécution de la méthode magique (0.5 point par méthode)

Pour chacune des méthodes ci-dessus proposez un exemple de script qui appellera la méthode de manière implicite
(0.5 point par méthode)

-----------------------------------------------------------
Voici les 5 méthodes magiques choisies : 


__construct()
Le constructeur est une méthode de la classe qui est automatique appelée à la création d’un objet (instance de la classe). Cette méthode est pratique pour initialiser les paramètres d’un objet au moment de le créer.

```php
class Voiture{
    const NOMBREAIRBAG = 3;
    function __construct() { // constructeur
        echo "Une nouvelle voiture vient d'être fabriquée";
    }
    public function demarrage(){
        echo "La voiture de marque";
    }
}
$mavoiture  = new Voiture();
```
__destruct()
Le destructeur est une méthode de la classe qui est automatique appelée à la destruction d’un objet (instance de la classe), c’est à dire lorsque la référence de cet objet est détruite.
```php
class Voiture{
    const NOMBREAIRBAG = 3;
    function __construct() {
        echo "Une nouvelle voiture vient d'être fabriquée";
    }
    public function __destruct() { // destructeur
        echo 'Voiture detruite';
    }
    public function demarrage(){
        echo "La voiture de marque";
    }
}
$mavoiture  = new Voiture(); // appel de __construct
$mavoiture = null; // on détruit la référence : appel de __destruct
```
__sleep()
Cette méthode est appelée avant toute linéarisation (conversion de données en chaîne avec la fonction serialize() ). Son rôle et de retourner un tableau avec les noms de toutes les variables de l’objet qui doivent être linéarisées .
```php
class Soda{
    public $marque;
    private $prop = [];
    function __construct($marque) {
        $this->marque = $marque;
    }
    function __sleep() {
        echo 'objet sérialisé';
        return array('dsn', 'username', 'password');
    }
}
$mabouteille = new Soda('coca');
$serialisation = serialize($mabouteille); // sérialisation
```

__wakeup()
Cette méthode est réciproque à __sleep() et est appelée pour la reconstruction des données avec la fonction unserialize().

```php
class Soda{
    public $marque;
    private $prop = [];
    function __construct($marque) {
        $this->marque = $marque;
    }
    function __sleep() {
        echo 'objet sérialisé';
        return array('dsn', 'username', 'password');
    }
    function __wakeup() {
        echo '<br>objet reconstruit';
    }
}
$mabouteille = new Soda('coca');
$serialisation = serialize($mabouteille);
unserialize($serialisation); // reconstruction
```
__toString()
Cette méthode est appelée lorque l’objet est traitée comme une chaîne.

```php
class Soda{
    public $marque;
    private $prop = [];
    function __construct($marque) {
        $this->marque = $marque;
    }
    function __toString() {
        return $this->marque;
    }
}
$mabouteille = new Soda('coca');
echo $mabouteille;
```




