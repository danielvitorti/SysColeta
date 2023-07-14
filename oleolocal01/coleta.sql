

-- Copiando estrutura para tabela oleolocal01.coleta
CREATE TABLE IF NOT EXISTS coleta (
  Id int(11) NOT NULL AUTO_INCREMENT,
  Quantidade decimal(4,2) NOT NULL,
  Pagamento decimal(4,2) NOT NULL,
  DataCadastro datetime NOT NULL,
  IdCliente int(11) NOT NULL,
  IdMotorista int(11) NOT NULL,
  IdFormaPagamento smallint(6) NOT NULL,
  Observacao varchar(200) DEFAULT NULL,
  Excluido char(1) DEFAULT '0',
  PRIMARY KEY (Id),
  KEY FK_COLETA_MOTORISTA (IdMotorista),
  KEY FK_COLETA_CLIENTE (IdCliente),
  KEY FK_COLETA_FORMA_PAGAMENTO (IdFormaPagamento),
  CONSTRAINT FK_COLETA_CLIENTE FOREIGN KEY (IdCliente) REFERENCES cliente (Id) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT FK_COLETA_FORMA_PAGAMENTO FOREIGN KEY (IdFormaPagamento) REFERENCES formapagamento (Id) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT FK_COLETA_MOTORISTA FOREIGN KEY (IdMotorista) REFERENCES motorista (Id) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




