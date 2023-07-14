<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';


$route['login'] = 'login/index';


$route['clienteConsulta'] = 'cliente/consulta'; 
$route['cliente'] = 'cliente/index';
$route['clienteCadastro'] = 'cliente/cadastro';
$route['clienteAlterar'] = 'cliente/alterar';
$route['clienteTestePdf'] = 'cliente/teste';



$route['rota'] = 'rota/index';
$route['rotaAlterar'] = 'rota/alterar';
$route['rotaCadastro'] = 'rota/cadastro';


$route['coleta'] = 'coleta/index';
$route['coletaAlterar'] = 'coleta/alterar';
$route['coletaCadastro'] = 'coleta/cadastro';



$route['motorista'] = 'motorista/index';
$route['motoristaCadastro'] = 'motorista/cadastro';


$route['documento'] = 'documento/index';
$route['documentoCadastro'] = 'documento/cadastro';
$route['documentoAlterar'] = 'documento/alterar';


$route['relatoriosClientes'] = 'relatorios/clientes';


$route['veiculoConsulta'] = 'veiculo/index';
$route['veiculoAlterar'] = 'veiculo/alterar';
$route['veiculoCadastro'] = 'veiculo/cadastro'; 


$route['testeExcel'] = 'teste/excel';
$route['veiculoAlterar'] = 'veiculo/alterar';
$route['veiculoCadastro'] = 'veiculo/cadastro'; 


$route['tipopagamento'] = 'tipopagamento/index';
$route['tipopagamentoAlterar'] = 'tipopagamento/alterar';
$route['tipopagamentoCadastro'] = 'tipopagamento/cadastro'; 


$route['tipoPagamento'] = 'tipoPagamento/index';

$route['tipoPagamentoCadastro'] = 'tipoPagamento/cadastro'; 


$route['salvarFormaPagamentoCliente'] = 'formaPagamentoCliente/salvarFormaPagamentoCliente';

$route['salvarTipoPagamentoCliente'] = 'tipoPagamentoCliente/salvarTipoPagamentoCliente';


$route['tipoPagamentoCliente'] = 'tipoPagamento/BuscarTiposPagamentoCliente';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


