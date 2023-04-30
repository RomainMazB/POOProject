<?php

class ProductController
{
    protected PDO $connexion;

    public function __construct(PDO $connexion)
    {
        $this->connexion = $connexion;
    }

    /**
     * Charge un produit et affiche les détails
     */
    public function show(int $id): void
    {
        // On récupère le modèle pré-rempli depuis l'id passé en paramètre
        $product = new Product;
        $product = $product->find($id);

        // On affiche la vue
        require('../views/product/Details.php');
    }

    /**
     * Charge un produit et affiche le formulaire de modification
     */
    public function modify(int $id): void
    {
        // On récupère le modèle pré-rempli depuis l'id passé en paramètre
        $product = new Product;
        $product = $product->find($id);

        // On crée viteuf une variable dont on va se servir dans la vue
        // Pour afficher ou non un message de validation
        $displayValidationMessage = false;

        // Lors de l'envoi du formulaire de modification
        if (isset($_POST['sendModifyForm'])) {
            // On le met à jour avec la méthode update et les données du formulaire
            $product->update([
            'name' => htmlspecialchar($_POST['name']),
            'price' => (float)$_POST['price']
            ]);

            $displayValidationMessage = true;
        }

        // On affiche la vue
        require('../views/product/Form.php');
    }

    /**
     * Supprime un produit et redirige vers l'index
     */
    public function delete(int $id): void
    {
        // On récupère le modèle pré-rempli depuis l'id passé en paramètre
        $product = new Product;
        $product = $product->find($id);

        // On le supprime de la base de donnée, et on redirige.
        $product->delete();

        // On affiche juste la vue ProductDeleteValidation et on redirige
        header("Refresh:3; url=index.php");
        require('../views/product/DeleteValidation.php');
    }
}

?>