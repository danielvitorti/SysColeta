

-- Copiando estrutura para tabela oleolocal01.atendimento
CREATE TABLE IF NOT EXISTS atendimento (
  Id int(11) NOT NULL AUTO_INCREMENT,
  IdRota int(11) NOT NULL,
  QuantidadeColetada int(11) DEFAULT NULL,
  Observacao varchar(200) DEFAULT NULL,
  Status char(1) NOT NULL DEFAULT '0',
  DataCadastro datetime NOT NULL DEFAULT current_timestamp(),
  IdCliente int(11) DEFAULT NULL,
  Excluido char(1) DEFAULT '0',
  PRIMARY KEY (Id)
) ENGINE=MyISAM AUTO_INCREMENT=10210 DEFAULT CHARSET=latin1;




