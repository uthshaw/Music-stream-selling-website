<?php

include 'connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<section class="playlist">

   <h3 class="heading">music playlist</h3>

   <div class="box-container">

   <?php
      $select_songs = $conn->prepare("SELECT * FROM `songs`");
      $select_songs->execute();
      if($select_songs->rowCount() > 0){
         while($fetch_song = $select_songs->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
      <?php if($fetch_song['album'] != ''){ ?>
         <img src="uploaded_album/<?= $fetch_song['album']; ?>" alt="" class="album">
      <?php }else{ ?>
         <img src="images/disc.png" alt="" class="album">
      <?php } ?>
      <div class="name"><?= $fetch_song['name']; ?></div>
      <div class="artist"><?= $fetch_song['artist']; ?></div>
      <div class="flex">
         <div class="play" data-src="uploaded_music/<?= $fetch_song['music']; ?>"><i class="fas fa-play"></i><span>play</span></div>
         <a href="uploaded_music/<?= $fetch_song['music']; ?>" download><i class="fas fa-download"></i><span>download</span></a>
      </div>
   </div>
   <?php
    }
   }
   ?>
   <div class="box more-btn">
      <a href="upload_music.php" class="btn">upload music</a>
   </div>

   </div>

</section>












<div class="music-player">

   <i class="fas fa-times" id="close"></i>

   <div class="box">
      <img src="" class="album" alt="">
      <div class="name"></div>
      <div class="artist"></div>
      <audio src="" controls class="music"></audio>
   </div>

</div>






<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>