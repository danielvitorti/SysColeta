

-- Copiando estrutura para tabela oleolocal01.motorista
CREATE TABLE IF NOT EXISTS motorista (
  Id int(11) NOT NULL AUTO_INCREMENT,
  Nome varchar(200) NOT NULL,
  Habilitacao varchar(10) NOT NULL,
  Telefone varchar(30) DEFAULT NULL,
  Observacao varchar(200) DEFAULT NULL,
  DataCadastro datetime DEFAULT NULL,
  Excluido char(1) DEFAULT '0',
  IdVeiculo smallint(6) DEFAULT NULL,
  PRIMARY KEY (Id)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;




