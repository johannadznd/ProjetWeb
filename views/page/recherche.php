<article>
  <section>
    <h3><?php echo $bien['Titles']?></h3>

    <img src="Image/villa1.jpg"> 
    <div id="etoile">
    <i class="fas fa-star" style="color: black"></i>
    <i class="fas fa-star" style="color: black"></i>
		<i class="fas fa-star" style="color: black"></i>
		<i class="fas fa-star" style="color: black"></i>
		<i class="fas fa-star" style="color: black"></i>
    </div>
   
  </section>
  <div id="description">
    <p><?php echo $bien['Descriptions']; ?></p>
    <p>Disponible du <?php echo date($bien['StartDate']);?> au <?php echo date($bien['EndDate']);?></p>
    <p>Prix à la nuit : <?php echo $bien['Price'];?> €</p>
    <a href="/bien.php?id=<?php echo $bien['id']; ?>"><button>Voir le bien</button></a>
</div>
</article>