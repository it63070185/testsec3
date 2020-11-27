<html>

<head>
  <title>DATABASE</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
  <?php
  $conn = mysqli_init();
  mysqli_real_connect($conn, 'apirat.mysql.database.azure.com', 'it63070185@apirat', 'UEKyfj18', 'ITFlab', 3306);
  if (mysqli_connect_errno($conn)) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
  }
  $res = mysqli_query($conn, 'SELECT * FROM testtable');
  ?>
  <div class="container mt-5">
    <div class="card-header bg-danger text-dark d-flex justify-content-between">
      <h2>HOME</h2>
       <a href="form.php" class="btn btn-dark">เพิ่ม</a>
    </div>
    <div class="card-body">
      <div class="table-condensed">
        <table class="table table-hover table-bordered table-sm">
          <thead class="thead-dark">
            <tr>
              <th width="300">
                <div align="center">Product</div>
              </th>
              <th width="300">
                <div align="center">Price </div>
              </th>
              <th width="300">
                <div align="center">Discount(%)</div>
              </th>
              <th width="300">
                <div align="center">Total</div>
              </th>
              <th width="300">
                <div align="center">การจัดการ</div>
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($Result = mysqli_fetch_array($res)) {
            ?>
              <tr>
                <td align="center"><?php echo $Result['product']; ?></td>
                <td align="center"><?php echo $Result['price']; ?></td>
                <td align="center"><?php echo $Result['discount']; ?></td>
                <td align="center"><?php echo $Result['total']; ?></td>
                <td align="center">
                  <a class="btn btn-danger" href="edit.php?ID=<?php echo $Result['ID']; ?>">แก้ไข</a>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
          </div>
       </div>
      </table>


  <?php
  mysqli_close($conn);
  ?>
</body>

</html>
