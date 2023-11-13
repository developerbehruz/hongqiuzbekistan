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
                <a href="#" class="nav-link text-white">
                  <i class="fa-solid fa-user-tag"></i>
                  Список тест-драйвов
                </a>
              </li>
              <li>
                <a href="../add_banner/" class="nav-link text-white">
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
            <h2 class="mb-5">Список тест-драйвов</h2>

            <table class="table table-striped" style="width: 100%;">
                  <tr>
                    <th>#</th>
                    <th>Имя</th>
                    <th>Номер телефона</th>
                    <th>Город</th>
                    <th>Модель</th>
                  </tr>
                  <?php
                  include("../db.php");
                  $sql = "SELECT * FROM lids";
                  $result = $conn->query($sql);
                  
                  if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                      ?>
                  <tr>
                  <td><?php echo $row['id'] ?></td>
                  <td><?php echo $row['fullname'] ?></td>
                  <td><?php echo $row['phone'] ?></td>
                  <td><?php echo $row['location'] ?></td>
                  <td><?php echo $row['model'] ?></td>
                  </tr>
                      <?php
                    }
                  } else {
                    echo "<p>Пока нет доступных лидов!</p>";
                  }
                  $conn->close();
                  ?>
              </table>
        </div>
    </main>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>