

-- Copiando estrutura para tabela oleolocal01.tipopagamentocliente
CREATE TABLE IF NOT EXISTS tipopagamentocliente (
  Id int(11) NOT NULL AUTO_INCREMENT,
  IdTipoPagamento int(11) NOT NULL,
  IdCliente int(11) NOT NULL,
  Excluido char(1) DEFAULT '0',
  Quantidade int(11) DEFAULT NULL,
  Descricao varchar(200) DEFAULT NULL,
  DataCadastro datetime DEFAULT NULL,
  PRIMARY KEY (Id)
) ENGINE=MyISAM AUTO_INCREMENT=469 DEFAULT CHARSET=latin1;




