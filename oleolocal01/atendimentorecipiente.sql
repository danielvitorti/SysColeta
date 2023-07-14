

-- Copiando estrutura para tabela oleolocal01.atendimentorecipiente
CREATE TABLE IF NOT EXISTS atendimentorecipiente (
  Id int(11) NOT NULL AUTO_INCREMENT,
  IdAtendimento int(11) DEFAULT NULL,
  IdRecipiente smallint(6) NOT NULL,
  DataCadastro date NOT NULL,
  Quantidade int(11) DEFAULT NULL,
  IdCliente int(11) DEFAULT NULL,
  IdRota int(11) DEFAULT NULL,
  PRIMARY KEY (Id)
) ENGINE=MyISAM AUTO_INCREMENT=10278 DEFAULT CHARSET=latin1;




