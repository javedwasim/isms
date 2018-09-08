<div id="guardian-assign-info">
<div class="row" style="display: none;" id="search-guardian">
  <div class="col-md-12">
    <!-- /.card-header -->
    <div class="card-body p-0">
      <table id="guardian" class="display table table-striped" style="width:100%;">
        <thead>
          <tr>
            <th>Name</th>
            <th>Mobile</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($guardians as $guardian){ ?>
          <tr>
            <td><?php echo $guardian['surname'].', '.$guardian['first_name'] ?></td>
            <td><?php echo $guardian['mobile_phone'] ?></td>
            <td><?php echo $guardian['phone'] ?></td>
            <td><?php echo $guardian['email'] ?></td>
            <td>
              <a class="btn btn-xs btn-info" target="_blank" href="#">
                <i class="fa fa-user"></i> View Profile
              </a>
              <a class="btn btn-xs btn-primary" target="_blank" href="#">
                <i class="fa fa-user-plus"></i> Assign
              </a>
            </td>
          </tr>
        <?php } ?>
        </table>
      </div>
    </div>
  </div>
</div>