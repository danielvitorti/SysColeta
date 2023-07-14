

-- Copiando estrutura para view oleolocal01.vwrelatorioclientes
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS vwrelatorioclientes;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW vwrelatorioclientes AS select c.Quantidade AS Quantidade,c.Pagamento AS Pagamento,c.IdCliente AS IdCliente,cli.Nome AS Cliente,c.DataCadastro AS DataColeta,m.Nome AS Motorista,c.IdFormaPagamento AS IdFormaPagamento,cli.Cidade AS Cidade from ((coleta c join cliente cli on(c.IdCliente = cli.Id)) join motorista m on(c.IdMotorista = m.Id));


