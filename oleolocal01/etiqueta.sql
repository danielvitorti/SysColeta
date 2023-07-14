

-- Copiando estrutura para tabela oleolocal01.etiqueta
CREATE TABLE IF NOT EXISTS etiqueta (
  Id smallint(6) NOT NULL AUTO_INCREMENT,
  Descricao varchar(200) NOT NULL,
  Excluido char(1) DEFAULT '0',
  PRIMARY KEY (Id)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;




