<?php require('../Header.php'); ?>

<!-- S'il y a un message d'erreur a afficher -->
<?php if (isset($errorMessage )): ?>
    <p><?= $errorMessage ?></p>
<? endif; ?>

<!-- Formulaire de création du produit -->
<form method="POST">
    <?php require('Inputs.php'); ?>

  <button type="submit" name="sendForm">
    Créer le produit
  </button>
</form>

<?php require('../Footer.php'); ?>