

-- Copiando estrutura para view oleolocal01.vwrelatorioatendimentocliente
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS vwrelatorioatendimentocliente;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW vwrelatorioatendimentocliente AS select distinct c.Nome AS Nome,c.CnpjCpf AS CnpjCpf,c.NomeResponsavel AS NomeResponsavel,c.Email AS Email,a.Id AS IdAtendimento,a.IdRota AS IdRota,a.QuantidadeColetada AS QuantidadeColetada,a.Observacao AS Observacao,a.Status AS Status,a.DataCadastro AS DataAtendimento,a.IdCliente AS IdCliente,c.Cidade AS Cidade,r.Status AS StatusRota,r.DataRota AS DataRota from ((atendimento a join cliente c on(c.Id = a.IdCliente)) join rota r on(a.IdRota = r.Id)) where a.Excluido = 0 and c.Excluido = 0 and r.Status in (2,3);


