<?php

include("../db.php");

if(isset($_GET['car'])){
    $sql = "SELECT * FROM model WHERE `name`='".$_GET['car']."'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        if(isset($_POST['drive_load'])){
            $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
            $phone = mysqli_real_escape_string($conn, $_POST['phone']);
            $location = mysqli_real_escape_string($conn, $_POST['location']);
            $model = mysqli_real_escape_string($conn, $_POST['model']);
            
            $sql1 = "INSERT INTO lids (fullname, phone, location, model) VALUES ('".$fullname."', '".$phone."', '".$location."', '".$model."')";
            
            if ($conn->query($sql1) === TRUE) {
            //   $_SESSION['success'] = "Вы успешно зарегистрировались на тест-драйв!";
            // echo "success";
            } else {
            //   $_SESSION['message'] = "Ошибка!";
            // echo "error";
            }
            
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Модели</title>
    <!-- Main css -->
    <link rel="stylesheet" href="../assets/style/main.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- SwiperJS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
</head>
<body>
    <!-- drive modal -->
    <div class="d-modal">
        <div class="drive-modal">
            <div class="container">
                <div class="res-header-menu">
                    <div class="res-logo">
                        <img src="../assets/images/Logo.png" alt="logo">
                    </div>
                    <h2>Тест драйв</h2>
                    <i class="fa-solid fa-xmark driveModalClose"></i>
                </div>
                <form action="" id="drive_load" method="post">
                    <label for="">Город<span class="text-danger">*</span></label>
                    <select class="form-select" aria-label="Выберите" name="location" required>
                        <option selected>Выберите</option>
                        <option value="Andijon">Andijon</option>
                        <option value="Buxoro">Buxoro</option>
                        <option value="Farg`ona">Farg`ona</option>
                        <option value="Jizzax">Jizzax</option>
                        <option value="Xorazm">Xorazm</option>
                        <option value="Namangan">Namangan</option>
                        <option value="Navoiy">Navoiy</option>
                        <option value="Qashqadaryo">Qashqadaryo</option>
                        <option value="Qoraqalpog`iston">Qoraqalpog`iston</option>
                        <option value="Samarqand">Samarqand</option>
                        <option value="Sirdaryo">Sirdaryo</option>
                        <option value="Surxandaryo">Surxandaryo</option>
                        <option value="Toshkent">Toshkent</option>
                    </select>
    
                    <label for="">Модель<span class="text-danger">*</span></label>
                    <select class="form-select" aria-label="Выберите" name="model" required>
                        <option selected>Выберите</option>
                        <?php

                            $sql2 = "SELECT * FROM model";
                            $result2 = $conn->query($sql2);
                            
                            if ($result2->num_rows > 0) {
                              // output data of each row
                              while($row2 = $result2->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $row2['name'] ?>"><?php echo $row2['name'] ?></option>
                            <?php
                              }
                            } else {
                            }
                        ?>
                    </select>
    
                    <label for="">Номер телефона<span class="text-danger">*</span></label>
                    <input type="number" placeholder="+998" class="form-control" name="phone" required>
    
                    <label for="">Имя<span class="text-danger">*</span></label>
                    <input type="text" placeholder="Введите" class="form-control" name="fullname" required>
    
                    <button type="submit" form="drive_load" name="drive_load" class="btn1 w-100 bg-dark text-white">Тест драйв</button>
                </form>
            </div>
            <div class="res-footer">
                <div class="container">
                    <b>© 2023. HONGQI UZBEKISTAN</b>
                    <p>Верстка, Дизайн и программирование <br>
                        UNICAL SOLUTIONS</p>
                </div>
            </div>
        </div>
    </div>
   <!-- start home page -->
   <div class="res-header">
        <div class="container">
            <div class="res-header-menu">
                <div class="res-logo">
                    <a href="../"><img src="../assets/images/Logo.png" alt="logo" data-aos="zoom-in" y="zoom-in"></a>
                </div>
                <h2>Меню</h2>
                <i class="fa-solid fa-xmark navClose"></i>
            </div>
            <div class="res-navigation" data-aos="zoom-in" y="zoom-in">
                <a href="../">Главная</a>
                <a href="../#models" class="active">Модели</a>
                <a href="../#aboutus">О нас</a>
                <a href="../#news">Новости</a>
                <a href="../#branch">Филиалы</a>
                <a href="#footer">Конткаты</a>
                <button data-aos="zoom-in" y="zoom-in" class="btn1 fw-bold testDriveBtn">Тест драйв <i class="fa-solid fa-bolt"></i>                </button>
            </div>
        </div>
        <div class="res-footer">
            <div class="container">
                <b>© 2023. HONGQI UZBEKISTAN</b>
                <p>Верстка, Дизайн и программирование <br>
                    UNICAL SOLUTIONS</p>
            </div>
        </div>
   </div>
   <section class="modul-home-section" style="background-image: url('../assets/photos/<?php echo $row['banner']?>') !important">
        <div class="container">
            <header>
                <div class="nav-logo">
                    <a href="../"><img src="../assets/images/Logo.png" alt="logo" data-aos="zoom-in" y="fade-right"></a>
                </div>
                <div class="nav-navigation" data-aos="zoom-in" y="fade-down">
                    <a href="../">Главная</a>
                    <a href="../#models" class="active">Модели</a>
                    <a href="../#aboutus">О нас</a>
                    <a href="../#news">Новости</a>
                    <a href="../#branch">Филиалы</a>
                    <a href="#footer">Конткаты</a>
                </div>
                <div class="nav-btn" data-aos="zoom-in" y="fade-left">
                    <button class="btn1 bg-white fw-bold testDriveBtn">Тест драйв</button>
                    <div class="nav-menu">
                        <i class="fa-solid fa-bars"></i>
                    </div>
                </div>
            </header>
            <div class="home-content">
                <h1 class="model-h1" data-aos="zoom-in" y="zoom-out-up"><?php echo $row['name']?></h1>
                <!-- <button class="btn1 bg-white">Обзор <i class="fa-solid fa-angle-right"></i></button> -->
            </div>
        </div>
   </section>
   <!-- finish home page -->




   <!-- start car electr -->
  <section class="electric-car-section" style="margin-top: 150px;">
    <div class="container">
      <h1 data-aos="zoom-in" y="fade-up" class="text-center mt-5 fw-bold" style="font-size: 65px;"><?php echo $row['description'] ?></h1>
      <h4 data-aos="zoom-in" y="fade-up" class="text-secondary text-center"><?php echo $row['name'] ?></h4>
      <div class="row text-center mt-4 text-center carelecimg">
        <div class="col-12 col-md-6 col-xl-4 mt-4">
          <img data-aos="zoom-in" y="fade-right" src="../assets/photos/<?php echo $row['model_info_1'] ?>" class="w-100 object-fit-cover" height="250" alt="">
        </div>
        <div class="col-12 col-md-6 col-xl-4 mt-4">
          <img data-aos="zoom-in" y="fade-up" src="../assets/photos/<?php echo $row['model_info_2'] ?>" class="w-100 object-fit-cover" height="250" alt="">
        </div>
        <div class="col-12 col-md-6 col-xl-4 mt-4">
          <img data-aos="zoom-in" y="fade-left" src="../assets/photos/<?php echo $row['model_info_3'] ?>" class="w-100 object-fit-cover" height="250" alt="">
        </div>
      </div>
      <div class="row mt-3">
        <p data-aos="zoom-in" y="fade-up"><?php echo $row['model_info_text'] ?></p>
      </div>
    </div>
  </section>

  <section style="margin-top: 130px;">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4 mt-3">
                <img data-aos="zoom-in" y="fade-right" class="w-100 object-fit-cover" height="250" src="../assets/photos/<?php echo $row['character_1'] ?>" alt="">
                <div class="card-description p-3">
                    <p>Wheel base [mm]</p>
                    <h2><?php echo $row['character_wheel'] ?></h2>
                    <p class="mt-5">10 minutes super charge driving range</p>
                    <h2><?php echo $row['character_range'] ?></h2>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mt-3">
                <img data-aos="zoom-in" y="fade-up" class="w-100 object-fit-cover" height="250" src="../assets/photos/<?php echo $row['character_2'] ?>" alt="">
                <div class="card-description p-3">
                    <p>Front overhang (mm)</p>
                    <h2><?php echo $row['character_front'] ?></h2>
                    <p class="mt-5">Tire size</p>
                    <h2><?php echo $row['character_tire'] ?></h2>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mt-3">
                <img data-aos="zoom-in" y="fade-left" class="w-100 object-fit-cover" height="250" src="../assets/photos/<?php echo $row['character_3'] ?>" alt="">
                <div class="card-description p-3">
                    <p>L×W×H [mm] </p>
                    <h2><?php echo $row['character_lwh'] ?></h2>
                    <p class="mt-5">Rear overhang (mm)</p>
                    <h2><?php echo $row['character_rear'] ?></h2>
                </div>
            </div>
        </div>
        <h4 data-aos="zoom-in" y="fade-up" class="text-center mt-5">От $<?php echo $row['price'] ?> или $<?php echo $row['price_month'] ?> за <?php echo $row['price_duration'] ?> месяцев</h4>
        <div class="color-div text-center">
            <div class="colors" data-aos="zoom-in" y="fade-up">
                <div class="clr"></div>
                <div class="clr"></div>
                <div class="clr"></div>
                <div class="clr"></div>
            </div>
            <button class="btn1 bg-dark text-white mt-5 testDriveBtn">Тест драйв <i class="fa-solid fa-angle-right"></i></button>
        </div>
    </div>
  </section>
   <!-- finish car electr -->



   <!-- start gallery -->
   <section style="margin-top: 130px;" data-aos="zoom-in" y="fade-up">
        <div class="container">
            <h1 class="text-center mt-5 fw-bold section-title" style="font-size: 65px;">Галерея</h1>
            <div class="owl-carousel owl-theme mt-5">
                <?php

                $sql3 = "SELECT * FROM gallery WHERE model=".$row['id'];
                $result3 = $conn->query($sql3);

                if ($result3->num_rows > 0) {
                // output data of each row
                while($row3 = $result3->fetch_assoc()) {
                ?>
                <div class="item">
                <img src="../assets/photos/<?php echo $row3['url'] ?>" class="w-100 object-fit-cover" height="700px" alt="">
                </div>
                <?php
                }
                } else {
                }
                ?>
            </div>
        </div>
   </section>
   <!-- finish gallery -->
  




  <!-- start footer -->
  <footer class="mt-5">
    <div class="container d-flex flex-column justify-content-center align-items-center mt-5">
        <div class="hr w-100 mt-4">
        <hr style="color: #a3a3a3;">
        </div>
        <div class="footer-img mt-4">
            <img data-aos="zoom-in" y="fade-up" src="../assets/images/Logo.png" alt="" width="50">
        </div>
        <div class="footer-nav mt-4">
            <div class="row text-center">
                <div class="col-12 col-sm-12 col-md-3 mt-3" style="margin-left: 20px;" data-aos="zoom-in" y="fade-up">
                    <a href="#" class="text-decoration-none text-black">Главная</a>
                </div>
                <div class="col-12 col-sm-12 col-md-3 mt-3" style="margin-left: 20px;" data-aos="zoom-in" y="fade-up">
                    <a href="#" class="text-decoration-none text-black">Модели</a>
                </div>
                <div class="col-12 col-sm-12 col-md-4 mt-3" style="margin-left: 20px;" data-aos="zoom-in" y="fade-up">
                    <a href="#" class="text-decoration-none text-black">О нас</a>
                </div>
            </div>
        </div>
        <?php
            
            $sql = "SELECT * FROM info WHERE id=1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
            ?>
        <div class="footer-nav2 mt-4">
            <div class="row text-center">
                <div class="col-12 col-sm-12 col-md-6 mt-3">
                    <a data-aos="zoom-in" y="fade-up" href="#" class="text-black"><?php echo $row['phone'] ?></a>
                </div>
                <div class="col-12 col-sm-12 col-md-4 mt-3">
                    <a data-aos="zoom-in" y="fade-up" href="#" class="text-black"><?php echo $row['email'] ?></a>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <button data-aos="zoom-in" y="fade-up" class="btn1 bg-dark text-white testDriveBtn">Тест драйв <i class="fa-solid fa-bolt"></i>            </button>
        </div>
        <div class="text-center mt-4 social" data-aos="zoom-in" y="fade-up">
            <a href="<?php echo $row['youtube'] ?>"><button class="btn1 bg-light text-dark fs-5 mt-2"><i class="fa-brands fa-youtube"></i></button></a>
            <a href="<?php echo $row['telegram'] ?>"><button class="btn1 bg-light text-dark fs-5 mt-2"><i class="fa-brands fa-telegram"></i></button></a>
            <a href="<?php echo $row['instagram'] ?>"><button class="btn1 bg-light text-dark fs-5 mt-2"><i class="fa-brands fa-square-instagram"></i></button></a>
            <a href="<?php echo $row['facebook'] ?>"><button class="btn1 bg-light text-dark fs-5 mt-2"><i class="fa-brands fa-facebook"></i></button></a>
            <a href="<?php echo $row['whatsapp'] ?>"><button class="btn1 bg-light text-dark fs-5 mt-2"><i class="fa-brands fa-square-whatsapp"></i></button></a>
        </div>
            <?php
              }
            } else {
              echo "<p>новости еще не доступна!</p>";
            }
            ?>

    </div>
    <div class="copyr mt-4">
        <div class="container text-secondary">
            <h5>© 2023. JETOUR UZBEKISTAN</h5>
            <p>Верстка, Дизайн и программирование - UNICAL SOLUTIONS</p>
        </div>
    </div>
  </footer>
  <!-- finish footer -->




<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>



<!-- Bootsrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
  $('.owl-carousel').owlCarousel({
    stagePadding: 50,
    loop:true,
    margin:10,
    nav:true,
    autoplay:true,
    autoplayTimeout:1000,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})

    
</script>

<!-- Main JS -->
<script src="../assets/app/main.js"></script>

</body>
</html>

<?php

    }
    } else {
     header("Location: ../");
     exit();
    }
}else{
    header("Location: ../");
    exit();
}
?>