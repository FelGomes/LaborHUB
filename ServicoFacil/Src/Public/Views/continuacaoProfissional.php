<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serviço Facil</title>
    <link rel="stylesheet" href="../../Assets/Css/style.css">
    <link rel="stylesheet" href="../../Assets/Css/mediaQuery.css">



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- <style>
        h2 {
            font-weight: bold !important;
        }
    </style> -->

</head>



<body>
    <main style="min-height: 100vh">
        <div class="container mt-4 mb-5 border">
            <div class="row">
                <h2 class="text-center mt-3">Serviços</h2>
                <p class="text-center">Para finalizar o cadastro é necessário que informe algumas caracteristicas referente ao seu serviço</p>
                <form action="criarConta.php" method="post"> <!--Formulario para enviou de validação de dados -->

                    <div class="cadastro mt-4">



                        <!-- Cadastro de pessoa fisica -->
                        <div id="form-pf tela1" class="col-md-12 mt-4">
                            <div class="row">

                                <div class="col-md-6 mt-4 mb-2">
                                    <label for="servicos_nome">Tipo de serviço </label>
                                    <input type="text" name="servicos_nome" id="servicos_nome" placeholder="Informe o tipo de serviço" class="form-control" required>
                                </div>

                                <div class="col-md-6 mt-4 mb-2">
                                    <label for="servicos_data">Dias de serviço</label>
                                    <select name="servicos_data" class="form-control" id="data">
                                        <option selected>Selecione</option>
                                        <option value="segundaSexta">Seg. à Sexta</option>
                                        <option value="segundaSabado">Seg. à Sábado</option>
                                        <option value="todoDIa">Todos os dias</option>
                                        <option value="finsDeSemana">Fins de Semana</option>
                                        <option value="diasIntercalados">Dias intercalados</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mt-4 mb-2">
                                    <label for="servicos_valor">Valor do atendimento </label>
                                    <input type="number" name="servicos_valor" placeholder="Informe o valor do seu serviço" id="servicos_valor" class="form-control" step="0.01" min="0.01" required>
                                </div>


                                <div class="col-md-6 mt-4 mb-2">
                                    <label for="servicos_cobrança">Tipo de cobrança</label>
                                    <select name="servicos_cobrança" class="form-control" id="servicos_cobrança">
                                        <option selected>Selecione a cobrança</option>
                                        <option value="hora">Por hora</option>
                                        <option value="dia">Por dia</option>
                                        <option value="total">Serviço total</option>
                                        <option value="negociar">A negociar</option>

                                    </select>
                                </div>


                                <div class="col-md-12 mt-4 mb-2">
                                    <label for="servicos_nivel_experiencia">Nível de experiência</label>
                                    <select name="servicos_nivel_experiencia" class="form-control" id="servicos_nivel_experiencia">
                                        <option selected>Selecione o nível de experiência</option>
                                        <option value="inciante">Inciante</option>
                                        <option value="intermediario">Intermediário</option>
                                        <option value="avancado">Avançado</option>
                                    </select>

                                </div>

                                <div class="col-md-12 mt-4 mb-5">
                                    <label for="servicos_descricao">Descrição</label>
                                    <textarea name="servicos_descricao" placeholder="Descreva mais sobre seu serviço" class="form-control h-1200px" id="servicos_descricao">

                                    </textarea>

                                </div>



                            </div>
                            <div class="botoes col-12 col-md-6 mt-5 mb-4 ms-auto mt-md-5 mb-md-4">
                                <button type="submit" onclick="window.history.back()" class="btn-reset">Voltar</button>
                                <button type="submit" name="enviar" class="btn-submit" onclick="proximaTela()">Finalizar</button>

                            </div>

                        </div>
                    </div>
                </form>
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


    <script>
        function mostrar(tipo) {
            document.getElementById("form-pj").style.display = 'none';
            document.getElementById("form-pf").style.display = 'none';

            document.getElementById('form-' + tipo).style.display = 'block';

        }

        function proximaTela() {
            document.getElementById("tela1").style.display = "none";
            document.getElementById("tela2").style.display = "block";
        }
    </script>


</body>

</html>