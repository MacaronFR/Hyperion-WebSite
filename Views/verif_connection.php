<?php
//include('includes/connexion_check.php');

if(isset($_POST['form_connexion']))
{
    if(!empty($_POST['id'] AND !empty($_POST['password'])))
    {
        $id = $_POST['id'];
        $password = $_POST['password'];

        /* petite requete ou on recupere les info :id_user/mot de passe/son statu(admin marchand etc)/ token si le compte est verifié (email) */

        //if($id==$info_check['email'] OR $id==$info_check['pseudo'])
        if($id=="mika-xuan@hotmail.com")
        {
            //if(password_verify($password, $info_check['password']))
            if($password=="1234")
            {
                //if($info_check['token']==1)
                $token=2;
                if($token=="2")
                {
                    //$_SESSION['email']=$info_check['email'];
                    //$_SESSION['id']=$info_check['id_user'];
                    $id_user=23;
                    $admintest=True;
                    $marchandtest=True;
                    $_SESSION['email']=$id;
                    $_SESSION['id']=$id_user;
                    //if($info_check['admin']==1)
                    if($admintest==True)
                    {
                        //$_SESSION['haunter']=$info_check['id_user'];
                        $_SESSION['haunter']=$id_user;
                    }
                    if($marchandtest==True)
                    {
                        //$_SESSION['vendor']=$info_check['id_user'];
                        $_SESSION['haunter']=$id_user;
                    }
                    echo "connecté";
                    //header('location: /shop');
                } else{
                    $erreur ="veuillez confirmer votre adressse email";
                }
            } else{
                $erreur ="Mauvais mot de passe";
            }
        } else{
            $erreur ="l'email ou le pseudo renseigné n'existe pas";
        }

    } else{
        $erreur ="vous devez remplir tous les champs du formulaire";
    }
    ?><script>alert("<?= $erreur?>");document.location.href="/connect"</script><?php
} else{
    //header('Location: /shop');
    echo "ok";
}



?>
