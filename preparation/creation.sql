create table Categorie (
    id integer primary key autoincrement,
    name text,
    description text
);
create table Annonce(
    id integer primary key autoincrement,
    titre text,
    date date,
    texte text
);
create table Photo(
    id integer primary key autoincrement,
    file text,
    date date,
    taille_octet integer,
    annonce_ID integer,
    FOREIGN KEY(annonce_ID) REFERENCES Annonce(id)
);
create table Categorie_Annonce(
    id integer primary key autoincrement,
    categorie_ID integer,
    annonce_ID integer,
    FOREIGN KEY(categorie_ID) REFERENCES Categorie(id),
    FOREIGN KEY(annonce_ID) REFERENCES Annonce(id)
);