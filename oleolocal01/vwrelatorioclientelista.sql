

-- Copiando estrutura para view oleolocal01.vwrelatorioclientelista
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS vwrelatorioclientelista;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW vwrelatorioclientelista AS select c.Nome AS Nome,c.CnpjCpf AS CnpjCpf,c.Cep AS Cep,c.Rua AS Rua,c.Numero AS Numero,c.Bairro AS Bairro,c.Cidade AS Cidade,c.Estado AS Estado,(select count(a.Id) from atendimento a where a.IdCliente = c.Id) AS QuantidadeAtendimentos,(select sum(a.QuantidadeColetada) from atendimento a where a.IdCliente = c.Id) AS QuantidadeColetada from cliente c;


