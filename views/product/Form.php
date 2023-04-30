<?php require('../Header.php'); ?>

<!-- Message de validation, la variable $displayValidationMessage est défini dans le contrôleur -->
<? if($displayValidationMessage): ?>
Produit modifié avec succès
<? endif; ?>

<!-- Formulaire de modification du produit -->
<form method="POST">
  <label for="name">Nom:</label>
  <input type="text" id="name" name="name" value="<?= $product->name ?>" />

  <label for="price">Prix:</label>
  <input type="text" id="price" name="price" value="<?= $product->price ?>" />

  <button type="submit" name="sendModifyForm">
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