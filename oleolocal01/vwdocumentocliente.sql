

-- Copiando estrutura para view oleolocal01.vwdocumentocliente
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS vwdocumentocliente;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW vwdocumentocliente AS select c.Nome AS nome,d.Id AS Id,d.Titulo AS titulo,d.DataCadastro AS dataCadastro,d.Arquivo AS Arquivo,d.IdCliente AS IdCliente,d.Texto AS Texto,d.DataValidade AS DataValidade,d.Excluido AS Excluido from (documento d join cliente c on(d.IdCliente = c.Id));


