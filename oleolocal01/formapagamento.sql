

-- Copiando estrutura para tabela oleolocal01.formapagamento
CREATE TABLE IF NOT EXISTS formapagamento (
  Id smallint(6) NOT NULL AUTO_INCREMENT,
  Nome varchar(200) NOT NULL,
  Valor decimal(8,2) DEFAULT NULL,
  Excluido char(1) DEFAULT '0',
  PRIMARY KEY (Id)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;




