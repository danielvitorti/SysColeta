

-- Copiando estrutura para view oleolocal01.vwmotorista
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS vwmotorista;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW vwmotorista AS select m.Id AS Id,m.Nome AS Nome,m.Habilitacao AS Habilitacao,m.Telefone AS Telefone,m.Observacao AS Observacao,m.DataCadastro AS DataCadastro,m.IdVeiculo AS IdVeiculo,v.Nome AS Veiculo from (motorista m join veiculo v on(v.Id = m.IdVeiculo));


