CREATE TABLE Usuario (
  idUsuario INTEGER NOT NULL   AUTO_INCREMENT,
  tipo VARCHAR(20)  NULL ,
  nome VARCHAR(20)  NULL  ,
  nomeUsuario VARCHAR(20)  NULL  ,
  senha VARCHAR(20)  NULL    ,
PRIMARY KEY(idUsuario));

CREATE TABLE Equipamento (
  idEquipamento INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  idUsuario INTEGER NOT NULL  ,
  tipo VARCHAR(20)  NULL  ,
  numPatrimonio INT  NULL  ,
  numSerie VARCHAR(20)  NULL  ,
  statusEquipamento VARCHAR(20)  NULL    ,
PRIMARY KEY(idEquipamento)  ,
INDEX Equipamento_FKIndex1(idUsuario),
  FOREIGN KEY(idUsuario)
    REFERENCES Usuario(idUsuario)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION);

CREATE TABLE ReservaEquipamento (
  idReservaEquipamento INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  idUsuario INTEGER UNSIGNED  NOT NULL  ,
  Equipamento_idEquipamento INTEGER UNSIGNED  NOT NULL  ,
  numSala INT  NULL  ,
  responsavel VARCHAR(20)  NULL  ,
  curso VARCHAR(20)  NULL  ,
  disciplina VARCHAR(20)  NULL    ,
PRIMARY KEY(idReservaEquipamento)  ,
INDEX ReservaEquipamento_FKIndex1(Equipamento_idEquipamento)  ,
INDEX ReservaEquipamento_FKIndex2(idUsuario),
  FOREIGN KEY(Equipamento_idEquipamento)
    REFERENCES Equipamento(idEquipamento)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(idUsuario)
    REFERENCES Usuario(idUsuario)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION);

