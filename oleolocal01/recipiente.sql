

-- Copiando estrutura para tabela oleolocal01.recipiente
CREATE TABLE IF NOT EXISTS recipiente (
  Id smallint(6) NOT NULL AUTO_INCREMENT,
  Nome varchar(200) NOT NULL,
  Capacidade decimal(4,2) DEFAULT NULL,
  Excluido char(1) DEFAULT '0',
  PRIMARY KEY (Id)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;




