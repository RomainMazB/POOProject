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
            if (/* Ici tu fait tes validation (!empty etc...) */) {
                // On le met à jour avec la méthode update et les données du formulaire
                $product->update([
                    'name' => htmlspecialchar($_POST['name']),
                    'price' => (float)$_POST['price']
                ]);

                $displayValidationMessage = true;
            } else {
                $errorMessage = 'Veuillez compléter tous les champs';
            }
        }

        // Les données du formulaire, avec la priorization $_POST puis les données du produit
        $form = [
            'name' => formValue('name', $product->name),
            'price' => formValue('name', $product->price)
        ];

        // On affiche la vue
        require('../views/product/Form.php');
    }

    /**
     * Affiche le formulaire de création et sauvegarde un nouveau produit
     */
    public function create(): void
    {
        // Les données du formulaire
        $form = [
            'name' => formValue('name'),
            'price' => formValue('name')
        ];

        // Lors de l'envoi du formulaire de création
        if (isset($_POST['sendCreateForm'])) {
            if (/* Ici tu fait tes validation (!empty etc...) */) {
                // Si tout est ok,
                // On crée un nouveau produit à partir des données du formulaire
                $product = new Product;
                $product->name = htmlspecialchar($_POST['name']);
                $product->price = (float)$_POST['price'];

                // On l'enregistre en base de données
                $product->create();

                // On affiche la vue de validation
                require('../views/product/CreateValidation.php');

                // On coupe la méthode ici, pour ne pas afficher le formulaire
                return;
            } else {
                $errorMessage = 'Veuillez compléter tous les champs';
            }
        }

        // On affiche le formulaire
        require('../views/product/Create.php');
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