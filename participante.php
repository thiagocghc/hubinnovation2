<?php
include __DIR__.'/vendor/autoload.php';
use App\Entity\Usuario;
use App\Entity\Palestra;
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_GET['id_palestra']))
{
    $id_palestra = filter_input(INPUT_GET,'id_palestra',FILTER_SANITIZE_NUMBER_INT);
    $new_obj = new Palestra();
    $palestra = $new_obj->get_idPalestra($id_palestra);
    $titulo = $palestra->titulo;
    $descricao = $palestra->descricao; 
    $vagas = $palestra->vagas;
    $sala = $palestra->sala; 
}else{
    header('location:./index.php');
}

if(isset($_POST['cadastrar']))
{
    $nome =  filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $contato = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $fone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);
    $cpf = filter_input(INPUT_POST, 'CPF', FILTER_SANITIZE_SPECIAL_CHARS);
    $sexo = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
    $data_nascimento = addslashes($_POST['data_nascimento']);
    $lgpd = addslashes($_POST['lgpd']);
    $info = addslashes($_POST['info']);

    //verificar se está tudo preenchido
    if(!empty($nome) && !empty($fone) && !empty($contato) && !empty($cpf) && !empty($sexo) && !empty($data_nascimento)&& !empty($lgpd)&& !empty($info))
    {
        $usuario = new Usuario();
        $usuario->nome = $nome;
        $usuario->cpf =  $cpf;
        $usuario->email = $contato;
        $usuario->fone = $fone;
        $usuario->data_nasc = $data_nascimento;
        $usuario->sexo = $sexo;
        $usuario->info = 1;
        $usuario->lgpd = 1;
        $usuario->id_palestra = $id_palestra;

        $consulta = $usuario->busca_cpf($cpf,$id_palestra);
        if($consulta === "ERROR"){
            $result =  $usuario->cadastrar();
            if ($result) {

                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->CharSet = 'UTF-8';
                    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'fabrica.hub.academy@gmail.com';                     //SMTP username
                    $mail->Password   = 'vagoylhbhsblurqt';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                    //Recipients
                    $mail->setFrom('fabrica.hub.academy@gmail.com', 'HUB INNOVATION');
                    $mail->addAddress($contato, $nome);     //Add a recipient
                    $mail->addReplyTo('fabrica.hub.academy@gmail.com', 'HUB INNOVATION');

                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'HUB INNOVATION';

                            //Configurando a mensagem para ser enviada
                    $enviaMsg = ' Olá ' . $nome . 'você está inscrito na 2ª Edição do HUB Innovation!!! <br> No dia 21 de junho às 19h, aguardamos você no Senac Hub Academy. Rua Francisco Xavier, 75. <br> Ficaremos feliz com sua presença no Encontro que multiplica conexões! ';

                    $mail->Body = $enviaMsg;

                    $mail->send();
                }
                catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
              //Create an instance; passing `true` enables exceptions
                echo '<script language="javascript">';
                echo 'alert("Cadastrado realizado com sucesso!!")';
                echo '</script>';
            } 
        }
        else{
                echo '<script language="javascript">';
                echo 'alert("Usuário já cadastrado em outra Palestra!")';
                echo '</script>'; 
        }
        //header('location:index.php?status=success');
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HUB INNOVATION II</title>

    <link rel="stylesheet" href="./css/menu.css">
    <link rel="stylesheet" href="./css/inscricao.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body class=" tela-inscricao ">
    <header class="header ">
        <nav class="navbar ">
            <ul class="nav-menu ">
                <li class="nav-item ">
                    <a href="index.php " class="nav-link ">HOME</a>
                </li>
                <li class="nav-item ">
                    <a href="index.php" class="nav-link ">SOBRE</a>
                </li>
                <li class="nav-item ">
                    <a href="index.php" class="nav-link ">EDIÇÕES</a>
                </li>
                <li class="nav-item ">
                    <a href="index.php" class="nav-link ">PALESTRANTES</a>
                </li>
            </ul>
            <div class="hamburger ">
                <span class="bar "></span>
                <span class="bar "></span>
                <span class="bar "></span>
            </div>
        </nav>

    </header>

    <div class="container-inscricao">
        <div class="container-box">
            <div class="dados-palestra">
                <h2 class="titulo-palestra" id="titulo "> <?= $vagas ?> vagas </h2>
                <h2 class="titulo-palestra"> <?= $titulo ?> </h2>
                <p class="desc-plaestra"> <?= $descricao ?> </p>
            </div>
        </div>
        <div class="dadosFormulario">
            <div class="box">
                <form action="" method="POST" class="forms-inscricao">
                    <fieldset>
                        <legend><b>Fórmulário de Inscrição</b></legend>
                        <br>
                        <div class="inputBox">
                            <label for="nome" class="labelInput">Nome completo</label>
                            <input type="text" name="nome" id="nome" class="inputUser" required>

                        </div>
                        <div class="inputBox">
                            <label for="email" class="labelInput">Email</label>
                            <input type="email" name="email" id="email" class="inputUser" required>
                        </div>
                        <div class="inputBox">
                            <label for="telefone" class="labelInput">Telefone</label>
                            <input type="number" maxlength="11" name="telefone" id="telefone" class="inputUser" required>
                        </div>
                        <div class="inputBox">
                            <label for="CPF" class="labelInput">CPF</label>
                            <input type="number" maxlength="11" name="CPF" id="CPF" class="inputUser" required>
                        </div>
                        <div class="dados-pessoais">
                            <p>Sexo:</p>
                            <div class="sexo">
                                <input type="radio" id="feminino" name="genero" value="F" required>
                                <label for="feminino">Feminino</label>
                            </div>
                            <div class="sexo">
                                <input type="radio" id="masculino" name="genero" value="M" required>
                                <label for="masculino">Masculino</label>
                            </div>
                            <div class="sexo">
                                <input type="radio" id="outro" name="genero" value="O" required>
                                <label for="outro">Outro</label>
                            </div>

                        </div>
                        <div class="inputBox">
                            <label for="data_nascimento">Data de Nascimento:</label><br>
                            <input type="date" name="data_nascimento" id="data_nascimento" required>
                        </div>


                        <div class="inputBox">
                            <input type="checkbox" name="lgpd" id="lgpd" required>
                            <label for="endereco" class="labelcheck">Ao enviar este formulário, você permite que seus dados 
                                    pessoais sejam processados em nossas plataformas educacionais.</label>
                        </div>
                        <div class="inputBox">
                            <input type="checkbox" name="info" id="lgpd" required>
                            <label for="endereco" class="labelcheck">Você concorda em receber informações a respeito de cursos 
                                    relacionados ao Senac.</label>
                        </div>
                        <div class="botoes">
                            <input type="reset" id="submit" name="cancelar" value="Canelar">
                            <input type="submit" id="enviar" name="cadastrar" value="Enviar">
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    </div>

    <script>
        const hamburger = document.querySelector(".hamburger");
        const navMenu = document.querySelector(".nav-menu");

        hamburger.addEventListener("click", mobileMenu);

        function mobileMenu() {
            hamburger.classList.toggle("active");
            navMenu.classList.toggle("active");
        }

        const navLink = document.querySelectorAll(".nav-link");

        navLink.forEach(n => n.addEventListener("click", closeMenu));

        function closeMenu() {
            hamburger.classList.remove("active");
            navMenu.classList.remove("active");
        }


        document.querySelectorAll('input[type="number"]').forEach(input =>{

input.oninput = () => {

    if(input.value.length > input.maxLength) input.value = input.value.slice(0,input.maxLength);

};

});



