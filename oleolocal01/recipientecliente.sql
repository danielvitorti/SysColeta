

-- Copiando estrutura para tabela oleolocal01.recipientecliente
CREATE TABLE IF NOT EXISTS recipientecliente (
  Id int(11) NOT NULL AUTO_INCREMENT,
  IdCliente int(11) NOT NULL,
  IdRecipiente int(11) NOT NULL,
  DataCadastro datetime NOT NULL DEFAULT current_timestamp(),
  Excluido char(1) DEFAULT '0',
  Descricao varchar(200) DEFAULT NULL,
  Quantidade int(11) DEFAULT NULL,
  PRIMARY KEY (Id)
) ENGINE=MyISAM AUTO_INCREMENT=1071 DEFAULT CHARSET=latin1;




