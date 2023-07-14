

-- Copiando estrutura para tabela oleolocal01.atendimentoformapagamento
CREATE TABLE IF NOT EXISTS atendimentoformapagamento (
  Id int(11) NOT NULL AUTO_INCREMENT,
  IdFormaPagamento smallint(6) NOT NULL,
  IdAtendimento int(11) DEFAULT NULL,
  DataCadastro date NOT NULL,
  Quantidade int(11) DEFAULT NULL,
  ValorPago decimal(8,2) DEFAULT NULL,
  ValorPagamento decimal(8,2) DEFAULT NULL,
  IdCliente int(11) DEFAULT NULL,
  IdRota int(11) DEFAULT NULL,
  PRIMARY KEY (Id)
) ENGINE=MyISAM AUTO_INCREMENT=13261 DEFAULT CHARSET=latin1;




