<?php
//error_reporting(0);
date_default_timezone_set('America/Sao_Paulo');
/****************************************************************************************************************
    VARIÁVEIS DEFINIDAS DE ACORDO COM O SERVIDOR (LOCAL/REMOTO) TERMINANDO COM 'kms/site'
 *****************************************************************************************************************/
function getServerRoot() {
    return ehLocal() ? '/kms/site' : '';
}
function getServerAbsoluteRoot() {
    return 'http://'.$_SERVER['SERVER_NAME'];
}
function getURLFiles() {
    return (strpos($_SERVER ['REQUEST_URI'], 'admin')) ? '../' : '';
}
function ehLocal() {
    switch ($_SERVER['SERVER_NAME']) {
        case 'localhost':
        case 'www.localhost':
        case '192.168.0.100':
        case '192.168.0.103':
        case '192.168.1.119':
        case '192.168.43.195':  return 1;
        default:                return 0;
    }
}

/****************************************************************************************************************
    Função que retorna um Array com o nome das páginas em minúsculo sem formato
*****************************************************************************************************************/
function getPages() {
    return array('home','sobre','planos','cases','contato','login','blog','noticia','clientes');
    //_____________0_______1_______2_________3__________4________5_______6_______7______8_____
}
function getPagesAdmin() {
    return array('home','contracts','good_cases','contract','good_case','contractpdf', 'blogs', 'blog', 'employee', 'employees', 'client', 'clients');
    //_____________0_________1__________2___________3____________4_____________5__________6_______7_________8____________9__________10________11____
}

/****************************************************************************************************************
    Função que contém um Array com o nome das páginas em minúsculo e retorna o ID da página atual para definir o "current"
*****************************************************************************************************************/
function getPageID() {
    $aux         = explode('/',$_SERVER['REQUEST_URI']);  // Array separado por "/" pra pegar nome da página
    $aux2        = end($aux);                             // Pegando nome da página: "pagina.formato"
    $aux3        = explode('.',$aux2);                    // Array separado por ".": "pagina" e "formato"
    $pgClicada   = reset($aux3);                          // Pegando o nome da página sem formato
    $itemMenuSup = getPages();                            // Buscando páginas no menu
    $itemMenuCon = count($itemMenuSup);                   // Quantidade de itens do menu
    for($cont = 0; $cont < $itemMenuCon; $cont++)         // Percorrendo o array com as páginas do menu
      if($pgClicada == $itemMenuSup[$cont])               // Verificando se a página clicada tá menu
        return $cont;                                     // Retornando posição da página clicada no menu
    return 0;                                             // Se a página não existir, o padrão é o ID da Home
}

function getPageIDAdmin() {
    $aux         = explode('/',$_SERVER['REQUEST_URI']);  // Array separado por "/" pra pegar nome da página
    $aux2        = end($aux);                             // Pegando nome da página: "pagina.formato"
    $aux3        = explode('.',$aux2);                    // Array separado por ".": "pagina" e "formato"
    $pgClicada   = reset($aux3);                          // Pegando o nome da página sem formato
    $itemMenuSup = getPagesAdmin();                       // Buscando páginas no menu
    $itemMenuCon = count($itemMenuSup);                   // Quantidade de itens do menu
    for($cont = 0; $cont < $itemMenuCon; $cont++)         // Percorrendo o array com as páginas do menu
        if($pgClicada == $itemMenuSup[$cont])             // Verificando se a página clicada tá menu
            return $cont;                                 // Retornando posição da página clicada no menu
    return 0;                                             // Se a página não existir, o padrão é o ID da Home
}

/****************************************************************************************************************
    Função que, a partir do ID da página atual, retorna o que deve aparecer na tag <title>
*****************************************************************************************************************/
function getPageTitleValue() {
    switch (getPageID()) {
        case '1': return "Sobre Nós";
        case '2': return "Planos";
        case '3': return "Cases";
        case '4': return "Contato";
        case '6':
        case '7': return "Blog";
        case '8': return "Clientes";
        default : return "KMS";
    }
}
function getPageTitleValueAdmin() {
    switch (getPageIDAdmin()) {
        case '2':
        case '4': return "Cases";
        case '1':
        case '3':
        case '5': return "Contratos";
        default : return "KMS";
    }
}

