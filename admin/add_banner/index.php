<?php
      session_start();

      include("../db.php");
 
if(isset($_POST['banner_load'])){
   $title=$_POST['name'];
   $maxsize = 10485760; // 5MB
   if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ''){
       $name = $_FILES['file']['name'];
       $target_dir = "../../assets/videos/";
       $target_file = $target_dir . $_FILES["file"]["name"];

       // Select file type
       $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

       // Valid file extensions
       $extensions_arr = array("mp4","avi","3gp","mov","mpeg");

       // Check extension
       if( in_array($extension,$extensions_arr) ){
 
           // Check file size
           if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
                $_SESSION['message'] = "Файл слишком большой. Размер файла должен быть меньше 10 МБ.";
           }else{
                // Upload
                if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
                    // Insert record
                    $query = "INSERT INTO banners(name,url) VALUES('".$title."','".$name."')";

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


// info load

if(isset($_POST["info_load"])){
  
  $sql = "UPDATE `info` SET `phone`='".$_POST['info_phone']."',`email`='".$_POST['info_email']."',`youtube`='".$_POST['info_youtube']."',`telegram`='".$_POST['info_telegram']."',`instagram`='".$_POST['info_instagram']."',`facebook`='".$_POST['info_facebook']."',`whatsapp`='".$_POST['info_whatsapp']."' WHERE 1";
if ($conn->query($sql) === TRUE) {
  $_SESSION['success'] = "Данные сохранены";
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
                <h2>Информация о странице</h2>
                <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-square-plus"></i> Добавить баннер</button>
                
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Добавить баннер</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="banner" method="post" action="" enctype='multipart/form-data' class="m-auto">

                                <div class="mb-3">
                                    <label class="form-label">Загрузите свой файл <span class="text-danger">*</span></label>
                                    <input class="form-control" type="file" name="file" required>
                                    <span class="text-secondary">Размер файла не должен превышать 10 МБ, (JPEG, PNG, MP4)</span>
                                  </div>
                                  <div class="mb-3">
                                    <label class="form-label">Введите название <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Введите" name="name" required>
                                  </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" form="banner" class="btn btn-danger" name="banner_load">Добавить баннер</button>
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

            <p>Баннер</p>
            <hr>
            <div class="row">
              <?php
              
              $sql = "SELECT * FROM banners";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                 ?>
                 <div class="col-4 mb-4" style="position: relative;">
                    <a href="./delete.php?id=<?php echo $row['id'] ?>" style="position: absolute;top: 5px;right: 17px;z-index:2" class="rounded bg-dark text-white p-1 px-2">
                        <i class="fa-solid fa-xmark"></i>
                    </a>
                    <video src="../../assets/videos/<?php echo $row['url']?>" class="object-fit-cover rounded" controls width="100%" height="250"></video>
                </div>
                 <?php
                }
              } else {
                echo "<p>Баннеры пока не загружены.</p>";
              }
              
              ?>
            </div>

            <p>Информация о сайте</p>
            <hr>

            <div class="info">
            <?php
              
              $sql2 = "SELECT * FROM info";
              $result2 = $conn->query($sql2);

              if ($result2->num_rows > 0) {
                // output data of each row
                while($row2 = $result2->fetch_assoc()) {
              ?>

              <form action="" method="post" id="info_load">
                
                <div class="input-group mb-3">
                  <span class="input-group-text text-white" style="background-color: RGBA(var(--bs-dark-rgb),var(--bs-bg-opacity,1))!important;"><i class="fa-solid fa-phone"></i></span>
                  <input type="text" class="form-control" name="info_phone" value="<?php echo $row2['phone'] ?>" required>
                </div>

                <div class="input-group mb-3">
                  <span class="input-group-text text-white" style="background-color: RGBA(var(--bs-dark-rgb),var(--bs-bg-opacity,1))!important;"><i class="fa-solid fa-envelope"></i></span>
                  <input type="email" class="form-control" name="info_email"  value="<?php echo $row2['email'] ?>" required>
                </div>

                <div class="input-group mb-3">
                  <span class="input-group-text text-white" style="background-color: RGBA(var(--bs-dark-rgb),var(--bs-bg-opacity,1))!important;"><i class="fa-brands fa-youtube"></i></span>
                  <input type="url" class="form-control" name="info_youtube"  value="<?php echo $row2['youtube'] ?>" required>
                </div>

                <div class="input-group mb-3">
                  <span class="input-group-text text-white" style="background-color: RGBA(var(--bs-dark-rgb),var(--bs-bg-opacity,1))!important;"><i class="fa-brands fa-telegram"></i></span>
                  <input type="url" class="form-control" name="info_telegram"  value="<?php echo $row2['telegram'] ?>" required>
                </div>

                <div class="input-group mb-3">
                  <span class="input-group-text text-white" style="background-color: RGBA(var(--bs-dark-rgb),var(--bs-bg-opacity,1))!important;"><i class="fa-brands fa-square-instagram"></i></span>
                  <input type="url" class="form-control" name="info_instagram"  value="<?php echo $row2['instagram'] ?>" required>
                </div>

                <div class="input-group mb-3">
                  <span class="input-group-text text-white" style="background-color: RGBA(var(--bs-dark-rgb),var(--bs-bg-opacity,1))!important;"><i class="fa-brands fa-facebook"></i></span>
                  <input type="url" class="form-control" name="info_facebook"  value="<?php echo $row2['facebook'] ?>" required>
                </div>
                
                <div class="input-group mb-3">
                  <span class="input-group-text text-white" style="background-color: RGBA(var(--bs-dark-rgb),var(--bs-bg-opacity,1))!important;"><i class="fa-brands fa-square-whatsapp"></i></span>
                  <input type="url" class="form-control" name="info_whatsapp"  value="<?php echo $row2['whatsapp'] ?>" required>
                </div>

                <button type="submit" form="info_load" name="info_load" class="btn btn-danger">Сохранять</button>
              </form>
              <?php
                }
              } else {
                echo "<p>Нет доступной информации!</p>";
              }
              $conn->close();
              ?>
            </div>

        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>