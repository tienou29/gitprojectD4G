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
    <script src="script.js"></script>

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
        <div class="selectors">
            <div class="select" style="width:200px;">
                <select>
                    <option value="0">Famille</option>
                    <option value="1">Stratégie</option>
                    <option value="2">Spécification</option>
                    <option value="3">UX/UI</option>
                    <option value="4">contenus</option>
                    <option value="5">Architecture</option>
                    <option value="6">Frontend</option>
                    <option value="7">Backend</option>
                    <option value="8">Hebergement</option>
                </select>
            </div>

            <div class="select" style="width:200px;">
                <select>
                    <option value="0">Planet</option>
                    <option value="1">A</option>
                    <option value="2">B</option>
                    <option value="3">C</option>
                </select>
            </div>

            <div class="select" style="width:200px;">
                <select>
                    <option value="0">Priorité</option>
                    <option value="1">High</option>
                    <option value="2">Medium</option>
                    <option value="3">Low</option>
                </select>
            </div>
        </div>

        <?php
function button_add()
{
  echo($_REQUEST['subject']);
}
?>

        <?php
        $redis = new Redis();
        //Connecting to Redis
        $redis->connect('redis-14012.c2.eu-west-1-3.ec2.cloud.redislabs.com', 14012);
        $redis->auth('0t4Hg0ju4ZcmzP8hRmGIENEBR5G6QnFX');

        $arList = $redis->keys("*");
        $panier = array();
        ?>

        <h3>Selectionnez vos solutions</h3>


        <div class="flex-container">

          <script>
          function getCookie(cookieName) {
            let cookie = {};
            document.cookie.split(';').forEach(function(el) {
              let [key,value] = el.split('=');
              cookie[key.trim()] = value;
            })
            return cookie[cookieName];
          }

          function addPanier(nb){
            console.log(getCookie('panier'));
            if (getCookie('panier') !== undefined){
              document.cookie = 'panier = ' + getCookie('panier')+'/'+nb;
            }else {
              document.cookie = 'panier = ' + nb;
            }
          }

        </script>
<?php
for ($i = 1; $i < count($arList); $i++) {
  $r1= $redis->hget($arList[$i], "id-base");
  $r2= $redis->hget($arList[$i], "famille origine");
  $r3= $redis->hget($arList[$i], "planet");
  $r4= $redis->hget($arList[$i], "people");
  $r5= $redis->hget($arList[$i], "prosperity");
    echo "<div> id-base :$r1 <br> famille origine:$r2 <br>planet:$r3 <br> people:$r4 <br>prosperity$r5 <br>
  <button class='styled' name='subject' type='submit' id=$i onClick='GFG_click(this.id)'>add</button></div>";

}
?>
        </div>

        <p id = "GFG_DOWN" style =
            "color:green; font-size: 20px; font-weight: bold;">
        </p>

        <script>
            var el_down = document.getElementById("GFG_DOWN");
            const panier = new Array()

            function GFG_click(clicked) {

                let x = document.cookie;

                el_down.innerHTML = "ID = "+ getCookie('panier');
                let cookies = document.cookie;
                addPanier(clicked)
                console.log(getCookie('panier'));
            }
        </script>


        <h3>Telechargez votre tableau</h3>
        <div class="downl">
            <a href="https://google.com" class="lolhehe">Download</a>
        </div>
        
        
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
