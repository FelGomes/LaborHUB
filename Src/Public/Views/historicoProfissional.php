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
        .listaHistorico {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            margin-top: 50px;
            padding-right: 20px;
            gap: 20px;
            
            
        }

        .cardHistorico {
            display: flex;
            flex-flow: column wrap;
            height: 270px;
            margin: 15px 0px 20px 15px;
            padding: 20px 0px 10px 10px;
            border: 1px solid rgba(0, 0, 0, 0.096);
            box-shadow: var(--sombras);
            border-radius: var(--bordas);
        }

        .cardImage>img {
            width: 90px;
            height: 90px;

        }

        .cardDetalhes {
            display: flex;
        }

        .cardInfo {
            padding-left: 10px;
        }



        .cardBotao {
            display: flex;
            justify-content: flex-end;
            padding-right: 10px;
        }

        .btn-deletar {
            width: 150px;
            height: 40px;
            border: 1px solid #C52222;
            box-shadow: var(--sombras);
            border-radius: var(--bordas);
            margin-right: 15px;
            background-color: #C52222;
            color: white;
            font-weight: 600;


        }

        .btn-deletar:hover {
            transform: scale(1.03) translateY(-5px) translateX(3px);
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

        <section> <!-- De busca -->
            <div class="container-fluid pt-2">
                <div class="busca mt-2">
                    <h5 class="mt-2">Pesquise por clientes que contrataram seu serviço</h5>
                </div>

                <div class="search mt-2">
                    <div class="col-md-3 mb-4">
                        <input type="search" name="pesquisar" class="form-control" placeholder="Pesquisar por clientes" id="pesquisar">

                    </div>
                </div>

            </div>



        </section>

        <div class="filtrosHistorico text-start">
            <ul>
                <li><a href="">Concluídos</a></li>
                <li><a href="">Recusados</a></li>
            </ul>

        </div>
        <div class="listaHistorico">

            <div class="cardHistorico">
                <div class="cardDetalhes">

                    <div class="cardImage">
                        <img src="../../Assets/Images/FOTOPERFIL.png" alt="">
                    </div>
                    <div class="cardInfo">
                        <h4 class="mb-2"><strong>Felipe Ferreira Gomes</strong></h4>
                        <h6><strong>Contato: </strong> 62996496240</h6>
                        <h6><strong>Data finalização: </strong> 01/05/2026</h6>
                        <h6><strong>Endereço: </strong> Rua 18 QD-Z 18 LT-16 Jardim Sorriso II</h6>
                        <h6><strong>Cidade: </strong> Ceres GO</h6>


                    </div>
                </div>

                <div class="cardBotao mt-3">
                    <button type="button" name="deletar" class="btn-deletar"> Excluir</button>
                    <button type="button" name="ver" class="btn-finalizar"> Ver</button>
                </div>

            </div>

            <div class="cardHistorico">
                <div class="cardDetalhes">

                    <div class="cardImage">
                        <img src="../../Assets/Images/FOTOPERFIL.png" alt="">
                    </div>
                    <div class="cardInfo">
                        <h4 class="mb-2"><strong>Felipe Ferreira Gomes</strong></h4>
                        <h6><strong>Contato: </strong> 62996496240</h6>
                        <h6><strong>Data finalização: </strong> 01/05/2026</h6>
                        <h6><strong>Endereço: </strong> Rua 18 QD-Z 18 LT-16 Jardim Sorriso II</h6>
                        <h6><strong>Cidade: </strong> Ceres GO</h6>


                    </div>
                </div>

                <div class="cardBotao mt-3">
                    <button type="button" name="deletar" class="btn-deletar"> Excluir</button>
                </div>

            </div>

            <div class="cardHistorico">
                <div class="cardDetalhes">

                    <div class="cardImage">
                        <img src="../../Assets/Images/FOTOPERFIL.png" alt="">
                    </div>
                    <div class="cardInfo">
                        <h4 class="mb-2"><strong>Felipe Ferreira Gomes</strong></h4>
                        <h6><strong>Contato: </strong> 62996496240</h6>
                        <h6><strong>Data finalização: </strong> 01/05/2026</h6>
                        <h6><strong>Endereço: </strong> Rua 18 QD-Z 18 LT-16 Jardim Sorriso II</h6>
                        <h6><strong>Cidade: </strong> Ceres GO</h6>


                    </div>
                </div>

                <div class="cardBotao mt-3">
                    <button type="button" name="deletar" class="btn-deletar"> Excluir</button>
                </div>

            </div>

            <div class="cardHistorico">
                <div class="cardDetalhes">

                    <div class="cardImage">
                        <img src="../../Assets/Images/FOTOPERFIL.png" alt="">
                    </div>
                    <div class="cardInfo">
                        <h4 class="mb-2"><strong>Felipe Ferreira Gomes</strong></h4>
                        <h6><strong>Contato: </strong> 62996496240</h6>
                        <h6><strong>Data finalização: </strong> 01/05/2026</h6>
                        <h6><strong>Endereço: </strong> Rua 18 QD-Z 18 LT-16 Jardim Sorriso II</h6>
                        <h6><strong>Cidade: </strong> Ceres GO</h6>


                    </div>
                </div>

                <div class="cardBotao mt-3">
                    <button type="button" name="deletar" class="btn-deletar"> Excluir</button>
                </div>

            </div>

            <div class="cardHistorico">
                <div class="cardDetalhes">

                    <div class="cardImage">
                        <img src="../../Assets/Images/FOTOPERFIL.png" alt="">
                    </div>
                    <div class="cardInfo">
                        <h4 class="mb-2"><strong>Felipe Ferreira Gomes</strong></h4>
                        <h6><strong>Contato: </strong> 62996496240</h6>
                        <h6><strong>Data finalização: </strong> 01/05/2026</h6>
                        <h6><strong>Endereço: </strong> Rua 18 QD-Z 18 LT-16 Jardim Sorriso II</h6>
                        <h6><strong>Cidade: </strong> Ceres GO</h6>


                    </div>
                </div>

                <div class="cardBotao mt-3">
                    <button type="button" name="deletar" class="btn-deletar"> Excluir</button>
                </div>

            </div><div class="cardHistorico">
                <div class="cardDetalhes">

                    <div class="cardImage">
                        <img src="../../Assets/Images/FOTOPERFIL.png" alt="">
                    </div>
                    <div class="cardInfo">
                        <h4 class="mb-2"><strong>Felipe Ferreira Gomes</strong></h4>
                        <h6><strong>Contato: </strong> 62996496240</h6>
                        <h6><strong>Data finalização: </strong> 01/05/2026</h6>
                        <h6><strong>Endereço: </strong> Rua 18 QD-Z 18 LT-16 Jardim Sorriso II</h6>
                        <h6><strong>Cidade: </strong> Ceres GO</h6>


                    </div>
                </div>

                <div class="cardBotao mt-3">
                    <button type="button" name="deletar" class="btn-deletar"> Excluir</button>
                </div>

            </div>

            <div class="cardHistorico">
                <div class="cardDetalhes">

                    <div class="cardImage">
                        <img src="../../Assets/Images/FOTOPERFIL.png" alt="">
                    </div>
                    <div class="cardInfo">
                        <h4 class="mb-2"><strong>Felipe Ferreira Gomes</strong></h4>
                        <h6><strong>Contato: </strong> 62996496240</h6>
                        <h6><strong>Data finalização: </strong> 01/05/2026</h6>
                        <h6><strong>Endereço: </strong> Rua 18 QD-Z 18 LT-16 Jardim Sorriso II</h6>
                        <h6><strong>Cidade: </strong> Ceres GO</h6>


                    </div>
                </div>

                <div class="cardBotao mt-3">
                    <button type="button" name="deletar" class="btn-deletar"> Excluir</button>
                </div>

            </div>
            <div class="cardHistorico">
                <div class="cardDetalhes">

                    <div class="cardImage">
                        <img src="../../Assets/Images/FOTOPERFIL.png" alt="">
                    </div>
                    <div class="cardInfo">
                        <h4 class="mb-2"><strong>Felipe Ferreira Gomes</strong></h4>
                        <h6><strong>Contato: </strong> 62996496240</h6>
                        <h6><strong>Data finalização: </strong> 01/05/2026</h6>
                        <h6><strong>Endereço: </strong> Rua 18 QD-Z 18 LT-16 Jardim Sorriso II</h6>
                        <h6><strong>Cidade: </strong> Ceres GO</h6>


                    </div>
                </div>

                <div class="cardBotao mt-3">
                    <button type="button" name="deletar" class="btn-deletar"> Excluir</button>
                </div>

            </div>
            <div class="cardHistorico">
                <div class="cardDetalhes">

                    <div class="cardImage">
                        <img src="../../Assets/Images/FOTOPERFIL.png" alt="">
                    </div>
                    <div class="cardInfo">
                        <h4 class="mb-2"><strong>Felipe Ferreira Gomes</strong></h4>
                        <h6><strong>Contato: </strong> 62996496240</h6>
                        <h6><strong>Data finalização: </strong> 01/05/2026</h6>
                        <h6><strong>Endereço: </strong> Rua 18 QD-Z 18 LT-16 Jardim Sorriso II</h6>
                        <h6><strong>Cidade: </strong> Ceres GO</h6>


                    </div>
                </div>

                <div class="cardBotao mt-3">
                    <button type="button" name="deletar" class="btn-deletar"> Excluir</button>
                </div>

            </div><div class="cardHistorico">
                <div class="cardDetalhes">

                    <div class="cardImage">
                        <img src="../../Assets/Images/FOTOPERFIL.png" alt="">
                    </div>
                    <div class="cardInfo">
                        <h4 class="mb-2"><strong>Felipe Ferreira Gomes</strong></h4>
                        <h6><strong>Contato: </strong> 62996496240</h6>
                        <h6><strong>Data finalização: </strong> 01/05/2026</h6>
                        <h6><strong>Endereço: </strong> Rua 18 QD-Z 18 LT-16 Jardim Sorriso II</h6>
                        <h6><strong>Cidade: </strong> Ceres GO</h6>


                    </div>
                </div>

                <div class="cardBotao mt-3">
                    <button type="button" name="deletar" class="btn-deletar"> Excluir</button>
                </div>

            </div>
            <div class="cardHistorico">
                <div class="cardDetalhes">

                    <div class="cardImage">
                        <img src="../../Assets/Images/FOTOPERFIL.png" alt="">
                    </div>
                    <div class="cardInfo">
                        <h4 class="mb-2"><strong>Felipe Ferreira Gomes</strong></h4>
                        <h6><strong>Contato: </strong> 62996496240</h6>
                        <h6><strong>Data finalização: </strong> 01/05/2026</h6>
                        <h6><strong>Endereço: </strong> Rua 18 QD-Z 18 LT-16 Jardim Sorriso II</h6>
                        <h6><strong>Cidade: </strong> Ceres GO</h6>


                    </div>
                </div>

                <div class="cardBotao mt-3">
                    <button type="button" name="deletar" class="btn-deletar"> Excluir</button>
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