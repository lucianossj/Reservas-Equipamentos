CREATE DATABASE TIULBRA;

USE TIULBRA;

CREATE TABLE Usuario (
  idUsuario INTEGER NOT NULL   AUTO_INCREMENT,
  tipo VARCHAR(20)  NULL ,
  nome VARCHAR(20)  NULL  ,
  nomeUsuario VARCHAR(20)  NULL  ,
  senha VARCHAR(20)  NULL    ,
  email TEXT  NULL    ,
PRIMARY KEY(idUsuario));

CREATE TABLE Equipamento (
  idEquipamento INTEGER NOT NULL   AUTO_INCREMENT,
  tipo VARCHAR(20)  NULL  ,
  numPatrimonio INT  NULL  ,
  numSerie VARCHAR(20)  NULL  ,
  statusEquipamento VARCHAR(20)  NULL    ,
PRIMARY KEY(idEquipamento));


CREATE TABLE ReservaEquipamento (
  idReservaEquipamento INTEGER NOT NULL   AUTO_INCREMENT,
  idUsuario INTEGER NOT NULL  ,
  idEquipamento INTEGER  NOT NULL  ,
  numSala INT  NULL  ,
  responsavel VARCHAR(20)  NULL  ,
  curso VARCHAR(20)  NULL  ,
  disciplina VARCHAR(20)  NULL    ,
PRIMARY KEY(idReservaEquipamento),
FOREIGN KEY (idUsuario) REFERENCES usuario(idUsuario),
FOREIGN KEY (idEquipamento) REFERENCES equipamento(idEquipamento)
);



