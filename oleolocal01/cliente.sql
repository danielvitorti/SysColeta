

-- Copiando estrutura para tabela oleolocal01.cliente
CREATE TABLE IF NOT EXISTS cliente (
  Id int(11) NOT NULL AUTO_INCREMENT,
  Nome varchar(200) NOT NULL,
  CnpjCpf varchar(30) NOT NULL,
  NomeResponsavel varchar(100) DEFAULT NULL,
  Email varchar(200) NOT NULL,
  EnderecoColeta varchar(200) DEFAULT NULL,
  HorarioColeta varchar(200) DEFAULT NULL,
  Instagram varchar(200) DEFAULT NULL,
  DeclaracaoEnviada char(1) NOT NULL DEFAULT '0',
  TipoDocumento varchar(10) DEFAULT NULL,
  IdEtiqueta smallint(6) DEFAULT NULL,
  IdStatus smallint(6) DEFAULT NULL,
  Cep varchar(200) DEFAULT NULL,
  Rua varchar(200) DEFAULT NULL,
  Bairro varchar(200) DEFAULT NULL,
  Cidade varchar(200) DEFAULT NULL,
  Estado varchar(2) DEFAULT NULL,
  DataCadastro datetime DEFAULT current_timestamp(),
  PeriodicidadeColeta int(11) DEFAULT NULL,
  Numero varchar(200) DEFAULT NULL,
  Telefone varchar(255) DEFAULT NULL,
  Excluido char(1) DEFAULT '0',
  TelefoneFixo varchar(255) DEFAULT NULL,
  Etiqueta varchar(200) DEFAULT NULL,
  PRIMARY KEY (Id)
) ENGINE=InnoDB AUTO_INCREMENT=1201 DEFAULT CHARSET=utf8mb4;




