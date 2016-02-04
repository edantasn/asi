<?php
  $nomebd = 'agenc548_kms';
  $login  = 'agenc548_kms15';
  $senha  = 'agKmS-@15';
  $host   = 'localhost';

  if(ehLocal()) {
    $nomebd = 'simcon';
    $login  = 'root';
    $senha  = '';
    $host   = 'localhost';
  }

  @$bd = mysqli_connect($host, $login, $senha, $nomebd);
  @mysqli_set_charset($bd, 'utf8');

  if(mysqli_connect_errno()) {
    echo '<p class="msg bg-danger"><span class="glyphicon glyphicon-warning-sign"></span> Falha na conexão! Contate o administrador do sistema (erro '. mysqli_connect_errno().').</p>';
  } else {
    mysqli_select_db($bd, $nomebd);
  }
?>
