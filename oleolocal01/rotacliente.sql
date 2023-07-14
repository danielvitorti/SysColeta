

-- Copiando estrutura para tabela oleolocal01.rotacliente
CREATE TABLE IF NOT EXISTS rotacliente (
  Id int(11) NOT NULL AUTO_INCREMENT,
  IdCliente int(11) NOT NULL,
  IdRota int(11) NOT NULL,
  DataCadastro datetime NOT NULL DEFAULT current_timestamp(),
  ordem int(11) DEFAULT NULL,
  PRIMARY KEY (Id),
  KEY FK_ROTA_CLIENTE_CLIENTE (IdCliente)
) ENGINE=InnoDB AUTO_INCREMENT=9718 DEFAULT CHARSET=latin1;




