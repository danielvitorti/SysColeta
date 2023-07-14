

-- Copiando estrutura para view oleolocal01.vwrotaclienteexcelpdf
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS vwrotaclienteexcelpdf;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW vwrotaclienteexcelpdf AS select rc.IdRota AS IdRota,c.Nome AS Cliente,(select a.DataCadastro from atendimento a where a.IdRota = r.Id and a.IdCliente = c.Id) AS DataAtendimento,(select a.QuantidadeColetada from atendimento a where a.IdRota = r.Id and a.IdCliente = c.Id) AS QuantidadeColetada,(select fp.Nome from ((formapagamento fp join atendimentoformapagamento ap on(fp.Id = ap.IdFormaPagamento)) join atendimento a on(a.Id = ap.IdAtendimento)) where a.IdRota = rc.IdRota and a.IdCliente = rc.IdCliente) AS FormaPagamento from ((rotacliente rc join rota r on(rc.IdRota = r.Id)) join cliente c on(c.Id = rc.IdCliente));


