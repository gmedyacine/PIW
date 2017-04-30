<style>
    .fileUpload {
        position: relative;
        overflow: hidden;
        margin: 9% 23%;
        background: #eee;
        width: 34%;
        padding: 3%;
    }
    h3{

    }
    .fileUpload input.upload {
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 20px;
        cursor: pointer;
        filter: alpha(opacity=0);
    }
</style>

<div class="fileUpload">
    <h3>Envoyez ce fichier de traduction :</h3>
    <form enctype="multipart/form-data" action="" method="post">
        <!-- MAX_FILE_SIZE doit précéder le champ input de type file -->
        <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
        <!-- Le nom de l'élément input détermine le nom dans le tableau $_FILES -->
         <input class="upload" size="3" name="userfile" type="file" />
        <br/><br><input type="submit" value="Envoyer le fichier" />
    </form>
</div>

<?php
if(!empty($_FILES)){
    $uploadfile = basename($_FILES['userfile']['name']);

    echo '<pre>';
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
        echo utf8_decode("Le fichier est valide, et a été téléchargé
           avec succès. Voici plus d'informations :\n");
    } else {
        echo "Attaque potentielle par téléchargement de fichiers.
          Voici plus d'informations :\n";
    }

    echo '</pre>';
}

