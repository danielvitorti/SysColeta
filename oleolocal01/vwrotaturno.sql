

-- Copiando estrutura para view oleolocal01.vwrotaturno
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS vwrotaturno;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW vwrotaturno AS select t.Id AS IdTurno,t.Nome AS Nome,rt.IdRota AS IdRota from (turno t join rotaturno rt on(t.Id = rt.IdTurno));


