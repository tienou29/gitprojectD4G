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

</head>

<div class="navigBar">
    <ul>
        <li><a class="active" href="#MAIN">Acceuil 🏠</a></li>
        <li><a href="#contact">Panier 🛒</a></li>
        <li style="float:right"><a class="active" href="https://design4green.org/">About 🔎</a></li>
    </ul>
</div>

<body>

    <div class="nav">

        <nav class="navi">

        </nav>
    </div>

    <div class="content">

        <h1>Les bonnes pratiques d'écoconception</h1>
        <div class="textblock">
            <p>Equipe : Bryan; Goef; Etienne; Nirvana;</p>
        </div>

        <div class="textblock">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, nihil minus qui praesentium ea aut commodi,
                corporis blanditiis culpa, a repudiandae nam accusantium eaque. Praesentium doloribus temporibus
                aliquid. Eveniet, tempora!</p>
        </div>

        <h3>Selectionnez les variables du tableau</h3>

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
        $redis = new Redis();
        //Connecting to Redis
        $redis->connect('redis-14012.c2.eu-west-1-3.ec2.cloud.redislabs.com', 14012);
        $redis->auth('0t4Hg0ju4ZcmzP8hRmGIENEBR5G6QnFX');

        $arList = $redis->keys("*");
        ?>

        <h3>Selectionnez vos solutions</h3>

        <div class="flex-container">

<?php
for ($i = 1; $i <= count($arList); $i++) {
  $r1= $redis->hget($arList[$i], "id-base");
  $r2= $redis->hget($arList[$i], "famille origine");
  $r3= $redis->hget($arList[$i], "planet");
  $r4= $redis->hget($arList[$i], "people");
  $r5= $redis->hget($arList[$i], "prosperity");
    echo "<div> id-base :$r1 <br> famille origine:$r2 <br>planet:$r3 <br> people:$r4 <br>prosperity$r5 <br>
  <button class='styled' type='button'>Add</button></div>";
}
?>
        </div>


        <h3>Telechargez votre tableau</h3>

        <div class="telechargement">
            <button class="btn"><i class="download"></i> Download</button>
        </div>
    </div>

    <footer>
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <a href="https://www.instagram.com/madeleine.d4g/?hl=fr" class="fa fa-instagram"></a>
        <a href="https://twitter.com/madeleineD4G" class="fa fa-twitter"></a>
    </footer>
</body>

</html>
