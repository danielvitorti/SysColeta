

-- Copiando estrutura para view oleolocal01.vwatendimentorecipientes
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS vwatendimentorecipientes;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW vwatendimentorecipientes AS select r.Nome AS Nome,r.Capacidade AS Capacidade,a.Id AS Id,a.IdAtendimento AS IdAtendimento,a.IdRecipiente AS IdRecipiente,a.DataCadastro AS DataCadastro from ((atendimentorecipiente a join recipiente r on(a.IdRecipiente = r.Id)) join atendimento at on(at.Id = a.IdAtendimento));


