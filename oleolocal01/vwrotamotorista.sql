

-- Copiando estrutura para view oleolocal01.vwrotamotorista
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS vwrotamotorista;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW vwrotamotorista AS select r.Id AS Id,r.Excluido AS Excluido,r.Nome AS Nome,r.IdMotorista AS IdMotorista,r.DataRota AS DataRota,r.Turno AS Turno,r.Perimetro AS Perimetro,r.DataCadastro AS DataCadastro,r.Observacao AS Observacao,r.Status AS Status,r.Liberada AS Liberada,m.Nome AS Motorista,(select count(rc.IdCliente) from rotacliente rc where rc.IdRota = r.Id) AS QuantidadeClientes,(select count(a.Id) from atendimento a where a.IdRota = r.Id) AS QuantidadeAtendimentos from (rota r join motorista m on(r.IdMotorista = m.Id));


