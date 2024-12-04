<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="mt-3">

      <div class="card card-body bg-light mt-5">
      <div class="mb-3">
        <h2>Ajouter un client</h2>
        </div>
        <form action="<?php echo URLROOT; ?>/facture/edit/<?php echo $data['id']; ?>" method="post">
            <div class="form-group" >

                <div class="mb-3">
                    <label>
                        <h5><strong>Client<sup>*</sup></strong></h5>
                    </label>
                    <input type="text" name="client" class="form-control form-control-lg <?php echo (!empty($data['client_err'])) ? 'Non valide' : ''; ?>" value="<?php echo $data['client']; ?>">
                    <span class="invalid-feedback"><?php echo $data['client_err']; ?></span>
                </div>
                <div class="mb-3">
                    <label>
                        <h5><strong>Caissier<sup>*</sup></strong></h5>
                    </label>
                    <input type="text" name="caissier" class="form-control form-control-lg <?php echo (!empty($data['caissier_err'])) ? 'Non valide' : ''; ?>" value="<?php echo $data['caissier']; ?>">
                    <span class="invalid-feedback"><?php echo $data['caissier_err']; ?></span>
                </div>
                <div class="mb-3">
                    <label>
                        <h5><strong>Montant<sup>*</sup></strong></h5>
                    </label>
                    <input type="text" name="montant" class="form-control form-control-lg <?php echo (!empty($data['montant_err'])) ? 'Non valide' : ''; ?>" value="<?php echo $data['montant']; ?>">
                    <span class="invalid-feedback"><?php echo $data['montant_err']; ?></span>
                </div>
                <div class="mb-3">
                    <label>
                        <h5><strong>Perçu<sup>*</sup></strong></h5>
                    </label>
                    <input type="text" name="percu" class="form-control form-control-lg <?php echo (!empty($data['percu_err'])) ? 'Non valide' : ''; ?>" value="<?php echo $data['percu']; ?>">
                    <span class="invalid-feedback"><?php echo $data['percu_err']; ?></span>
                </div>
                <div class="mb-3">
                    <label>
                        <h5><strong>Retourné<sup>*</sup></strong></h5>
                    </label>
                    <input type="text" name="retourne" class="form-control form-control-lg <?php echo (!empty($data['retourne_err'])) ? 'Non valide' : ''; ?>" value="<?php echo $data['retourne']; ?>">
                    <span class="invalid-feedback"><?php echo $data['retourne_err']; ?></span>
                </div>
                <div class="mb-3">
                    <label>
                        <h5><strong>Etat<sup>*</sup></strong></h5>
                    </label>
                    <input type="text" name="etat" class="form-control form-control-lg <?php echo (!empty($data['etat_err'])) ? 'Non valide' : ''; ?>" value="<?php echo $data['etat']; ?>">
                    <span class="invalid-feedback"><?php echo $data['etat_err']; ?></span>
                </div>

                <div class="mb-3">
                    <input type="submit" class="btn btn-outline-secondary d-inline-flex align-items-center" value="Confirmer">
                    <a href="<?php echo URLROOT; ?>/facture/index" class="btn btn-outline-secondary d-inline-flex align-items-center"><i class="fa fa-backward" aria-hidden="true"></i> Annuler</a>
                </div>
            </div>
        </form>
      </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>