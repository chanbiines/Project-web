<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>id</th>
      <th>Nom</th>
      <th>Prénom(s)</th>
      <th>Date de naissance</th>
      <th>Lieu de naissance</th>
      <th>Absent(e)</th>
    </tr>
  </thead>
  <tbody>

    <?php

    $i = 0;
    $sql2 = 'SELECT * FROM etudiant WHERE classe = \'' . $_POST['classe'] . '\';';
    $msg = $bdd->query($sql2);
    while ($dd = $msg->fetch()) {

    ?>
      <form method="post" action="surveillant.prendre_absence3.php">
        <td><?php echo $i; ?> </td>
        <td><?php echo $dd['nom']; ?> </td>
        <td> <?php echo $dd['prenom']; ?> </td>
        <td> <?php echo $dd['ddn']; ?> </td>
        <td> <?php echo $dd['lieu']; ?> </td>
        <td> <input type="checkbox" name="statut" value="absent"> </td>
        <input type="hidden" name="idEtu" value="<?php echo $dd['id']; ?>">

        </tr>

      <?php $i++;
    }
      ?>
  </tbody>
</table>