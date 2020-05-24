<article>
  <section>
    <h3><?php echo $bien['Titles']?></h3>

    <img src="Image/<?php echo $bien['Pictures']; ?>"> 
    
   
  </section>
  <div id="description">
    <p>Description : <?php echo $bien['Descriptions']; ?></p>
    <p>Adrresse : <?php echo $bien['Adresse'] ?></p>
    <p>Disponible du : <?php echo date($bien['StartDate']);?> au : <?php echo date($bien['EndDate']);?></p>
    <p>Prix à la nuit/personne : <?php echo $bien['Price'];?> €</p>
    <a href="/bien.php?id=<?php echo $bien['id']; ?>"><button>Voir le bien</button></a>
</div>
</article>