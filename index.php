<?php
const API_URL = "https://whenisthenextmcufilm.com/api";

//Inicializar una nueva sesion de Curl; ch = Curl handle
$ch = curl_init(API_URL);

/*Indicar que queremos recibir el resultado de la peticion y 
no mostrarla en pantalla*/
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//Ejecutar la aplicacion y guardamos el resultado
$result = curl_exec($ch);
$data = json_decode($result, true);

curl_close($ch);
?>

<head>
  <meta charset="UTF-8">
  <meta name="description" content="La próxima película de Marvel" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css" />
  <title>Proxima pelicula de Marvel</title>
</head>

<body>
  <main>
    <h3><?= $data["title"]; ?> se estrena en <?= $data["days_until"]; ?> dias.</h3>

    <section>
      <img src="<?= $data["poster_url"]; ?>" width="300px" alt="Poster de <?= $data["title"] ?>" style="border-radius:16px">
    </section>

    <hgroup>
      <h4>Fecha de estreno: <?= $data["release_date"]; ?></h4>
      <h4>La siguiente pelicula es <?= $data["following_production"]["title"]; ?></h4>
    </hgroup>
  </main>
</body>

</html>

<style>
  :root {
    color-scheme: light dark;
  }

  body {
    display: grid;
    place-content: center;
  }

  section {
    display: flex;
    justify-content: center;
  }

  img {
    margin: 0 auto;
  }

  hgroup {
    display: flex;
    flex-direction: column;
    justify-content: center;
    text-align: center;
  }
</style>