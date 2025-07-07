CREATE TABLE IF NOT EXISTS cliente(
  id int DEFAULT 0 NOT NULL AUTOINCREMENT,
  nome varchar(50) NOT NULL,
  endereco varchar(80),
  PRIMARY KEY(id),
  KEY nomecliente(nome)
);

CREATE TABLE IF NOT EXISTS conta(
  numero int DEFAULT 0 NOT NULL AUTOINCREMENT,
  saldo decimal(16,2) DEFAULT 0.0,
  PRIMARY KEY (numero)
);

CREATE TABLE IF NOT EXISTS possui(
  idcliente int NOT NULL,
  numconta int, 
  PRIMARY KEY (idcliente,numconta)
);