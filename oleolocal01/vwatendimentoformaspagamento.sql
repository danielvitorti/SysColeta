

-- Copiando estrutura para view oleolocal01.vwatendimentoformaspagamento
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS vwatendimentoformaspagamento;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW vwatendimentoformaspagamento AS select a.Id AS IdAtendimento,ap.Quantidade AS Quantidade,fp.Nome AS Nome,fp.Valor AS ValorIndividual,fp.Valor * ap.Quantidade AS ValorPago,ap.ValorPagamento AS ValorPagamento from ((atendimentoformapagamento ap join formapagamento fp on(ap.IdFormaPagamento = fp.Id)) join atendimento a on(a.Id = ap.IdAtendimento));


