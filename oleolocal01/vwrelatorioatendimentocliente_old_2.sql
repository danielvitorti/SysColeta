

-- Copiando estrutura para view oleolocal01.vwrelatorioatendimentocliente_old_2
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS vwrelatorioatendimentocliente_old_2;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW vwrelatorioatendimentocliente_old_2 AS select c.Nome AS Nome,c.CnpjCpf AS CnpjCpf,c.NomeResponsavel AS NomeResponsavel,c.Email AS Email,a.Id AS IdAtendimento,a.IdRota AS IdRota,a.QuantidadeColetada AS QuantidadeColetada,a.Observacao AS Observacao,a.Status AS Status,a.DataCadastro AS DataAtendimento,a.IdCliente AS IdCliente,(select r.Perimetro from rota r where r.Id = a.IdRota) AS Cidade from (atendimento a join cliente c on(c.Id = a.IdCliente));


