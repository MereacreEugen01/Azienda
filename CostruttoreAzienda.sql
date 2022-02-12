drop database if exists azienda;
create database azienda ;
use azienda;

CREATE TABLE Componenti(
   id_comp VARCHAR(4) NOT NULL,
   nome_componente VARCHAR(25) NOT NULL,
   fornitore VARCHAR(25) NOT NULL,
   costo_unitario DOUBLE NOT NULL,
   CONSTRAINT ChiavePrimaria PRIMARY KEY(id_comp)
);
CREATE TABLE Dipartimenti(
   id_dip VARCHAR(3) NOT NULL,
   nome_dipartimento VARCHAR(30) NOT NULL,
   localita VARCHAR(20) NOT NULL,
   provincia VARCHAR(2) NOT NULL,
   CONSTRAINT ChiavePrimaria PRIMARY KEY(id_dip)
);
CREATE TABLE Personale(
   matricola VARCHAR(5) NOT NULL,
   id_dip VARCHAR(3) NOT NULL,
   nominativo VARCHAR(50) NOT NULL,
   data_nascita DATE NOT NULL,
   qualifica VARCHAR(20) NOT NULL,
   stipendio DOUBLE NOT NULL,
   CONSTRAINT ChiavePrimaria PRIMARY KEY(matricola),
   CONSTRAINT DipartimentiPersonale FOREIGN KEY(id_dip) REFERENCES Dipartimenti(id_dip)
   ON UPDATE CASCADE ON DELETE CASCADE
);
CREATE TABLE Prodotti(
   id_prod VARCHAR(4) NOT NULL,
   id_dip VARCHAR(3) NOT NULL,
   nome_prodotto VARCHAR(50) NOT NULL,
   prezzo DOUBLE NOT NULL,
   CONSTRAINT ChiavePrimaria PRIMARY KEY(id_prod),
   CONSTRAINT DipartimentiProdotti FOREIGN KEY(id_dip) REFERENCES Dipartimenti(id_dip)
   ON UPDATE CASCADE ON DELETE CASCADE
);
CREATE TABLE Composizione(
   id_prod VARCHAR(4) NOT NULL,
   id_comp VARCHAR(4) NOT NULL,
   unita_comp REAL NOT NULL,
   CONSTRAINT ChiavePrimaria PRIMARY KEY(id_prod,id_comp),
   CONSTRAINT ComponentiComposizione FOREIGN KEY(id_comp) REFERENCES Componenti(id_comp)
   ON UPDATE CASCADE ON DELETE CASCADE,
   CONSTRAINT ProdottiComposizione FOREIGN KEY(id_prod) REFERENCES Prodotti(id_prod)
   ON UPDATE CASCADE ON DELETE CASCADE
);