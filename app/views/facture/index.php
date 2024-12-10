<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('client_message'); ?>
<div class="mt-3">
  <div class="row mb-3">
    <div class="mb-3">
    <h1>Clients : 
    <a class="btn btn-outline-secondary d-inline-flex align-items-center" href="<?php echo URLROOT; ?>/facture/add" style=" font-size: 20px;"><i class="fa fa-pencil" aria-hidden="true"></i> Ajouter</a>
    </h1>
    </div>
      <div class="bd-example-snippet bd-code-snippet py-2">
        <div class="bg-secondary text-white p-1 mb-3 card" ></div>
        <div class="bd-example m-0 border-1">
              <table class="table table-bordered rounded-table">
                <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Client</th>
                  <th scope="col">Adresse du client</th>
                  <th scope="col">Plus...</th>
                  <th scope="col">Plus...</th>
                  <th scope="col">Plus...</th>
                  <th scope="col">Plus...</th>
                  <th scope="col">Plus...</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($data['factures'] as $facture) : ?>
                <tr>
                  <td scope="row "><?php echo $facture->id; ?></td>
                  <td scope="row "><?php echo $facture->client; ?></td>
                  <td scope="row "><?php echo $facture->caissier; ?></td>
                  <td scope="row "><?php echo $facture->montant; ?></td>
                  <td scope="row "><?php echo $facture->percu; ?></td>
                  <td scope="row "><?php echo $facture->retourne; ?></td>
                  <td scope="row "><?php echo $facture->etat; ?></td>
                  <td scope="row ">
                    <a class="btn btn-outline-secondary" href="<?php echo URLROOT; ?>/facture/edit/<?php echo $facture->id; ?>">
                      <i class="fa fa-pencil" aria-hidden="true"></i> Modifier
                    </a>
                    <a href="#" class="btn btn-outline-danger" onclick="event.preventDefault(); document.getElementById('delete-form-<?php echo $facture->id; ?>').submit();">
                        <i class="fa fa-pencil" aria-hidden="true"></i> Supprimer
                    </a>

                    <form id="delete-form-<?php echo $facture->id; ?>" action="<?php echo URLROOT; ?>/facture/delete/<?php echo $facture->id; ?>" method="POST" style="display: none;">
                    </form>

                  </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
      </div>
  <div class="bg-secondary text-white p-1 mb-2 card" ></div>
</div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>