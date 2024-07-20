<?php ob_start(); ?>
 
<?php if(isset($liste)){ ?>
<h1 class="posttitle">Choisissez votre abonnement</h1>
<!-- afficher la liste des types d'abonnements -->
<form action="liste-periodes" method="POST" name="formulaire_tab">
    <?php foreach ($liste as $abon){ ?>
    <input type="radio" name="type_ab"
           value="<?=$abon->getIdTab() ?>"
           <?php if(isset($id_tab) && $abon->getIdTab() == $id_tab){?>  checked <?php } ?>
    >
    <label for="<?=$abon->getLibTab(); ?>"><?=$abon->getLibTab(); ?></label>
    <label for="<?=$abon->getPrix(); ?>">
    -
    <?=$abon->getPrix(); ?>
    €</label>
    <br>
    <?php } ?>
    <br>
    <input type="submit" name="submit" value="Choisir">
</form>

<?php } else{ ?>
    <p> Vous avez choisi le type d'abonnement <?= $id_tab ?> </p>
    <?php } ?>
    <br>
    <br>

<!-- afficher les periodicités -->
<?php if(isset($listeper)){ ?>
    <h2 class="posttitle">Choisir vos periodicités</h2>
    <form action="mode-paiements" method="POST" name="type_periodicites">
        <input type="hidden" name="type_ab" value="<?=$id_tab?>">
        <p>
            <?php foreach ($listeper as $per){ ?>
            <input type="radio" name="periodicite" 
            value="<?=$per->getIdPeriod()?>"
            <?php if(isset($id_per) && $per->getIdPeriod() == $id_per){?>  checked <?php } ?> >
            <label for="<?=$per->getLibellePer()?>"><?=$per->getLibellePer()?></label>
            <br>
            <?php } ?>
        </p>
        <input type="submit" name="submit" value="Choisir">
    </form>
    <?php } ?>
    <br>
    <br>
<!-- afficher les modes de paiements -->
<?php if(isset($modeP)){ ?>
    <h3 class="postitle">Choisir un mode de paiement</h3>
    <form action="abonnement-cree" method="POST" name="mode_paiement">
        <input type="hidden" name="type_ab" value="<?=$id_tab?>">
        <input type="hidden" name="periodicite" value="<?=$id_per?>">
            <label for="mode_paiements" class="form-label">Mode de paiement : </label>                                                     
                <select name="idmdp" class="form-control"  placeholder="Mode de paiement">
                    <?php foreach ($modeP as $mdp) {?>
                        <option value="<?= $mdp->getIdMdp();?>">
                            <?= $mdp->getLibellemdp(); }?>
                        </option>
                </select>
                <input type="submit" name="submit" value="Valider">
    </form>
    <?php } ?>
<?php $content = ob_get_clean(); ?>
<?php require './src/view/layout_vabonnement.php' ?>