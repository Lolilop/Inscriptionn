<?php




  $email = $_POST["email"];
  $pwd = $_POST["password"];
  $pwd_confirme = $_POST["password_confirme"];

  if($pwd != $pwd_confirme){
    header('Location: http://localhost/inscription/formulaire_inscription.php?pwd');
  }else {

    $mail = explode("@",$email);

    if($mail[1] != "intradef.gouv.fr" or stristr($mail[0], '.') == FALSE) {
      header('Location: http://localhost/inscription/formulaire_inscription.php?mail');
    }else {

/*

write BDD
        echo "continue";
        $array = Array (
    "0" => Array (
        "id" => $mail[0],
        "email" => $email,
        "psw" => $pwd
    )

);

// encode array to json
$json = json_encode($array);
$bytes = file_put_contents("BDD.json", $json);

*/

$Json = file_get_contents("BDD.json");
$myarray = json_decode($Json, true);


$array = Array (
"0" => Array (
"id" => $mail[0],
"email" => $email,
"psw" => $pwd
));
$dados1 = json_encode($myarray);
$dados2 = json_encode($array);
$data = json_encode(array_merge(json_decode($dados1, true),json_decode($dados2, true)));
$bytes = file_put_contents("BDD.json", $data);

    }
  }

function write_BDD($mail, $email, $pwd, $BDD) {


}

 ?>
