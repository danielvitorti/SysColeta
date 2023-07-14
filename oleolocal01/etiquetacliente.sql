

-- Copiando estrutura para tabela oleolocal01.etiquetacliente
CREATE TABLE IF NOT EXISTS etiquetacliente (
  Id int(11) NOT NULL AUTO_INCREMENT,
  IdEtiqueta smallint(6) NOT NULL,
  IdCliente smallint(6) NOT NULL,
  DataCadastro datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (Id)
) ENGINE=MyISAM AUTO_INCREMENT=2551 DEFAULT CHARSET=latin1;




