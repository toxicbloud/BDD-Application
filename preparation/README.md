## Préparation séance 3

1. mesurer le temps d'éxécution d'une séquence d'instruction en PHP
   ```php
   $start = microtime(true);
   //instruction à éxecuter
   $end = microtime(true);
   $time = $end - $start;
   ```

  
2. 
 L'index est utilie pour accélerer l'éxécution d'une requete SQL lisant des données .
Un index ralentit l'ajout et la mise a jour de données mais accelère enormement la lecture des données.

# partie 2

1. les logs nous permettent de voir la requete SQL produit par le query builder
2. les requetes N+1 nécessite  de faire des jointures entre les tables
   et le edge loading charge les données de la table enfant lorsqu'on accède à une donnée de la table parent ce qui ralentit notre application