

-- Copiando estrutura para tabela oleolocal01.documento
CREATE TABLE IF NOT EXISTS documento (
  Id int(11) NOT NULL AUTO_INCREMENT,
  Titulo varchar(200) NOT NULL,
  Texto text DEFAULT NULL,
  DataCadastro date NOT NULL,
  Arquivo text DEFAULT NULL,
  IdCliente int(11) NOT NULL,
  DataValidade date DEFAULT NULL,
  Excluido char(1) DEFAULT '0',
  PRIMARY KEY (Id),
  KEY FK_DOCUMENTO_CLIENTE (IdCliente),
  CONSTRAINT FK_DOCUMENTO_CLIENTE FOREIGN KEY (IdCliente) REFERENCES cliente (Id) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




