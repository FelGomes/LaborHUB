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


    <style>
        .solicitacao {
            display: flex;
            margin-top: 50px;
            justify-content: space-between;
            align-items: center;
        }

        .solicitacaoDados {
            display: flex;
            gap: 15px;
            margin-left: 20px;
        }

        .solicitacaoImagem>img {
            width: 230px !important;
            height: 224px !important;
            border-radius: 20px;
        }

        .solicitacaoInfo>h5 {
            font-size: 13pt;
        }

        .solicitacaoConfirmar {
            display: flex;
            flex-flow: column wrap;
            padding: 8px;
            padding: 10px;
            border: 1px solid #00000041;
            margin-right: 155px;
            height: 180px;
            border-radius: 10px;
            box-shadow: var(--sombras);
        }

        .solicitacaoBotao {
            display: flex;
            justify-content: center;


        }

        .solicitacaoObservacao {
            width: 50%;
            margin-top: 20px;
            margin-left: 20px;
        }

        .solicitacaoObservacao>h4 {
            font-size: 20pt;
            font-weight: bold;
        }

        .solicitacaoObservacao>p {
            text-align: justify;
        }

        @media screen and (max-width: 670px) {

            .solicitacaoDados {
                display: flex;
                flex-flow: column wrap;
            }


        }

        @media screen and (max-width: 1250px) {

            .tituloSolicitacao {
                margin-top: 40px !important;
            }

            .solicitacao {
                display: flex;
                flex-flow: column wrap;
                align-items: flex-start;
                gap: 50px;
            }

            .solicitacaoConfirmar {
                margin-left: 20px;
                margin-bottom: 40px;
            }

            .solicitacaoObservacao {
                width: 80%;
                margin-bottom: 30px;
            }


        }
    </style>


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

        <div class="voltarPerfil">
            <a href="servicoPendentes.php"><i class="bi bi-arrow-left"></i> Voltar</a>
        </div>

        <div class="tituloSolicitacao mt-2">
            <h3 class="text-center"> <a href=""><i class="bi bi-caret-left-fill"></i></a> Outras solicitações <a href=""><i class="bi bi-caret-right-fill"></i></a></h3>
        </div>

        <div class="solicitacao ">
            <div class="solicitacaoDados">
                <div class="solicitacaoImagem">
                    <img src="../../Assets/Images/comentario.jpg" alt="">
                </div>
                <div class="solicitacaoInfo">
                    <h4><strong>Felipe Ferreira Gomes</strong></h4>
                    <h5><Strong>Endereço: </Strong>Rua 18 QD-Z 18 LT 16 Jardim Sorriso II</h5>
                    <h5><strong>Cidade: </strong>Ceres - GO</h5>
                    <h5><strong>Data de solicitação: </strong> 15/02/2026</h5>
                    <h5><strong>Data para serviço: </strong> 16/02/2026</h5>
                    <h5><strong>Dias solicitados: </strong> 20 Dias</h5>
                    <h5><strong>Telefone: </strong> 62 996496240 <a href="https://wa.me/5562996496240" style="color: #21c063" target="_blank" rel="nofollow"> <i><i
                                    class="bi bi-whatsapp"></i></i></a>
                    </h5>
                    <h5><strong>Email: </strong> felipeferreiraag0@gmail.com <a href="" style="color: #000" target="_blank" rel="nofollow"> <i class="bi bi-envelope-at"></i></a></h5>

                </div>
            </div>

            <form action="" method="post">
                <div class="solicitacaoConfirmar">

                    <div class="solicitacaoTitulo">
                        <h5 class="text-center mt-4 mb-5"><strong>Solicitação de serviço</strong></h5>

                    </div>

                    <div class="solicitacaoBotao">
                        <button type="button" class="btn-negar" data-bs-target="#modalrecusar" data-bs-dismiss="modal" data-bs-toggle="modal"  >Recusar</button>
                        <button type="submit" class="btn-finalizar" style="margin-right: 0px !important">Aceitar</button>

                    </div>

                    <div class="modal fade modal-lg" id="modalrecusar" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">

                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body"> <!--COnteudo com os formulario-->
                                    <div class="row">
                                        <h4 class="text-center ">Deseja recusar esse serviço?</h4>
                                        <p class="text-center mt-2 mb-5">Ao recusar esse serviço, você não consiguirá mais ver detalhes dele em sua conta!</p>

                                        <div class="botaoModalDeletar mt-3">

                                            <button type="button" data-bs-dismiss="modal" class="btn-negar"> Não</button>
                                            <button type="button" class="btn-finalizar">Sim</button>
                                        </div>



                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>



                </div>


            </form>


        </div>

        <div class="solicitacaoObservacao ">
            <h4>Observação</h4>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laboriosam nihil, commodi quaerat fugiat et veniam earum atque, tenetur soluta, sapiente dolore repellat excepturi labore hic est animi! Debitis, illo ipsam? Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, eaque aperiam illo inventore neque esse beatae cum corporis, quam quod consequatur minima at mollitia error, aliquid sapiente pariatur veritatis nihil.</p>
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