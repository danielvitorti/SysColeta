

-- Copiando estrutura para tabela oleolocal01.rota
CREATE TABLE IF NOT EXISTS rota (
  Id int(11) NOT NULL AUTO_INCREMENT,
  IdMotorista int(11) NOT NULL,
  DataRota datetime DEFAULT NULL,
  Turno varchar(200) DEFAULT NULL,
  Perimetro varchar(200) DEFAULT NULL,
  DataCadastro datetime DEFAULT NULL,
  Observacao varchar(200) DEFAULT NULL,
  Nome varchar(200) NOT NULL,
  Liberada tinyint(4) NOT NULL DEFAULT 0,
  Status smallint(6) DEFAULT NULL,
  IdVeiculo smallint(6) DEFAULT NULL,
  Excluido char(1) DEFAULT '0',
  PRIMARY KEY (Id)
) ENGINE=InnoDB AUTO_INCREMENT=892 DEFAULT CHARSET=utf8mb4;




