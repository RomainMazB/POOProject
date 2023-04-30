<?php

abstract class Model
{
  // Laisser vide, sera rempli par la classe enfant
  protected string $table;
  protected PDO $connexion;
  
  public function __construct(PDO $connexion)
  {
    $this->connexion = $connexion;
  }

  /**
   * Recherche en base de données
   * un modèle de la classe enfant à partir de son id
   *
   * Retourne un objet de la classe enfant rempli et prêt à l'emploi
   */
  public function find(int $id): static
  {
    // On prépare la requête de base
    $query = $this->connexion->prepare('SELECT * FROM :table WHERE id = :id');

    // On l'exécute en récupérant la table mentionné dans l'objet enfant
    $query->execute([
      'table' => $this->table,
      'id' => $id
    ]);

    // On remplis les propriétés de la classe enfant directement depuis PDO
    $query->setFetchMode(PDO::FETCH_INTO, $this);

    // Si tout est ok, on retourne l'objet courant
    if ($query->fetch()) {
      return $this;
    } else {
      throw new \Exception('Impossible de retrouver le modèle correspondant');
    }
  }

  /*
   * Recherche plusieurs objets de la classe enfant en base de données
   *
   * Retourne un tableau avec les objets prêt à l'emploi
   */
  public function findMany(array $ids): array
  {
    // à implémenter
  }

  /*
   * Supprime la ligne de l'objet en cours dans la base de données
   *
   * Ne retourne rien
   */
  public function delete(): void
  {
    // à implémenter
  }

  /*
   * Mets à jour en base de données à partir du tableau passé en paramètre
   *
   * Retourne l'objet modifié
   */
  public function update(array $attributes): static
  {
    // à implémenter
  }

  /*
   * Mets à jour en base de données à partir des propriétés de l'objet
   *
   * Retourne l'objet modifié
   */
  public function save(): static
  {
    // à implémenter
  }
}