<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="mt-3">

<div class="bd-example-snippet bd-code-snippet py-2">
  <div class="bg-secondary text-white p-1 mb-3 card" ></div>
  <div class="bd-example m-0 border-0">
        <table class="table table-bordered rounded-table ">
          <thead >
          <tr >
          <th scope="col">Numero client</th>
            <th scope="col">Nom du client</th>
            <th scope="col">Adresse du client</th>
          </tr>
          </thead>
          <tbody>
          
          <tr>
            <td scope="col"><?php echo $data['client']->idclient; ?></td>
            <td scope="row "><?php echo $data['client']->nomclient; ?></td>
            <td scope="row "><?php echo $data['client']->adresseclient; ?></td>
          </tr>
          </tbody>
        </table>
        
  </div>
    <div class="bg-secondary text-white p-1 mb-3 card" ></div>
</div>

    <div class="mb-3">
    <form class="pull-right" action="<?php echo URLROOT; ?>/client/delete/<?php echo $data['client']->idclient; ?>" method="post">
      <input type="submit" class="btn btn-outline-danger d-inline-flex align-items-center" value="Supprimer" >
      <a class="btn btn-outline-secondary d-inline-flex align-items-center" href="<?php echo URLROOT; ?>/client/edit/<?php echo $data['client']->idclient; ?>">Modifier</a>
      <a href="<?php echo URLROOT; ?>/client/index" class="btn btn-outline-secondary d-inline-flex align-items-center"><i class="fa fa-backward" aria-hidden="true"></i> Retour</a>
      </form>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>