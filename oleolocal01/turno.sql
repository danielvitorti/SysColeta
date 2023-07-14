

-- Copiando estrutura para tabela oleolocal01.turno
CREATE TABLE IF NOT EXISTS turno (
  Id int(11) NOT NULL AUTO_INCREMENT,
  Nome varchar(200) NOT NULL,
  Excluido char(1) DEFAULT '0',
  PRIMARY KEY (Id)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;




