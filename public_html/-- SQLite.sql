CREATE TABLE IF NOT EXISTS cliente(
  id int DEFAULT 0 NOT NULL, /* não tem AUTOINCREMENT pois já é chave primária. */
  nome varchar(50) NOT NULL,
  endereco varchar(80),
  PRIMARY KEY(id)
);
CREATE TABLE IF NOT EXISTS conta(
  numero int DEFAULT 0 NOT NULL,
  saldo decimal(16,2) DEFAULT 0.0,
  PRIMARY KEY (numero)
);

CREATE TABLE IF NOT EXISTS possui(
  idcliente int NOT NULL,
  numconta int, 
  PRIMARY KEY (idcliente,numconta)
);