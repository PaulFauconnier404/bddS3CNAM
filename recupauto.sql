-- \c recupauto

-- Suppression de la base existante

DROP TABLE IF EXISTS Client
CASCADE;
DROP TABLE IF EXISTS Commande
CASCADE;
DROP TABLE IF EXISTS Pieces
CASCADE;
DROP TABLE IF EXISTS Categorie
CASCADE;
DROP TABLE IF EXISTS Voiture
CASCADE;
DROP TABLE IF EXISTS Station
CASCADE;
DROP TABLE IF EXISTS Modele
CASCADE;
DROP TABLE IF EXISTS Marque
CASCADE;
DROP TABLE IF EXISTS Administrateur
CASCADE;

-- Création de la structure de la base (tables)

CREATE TABLE Client
(
    mailClient VARCHAR(50) PRIMARY KEY NOT NULL,
    nomClient VARCHAR(50) NOT NULL,
    preClient VARCHAR(50) NOT NULL,
    telClient INTEGER NULL
);

CREATE TABLE Administrateur
(
    mailAdmin VARCHAR(50) PRIMARY KEY NOT NULL,
    nomAdmin VARCHAR(50) NOT NULL,
    prenomAdmin VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL

);

CREATE TABLE Categorie
(
    idCategorie SERIAL PRIMARY KEY NOT NULL,
    nomCategorie VARCHAR(255) NOT NULL,
    nbPiece INTEGER NULL
        CHECK (nbPiece > 0)

);

CREATE TABLE Marque
(
    idMarque SERIAL PRIMARY KEY NOT NULL,
    nomMarque VARCHAR(255) NOT NULL,
    nbModele INTEGER NULL,
    CHECK (nbModele > 0)
);

CREATE TABLE Modele
(
    idModeleVoiture SERIAL PRIMARY KEY NOT NULL,
    nomModeleVoiture VARCHAR(255) NOT NULL,
    anneeModeleVoiture DATE NOT NULL,
    nbVoiture INTEGER NULL,
    idMarqueModele INTEGER NOT NULL,
    FOREIGN KEY (idMarqueModele)
        REFERENCES Marque (idMarque),
    CHECK (nbVoiture > 0)

);

CREATE TABLE Voiture
(
    idVoiture SERIAL PRIMARY KEY NOT NULL,
    dateEntreeVoiture DATE NOT NULL,
    descriptifVoiture TEXT NOT NULL,
    couleurVoiture VARCHAR(50),
    etatVendableVoiture BOOLEAN NOT NULL,
    idModele INTEGER NOT NULL,
    FOREIGN KEY (idModele)
        REFERENCES Modele (idModeleVoiture)
);

CREATE TABLE Pieces
(
    refPiece VARCHAR(50) PRIMARY KEY NOT NULL,
    nomPiece VARCHAR(50) NOT NULL,
    quantPiece INTEGER NOT NULL,
    prixPiece FLOAT NOT NULL,
    etatPiece VARCHAR(50) NOT NULL,
    dateModifPiece DATE NOT NULL,
    idCategoriePiece INTEGER NOT NULL,
    mailAdminPiece VARCHAR(50) NOT NULL,
    idVoiturePiece INTEGER NOT NULL,
    FOREIGN KEY (idCategoriePiece)
        REFERENCES Categorie (idCategorie),
    FOREIGN KEY (mailAdminPiece )
        REFERENCES Administrateur (mailAdmin),
    FOREIGN KEY (idVoiturePiece)
        REFERENCES Voiture (idVoiture),
    CHECK (quantPiece > 0),
    CHECK (prixPiece > 0)
);

CREATE TABLE Commande
(
    idCommande SERIAL PRIMARY KEY NOT NULL,
    accompteVerse BOOLEAN NOT NULL,
    dateReservation DATE NOT NULL,
    heureClickCollect TIME NOT NULL,
    dateClickCollect DATE NOT NULL,
    mailClientCommande VARCHAR(50) NOT NULL,
    refPieceCommande VARCHAR(50) NOT NULL,
    FOREIGN KEY (mailClientCommande)
        REFERENCES Client (mailClient),
    FOREIGN KEY (refPieceCommande)
        REFERENCES Pieces (refPiece),
    CHECK (heureClickCollect >'08:00:00'),
    CHECK (dateReservation < dateClickCollect)

);





