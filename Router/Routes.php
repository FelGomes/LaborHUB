<?php  


$routes = [
// Rota => Controller, Metodo
'/'                                 => ['PessoaFisica', 'index'],
'/login'                            => ['Login', 'index'],
'/login/autenticar'                 => ['Login', 'autenticar'],
'/login/recuperarSenha'             => ['Login','recuperarSenha'],
'/login/alterarSenha'               => ['Login', 'alterarSenha'],
'/login/esqueciSenha'               => ['Login', 'esqueciSenha'],
'/usuario/escolherUsuario'          => ['Usuario', 'index'],
'/usuario/cadastro/:tipo'           => ['Usuario', 'redirecionar'],
'/usuario/cadastrarCliente'         => ['Usuario', 'cadastrarCliente'],
'/usuario/continuacaoProfissional'  => ['Usuario', 'continuacaoProfissional'],
'/usuario/cadastarProfissional'     => ['Usuario', 'cadastrarProfissional'],
'/user/homeCliente/index'           => ['PessoaFisica', 'index'],
'/user/homeProfissional/index'      => ['PessoaJuridica', 'index'],
'/PessoaJuridica/telaPendentes'     => ['PessoaJuridica', 'telaPendentes'],
'/PessoaJuridica/telaAtivas'        => ['PessoaJuridica', 'telaAtivas'],
'/profissionais/perfil/:id'         => ['Profissionais', 'perfil'],
'/pessoaFisica/enviarSolicitacao'   => ['PessoaFisica', 'enviarSolicitacao'],
'/historico/index'                  => ['Historico', 'index'],
'/historico/cancelar/:id'           => ['Historico', 'cancelar'],
'/historico/deletarAll'             => ['Historico', 'deletarAll'],
'/historico/deletarUnique:id'       => ['Historico', 'deletarUnique'],
'/profissional/detalhesSolicitacao/:id' => ['PessoaJuridica', 'detalhesSolicitacao'],
'/pessoaJuridica/aceitar/:id'       => ['PessoaJuridica', 'aceitar'],
'/pessoaJuridica/recusar/:id'       => ['PessoaJuridica', 'recusar'],         
'/pessoaJuridica/finalizarUnique/:id'=> ['PessoaJuridica', 'finalizarUnique'],
'/pessoaJuridica/finalizarAll'   => ['PessoaJuridica', 'finalizarAll'],
'/user/homeProfissional/historicoProfissional' => ['HistoricoProfissional', 'index'],
'/pessoaJuridica/avaliacao'                    => ['PessoaJuridica', 'avaliacao'],
'/historicoProfissional/deletarUnique/:id'     =>   ['HistoricoProfissional', 'deletarUnique'],
'/login/enviarEmail'                           => ['Login', 'enviarEmail'],
'/login/salvarSenha'                           => ['Login', 'salvarSenha'],
'/historico/detalharServicoFinalizado/:id'     => ['Historico', 'detalharServicoFinalizado'],
'/historico/avaliarProfissional'               => ['Historico', 'avaliarProfissional'],
'/historico/editarAvaliacao'                   => ['Historico', 'editarAvaliacao'],
'/adm/index'                                   => ['Admin','index'],
'/admin/listarClientes'                        => ['Admin', 'listarClientes'],
'/clientes/detalhes/:id'                       => ['Admin', 'detalhes'],

'/login/logout' => ['Login', 'logout'],

];










?>