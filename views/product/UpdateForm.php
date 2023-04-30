<?php require('../Header.php'); ?>

<!-- Message de validation, la variable $displayValidationMessage est défini dans le contrôleur -->
<? if($displayValidationMessage): ?>
    <p>Produit modifié avec succès</p>
<? endif; ?>

<!-- S'il y a un message d'erreur a afficher -->
<?php if (isset($errorMessage )): ?>
    <p><?= $errorMessage ?></p>
<? endif; ?>

<!-- Formulaire de modification du produit -->
<form method="POST">
    <?php require('Inputs.php'); ?>

  <button type="submit" name="sendForm">
    Modifier le produit
  </button>
</form>

<!-- Bouton de suppresion du produit, dans un formulaire séparé pour n'envoyé que "deleteButton" dans le $_POST -->
<form method="POST">
  <button type="submit" name="deleteButton">
    Supprimer le produit
  </button>
</form>

<?php require('../Footer.php'); ?>