var mail = document.getElementById('email');

mail.addEventListener('focusout', ()=>{

var re = /\S+@\S+\.\S+/;

if(!re.test(email.value)){

alert("E-mail Inválido! Digite novamente!")

}

})



var cpf = document.getElementById('CPF');
    cpf.addEventListener('focusout', ()=>{
    if(!validaCPF(cpf.value)){
    alert("CPF Inválido! Digite novamente!")
    }
})

function validaCPF(cpf = 0) { let soma = 0 soma += cpf[0] * 10 soma += cpf[1] * 9 soma += cpf[2] * 8 soma += cpf[3] * 7 soma += cpf[4] * 6 soma += cpf[5] * 5 soma += cpf[6] * 4 soma
            += cpf[7] * 3 soma += cpf[8] * 2 soma = (soma * 10) % 11 if (soma == 10 || soma == 11) { soma = 0 } if (soma != cpf[9]) { return false } console.log('primeiro numero: ' + soma) soma = 0 soma += cpf[0] * 11 soma += cpf[1] * 10 soma += cpf[2]
            * 9 soma += cpf[3] * 8 soma += cpf[4] * 7 soma += cpf[5] * 6 soma += cpf[6] * 5 soma += cpf[7] * 4 soma += cpf[8] * 3 soma += cpf[9] * 2 soma = (soma * 10) % 11 if (soma != cpf[10]) { return false } console.log('segundo numero: ' + soma) return
            true }
</script>

</body>
</html>


