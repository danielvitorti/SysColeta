

-- Copiando estrutura para view oleolocal01.vwcidade
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS vwcidade;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW vwcidade AS select distinct cliente.Cidade AS Cidade from cliente where cliente.Cidade is not null;


