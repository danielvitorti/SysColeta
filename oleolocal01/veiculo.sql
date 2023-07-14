

-- Copiando estrutura para tabela oleolocal01.veiculo
CREATE TABLE IF NOT EXISTS veiculo (
  Id smallint(6) NOT NULL AUTO_INCREMENT,
  Nome varchar(200) NOT NULL,
  Placa varchar(200) DEFAULT NULL,
  Capacidade varchar(200) DEFAULT NULL,
  Excluido char(1) DEFAULT '0',
  PRIMARY KEY (Id)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;




