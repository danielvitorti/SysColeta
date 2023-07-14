

-- Copiando estrutura para view oleolocal01.vwatendimentorota
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS vwatendimentorota;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW vwatendimentorota AS select r.Id AS Id,r.Excluido AS Excluido,r.IdMotorista AS IdMotorista,r.DataRota AS DataRota,r.Turno AS Turno,r.Perimetro AS Perimetro,r.DataCadastro AS DataCadastro,r.Observacao AS Observacao,r.Nome AS Nome,r.Liberada AS Liberada,r.Status AS Status,r.IdVeiculo AS IdVeiculo,v.Nome AS Veiculo,m.Nome AS Motorista,(select sum(atendimento.QuantidadeColetada) from atendimento where atendimento.IdRota = r.Id) AS QuantidadeColetada from ((rota r left join veiculo v on(r.IdVeiculo = v.Id)) left join motorista m on(r.IdMotorista = m.Id)) where r.Id in (select a.IdRota from atendimento a);


