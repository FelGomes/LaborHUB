<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serviço Facil</title>
    <link rel="stylesheet" href="../../Assets/Css/home.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

</head>

<body>
    <header>

        <div class="topo mt-3">
            <div class="imagem">
                <img src="../../Assets/Images/FOTOPERFIL.png" alt="Foto Escolhida">
            </div>

            <div class="sair">
                <p class="mt-2">Deseja sair da conta? </p>
                <button onclick="window.location.href='login.php'" class="btn-sair">Sair</button>
            </div>

        </div>

        <nav>
            <ul class="mt-1 mb-5">
                <li><a href="homeProfissional.php">Home</a></li>
                <li><a href="#">Histórico</a></li>
                <li><a href="#">Minhas avaliações</a></li>

            </ul>

        </nav>
    </header>

    <main>

        <div id="principal" class="container container-custom border mt-4 mb-5 pb-4">
            <h3 class="text-center mt-4"> <a href="servicoPendentes.php" class="mt-2"><i class="bi bi-caret-left-fill"></i></a> &nbsp; Serviços Ativos</h3>

            <div class="finalizarServico mt-3">
                <button type="button" class="btn-finalizar" data-bs-target="#modalFinalizar" data-bs-dismiss="modal" data-bs-toggle="modal">Finalizar Serviço</button>

                <div class="modal fade modal-lg" id="modalFinalizar" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">

                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body"> <!--COnteudo com os formulario-->
                                <div class="row">
                                    <form action="" method="post">
                                        <h4 class="text-center ">Deseja finalizar todos o serviços? </h4>
                                        <p class="text-center mt-2 mb-5">Ao finalizar todos os serviços não será possível visualizar nessa aba novamente. Todos estarão na página de histórico!</p>

                                        <div class="botaoModalDeletar mt-3">

                                            <button type="button" data-bs-dismiss="modal" class="btn-negar"> Não</button>
                                            <button type="button" class="btn-finalizar">Sim</button>
                                        </div>

                                    </form>



                                </div>


                            </div>

                        </div>
                    </div>
                </div>



            </div>

            <div class="lista-servicoAtivo">
                <div class="ativoGroup p-3">
                    <div class="ativoInfo">
                        <img src="../../Assets/Images/FOTOPERFIL.png" alt="FotoDePerfilDoUsuario">
                        <div class="ativoDados">
                            <h4 class="mb-3">Felipe Ferreira Gomes</h4>
                            <h6><strong>Data de início:</strong> 19/10/2025</h6>
                            <h6><strong>Data fim:</strong> 29/10/2025</h6>
                            <h6><strong>Quantidade de dias:</strong>10 dias</h6>

                        </div>
                    </div>

                    <div class="ativoDetalhes">

                        <button type="button" data-bs-target="#modalDetalhes" data-bs-toggle="modal" class="btn-solicitacao">Mais</button>

                        <div class="modal fade modal-xl" id="modalDetalhes" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">

                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body"> <!--COnteudo com os formulario-->
                                        <h3 class="text-center mb-5"> <a href=""><i class="bi bi-caret-left-fill"></i></a> &nbsp; <strong>Clientes</strong> &nbsp; <a href=""><i class="bi bi-caret-right-fill"></i></a></h3>

                                        <div class="modalAtivoInfo mb-2">
                                            <div class="modalAtivoDetalhes">
                                                <div class="modalImagem">
                                                    <img src="../../Assets/Images/Academia.jpeg" alt="">
                                                </div>

                                                <div class="modalDados">
                                                    <h4><strong>Felipe Ferreira Gomes</strong></h4>
                                                    <h6>Rua 18 QDZ-18 LT-16 Jardim Sorriso II, Ceres GO</h6>
                                                    <h6><strong>Email: </strong>felipeferreiraag0@gmail.com</h6>
                                                    <h6><strong>Celular: </strong>62 996496240</h6>
                                                    <h6><strong>Data início: </strong>19/10/2025</h6>
                                                    <h6><strong>Data final: </strong> 29/10/2025</h6>
                                                    <h6><strong>Quantidade de dias </strong> 10 dias</h6>

                                                </div>

                                            </div>
                                        </div>

                                        <div class="modalObservacao mt-3">
                                            <h4 class="text-start"><strong>Observação</strong></h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed rem est provident magni, deleniti ipsa doloremque, omnis cupiditate dolores inventore veritatis suscipit, maiores qui totam consectetur unde harum error nam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum maiores accusamus laboriosam. Architecto facilis laborum unde culpa magnam eius mollitia odit aliquid eligendi, consequatur eveniet qui veniam natus illum minus?</p>
                                        </div>





                                        <div class="modal-footer mt-2">
                                            <div class="botaoServicoAtivo">

                                                <button type="button" name="finalizarServico" data-bs-target="#modalConfirmar" data-bs-dismiss="modal" data-bs-toggle="modal" class="btn-finalizarSerivo">Finalizar Serviço</button>



                                            </div>
                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div>

                        <form action="" method="post">
                            <div class="modal fade modal-lg" id="modalConfirmar" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body"> <!--COnteudo com os formulario-->
                                            <div class="row">
                                                <h4 class="text-center ">Deseja finalizar esse serviço?</h4>
                                                <p class="text-center mt-2 mb-5">Este serviço será removido da lista de ativos e ficará disponível apenas no histórico.</p>

                                                <div class="botaoModalDeletar mt-3">

                                                    <button type="button" data-bs-dismiss="modal" class="btn-negar"> Não</button>
                                                    <button type="button" class="btn-finalizar">Sim</button>
                                                </div>



                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>




                </div>

                <div class="ativoGroup p-3">
                    <div class="ativoInfo">
                        <img src="../../Assets/Images/FOTOPERFIL.png" alt="FotoDePerfilDoUsuario">
                        <div class="ativoDados">
                            <h4 class="mb-3">Felipe Ferreira Gomes</h4>
                            <h6><strong>Data de início:</strong> 19/10/2025</h6>
                            <h6><strong>Data fim:</strong> 29/10/2025</h6>
                            <h6><strong>Quantidade de dias:</strong>10 dias</h6>

                        </div>
                    </div>

                    <div class="ativoDetalhes">

                        <button type="button" class="btn-solicitacao">Mais</button>
                    </div>

                </div>

            </div>




        </div>


    </main>





    <footer class="bg-dark text-center text-white py-4">
        <div class="container">

            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4">
                    <h5 class="text-uppercase">Serviço Fácil</h5>
                    <p>
                        O sistema tem como finalidade de conectar cliente à prestadores de serviço a qualquer hora do dia
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="text-uppercase">Contato</h5>
                    <p>Email: contato@email.com</p>
                    <p>Telefone: (00) 00000-0000</p>
                </div>

                <!-- Ícones de Redes Sociais -->
                <section class="mb-4">

                    <a class="btn btn-outline-light btn-floating m-1" href="https://github.com/FelGomes" target="_blank" role="button">
                        <i class="bi bi-github"></i>
                    </a>

                    <a class="btn btn-outline-light btn-floating m-1" href="#!" target="_blank" role="button">
                        <i class="bi bi-github"></i>
                    </a>

                    <a class="btn btn-outline-light btn-floating m-1" href="#!" target="_blank" role="button">
                        <i class="bi bi-github"></i>
                    </a>


                </section>

                <!-- Texto de Copyright -->
                <div class="text-center p-3">
                    © 2026 Copyright: <a class="text-white" href="#">Equipe geral de desenvolvimento do serviço fácil</a>
                </div>
            </div>
    </footer>






    <!-- Boostrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>


</body>

</html>