/* Trata o tipo de redirecionamento, recebe o caminho a seguir, uma vaiável e o conteúdo dessa variável para enviar por get */
function redirectThisPage($redirectTo,$var,$get) {
    if($get != null) {
        if($var == null) { $var = 'transfer'; }
        $cont_get = '?'. $var .'='. $get;
    } else { $cont_get = ''; }
    return '
      <script type="text/javascript">location.href="'. $redirectTo . $cont_get .'"</script>
      <noscript>
        <meta http-equiv="refresh" content="0; url='. $redirectTo . $cont_get .'" />
      </noscript>
    ';
}

function InicialMaius($str){
    $arrStr = explode(' ',$str);            //Array da string separado por espaço
    $strUp  = '';                           //Guardará a string final
    foreach($arrStr as $key => $value ) {
        if(strlen($value) > 3)              //Ignorando "do", "das", "de" em nomes, por exemplo
            $value = ucfirst($value);
        $strUp = $strUp . ' ' . $value;     //Concatenando a string maiúscula
    }
    return $strUp;
}

function TransfInicialMaiuscTxt($str){
    $arrStrP = explode('.',$str);
    $tam1    = sizeof($arrStrP);
    $strUp = '';

    if($tam1 > 1) {
        for ($pos = 0; $pos < $tam1 - 1; $pos++) {
            $strUp = $strUp . ' ' . ucfirst(trim($arrStrP[$pos])) . '.';
        }
    } else {
        return ucfirst(trim($str));
    }
    return $strUp;
}

function mensagemAlerta() {
    /*
     * TRATAMENTO DE MODAL DE ALERTAS
     * RETORNA UMA MENSAGEM BASEADA NO VALOR DA VARIÁVEL 'm' ENVIADA POR GET
    */
    if(isset($_GET['m'])) {
        switch(base64_decode($_GET['m'])) {
            case '0':
                /* Falha: Confirmação de assinatura de contrato */
                $msmEnvio = '<p class=\"bg-danger\"><span class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"></span> Erro ao assinar contratro!</p>';
                break;
            case '1':
                /* Sucesso: Confirmação de assinatura de contrato */
                $msmEnvio = '<p class=\"bg-success\"><span class=\"glyphicon glyphicon-ok\" aria-hidden=\"true\"></span> Seu contrato foi assinado com sucesso! Em breve você receberá uma cópia em seu email.</p>';
                break;
            case 2:
                /* Falha: Form de contato */
                $msmEnvio = '<p class=\"bg-danger\"><span class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"></span> Pedimos desculpas, mas não conseguimos enviar sua mensagem. Por favor, tente novamente mais tarde.</p>';
                break;
            case 3:
                /* Sucesso: Form de contato */
                $msmEnvio = '<p class=\"bg-success\"><span class=\"glyphicon glyphicon-ok\" aria-hidden=\"true\"></span> Mensagem enviada com sucesso!</p>';
                break;
            case 99:
                /* Falha: Form de contato acessado indevidamente (URL direta sem modal)
                 * Neste caso, o modal de contato é acionado
                */
                return '
                  $("#modal-contato").modal();
                  $(".close").click(function() {
                    window.history.pushState("Object", "", "'.$_SERVER['SCRIPT_NAME'].'");
                  });
                ';
            default:
                /* Falha: Tentativa de envio desconhecido por GET */
                $msmEnvio = '<p class=\"bg-danger\"><span class=\"glyphicon glyphicon-warning-sign\" aria-hidden=\"true\"></span> Operação inválida. Por favor, tente novamente ou <a href=\"contato.php\" class=\"lnk-alert\" title=\"Clique aqui para reportar este erro\">contate o administrador do sistema</a>.</p>';
                break;
        }

        /*
         * Por padrão, o modal de alertas é sempre acionado pra qualquer valor de 'm' diferente dos anteriores
        */
        return '
        /******** Modal de alertas ********/
        $("#modal-confirmacao").modal();
        $(".retorno").html("' . $msmEnvio . '");
        $(".close").click(function() {
          window.history.pushState("Object", "", "'.$_SERVER['SCRIPT_NAME'].'");
          $(".retorno").html(
            "<span class=\"protocol bg-info\"><span class=\"glyphicon glyphicon-pencil\" aria-hidden=\"true\"></span>" +
            "  Número de Protocolo: <span class=\"protoc\"></span></span>"
          );
        });
        /******** Fim Modal de alertas ********/
        ';
    }
}