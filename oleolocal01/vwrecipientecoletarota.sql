

-- Copiando estrutura para view oleolocal01.vwrecipientecoletarota
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS vwrecipientecoletarota;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW vwrecipientecoletarota AS select rc.IdRecipiente AS IdRecipiente,r.Nome AS Recipiente,rc.IdColeta AS IdColeta,rci.Id AS Id,rci.IdCliente AS IdCliente,rci.IdRota AS IdRota,c.Quantidade AS Quantidade,c.Pagamento AS Pagamento,fp.Nome AS FormaPagamento,rci.DataCadastro AS DataCadastro from ((((recipientecoleta rc join coleta c on(rc.IdColeta = c.Id)) join rotacliente rci on(rci.IdCliente = c.IdCliente)) join formapagamento fp on(c.IdFormaPagamento = fp.Id)) join recipiente r on(rc.IdRecipiente = r.Id));


