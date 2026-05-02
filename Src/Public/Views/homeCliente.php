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
                <li><a href="#">Home</a></li>
                <li><a href="historico.php">Histórico</a></li>
                <li><a href="#">Agenda</a></li>

            </ul>

        </nav>
    </header>

    <main>

        <section> <!-- De busca -->
            <div class="container-fluid mt-2 pt-2">
                <div class="busca mt-2">
                    <h5 class="mt-2">Encontre o profissional ideal para suas demandas</h5>
                    <p class="text-center">Conectamos os melhores profissionais da sua região com você!</p>
                </div>

                <div class="search mt-2">
                    <div class="col-md-3 mb-4">
                        <input type="search" name="pesquisar" class="form-control" placeholder="Pesquisar por profissional" id="pesquisar">

                    </div>
                </div>

            </div>



        </section>


        <section> <!-- listagem dos profissionais -->

            <div id="principal" class="container container-custom border mt-4 mb-5 pb-4">
                <div class="titulo mt-3">
                    <h4 class="text-center">Profissionais que estão perto de você</h4>
                    <p class="text-center">Veja profissionais e empresa que estão próxima de você</p>
                </div>

                <div class="profissionais">
                    <div class="listagem">

                        <div class="item  mb-3">
                            <p id="tipoServico" class="text-end">Desenvolvedor</p>
                            <div class="perfil">
                                <div class="foto">
                                    <img src="../../Assets/Images/FOTOPERFIL.png" alt="Foto">
                                </div>
                                <div class="info">
                                    <h4><strong>Felipe Ferreira Gomes</strong></h4>
                                    <p>Ceres, GO</p>
                                    <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> 5.0 (12.200)

                                    <h6 class="mt-2"><strong>Atendimento: </strong> Seg à Sexta</h6>
                                </div>

                            </div>

                            <div class="texto mt-3">
                                <p> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga architecto eos recusandae ut dolorum. Culpa cupiditate ipsum quaerat repudiandae, labore ratione earum, illum expedita voluptate in voluptatem! Delectus, provident laudantium! Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                            </div>

                            <div class="valor">
                                <h4>R$: 1.000,00 Total</h4>
                            </div>

                            <div class="botoes">
                                <button type="submit" class="btn-perfil" onclick="window.location.href='perfil.php'" name="verPerfil">Ver perfil</button>
                            </div>


                        </div>

                        <div class="item mb-3 ">
                            <p id="tipoServico" class="text-end">Desenvolvedor</p>
                            <div class="perfil">
                                <div class="foto">
                                    <img src="../../Assets/Images/Academia.jpeg" alt="Foto">
                                </div>
                                <div class="info">
                                    <h4><strong>Felipe Ferreira Gomes</strong></h4>
                                    <p>Ceres, GO</p>
                                    <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> 5.0 (12.200)
                                </div>

                            </div>

                            <div class="texto mt-3">
                                <p> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga architecto eos recusandae ut dolorum. Culpa cupiditate ipsum quaerat repudiandae, labore ratione earum, illum expedita voluptate in voluptatem! Delectus, provident laudantium! Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                            </div>

                            <div class="valor">
                                <h4>R$: 1.000,00 Total</h4>
                            </div>

                            <div class="botoes">
                                <button type="submit" class="btn-perfil" onclick="window.location.href='perfil.php'" name="verPerfil">Ver perfil</button>
                            </div>


                        </div>

                        <div class="item mb-3 ">
                            <p id="tipoServico" class="text-end">Desenvolvedor</p>
                            <div class="perfil">
                                <div class="foto">
                                    <img src="../../Assets/Images/Academia.jpeg" alt="Foto">
                                </div>
                                <div class="info">
                                    <h4><strong>Felipe Ferreira Gomes</strong></h4>
                                    <p>Ceres, GO</p>
                                    <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> 5.0 (12.200)
                                </div>

                            </div>

                            <div class="texto mt-3">
                                <p> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga architecto eos recusandae ut dolorum. Culpa cupiditate ipsum quaerat repudiandae, labore ratione earum, illum expedita voluptate in voluptatem! Delectus, provident laudantium! Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                            </div>

                            <div class="valor">
                                <h4>R$: 1.000,00 Total</h4>
                            </div>

                            <div class="botoes">
                                <button type="submit" class="btn-perfil" onclick="window.location.href='perfil.php'" name="verPerfil">Ver perfil</button>
                            </div>


                        </div>

                        <div class="item mb-3 ">
                            <p id="tipoServico" class="text-end">Desenvolvedor</p>
                            <div class="perfil">
                                <div class="foto">
                                    <img src="../../Assets/Images/Academia.jpeg" alt="Foto">
                                </div>
                                <div class="info">
                                    <h4><strong>Felipe Ferreira Gomes</strong></h4>
                                    <p>Ceres, GO</p>
                                    <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> 5.0 (12.200)
                                </div>

                            </div>

                            <div class="texto mt-3">
                                <p> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga architecto eos recusandae ut dolorum. Culpa cupiditate ipsum quaerat repudiandae, labore ratione earum, illum expedita voluptate in voluptatem! Delectus, provident laudantium! Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                            </div>

                            <div class="valor">
                                <h4>R$: 1.000,00 Total</h4>
                            </div>

                            <div class="botoes">
                                <button type="submit" class="btn-perfil" onclick="window.location.href='perfil.php'" name="verPerfil">Ver perfil</button>
                            </div>


                        </div>

                        <div class="item mb-3 ">
                            <p id="tipoServico" class="text-end">Desenvolvedor</p>
                            <div class="perfil">
                                <div class="foto">
                                    <img src="../../Assets/Images/Academia.jpeg" alt="Foto">
                                </div>
                                <div class="info">
                                    <h4><strong>Felipe Ferreira Gomes</strong></h4>
                                    <p>Ceres, GO</p>
                                    <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> 5.0 (12.200)
                                </div>

                            </div>

                            <div class="texto mt-3">
                                <p> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga architecto eos recusandae ut dolorum. Culpa cupiditate ipsum quaerat repudiandae, labore ratione earum, illum expedita voluptate in voluptatem! Delectus, provident laudantium! Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                            </div>

                            <div class="valor">
                                <h4>R$: 1.000,00 Total</h4>
                            </div>

                            <div class="botoes">
                                <button type="submit" class="btn-perfil" onclick="window.location.href='perfil.php'" name="verPerfil">Ver perfil</button>
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


</body>

</html>