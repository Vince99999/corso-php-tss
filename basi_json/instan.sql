-- Active: 1677862082090@@127.0.0.1@3306@form_in_php
use form_in_php;

CREATE TABLE regione (
regione_id INT not null AUTO_INCREMENT,
nome_regione VARCHAR (255) not null,
primary key (regione_id)
) ;


drop table regione;


insert into regione (nome_regione)
            value('Abruzzo');

            CREATE TABLE provincia (
provincia_id INT not null AUTO_INCREMENT,
nome VARCHAR (255) not null,
sigla VARCHAR (2) not null,
id_regione int not null,
primary key (provincia_id)
) ;


select regione_id from regione where nome_regione="Lazio";