-- Insertion de données de test et validation du fonctionnement de la base

INSERT INTO Client
    (mailClient, nomClient, preClient, telClient)
VALUES
    ('jeandupont@gmail.com', 'Dupont', 'Jean', 0583562383);
INSERT INTO Client
    (mailClient, nomClient, preClient, telClient)
VALUES
    ('micheldupuit@gmail.com', 'Dupuit', 'Michel', 0988963334);
INSERT INTO Client
    (mailClient, nomClient, preClient, telClient)
VALUES
    ('johndoe@gmail.com', 'Doe', 'John', 678326018);

INSERT INTO Administrateur
    (mailAdmin, nomAdmin, prenomAdmin, password)
VALUES
    ('administrateur1@gmail.com', 'Anthony', 'Fauconnier', '$2y$10$RMTmn75/bpkHwmyOWhhzI.6jjW8MnIuPh9UKrAbSsSaWS8x6O8.42');


INSERT INTO Categorie
    (nomCategorie)
VALUES
    ('Carrosserie');
INSERT INTO Categorie
    (nomCategorie)
VALUES
    ('Transmission');
INSERT INTO Categorie
    (nomCategorie)
VALUES
    ('Moteur');
INSERT INTO Categorie
    (nomCategorie)
VALUES
    ('Electrique');
INSERT INTO Categorie
    (nomCategorie)
VALUES
    ('Electronique');

INSERT INTO Marque
    (nomMarque)
VALUES
    ('Peugeot');
INSERT INTO Marque
    (nomMarque)
VALUES
    ('Citroen');

INSERT INTO Modele
    (nomModeleVoiture, anneeModeleVoiture, idMarqueModele)
VALUES
    ('208', '2021-11-09', 1);
INSERT INTO Modele
    (nomModeleVoiture, anneeModeleVoiture, idMarqueModele)
VALUES
    ('308', '2021-11-09', 1);
INSERT INTO Modele
    (nomModeleVoiture, anneeModeleVoiture, idMarqueModele)
VALUES
    ('Kangoo', '2021-11-09', 2);


INSERT INTO Voiture
    (dateEntreeVoiture, descriptifVoiture, couleurVoiture, etatVendableVoiture, idModele)
VALUES
    ('2021-11-09', 'Voiture accidenté sur l''avant droit / Moteur intacte mais l''arbre d''admission est en très mauvais état', 'Rouge vif', FALSE, 1);
INSERT INTO Voiture
    (dateEntreeVoiture, descriptifVoiture, couleurVoiture, etatVendableVoiture, idModele)
VALUES
    ('2021-10-23', 'Voiture sans moteur', 'Bleu nuit', FALSE, 2);
INSERT INTO Voiture
    (dateEntreeVoiture, descriptifVoiture, couleurVoiture, etatVendableVoiture, idModele)
VALUES
    ('2021-09-14', 'Problème électronique', 'Vert', TRUE, 1);


INSERT INTO Pieces
    (refPiece, nomPiece, quantPiece, prixPiece, etatPiece, dateModifPiece, idCategoriePiece, mailAdminPiece, idVoiturePiece)
VALUES
    ('ERTGCJ', 'Ampoule H7 55W', 7, 5.99, 'Très bon état', '2021-11-09', 4, 'administrateur1@gmail.com', 1);
INSERT INTO Pieces
    (refPiece, nomPiece, quantPiece, prixPiece, etatPiece, dateModifPiece, idCategoriePiece, mailAdminPiece, idVoiturePiece)
VALUES
    ('SDEJKF', 'Volant de voiture', 2, 54.99, 'Peu de temps de route', '2021-10-09', 2, 'administrateur1@gmail.com', 2);
