## TD séance 3

# Partie 1 

Le cache mysql nous fait gagner 0.4 secondes sur la requête.

1. 

duree requete LIKE : 0.56857705116272
duree requete LIKE : 0.037117958068848
duree requete LIKE : 0.035637140274048

duree requete LIKE : 0.037554025650024
duree requete LIKE : 0.036566019058228
duree requete LIKE : 0.037497043609619

# Partie 2

1. liste des jeux dont le nom contient Mario : 
    449 requetes
2. nom des personnages du jeu 12342
   2 requetes
3. afficher les noms des persos apparus pour la 1ère fois dans 1 jeu dont le nom contient
Mario
4. afficher le nom des personnages des jeux dont le nom (du jeu) contient 'Mario'
   8 requetes
5. jeux développés par une compagnie dont le nom contient Sony
   14 requetes

Afficher le nom des personnages des jeux dont le nom du jeu commence par Mario
   ```sql
   select * from `game` where `name` like ?
   select `character`.*, `game2character`.`game_id` as `pivot_game_id`, `game2character`.`character_id` as `pivot_character_id` from `character` inner join `game2character` on `character`.`id` = `game2character`.`character_id` where `game2character`.`game_id` in (?, ?, ?, ?, ?, ?, ?)
   ```
8 requetes sont utilisées sans eage loading car il doit charger chaque etudiants en faisant une requete avec with il realise 2 requetes et utilise des  jointures pour tout charger

```sql
select * from `company` where `name` like ?;
select `game`.*, `game_developers`.`comp_id` as `pivot_comp_id`, `game_developers`.`game_id` as `pivot_game_id` from `game` inner join `game_developers` on `game`.`id` = `game_developers`.`game_id` where `game_developers`.`comp_id` in (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);
```


sans with : 14 requetes avec with  2 requetes