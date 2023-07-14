

-- Copiando estrutura para tabela oleolocal01.recipientecoleta
CREATE TABLE IF NOT EXISTS recipientecoleta (
  Id int(11) NOT NULL AUTO_INCREMENT,
  IdRecipiente int(11) NOT NULL,
  IdColeta int(11) NOT NULL,
  DataCadastro datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (Id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




