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
            <!-- <div class="logo "> -->
            <a href="#" class="logo-link navbar-brand"> <img src="../../Assets/Images/Texto do seu parágrafo(3).png" class="logo" alt="Foto Escolhida"> </a>
            <!-- </div> -->

            <div class="imagem">
                <img src="../../Assets/Images/FOTOPERFIL.png" alt="Foto Escolhida" data-bs-toggle="offcanvas" data-bs-target="#sidebarPerfil">
            </div>



        </div>

        <nav>
            <ul class="mt-1 mb-5">
                <li><a href="homeProfissional.php">Home</a></li>
                <li><a href="historicoProfissional.php">Histórico</a></li>
                <li><a href="#">Minhas avaliações</a></li>

            </ul>

        </nav>
    </header>

    <main>

        <div class="offcanvas offcanvas-end" style="height: 100vh" tabindex="-1" id="sidebarPerfil">

            <div class="offcanvas-header">
                <div class="comentImage">
                    <img class="Imagecomentario" style="border-radius: 50% !important;" src="../../Assets/Images/comentario.jpg" alt="">

                </div>
                <h5> &nbsp; Felipe Ferreira Gomes</h5>
                <br>

                <button type="button"
                    class="btn-close"
                    data-bs-dismiss="offcanvas">
                </button>
            </div>

            <div class="offcanvas-body">
                <button onclick="window.location.href='login.php'" class="btn-sair">Sair</button>
            </div>

        </div>
        <div class="voltarPerfil  ">
            <a href="homeCliente.php"><i class="bi bi-arrow-left"></i> Voltar</a>

        </div>

        <hr class="margem">

        <div class="perfilAvaliacao"> <!--Background gray -->
            <h4 class="mb-4"><strong>Suas Avaliações</strong></h4>
            <div class="avaliacaoGroup "> <!--Listagem de avaliacoes -->

                <div class="comentGroup border "> <!--Bloco de comentario -->
                    <div class="infoComent "> <!--informaçoes do comentario -->
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

                            <div class="respostaBox" style="display: none;">
                                <textarea class="form-control" placeholder="Responder comentário..."></textarea>
                                <button class="btn-solicitacao mt-4">Responder</button>
                            </div>

                        </div>

                    </div>

                    <div class="dataComentario ">
                        <div class="data">
                            <p>10/02/2026</p>

                        </div>

                        <div class="icones">
                            <i class="bi bi-exclamation-triangle-fill fs-3 disable" style="color: #C52222"></i>
                            <i class="bi bi-arrow-return-left fs-3" onclick="toggleResposta(this)" style="color: var(--corPrincipal);"></i>


                        </div>
                    </div>


                </div>


                <div class="comentGroup border"> <!--card -->
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

                    <div class="dataComentario ">
                        <div class="data">
                            <p>10/02/2026</p>

                        </div>

                        <div class="icones">
                            <i class="bi bi-exclamation-triangle-fill fs-3" style="color: #C52222"></i>
                            <i class="bi bi-arrow-return-left fs-3" style="color: var(--corPrincipal);"></i>

                        </div>
                    </div>

                </div>

                <div class="comentGroup border"> <!--Card -->
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

                <div class="comentGroup border"> <!--CARD -->
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

                <div class="comentGroup border"> <!--Card -->
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

                <div class="comentGroup border"> <!--Card-->
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
        <ul class="pagination pagination-md">
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
                    <h5 class="text-uppercase">LaborHUB</h5>
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
        function toggleResposta(element) {
            const comentario = element.closest('.comentGroup');
            const box = comentario.querySelector('.respostaBox');

            const aberto = box.style.display === 'block';

            document.querySelectorAll('.respostaBox').forEach(b => b.style.display = 'none');

            if (!aberto) {
                box.style.display = 'block';
            }
        }
    </script>


</body>

</html>