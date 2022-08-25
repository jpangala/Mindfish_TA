<div class="container-fluid">
    <div class="row text-center">
          <table class="table table-bordered">
              <tr>
              <th>No</th>
              <th>Username</th>
              <th>Jumlah</th>
              <th>Status Task</th>

              </tr>

              <?php
              $no=1;
              foreach($pesanan as $psn) : ?>
                  <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $psn->username ?></td>
                      <td><?php echo $psn->jumlah ?></td>
                      <td><?php echo $psn->status_task ?></td>
                  </tr>
              <?php endforeach; ?>
          </table>


    </div>
</div>