## Préparation séance 2
1.
Categorie(PK_ID_Categorie,nom,description)
Annonce(PK_ID_Annonce,titre,date,texte)
Photo(PK_ID_Photo,file,date,taille_octet,FK_ID_Annonce)
Categorie2Annonce(FK_ID_Categorie,FK_ID_Annonce)

```sql
create  table Categorie (
id integer  primary key autoincrement,
name text,
description text
);

create  table Annonce(
id integer  primary key autoincrement,
titre text,
date  date,
texte text
);

create  table Photo(
id integer  primary key autoincrement,
file text,
date  date,
taille_octet integer,
annonce_ID integer,
FOREIGN KEY(annonce_ID) REFERENCES Annonce(id)
);

create  table Categorie_Annonce(
id integer  primary key autoincrement,
categorie_ID integer,
annonce_ID integer,
FOREIGN KEY(categorie_ID) REFERENCES Categorie(id),
FOREIGN KEY(annonce_ID) REFERENCES Annonce(id)
);
```
2. Eloquent 
Pour les associations de la table annonce on utilise une table pivot on doit donc utiliser la méthode belongsToMany
```php
public function categories(){
	return $this->belongsToMany('gamepedia\Categorie','Categorie_Annonce','annonce_ID','categorie_ID');
}

```

## 3.

 1.
```php
$photos = Annonce::find(22)->photos();
```
  2.
```php
  $photos = Annonce::find(22)->photos()->where('taille_octet','>','100000');
```
3.
```php
$annonces = Annonce::has('photo','>',3)->get();
```
4.
```php
$annonces = Annonce::has('photo',function($q){
$q->where('taille','>',100000);
})->get();
```
## 4.

```php
$photo = new Photo;
$photo->annonceID = 22;
$photo->file='test.jpg';
$photo-save();
...
```

## 5.

```php
$ca1 = new CategorieAnnonce;
$ca1->categorie_ID = 42;
$ca1->annonce_ID=22;
$ca1->save();
```

