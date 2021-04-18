<?php
include ('includes/config.php');

if(isset($_POST['form_inscription'])){
    $family_name = trim($_POST['family_name']);
    $first_name = trim($_POST['first_name']);
    $email = htmlspecialchars($_POST['email']);
    $emailhash = password_hash($email, PASSWORD_DEFAULT);
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];
    $password = password_hash($password_1, PASSWORD_DEFAULT);
    if(!empty($family_name) AND !empty($first_name) AND !empty($email) AND !empty($password_1) AND !empty($password_2))
    {
        if($password_1==$password_2)
        {
            if(strlen($password_1)>=8)
            {
                if(preg_match("<[A-Z]>", $password_1))
                {
                    if(preg_match("<[0-9]>", $password_1))
                    {
                        if(preg_match("<[a-z]>", $password_1))
                        {
                            if(strlen($family_name)<=60)
                            {
                                if(ctype_alnum($family_name))
                                {
                                    if(strlen($first_name)<=60)
                                    {
                                        if(ctype_alnum($first_name))
                                        {
                                            if(filter_var($email, FILTER_VALIDATE_EMAIL))
                                            {
                                                /* ----------- requete pour verifier si l'email n'est pas deja present dans la bdd ---------- */
                                                $verif ="requete pour verifier si l'email n'est pas deja present dans la bdd";
                                                if($verif['email']!=$email)
                                                {
                                                    $to = ($email);
                                                    $subject = "Activez votre compte Hyperion";
                                                    $txt = "Bienvenue chez Hyperion !
                                                    Bonjour " . $first_name .", votre compte Hyperion vient d'être créé.
                                                    Veuillez activer votre compte via le lien ci-dessous :
                                                    https://hyperion.dev.macaron-dev.fr/activate-email.php?k=$emailhash&i=$family_name
                                                    Merci, l'équipe Hyperion.";
                                                    $headers = "From: no-reply@Hyperion.fr";
                                                    mail($to,$subject,$txt,$headers);

                                                    /* ---------- petite requete pour creer le nouveau membre dans la bdd ----------*/

                                                    ?><script>alert("un mail de confirmation vous a été envoyé !");document.location.href="/shop"</script><?php
                                                } else{
                                                    echo "cet email existe deja";
                                                }
                                            } else{
                                                echo "le format de mail est invalide";
                                            }
                                        } else{
                                            echo "le prénom ne peut etre constitué que de chiffres et de lettres";
                                        }
                                    } else{
                                        echo "la taille du prénom doit etre inférieur à 61 caractére";
                                    }
                                } else{
                                    echo "le nom de famille ne peut etre constitué que de chiffres et de lettres";
                                }
                            } else{
                                echo "la taille du nom de famille doit etre inférieur à 61 caractére";
                            }
                        } else{
                            echo "le caractere doit etre constituer d'au moins 1 caractére minuscule";
                        }
                    } else{
                        echo "l'email doit etre composé d'au moins 1 chiffre";
                    }
                } else{
                    echo "le mot de passe doit etre composé d'au moins 1 caractére majuscule et minuscule";
                }
            } else{
                echo "le mot de passe doit au moins faire 8 caractéres";
            }
        } else{
            echo "les deux champs mot de passe doivent etre identiques";
        }
    } else{
        echo "remplir complétement le formulaire";
    }
} else {
    header('location: index.php');
}
?>
