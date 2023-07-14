

-- Copiando estrutura para tabela oleolocal01.formapagamentocliente
CREATE TABLE IF NOT EXISTS formapagamentocliente (
  Id int(11) NOT NULL AUTO_INCREMENT,
  IdFormaPagamento int(11) NOT NULL,
  IdCliente int(11) NOT NULL,
  Excluido char(1) DEFAULT '0',
  Quantidade int(11) DEFAULT NULL,
  Descricao varchar(200) DEFAULT NULL,
  DataCadastro datetime DEFAULT NULL,
  PRIMARY KEY (Id)
) ENGINE=MyISAM AUTO_INCREMENT=603 DEFAULT CHARSET=latin1;