INSERT INTO Pieces
    (refPiece, nomPiece, quantPiece, prixPiece, etatPiece, dateModifPiece, idCategoriePiece, mailAdminPiece, idVoiturePiece)
VALUES
    ('EHRLDM', 'Roue 55 " ', 7, 44.99, 'Très bon état', '2021-11-09', 4, 'administrateur1@gmail.com', 3);

INSERT INTO Commande
    (accompteVerse, dateReservation, heureClickCollect, dateClickCollect, mailClientCommande, refPieceCommande)
VALUES
    (TRUE, '2021-09-28', '12:00:00', '2021-12-30', 'micheldupuit@gmail.com', 'SDEJKF');
INSERT INTO Commande
    (accompteVerse, dateReservation, heureClickCollect, dateClickCollect, mailClientCommande, refPieceCommande)
VALUES
    (FALSE, '2021-08-21', '13:32:32', '2021-12-30', 'micheldupuit@gmail.com', 'EHRLDM');
INSERT INTO Commande
    (accompteVerse, dateReservation, heureClickCollect, dateClickCollect, mailClientCommande, refPieceCommande)
VALUES
    (TRUE, '2021-10-28', '09:03:30', '2021-12-30', 'jeandupont@gmail.com', 'SDEJKF');
INSERT INTO Commande
    (accompteVerse, dateReservation, heureClickCollect, dateClickCollect, mailClientCommande, refPieceCommande)
VALUES
    (TRUE, '2021-11-01', '17:03:10', '2021-12-30', 'johndoe@gmail.com', 'ERTGCJ');




-- Création des fonctions et des vues
CREATE OR REPLACE FUNCTION Nombre_de_modele_dune_marque
()
    RETURNS TRIGGER
    
AS $$
DECLARE
    		nbModeleTrig INTEGER;
BEGIN
    SELECT COUNT(*)
    INTO nbModeleTrig
    FROM modele, marque
    WHERE idmarqueModele = idmarque;

    UPDATE marque SET nbmodele = nbModeleTrig WHERE idmarque = idmarque;

    RETURN OLD;
END;
$$ LANGUAGE plpgsql;


CREATE OR REPLACE FUNCTION Nombre_de_piece_dans_categorie
()
    RETURNS TRIGGER
AS $$
DECLARE
		nbPieceTrig INTEGER;
BEGIN
    SELECT COUNT(*)
    INTO nbPieceTrig
    FROM pieces, categorie
    WHERE idcategoriepiece = idcategorie;

    UPDATE categorie SET nbpiece = nbPieceTrig WHERE idcategorie = idcategorie;
    RETURN OLD;
END;
$$ LANGUAGE plpgsql;



CREATE OR REPLACE FUNCTION Nombre_de_voiture_dun_modele
()
    RETURNS TRIGGER  
AS $$
DECLARE
		nbVoitureTrig INTEGER;
BEGIN
    SELECT COUNT(*)
    INTO nbVoitureTrig
    FROM modele, voiture
    WHERE idmodele = idmodelevoiture;

    UPDATE modele SET nbvoiture = nbVoitureTrig WHERE idmodelevoiture = idmodelevoiture;

    RETURN OLD;
END;
$$ LANGUAGE plpgsql;



CREATE TRIGGER Nombre_de_voiture_dun_modele_trigger
    AFTER
INSERT ON
voiture
FOR
EACH
ROW
EXECUTE FUNCTION Nombre_de_voiture_dun_modele
();

CREATE TRIGGER Nombre_de_modele_dune_marque_trigger
    AFTER
INSERT ON
voiture
FOR
EACH
ROW
EXECUTE FUNCTION Nombre_de_modele_dune_marque
();

CREATE TRIGGER Nombre_de_piece_dans_categorie_trigger
    AFTER
INSERT ON
pieces
FOR
EACH
ROW
EXECUTE FUNCTION Nombre_de_piece_dans_categorie
();



