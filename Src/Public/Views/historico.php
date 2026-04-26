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
        /* header {
            position: sticky;
            top: 0;
            width: 100%;
            z-index: 1000;
            backdrop-filter: blur(5px);
            background-color: rgba(255, 255, 255, 0.8);
        }
 


         .busca-historico {
            display: flex;
            justify-content: center;
        }

        .campo {
            width: 500px;
            display: flex;
            justify-content: center;
        }

        .busca {
            width: 100%;
        }

        #busca-historico {
            display: flex;
            flex-flow: column;
            justify-content: center;
            align-items: center;

        }

        #profissionais li {
            display: flex;
            flex-flow: column;
            align-items: flex-end;
        }

        .lista-historico {
            display: flex;
            justify-content: center;
            margin-top: 10px;
            width: 100%;

        }


        .card-historico {
            margin-top: 15px;
            border: 1px solid rgba(0, 0, 0, 0.17);
            border-radius: 20px;
            display: flex;
            padding: 10px 10px;
            justify-items: center;
            justify-content: space-between;
            width: 80%;
            box-shadow: var(--sombras);
        }

        .info-imagem img {
            width: 120px;
            height: 120px;
            border: 25px !important;
        }

        .info-group {
            display: flex;
        }

        .info-dados {
            margin-left: 10px;

        }

        #valorServico {
            line-height: 3.2;
            font-size: 16pt;
        }

        .info-dados>h5 {
            line-height: 1.2;
        }

        .info-status {
            width: 40%;
        }

        .info-validation {
            display: flex;
            justify-content: center;

        }

        .info-validation>h5 {
            text-align: center !important;
        }

        .botao {
            display: flex;
            justify-content: flex-end;
            gap: 20px;
        }


        .btn-detalhar {
            width: 120px;
            height: 40px;
            border: 1px solid var(--corPrincipal);
            box-shadow: var(--sombras);
            border-radius: var(--bordas);
            margin-right: 15px;
            margin-bottom: 15px;
            background-color: var(--corPrincipal);
            color: white;
            font-weight: 600;
        }


        .btn-detalhar:hover {
            transform: scale(1.03) translateY(-5px) translateX(3px);
        }

        #favorito {
            display: flex;
            font-size: 35px;
            color: #ccc;
            cursor: pointer;
            transition: 0.2s;
        }

        #favorito.ativo {
            color: gold;
        }

        @media screen and (max-width: 768px) {

            .container {
                padding-top: 10px;
            }

            .busca-historico {
                display: flex;
                flex-flow: column wrap;
                flex: auto;
                width: 100%;
                justify-content: flex-start;

            }

            input {
                width: 80% !important;
                height: 40px;
            }

            .filtros ul {
                display: flex;
                flex-direction: row;
                justify-content: flex-start;
                gap: 20px;
                padding: 0;
                margin-left: 45px;
            }

            .filtros>ul>li>a {
                font-size: 14pt;
            }

            .lista-historico {
                width: 100%;
            }

            .card-historico {
                display: flex;
                flex-direction: column;
            }

            .info-group {
                display: grid;
                grid-template-columns: 1fr;
                gap: 10px;

            }

            .info-dados,
            h5 {
                font-size: 12pt;
                line-height: 1.1;
            }

            .info-status {
                display: flex;
                width: 100%;
                flex-direction: column;
            }

            .info-validation {
                display: flex;
                justify-content: flex-start;
                margin-bottom: 5px;
            }

            .info-validation>h5 {
                font-size: 15pt;
            }

            .detalhes>h6 {
                text-align: start !important;
                margin-top: 4px;
            }

            .botao {
                margin-top: 10px !important;
            }
        }

        @media (min-width: 768px) and (max-width: 1024px) {

            .busca-historico {
                width: 100%;
                gap: 10px;
                display: flex;
            }


            input {
                width: 70% !important;
                height: 40px;
            }

            .filtros ul {
                display: flex;
                flex-direction: row;
                justify-content: flex-start;
                gap: 20px;
                padding: 0;
                margin-left: 45px;
            }



            .card-historico {
                display: flex;
                flex-flow: column wrap;
            }


            #valorServico {
                margin-top: 5px !important;
            }

            .info-dados,
            h5 {
                font-size: 12pt;
                line-height: 1.1;
            }

            .info-status {
                display: flex;
                width: 100%;
                flex-direction: column;
            }

            .info-validation {
                display: flex;
                justify-content: flex-start;
                margin-bottom: 5px;
            }

            .info-validation>h5 {
                font-size: 15pt;
            }

            .detalhes>h6 {
                text-align: start !important;
                margin-top: 4px;
            }

            .botao {
                margin-top: 10px !important;
            }

        } */
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
                <li><a href="homeCliente.php">Home</a></li>
                <li><a href="#">Histórico</a></li>
                <li><a href="#">Agenda</a></li>

            </ul>

        </nav>
    </header>

    <main>

        <section>

            <div id="principal" class="container container-custom border mt-4 mb-5 pb-4">
                <div class="titulo mt-3">
                    <h4 class="text-center">Veja serviços que você contratou</h4>
                    <p class="text-center">Veja os últimos serviços que você solicitou e seus profissionais favoritos</p>
                </div>

                <div class="busca-historico mt-5 ">
                    <div class="row">
                        <div class="campo col-md-6">
                            <input type="search" name="buscaHistorico" class="form-control" placeholder="Buscar nome" id="buscaHistorico">

                        </div>


                    </div>

                    <div class="filtros">
                        <ul>
                            <li><a href="">Último</a></li>
                            <li><a href="">Favorito</a></li>
                        </ul>

                    </div>



                </div>


                <!-- listagem de historicos -->

                <div class="lista-historico ">

                    <div class="card-historico">
                        <div class="info-group">

                            <div class="info-imagem">
                                <img src="../../Assets/Images/Academia.jpeg" alt="">
                            </div>
                            <div class="info-dados mt-2">
                                <h4>João Guilherme Silva</h4>
                                <h6>Eletricista</h6>
                                <h5>Data de início: 28/10/2025</h5>
                                <h5>Data de conclusão: 04/11/2025</h5>

                                <h5 id="valorServico"><strong>Valor do serviço:</strong> R$200,00</h5>

                            </div>
                        </div>

                        <div class="info-status">
                            <div class="info-validation">
                                <h5><strong>Sua avaliação</strong></h5>

                            </div>

                            <div class="detalhes">
                                <h6 class="text-center"><strong>Atendimento Fantástico</strong></h6> <!--TIUTLO DO COMENTARIO-->
                                <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad velit sint itaque quasi aliquid necessitatibus, nostrum aut totam placeat magni perferendis exercitationem dolores, quibusdam quae, saepe numquam voluptatum? In, ipsam?</p>

                                <div class="botao">
                                    <i class="bi bi-star" id="favorito"></i>
                                    <button class="btn-detalhar">Detalhar</button>

                                </div>

                            </div>

                        </div>


                    </div>

                </div>

                <div class="lista-historico ">

                    <div class="card-historico">
                        <div class="info-group">

                            <div class="info-imagem">
                                <img src="../../Assets/Images/Academia.jpeg" alt="">
                            </div>
                            <div class="info-dados mt-2">
                                <h4>João Guilherme Silva</h4>
                                <h6>Eletricista</h6>
                                <h5>Data de início: 28/10/2025</h5>
                                <h5>Data de conclusão: 04/11/2025</h5>
                                <h5 id="valorServico"><strong>Valor do serviço:</strong> R$200,00</h5>


                            </div>
                        </div>

                        <div class="info-status">
                            <div class="info-validation">
                                <h5><strong>Sua avaliação</strong></h5>

                            </div>

                            <div class="detalhes">
                                <h6 class="text-center"><strong>Atendimento Fantástico</strong></h6> <!--TIUTLO DO COMENTARIO-->
                                <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad velit sint itaque quasi aliquid necessitatibus, nostrum aut totam placeat magni perferendis exercitationem dolores, quibusdam quae, saepe numquam voluptatum? In, ipsam?</p>

                                <div class="botao">
                                    <i class="bi bi-star" id="favorito"></i>
                                    <button class="btn-detalhar">Detalhar</button>

                                </div>

                            </div>

                        </div>


                    </div>

                </div>



            </div>

        </section>


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


    <script>
        const estrela = document.getElementById("favorito");

        estrela.addEventListener("click", () => {
            estrela.classList.toggle("ativo");

            if (estrela.classList.contains("ativo")) {
                estrela.classList.remove("bi-star");
                estrela.classList.add("bi-star-fill");
            } else {
                estrela.classList.remove("bi-star-fill");
                estrela.classList.add("bi-star");
            }
        });
    </script>


</body>

</html>