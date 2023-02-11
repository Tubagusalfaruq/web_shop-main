<?php

if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] == 'delete') {
    callAPI('DELETE', 'http://localhost/shop/api/product/delete', '{"id":"' . $_GET['id'] . '"}');
}

if (isset($_GET['action']) &&  $_GET['action'] == 'add') {
    callAPI('POST', 'http://localhost/shop/api/product/add', '{"id":"' . $_POST['id'] . '","image":"' . $_POST['image'] . '","name":"' . $_POST['name'] . '","description":"' . $_POST['description'] . '"}');
}

if (isset($_GET['action']) &&  $_GET['action'] == 'update') {
    callAPI('PUT', 'http://localhost/shop/api/product/update', '{"id":"' . $_POST['id'] . '","image":"' . $_POST['image'] . '","name":"' . $_POST['name'] . '","description":"' . $_POST['description'] . '"}');
}

function callAPI($method, $url, $data)
{
    $curl = curl_init();
    switch ($method) {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            header('location: http://localhost/web_shop', true, 307);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            header('location: http://localhost/web_shop', true, 307);
            break;
        case "DELETE":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            header('location: http://localhost/web_shop', true, 307);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }
    // OPTIONS:
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
    ));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    // EXECUTE:
    $result = curl_exec($curl);
    if (!$result) {
        die("Connection Failure");
    }
    curl_close($curl);
    return $result;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Besar Web Sederhana</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>

<body>

<nav
      class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg fixed-top"
    >
      <div class="container">
        <a class="navbar-brand"  href="#">Tubagus Alfaruq.</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarText"
          aria-controls="navbarText"
          aria-expanded="false"
          aria-label="Toggle navigation"
          </div>
    </nav>

    <section>
        <h1 style="text-align: center;margin: 50px 0;">Toko Barang Ter-Update</h1>
        <div class="container">
            <form action="?action=<?php echo (isset($_GET['id']) && isset($_GET['image']) && isset($_GET['name']) && isset($_GET['description'])) ? 'update' : 'add'; ?>" method="post">
                <div class="row">
                    <div class="form-group col-lg-4">
                        <label for="">Kode Barang</label>
                        <input type="text" name="id" id="id" class="form-control" value="Silahkan Masukan ID Barang" required>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="">Image Barang</label>
                        <input type="text" name="image" id="image" class="form-control" value="Silahkan Tambahkan Gambar" required>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="">Nama Barang</label>
                        <input type="text" name="name" id="name" class="form-control" value="Silahkan Masukan Nama Barang" required>
                    </div>
                </div>
                <br>
                <div class="form-group col-lg-12">
                    <label for="">Keterangan barang</label>
                    <textarea name="description" id="description" class="form-control" rows="5" required>Silahkan Masukan Keterangan Barang</textarea>
                </div>
                <br>
                <div class="row">
                    <div class="form-group col-lg-12" style="display: grid;align-items:  flex-end;">
                        <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Submit">
                    </div>
                </div>
            </form>
        </div>
    </section>
    <section style="margin: 50px 0;">
        <div class="container">
            <table class="table table-light">
                <thead>
                    <tr>
                        <th scope="col">Kode Barang</th>
                        <th scope="col">Image</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Keterangan Barang</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $get_data = callAPI('GET', 'http://localhost/shop/api/product/fetch', false);
                    $response = json_decode($get_data, true);
                    $data = $response['data'];
                    for ($i = 0; $i < count($data); $i++) {
                        $id = $data[$i]['id'];
                        $image = $data[$i]['image'];
                        $name = $data[$i]['name'];
                        $description = $data[$i]['description'];
                    ?>
                        <tr class="trow">
                            <td><?php echo $id; ?></td>
                            <td>
                                <img src="<?php echo $image; ?>" width="400" height="500">
                            </td>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $description; ?></td>
                            <td><a href="?id=<?php echo $data[$i]['id']; ?>&image=<?php echo $data[$i]['image']; ?>&name=<?php echo $data[$i]['name']; ?>&description=<?php echo $data[$i]['description']; ?>" class="btn btn-primary">Update</a></td>
                            <td><a href="?id=<?php echo $id; ?>&action=delete" class="btn btn-danger">Hapus Barang</a></td>
                        </tr>
                    <?php
                    }
                    ?>

<div class="container-fluid pt-5 pb-5 bg-light">
      <div class="container text-center">
        <h2 class="display-3" id="Tersedia">Barang Tersedia</h2>
      
        <div class="row pt-4 gx-4 gy-4">
          <div class="col-md-4">
            <div class="card crop-img">
              <img
                src="image/mobil.jpg"
                class="card-img-top"
                width="200"
                height="200"
              />
              
              <div class="card-body">
                <h5 class="card-title">Mobil Bekas tapi Murah ditahun 2023 yang Masih Layak untuk Dimiliki</h5>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card crop-img">
              <img
                src="image/motor.jpg"
                class="card-img-top"
                width="200"
                height="200"
              />
              
              <div class="card-body">
                <h5 class="card-title">Jual Motor Bekas, Pemakaian Sehari-hari. Barang Dijamin Masih Oke 80%</h5>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card crop-img">
              <img
                src="image/lemari.jpg"
                class="card-img-top"
                width="200"
                height="200"
              />
              
              <div class="card-body">
                <h5 class="card-title">Jual Lemari Bekas. Barang Masih Mulus 90%</h5>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card crop-img">
              <img
                src="image/sepeda.jpg"
                class="card-img-top"
                width="200"
                height="200"
              />
              <div class="card-body">
                <h5 class="card-title">Jual Sepeda balap Bekas, Dijamin Nyaman dipakai. Barang masih Mulus 80%</h5>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card crop-img">
              <img
                src="image/skuter.jpg"
                class="card-img-top"
                width="200"
                height="200"
              />
              <div class="card-body">
                <h5 class="card-title">Jual Skuter Bekas, Jarang Di Pakai. Siap Menemani Perjalanan anda</h5>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card crop-img">
              <img
                src="image/meja.jpg"
                class="card-img-top"
                width="200"
                height="200"
              />
              <div class="card-body">
                <h5 class="card-title">Jual Meja , Cocok Untuk digunakan Belajar atau Mengerjakan Pekerjaan Kantor agar lebih Nyaman dalam Bekerja</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>