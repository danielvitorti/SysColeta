

-- Copiando estrutura para tabela oleolocal01.usuario
CREATE TABLE IF NOT EXISTS usuario (
  Id int(11) NOT NULL AUTO_INCREMENT,
  login varchar(200) NOT NULL,
  Senha text DEFAULT NULL,
  NivelAcesso smallint(6) NOT NULL DEFAULT 1,
  DataCadastro datetime NOT NULL,
  nome varchar(200) DEFAULT NULL,
  Status smallint(6) NOT NULL DEFAULT 1,
  Email varchar(200) DEFAULT NULL,
  IdMotorista int(11) DEFAULT NULL,
  IdCliente int(11) DEFAULT NULL,
  Excluido char(1) DEFAULT '0',
  PRIMARY KEY (Id)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;




