<h1 class="display-4 my-5">New User</h1>

<?= form_open('home/add_user') ?>
  <div class="form-group">
    <label for="inputName">Name</label>
    <input type="text" class="form-control" name="name">
  </div>

  <div class="form-group">
    <label for="inputLast_name">Last Name</label>
    <input type="text" class="form-control" name="last_name">
  </div>

  <div class="form-group">
    <label for="inputMail">Mail</label>
    <input type="email" class="form-control" name="mail">
  </div>

  <button type="submit" class="btn btn-primary">Add</button>
  <a class="btn btn-secondary" href="<?php echo base_url(); ?>/home" role="button">Cancel</a>
</form>