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
                <li><a href="homeCliente.php">Home</a></li>
                <li><a href="historico.php">Histórico</a></li>
                <li><a href="#">Agenda</a></li>
            </ul>

        </nav>
    </header>

    <main>
        <div class="voltarPerfil  ">
            <a href="homeCliente.php"><i class="bi bi-arrow-left"></i> Voltar</a>

        </div>

        <hr class="margem">

        <div class="perfilCliente"> <!--Borda cinza-->
            <div class="perfilDados"> <!--Borda vermelha-->
                <div class="perfilName"> <!--Borda Azul-->
                    <h3>Felipe Ferreira Gomes</h3>
                    <p>Ceres - GO</p>
                    <p><strong>Contato: </strong> 62 996496240</p>
                    <p><strong>Email: </strong>felipeferreiraag0@gmail.com</p>
                </div>

                <div class="perfilDetalhes"> <!--Borda verde-->
                    <div class="perfilImagem"> <!--Borda azul -->
                        <img src="../../Assets/Images/Academia.jpeg" alt="FOTOPERFIL">
                    </div>
                    <div class="perfilNotas">
                        <div class="perfilStars">
                            <i class="bi bi-star-fill fs-5"></i>
                            <i class="bi bi-star-fill fs-5"></i>
                            <i class="bi bi-star-fill fs-5"></i>
                            <i class="bi bi-star-fill fs-5"></i>
                            <i class="bi bi-star-fill fs-5"></i>
                            <p>5.0 &nbsp;(12.000)</p>

                        </div>

                        <p>Eletricista</p>
                        <h4>Sobre</h4>
                        <p>Profissional Avançado, trabalho na área a cerca de 5 anos. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio maiores quam autem quod, facilis omnis et perferendis dignissimos cum non, quaerat esse? Nam aliquam quibusdam laboriosam. Molestiae consequuntur possimus minus!</p>

                    </div>


                </div>

            </div>


            <div class="perfiServico">
                <h5>Serviço</h5>
                <h6>R$: Negociável</h6>
                <button type="button" class="btn-finalizar mt-5" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Solicitar</button>


                <div class="modal fade modal-lg" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Solicitação de serviço</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body"> <!--COnteudo com os formulario-->
                                <div class="row">
                                    <form action="" method="post">

                                        <div class="col-md-12">
                                            <label for="solicitacao_data">Data de solicitação</label>
                                            <input type="date" name="solicitacao_data" class="form-control" placeholder="Data para o serviço" id="solicitacao_data">
                                        </div>

                                        <!-- Vai puxar o endereço conforme foi cadastrado -->
                                        <div class="col-md-12 mt-3">
                                            <label for="solicitacao_endereço">Endereço</label>
                                            <input type="text" name="solicitacao_endereco" class="form-control" placeholder="Endereço para serviço" id="solicitacao_endereco" readonly>
                                        </div>

                                        <div class="col-md-12 mt-3">
                                            <label for="solicitacao_observacao">Observação</label>
                                            <textarea name="solicitacao_observacao" class="form-control" placeholder="Observação do serviço" id="solicitacao_observacao">

                                            </textarea>
                                        </div>


                                    </form>
                                </div>


                            </div>
                            <div class="modal-footer">
                                <button class="btn-finalizar" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>



        </div>


        <div class="perfilAvaliacao"> <!--Background gray -->
            <h4>Avaliações</h4>
            <div class="avaliacaoGroup"> <!--Listagem de avaliacoes -->

                <div class="comentGroup"> <!--Bloco de comentario -->
                    <div class="infoComent"> <!--informaçoes do comentario -->
                        <div class="comentImage">
                            <img class="Imagecomentario" src="../../Assets/Images/comentario.jpg" alt="">

                        </div>
                        <div class="perfilStars infoComentario">
                            <h5>Maria Gonçalves Ferreira</h5>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>

                            <h5 class="mt-3"><strong>Ótimo profissional</strong></h5>
                            <p>Ele foi super prestativo no serviço, trabalho bem feito, AMEI!!! </p>

                        </div>

                    </div>

                    <div class="dataComentario">
                        <p>10/02/2026</p>
                    </div>

                </div>

                <div class="comentGroup"> <!--card -->
                    <div class="infoComent"> <!--informaçoes do comentario -->
                        <div class="comentImage">
                            <img class="Imagecomentario" src="../../Assets/Images/comentario2.jpg" alt="">

                        </div>
                        <div class="perfilStars infoComentario">
                            <h5>Maria Gonçalves Ferreira</h5>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>

                            <h5 class="mt-3"><strong>Ótimo profissional</strong></h5>
                            <p>Ele foi super prestativo no serviço, trabalho bem feito, AMEI!!! </p>

                        </div>

                    </div>

                    <div class="dataComentario">
                        <p>10/02/2026</p>
                    </div>

                </div>

                <div class="comentGroup"> <!--Card -->
                    <div class="infoComent"> <!--informaçoes do comentario -->
                        <div class="comentImage">
                            <img class="Imagecomentario" src="../../Assets/Images/comentario3.jpg" alt="">

                        </div>
                        <div class="perfilStars infoComentario">
                            <h5>Maria Gonçalves Ferreira</h5>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>

                            <h5 class="mt-3"><strong>Ótimo profissional</strong></h5>
                            <p>Ele foi super prestativo no serviço, trabalho bem feito, AMEI!!! </p>

                        </div>

                    </div>

                    <div class="dataComentario">
                        <p>10/02/2026</p>
                    </div>

                </div>

                <div class="comentGroup"> <!--CARD -->
                    <div class="infoComent"> <!--informaçoes do comentario -->
                        <div class="comentImage">
                            <img class="Imagecomentario" src="../../Assets/Images/comentario4.jpg" alt="">

                        </div>
                        <div class="perfilStars infoComentario">
                            <h5>Maria Gonçalves Ferreira</h5>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>

                            <h5 class="mt-3"><strong>Ótimo profissional</strong></h5>
                            <p>Ele foi super prestativo no serviço, trabalho bem feito, AMEI!!! </p>

                        </div>

                    </div>

                    <div class="dataComentario">
                        <p>10/02/2026</p>
                    </div>

                </div>

                <div class="comentGroup"> <!--Card -->
                    <div class="infoComent"> <!--informaçoes do comentario -->
                        <div class="comentImage">
                            <img class="Imagecomentario" src="../../Assets/Images/comentario.jpg" alt="">

                        </div>
                        <div class="perfilStars infoComentario">
                            <h5>Maria Gonçalves Ferreira</h5>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>

                            <h5 class="mt-3"><strong>Ótimo profissional</strong></h5>
                            <p>Ele foi super prestativo no serviço, trabalho bem feito, AMEI!!! </p>

                        </div>

                    </div>

                    <div class="dataComentario">
                        <p>10/02/2026</p>
                    </div>

                </div>

                <div class="comentGroup"> <!--Card-->
                    <div class="infoComent"> <!--informaçoes do comentario -->
                        <div class="comentImage">
                            <img class="Imagecomentario" src="../../Assets/Images/comentario4.jpg" alt="">

                        </div>
                        <div class="perfilStars infoComentario">
                            <h5>Maria Gonçalves Ferreira</h5>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>

                            <h5 class="mt-3"><strong>Ótimo profissional</strong></h5>
                            <p>Ele foi super prestativo no serviço, trabalho bem feito, AMEI!!! </p>

                        </div>

                    </div>

                    <div class="dataComentario">
                        <p>10/02/2026</p>
                    </div>

                </div>





            </div>

        </div>



    </main>

    <nav aria-label="...">
        <ul class="pagination pagination-lg">
            <li class="page-item active">
                <a class="page-link" aria-current="page">1</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
        </ul>
    </nav>


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