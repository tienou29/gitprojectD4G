</html>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="description"
  content="Ce site a pour but d'encourager l'écoconception dans le developpement informatique">
  <meta name="keywords" content="ecoconception, design for green, challenge, esaip">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title> Design 4 Green </title>
  <link rel="stylesheet" href="style.css">
  <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="./module.js"></script>
</head>

<div class="navigBar">
  <ul>
    <li><a class="active" href="#MAIN" accesskey="h">Acceuil 🏠</a></li>
    <li><a href="#contact" accesskey="p">Panier 🛒</a></li>
    <li style="float:right"><a class="active" href="https://design4green.org/" accesskey="d">About 🔎</a></li>
  </ul>
</div>

<body>

  <div class="content">

    <h1>GUIDE AUX BONNES PRATIQUES D'ÉCOCONCEPTION</h1>

    <div>
      <div class="description">
        <h2>🍂 Soyez l'acteur de votre développement numérique responsable. 🍂</h2>
      </div>
      <div class="keywords">
        <p>TRANSITION / ECOLOGIE / ACCESSIBILITÉ / NUMÉRIQUE</p>
      </div>
    </div>

    <h3>Filtrez les bonnes pratiques</h3>
    <form action="" method="post">
      <div class="selectors">
        <div class="select" style="width:200px;">
          Famille :
          <select name="Famille">
            <option value="STRATEGIE">Stratégie</option>
            <option value="SPECIFICATIONS">Spécification</option>
            <option value="UX/UI">UX/UI</option>
            <option value="CONTENUS">contenus</option>
            <option value="ARCHITECTURE">Architecture</option>
            <option value="FRONTEND">Frontend</option>
            <option value="BACKEND">Backend</option>
            <option value="HEBERGEMENT">Hebergement</option>
            <option value="ALL">all</option>

          </select>
        </div>

        <div class="select" style="width:200px;">
          Planet :
          <select name="Planet">
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="ALL">all</option>
          </select>
        </div>

        <div class="select" style="width:200px;">
          Priorité :
          <select name="Priorite">
            <option value="A">High</option>
            <option value="B">Medium</option>
            <option value="C">Low</option>
            <option value="ALL">all</option>
          </select>
        </div>
        <input type="submit" name="recherché" value="Submit">
      </div>
    </form>

    <?php
    echo "famille :";
    echo($_POST["Famille"]);
    echo "<br>planet :";
    echo($_POST["Planet"]);
    echo "<br>Priorité :";
    echo($_POST["Priorite"]);
    ?>

    <?php
    $redis = new Redis();
    //Connecting to Redis
    $redis->connect('redis-14012.c2.eu-west-1-3.ec2.cloud.redislabs.com', 14012);
    $redis->auth('0t4Hg0ju4ZcmzP8hRmGIENEBR5G6QnFX');

    $arList = $redis->keys("*");

    //filtre 1
    $out = array();
    if ($_POST["Famille"] != "ALL"){
      foreach ($arList as $value) {
        if ($redis->hget($value, "famille origine") == $_POST["Famille"]) {
          array_push($out,$value);
        }
      }
      $arList = $out;
    }
    //filtre 2
    $out = array();
    if ($_POST["Planet"] != "ALL"){
      foreach ($arList as $value) {
        if ($redis->hget($value, "Planet") == $_POST["Planet"]) {
          array_push($out,$value);
        }
      }
      $arList = $out;
    }
    //filtre 3
    $out = array();
    if ($_POST["Priorite"] != "ALL"){
      foreach ($arList as $value) {
        if ($redis->hget($value, "prosperity") == $_POST["Priorite"]) {
          array_push($out,$value);
        }
      }
      $arList = $out;
    }


    $panier = array();
    ?>

    <h1>Selectionnez vos contraintes</h1>


    <div class="flex-container">


      <?php
      $i=0;
      foreach ($arList as $value) {
        $i=$value;
        $r1= $redis->hget($value, "id-base");
        $r2= $redis->hget($value, "famille origine");
        $r3= $redis->hget($value, "planet");
        $r4= $redis->hget($value, "people");
        $r5= $redis->hget($value, "prosperity");
        echo "<div> id-base :$r1 <br> famille origine:$r2 <br>planet:$r3 <br> people:$r4 <br>prosperity$r5 <br> $i <br>
        <button class='styled ";

        $ho= "name='subject' type='submit' id=$i onClick='GFG_clickee(this.id)'>";
        $tmp=0;
        foreach ((explode("/",htmlspecialchars($_COOKIE["panier"]))) as $value) {
          if ($value == $i ){
            $tmp=1;
          }

        }
        if ( $tmp == 1 ){
          echo " rm '";
          $text="delete";
        }else{
          echo "'";
          $text ="add";
        }
        echo $ho;
        echo $text;
        echo "</button></div>";

      }
      ?>

      <script>
      function GFG_clickee(clicked){
        GFG_click(clicked);
      }
      </script>
    </div>
    <p id = "GFG_DOWN" style =
    "color:green; font-size: 20px; font-weight: bold;">
  </p>







  <h3>Telechargez votre tableau</h3>

  <div class="telechargement">
    <a href="gwophenix.php" class="btn" target="_blank">Download</a>
  </div>




  <footer>
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <a href="https://www.instagram.com/madeleine.d4g/?hl=fr" class="fa fa-instagram" alt="instagram"
    accesskey="i"></a>
    <a href="https://twitter.com/madeleineD4G" class="fa fa-twitter" alt="twitter" accesskey="t"></a>
  </footer>
</body>

</html>
