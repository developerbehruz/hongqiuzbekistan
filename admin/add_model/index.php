<?php
      session_start();

      include("../db.php");
 
if(isset($_POST['load_model'])){
   $type=$_POST['type'];
   $model_name=$_POST['name'];
   $description=$_POST['description'];

   $maxsize = 10485760; // 5MB
   if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ''){
       $name = $_FILES['file']['name'];
       $target_dir = "../../assets/photos/";
       $target_file = $target_dir . $_FILES["file"]["name"];

       // Select file type
       $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

       // Valid file extensions
       $extensions_arr = array("jpeg","jpg","png");

       // Check extension
       if(in_array($extension,$extensions_arr) ){
 
           // Check file size
           if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
                $_SESSION['message'] = "Файл слишком большой. Размер файла должен быть меньше 10 МБ.";
           }else{
                // Upload
                if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
                    // Insert record
                    $query = "INSERT INTO model(type,model_picture,name,description) VALUES('".$type."','".$name."','".$model_name."','".$description."')";

                    mysqli_query($conn,$query);
                    $_SESSION['success'] = "Загрузка успешно.";
                }
           }

       }else{
           $_SESSION['message'] = "Недопустимое расширение файла.";
       }
   }else{
       $_SESSION['message'] = "Пожалуйста, выберите файл.";
   }
  //  header('location: index.php');
  //  exit;
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.korzh.com/metroui/v4.5.1/css/metro-all.min.css">
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
                <a href="../add_banner/" class="nav-link text-white">
                  <i class="fa-solid fa-photo-film"></i>
                  Информация о странице
                </a>
              </li>
              <li>
                <a href="#" class="nav-link text-white">
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
                <h2>Добавить модель</h2>
                <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-square-plus"></i> Добавить модель</button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Добавить модель</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="model" method="post" action="" enctype='multipart/form-data' class="m-auto">
                              <div class="mb-3">
                                  <select class="form-select" name="type" required>
                                    <option selected value="">Выберите тип модели</option>
                                    <option value="sedan">Sedan</option>
                                    <option value="suv">Suv</option>
                                    <option value="ev">Ev</option>
                                  </select>
                                </div>
                                  <div class="mb-3">
                                    <label class="form-label">Загрузите изображение модели <span class="text-danger">*</span></label>
                                    <input class="form-control" type="file" name="file" required>
                                    <span class="text-secondary">Размер файла не должен превышать 10 МБ, (JPEG, PNG, MP4)</span>
                                  </div>
                                  <div class="mb-3">
                                    <label class="form-label">Введите название модели <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Введите" name="name" required>
                                  </div>
                                  <div class="mb-3">
                                    <label class="form-label">Введите краткое описание модели <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Введите" name="description" required>
                                  </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" form="model" name="load_model" class="btn btn-danger">Добавить модель</button>
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

            <ul data-role="tabs" data-tabs-type="pills" data-expand="true" class="mb-3">
                <li><a href="#_sedan">Sedan</a></li>
                <li><a href="#_suv">Suv</a></li>
                <li><a href="#_ev">Ev</a></li>
            </ul>
            
            <div id="_sedan">
            <div class="row">
            <?php
              
              $sql = "SELECT * FROM model WHERE type='sedan'";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                 ?>
                <div class="col-4 mb-4" style="position: relative;">
                    <a href="./deletemodel.php?id=<?php echo $row['id'] ?>" style="position: absolute;top: 5px;right: 17px;" class="rounded bg-dark text-white p-1 px-2">
                        <i class="fa-solid fa-xmark"></i>
                    </a>
                    <img src="../../assets/photos/<?php echo $row['model_picture'] ?>" width="100%" height="250" style="object-fit: cover;" class="rounded">
                    <h3 class="text-center mt-3"><?php echo $row['name'] ?></h3>
                    <a href="./edit.php?id=<?php echo $row['id'] ?>" class="btn btn-dark text-uppercase float-end">изменять <i class="fa-solid fa-angle-right"></i></a>
                </div>
                 <?php
                }
              } else {
                echo "<p>Модели еще не добавлены.</p>";
              }
              
              ?>

            </div>
            </div>

            <div id="_suv">
            <div class="row">
            <?php
              
              $sql = "SELECT * FROM model WHERE type='suv'";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                 ?>
                <div class="col-4 mb-4" style="position: relative;">
                    <a href="./deletemodel.php?id=<?php echo $row['id'] ?>" style="position: absolute;top: 5px;right: 17px;" class="rounded bg-dark text-white p-1 px-2">
                        <i class="fa-solid fa-xmark"></i>
                    </a>
                    <img src="../../assets/photos/<?php echo $row['model_picture'] ?>" width="100%" height="250" style="object-fit: cover;" class="rounded">
                    <h3 class="text-center mt-3"><?php echo $row['name'] ?></h3>
                    <a href="./edit.php?id=<?php echo $row['id'] ?>" class="btn btn-dark text-uppercase float-end">изменять <i class="fa-solid fa-angle-right"></i></a>
                </div>
                 <?php
                }
              } else {
                echo "<p>Модели еще не добавлены.</p>";
              }
              
              ?>
            </div>
            </div>

            <div id="_ev">
            <div class="row">
            <?php
              
              $sql = "SELECT * FROM model WHERE type='ev'";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                 ?>
                <div class="col-4 mb-4" style="position: relative;">
                    <a href="./deletemodel.php?id=<?php echo $row['id'] ?>" style="position: absolute;top: 5px;right: 17px;" class="rounded bg-dark text-white p-1 px-2">
                        <i class="fa-solid fa-xmark"></i>
                    </a>
                    <img src="../../assets/photos/<?php echo $row['model_picture'] ?>" width="100%" height="250" style="object-fit: cover;" class="rounded">
                    <h3 class="text-center mt-3"><?php echo $row['name'] ?></h3>
                    <a href="./edit.php?id=<?php echo $row['id'] ?>" class="btn btn-dark text-uppercase float-end">изменять <i class="fa-solid fa-angle-right"></i></a>
                </div>
                 <?php
                }
              } else {
                echo "<p>Модели еще не добавлены.</p>";
              }
              
              ?>
            </div>
            </div>
        </div>
    </main>


      <script src="https://cdn.korzh.com/metroui/v4.5.1/js/metro.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>