# formulaire en PHP (fils rouge)

## dans la vue 

```html
<form method="POST">
    <input type="text" name="titre">
    <input type="submit">
</form>
```

## après ?

```php 

=> appel un Controller 
=> méthode

public function inscription(){
    $_POST
    // ?? traitement ??? 
    // récupérer les valeurs de chaque input 
    // verifications 
    // si tout est OK => INSERT INTO
    // si erreur => afficher une message d'erreur 
}
```

-------------------

# Dans Symfony 


je veux créer un formulaire qui contient autant de champ que nécessaire sur l'entité
- titre
- description
- duree
- auteur
- url_image


pour créer un formulaire => créer une class 
=> Type 

=> créer une nouveau dossier dans le dossier src Form

A. créer le html du formulaire !!! 

1 créer une class EtudiantType

méthode buildForm()
    $builder->add()
            ->add()


2 dans une méthode d'un controller

$form = $this->createForm(EtudiantType::class)
 
return $this->render("vue.html.twig" , ["form" => $form->createView()])


3 dans la vue

{{ form(form) }}

// Extension de Twig 

B. Après !!! 

récupérer la $_POST avec Request
(notamment les valeurs)

verification ...(demain)

si tout est OK => effectuer INSERT (avec Doctrine) 

