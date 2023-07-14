

-- Copiando estrutura para view oleolocal01.vwrotaclientemotorista2
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS vwrotaclientemotorista2;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW vwrotaclientemotorista2 AS select r.Nome AS Nome,r.Id AS Id,r.IdMotorista AS IdMotorista,r.DataRota AS DataRota,r.Turno AS Turno,r.Perimetro AS Perimetro,r.DataCadastro AS DataCadastro,r.Observacao AS Observacao,m.Nome AS Motorista,c.Nome AS Cliente,c.CnpjCpf AS CnpjCpf,c.NomeResponsavel AS NomeResponsavel,c.Email AS Email,c.Rua AS Rua,c.Numero AS Numero,c.Bairro AS Bairro,c.Cidade AS Cidade,c.Estado AS Estado,c.Cep AS Cep,concat(c.Rua,' Numero ',c.Numero,' ',c.Bairro,' ',c.Cidade,' ',c.Estado,' ',c.Cep) AS EnderecoColeta,c.HorarioColeta AS HorarioColeta,c.Instagram AS Instagram,rc.IdRota AS IdRota,rc.IdCliente AS IdCliente from (((rota r left join rotacliente rc on(r.Id = rc.IdRota)) left join cliente c on(rc.IdCliente = c.Id)) left join motorista m on(r.IdMotorista = m.Id));


