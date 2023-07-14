

-- Copiando estrutura para tabela oleolocal01.atendimentotipopagamento
CREATE TABLE IF NOT EXISTS atendimentotipopagamento (
  Id int(11) NOT NULL AUTO_INCREMENT,
  IdTipoPagamento int(11) DEFAULT NULL,
  IdAtendimento int(11) DEFAULT NULL,
  DataCadastro datetime DEFAULT current_timestamp(),
  ValorPagamento decimal(8,2) DEFAULT NULL,
  IdCliente int(11) DEFAULT NULL,
  IdRota int(11) DEFAULT NULL,
  PRIMARY KEY (Id)
) ENGINE=MyISAM AUTO_INCREMENT=9829 DEFAULT CHARSET=latin1;




syscoleta