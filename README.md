# BDD-Application Séance 1
Modélisation de la base de donnée Gamepedia :



- Jeu(PK_ID_Jeu,nom,descriptionCourte,descriptionLongue,dateSortieInitiale,dateSortieAttendue,FK_ID_Compagnie)
- Plateforme(PK_ID_Plateforme,nom,alias,descriptioncourte,descriptionLongue,dateSortie,tarifInitial,decompte,FK_ID_Compagnie)
- Compagnie(PK_ID_Compagnie,nom,alias,abreviation,descriptionCourte,descriptionLongue,adresse,dateCreation,noTelephone,urlSiteWeb)
- Personnage(PK_ID_Personnage,nom,alias,nomReel,nomFamille,dateNaissance,genre,descriptionCourte,descriptionLongue)
- Genre(PK_ID_Genre,nom,descriptionCourte,descriptionLongue)
- Classement(PK_ID_Classement,nom,FK_ID_Organisme)
- Organisme(PK_ID_Organisme,nom,descriptionCourte,descriptionLongue)
- Theme(PK_ID_Theme,nom)
- Jeu2Classement(PK_ID_Jeu,PK_ID_Classement)
- Jeu2Genre(PK_ID_Jeu,PK_ID_Genre)
- Jeu2Personnage(PK_ID_Jeu,PK_ID_Personnage)
- Amis(PK_ID_Personnage,PK_ID_Personnage)
- Enemies(PK_ID_Personnage,PK_ID_Personnage)
- Jeu2Theme(PK_ID_Jeu,PK_ID_Theme)
- Jeu2Plateforme(PK_ID_Jeu,PK_ID_Plateforme)
- Publication(PK_ID_Jeu,PK_ID_Compagnie)

***Les tables pivot ont pour clef primaire leurs deux clef étrangère réunies***
