<?php 

session_start();

include("../db.php");

if(isset($_POST['load_location'])){
$city = mysqli_real_escape_string($conn, $_POST['city']);
$location = mysqli_real_escape_string($conn, $_POST['location']);
$url = mysqli_real_escape_string($conn, $_POST['url']);

$sql = "INSERT INTO branches (city, location, url) VALUES ('".$city."', '".$location."', '".$url."')";

if ($conn->query($sql) === TRUE) {
  $_SESSION['success'] = "Новая ветка успешно добавлена";
} else {
  $_SESSION['message'] = "Ошибка!";
}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Admin</title>
</head>
<body>
    <main class="d-flex flex-nowrap" style="height: 100vh;">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 340px;">
            <img src="../assets/logo.png" alt="logo" width="24" class="mb-4 mt-4 m-auto text-decoration-none">
            <hr>
            <ul class="nav nav-pills flex-column gap-3 mb-auto">
              <li class="nav-item">
                <a href="../lidlar/" class="nav-link text-white">
                  <i class="fa-solid fa-user-tag"></i>
                  Список тест-драйвов
                </a>
              </li>
              <li>
                <a href="#" class="nav-link text-white">
                  <i class="fa-solid fa-photo-film"></i>
                  Информация о странице
                </a>
              </li>
              <li>
                <a href="../add_model/" class="nav-link text-white">
                  <i class="fa-solid fa-car"></i>
                  Добавить модель
                </a>
              </li>
              <li>
                <a href="../add_news/" class="nav-link text-white">
                  <i class="fa-solid fa-newspaper"></i>
                  Новости
                </a>
              </li>
              <li>
                <a href="../add_location/" class="nav-link text-white">
                  <i class="fa-solid fa-map-location-dot"></i>
                  Филиалы
                </a>
              </li>
            </ul>
            <hr>
            <div class="dropdown">
            <ul class="nav nav-pills flex-column mb-auto">
                <li>
                  <a href="../logout/" class="nav-link text-white">
                    <i class="fa-solid fa-right-from-bracket fa-rotate-180"></i>
                        Выход
                  </a>
                </li>
              </ul>
            </div>
        </div>

        <div class="p-3 mt-3 overflow-scroll" style="width: 100%;">
            <div class="mb-5 d-flex justify-content-between">
                <h2>Филиалы</h2>
                <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-square-plus"></i> Добавить Филиалы</button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Добавить Филиалы</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="location" action="" method="post" class="m-auto">
                                  <div class="mb-3">
                                    <label class="form-label">Введите oкруг<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Введите" name="city" required>
                                  </div>
                                  <div class="mb-3">
                                    <label class="form-label">Введите aдрес<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Введите" name="location" required>
                                  </div>
                                  <div class="mb-3">
                                    <label class="form-label">URL<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Введите" name="url" required>
                                  </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" form="location" name="load_location" class="btn btn-danger">Добавить Филиалы</button>
                        </div>
                      </div>
                    </div>
                </div>
            </div>

            <?php 
                  if(isset($_SESSION['message'])){
                ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert" id="success-alert">
                   <?php echo $_SESSION['message'] ?>
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                    unset($_SESSION['message']);
                  }elseif(isset($_SESSION['success'])){
                    ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                       <?php echo $_SESSION['success'] ?>
                       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    unset($_SESSION['success']);
                  }
            ?>

            <div>
              <div>
                <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1563.9722692253597!2d69.20591796864444!3d41.23211889930348!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38ae61e855615995%3A0x37df4b261b2605f3!2sHongqi%20Uzbekistan!5e0!3m2!1sen!2s!4v1698286246063!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
              <hr>
              <div>
                <table class="table table-striped w-100">
                    <tr>
                      <th>Округ *</th>
                      <th>Адрес*</th>
                      <th>URL *</th>
                      <th></th>
                    </tr>
                    <?php
                  include("../db.php");
                  $sql = "SELECT * FROM branches";
                  $result = $conn->query($sql);
                  
                  if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                      ?>
                    <tr>
                      <td><?php echo $row['city'] ?></td>
                      <td><?php echo $row['location'] ?></td>
                      <td><?php echo $row['url'] ?></td>
                      <td><a class="text-danger" href="delete.php?id=<?php echo $row['id'] ?>"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                      <?php
                    }
                  } else {
                    echo "<p>Филиалов пока не добавлено!</p>";
                  }
                  $conn->close();
                  ?>
                </table>
              </div>
            </div>
        </div>
    </main>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>