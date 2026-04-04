<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Serviço Fácil</title>
    <link rel="stylesheet" href="../../Assets/Css/style1.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

    <style>

        

        .container-box{
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .usuario{
            display: flex;
            justify-content: center;
            align-items: center;
            /* justify-content: space-between; */
            /* border: 2px dotted blue !important; */
            gap: 60px;
        }

        .cliente {
            display: flex;
            flex-direction: column;
        }

         .profissional {
            display: flex;
            flex-direction: column;
        }


        

        img {
            width: 200px;
            height: 200px;
            border: 1px solid #00000036;
            box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.175);
            border-radius: 5px;
        }

        .btn-escolher{
            width: 100%;
            height: 40px;
           border: 2px solid #3B82F6;
            background-color:  #3B82F6;
            color: white;
            font-weight: 700;
            box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.175);
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-escolher:hover{
            transform: scale(1.03) translateY(-2px) translateX(4px);
        }
    </style>


</head>

<body>

    <main>
        <div class="container-box">
            <h2 class="mb-4">Escolha seu tipo de usuário</h2>
            <div class="usuario ">
                <div class="cliente">
                    <img src="../../Assets/Images/cliente.png"alt="cliente">
                    <button type="submit" class="btn-escolher mt-5" onclick="window.location.href='cadastroCliente.php'"> Cliente</button>
                </div>

                <div class="profissional">
                    <img src="../../Assets/Images/profissional.png" alt="profissional">
                   <button type="submit" class="btn-escolher mt-5" onclick="window.location.href='cadastroProfissional.php'"> Profissional</button>
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

                <!-- Ícones de Redes Sociais  -->
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

                <!-- Texto de Copyright  -->
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