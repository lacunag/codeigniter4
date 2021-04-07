

<h1 class="display-4 my-5">List Users</h1>
  <a class="btn btn-outline-secondary btn-sm mb-3" href="<?php echo base_url(); ?>/home/add_user" role="button"><i class="fas fa-plus"></i> Nuevo Usuario</a>

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Mail</th>
        <th scope="col" width="14%"></th>
      </tr>
    </thead>
    <tbody>

      <?php foreach ($info_users as $key) { ?>
        <tr>
          <td><?php echo $key['id_users'] ?></td>
          <td><?php echo $key['name'] ?></td>
          <td><?php echo $key['last_name'] ?></td>
          <td><?php echo $key['mail'] ?></td>
          <td>
            <a href="<?php echo base_url(); ?>/home/update_user/<?php echo $key['id_users']; ?>" class="badge badge-warning">Update</a>
            <a href="<?php echo base_url(); ?>/home/remove_user/<?php echo $key['id_users']; ?>" class="badge badge-danger">Delete</a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>