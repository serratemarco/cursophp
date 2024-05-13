<?php
    
  const API_URL ="https://whenisthenextmcufilm.com/api";
  #Inicializamos una sesion de CURL; CH = curl handle
  $ch = curl_init(API_URL);
  //Indicamos que queremos recibir el resultado de la peticion y no mostrarla en pantalla
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  /*Ejecutamos la peticion 
     y guardamos el resultado en la variable $response
 */
    $result= curl_exec($ch);
    $data= json_decode($result, true) ;
  #Cerramos la petición
  curl_close($ch);
  #Vemos que información tiene 
 //var_dump($data);


?>

<head>
    <meta charset="UTF-8"/> 
    <title>Cartelera</title>
    <meta name="description" content="La Próxima peli de marvel"/>
    <meta name="viewport" content="with=device-width, initial-scale=1.0"/>
    <link <!-- Centered viewport --> 
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
/>
</head>

<main>
  <h1>Cartelera de próximos estrenos</h1>

    <section>
        <img src="<?= $data["poster_url"]; ?>" width="300" alt="Poster de <?= $data["title"]; ?>" style= "border-radius: 16px"/>
    </section>


    <hgroup>
        <h2> <?= $data["title"]; ?> se estrena en <?= $data["days_until"]; ?> </h2>
        <p> Fecha de estreno: <?= $data["release_date"]; ?> </p>
        <p>la siguiente peli es: <?= $data["following_production"]["title"]; ?> </p>
    </hgroup>
</main>


<style> 
    :root{
        color-scheme: light dark;
    }
    body{
        display: grid;
        place-content: center;
    }
section{
    display: flex;
    justify-content: center;
    text-align: center;
}

hgroup{
    display: flex;
    flex-direction: column;
    justify-content: center;
    text-align: center;
}
h1{
    text-align: center;
}


</style> 

