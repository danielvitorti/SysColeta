

-- Copiando estrutura para view oleolocal01.vwcoleta
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS vwcoleta;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW vwcoleta AS select co.Id AS Id,co.Quantidade AS Quantidade,co.Pagamento AS Pagamento,co.DataCadastro AS DataCadastro,m.Nome AS Motorista,co.IdMotorista AS IdMotorista,c.Nome AS Cliente,c.Id AS IdCliente,co.IdFormaPagamento AS IdFormaPagamento,fp.Nome AS FormaPagamento from (((coleta co join motorista m on(m.Id = co.IdMotorista)) join cliente c on(c.Id = co.IdCliente)) join formapagamento fp on(fp.Id = co.IdFormaPagamento));


