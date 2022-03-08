# BDD-Application Séance 1
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
