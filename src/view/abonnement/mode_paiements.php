<?php ob_start(); ?>
<div>
        <h1 class="posttitle">Modes de paiements enregistrés</h1>
            <?php foreach ($tab as $mdp){ ?>
            <p>
                <?= $mdp->getLibellemdp();?>   
                <a href="/supprimer-paiement?id_mdp=<?=$mdp->getIdMdp()?>">
                <img src="../../../assets/img/poubelle.png" alt="poubelle" width="15">
                </a>
            </p>
            <?php }?>
</div>
 <h2>
     <?php if(isset($message)){?> 
            <?=$message; ?>
    <?php } ?>
</h2>
<?php $content = ob_get_clean(); ?>
<?php require './src/view/layout_vabonnement.php' ?>