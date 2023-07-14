

-- Copiando estrutura para tabela oleolocal01.rotaturno
CREATE TABLE IF NOT EXISTS rotaturno (
  Id int(11) NOT NULL AUTO_INCREMENT,
  IdTurno int(11) NOT NULL,
  DataCadastro datetime NOT NULL DEFAULT current_timestamp(),
  IdRota int(11) NOT NULL,
  PRIMARY KEY (Id)
) ENGINE=MyISAM AUTO_INCREMENT=1284 DEFAULT CHARSET=latin1;




