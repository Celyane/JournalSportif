<?php ob_start(); ?>
<h1>
    Votre abonnement à bien été créé
</h1>

<div class="mb-3">
    <form action="commentaire" method="POST" name="ajout-com">
        <label for="formGroupExampleInput" class="form-label">Laisser un commentaire</label>
        <input
            type="text"
            class="form-control"
            id="formGroupExampleInput"
            placeholder="Example input placeholder"
            name="commentaire">
        <br>
        <input type="submit" name="envoyer" value="envoyer">
    </form>

    <h2>
        Votre commentaire</h2>
    <p>
        <?php if(isset($commentaire)){?>
        <?=$commentaire ;?>
        <?php } ?>
        <br>
        <?php if (isset($commentaire)) { ?>
            <form action="supprimer" method="POST">
                <input type="hidden" name="commentaire" value="<?= $commentaire; ?>">
                <input type="submit" name="delete" value="supprimer">
            </form>
        <?php } ?>    
    </p>
</div>
<?php $abon_cree = ob_get_clean(); ?>
<?php require './src/view/layout_abon_cree.php' ?>