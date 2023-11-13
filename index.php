<?php
include("db.php");

if(isset($_POST['drive_load'])){
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $model = mysqli_real_escape_string($conn, $_POST['model']);
    
    $sql = "INSERT INTO lids (fullname, phone, location, model) VALUES ('".$fullname."', '".$phone."', '".$location."', '".$model."')";
    
    if ($conn->query($sql) === TRUE) {
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
    <title>HONGQI</title>
    <!-- Main css -->
    <link rel="stylesheet" href="./assets/style/main.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- SwiperJS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link rel="shortcut icon" href="./assets/images/Logo.png" type="image/x-icon">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        .maxline {
            overflow: hidden;
   display: -webkit-box;
   -webkit-line-clamp: 3; /* number of lines to show */
           line-clamp: 3; 
   -webkit-box-orient: vertical;
        }

        iframe {
          width: 100% !important;
        }
        .loader {
          width: 100%;
          height: 100vh;
          background: #111;
          position: fixed;
          top: 0;
          left: 0;
          display: flex;
          justify-content: center;
          align-items: center;
          z-index: 999;
        }
        .loader img {
          width: 60px;
        }
        /* .parent {
          border-radius: 3px;
          overflow: hidden;
          margin: 20px 0;

          position: relative;
          padding-top: 71.42857142857143%;
          background-image: url(data:image/gif;base64,R0lGODlhCgAIAIABAN3d3f///yH5BAEAAAEALAAAAAAKAAgAAAINjAOnyJv2oJOrVXrzKQA7)
        }
        img.lazy {
          display: block;

          width: 100%;
          position: absolute;
          top: 0;
          left: 0;
        } */
    </style>
</head>
<body>
   <div class="loader">
    <img src="./assets/images/Logo.png" alt="">
  </div>
    <!-- drive modal -->
    <div class="d-modal">
        <div class="drive-modal">
            <div class="container">
                <div class="res-header-menu">
                    <div class="res-logo">
                        <a href="#"><img src="./assets/images/Logo.png" alt="logo"></a>
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

                            $sql = "SELECT * FROM model";
                            $result = $conn->query($sql);
                            
                            if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = $result->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
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
                   <a href="#"> <img src="./assets/images/Logo.png" alt="logo"></a>
                </div>
                <h2>Меню</h2>
                <i class="fa-solid fa-xmark navClose"></i>
            </div>
            <div class="res-navigation">
                <a href="#" class="active">Главная</a>
                <a href="#models">Модели</a>
                <a href="#aboutus">О нас</a>
                <a href="#news">Новости</a>
                <a href="#branch">Филиалы</a>
                <a href="#footer">Конткаты</a>
                <button class="btn1 fw-bold testDriveBtn">Тест драйв <i class="fa-solid fa-bolt"></i></button>
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
   <section class="home-section">
        <div class="container">
            <header>
                <div class="nav-logo" data-aos="fade-right">
                    <img src="./assets/images/Logo.png" alt="logo">
                </div>
                <div class="nav-navigation" data-aos="fade-down">
                    <a href="#" class="active">Главная</a>
                    <a href="#models">Модели</a>
                    <a href="#aboutus">О нас</a>
                    <a href="#news">Новости</a>
                    <a href="#branch">Филиалы</a>
                    <a href="#footer">Конткаты</a>
                </div>
                <div class="nav-btn" data-aos="fade-left">
                    <button class="btn1 bg-white fw-bold testDriveBtn">Тест драйв</button>
                    <div class="nav-menu">
                        <i class="fa-solid fa-bars"></i>
                    </div>
                </div>
            </header>
            <div class="home-content" data-aos="zoom-out">
                <h1>HONGQI</h1>
                <p>Революция в эволюции</p>
            </div>
        </div>
   </section>
   <!-- finish home page -->



   
   <!-- start video carusel -->
   <div class="swiper mySwiper vd-wrapper">
    <div class="swiper-wrapper ">
        <?php

        $sql = "SELECT * FROM banners";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
        ?>
        <div class="swiper-slide vd-carusel" data-aos="zoom-in">
          <video src="./assets/videos/<?php echo $row['url'] ?>" autoplay muted></video>
        </div>
        <?php
          }
        } else {
          echo "<p>Нет доступного видео</p>";
        }
        ?>
    </div>
    <div class="vd-pg-wrapper">
        <div class="swiper-pagination vd-carusel-pg">
        </div>
        <button class="pauseBtn"><i class="fa-solid fa-pause"></i></button>
        <button class="playBtn"><i class="fa-solid fa-play"></i></button>
    </div>
  </div>
  <div class="after-vd-carusel-section text-center mt-5" data-aos="fade-up">
    <h1>Самые доступные цены на октябрь</h1>
    <p>от 380 000 000 сум</p>
    <a href="#models"><button class="btn1 bg-dark text-white">О модели <i class="fa-solid fa-angle-right"></i></button></a>
  </div>
   <!-- finish video carusel -->



   <!-- start car electr -->
  <section class="electric-car-section" style="margin-top: 150px;">
    <div class="container">
      <h1 class="text-center mt-5 fw-bold" data-aos="fade-up" style="font-size: 65px;"><span class="text-success">100%</span> Электрическая роскошь</h1>
      <h4 class="text-secondary text-center" data-aos="fade-up">Hongqi E-HS9</h4>
      <div class="row text-center mt-4 text-center carelecimg" data-aos="fade-right">
        <div class="col-12 col-md-6 col-xl-4 mt-4-md">
          <div class="parent">
            <img src="./assets/images/car1.jpeg" class="w-100" data-aos="fade-right" alt="">
          </div>
        </div>
        <div class="col-12 col-md-6 col-xl-4 mt-4-md" data-aos="fade-up">
          <img src="./assets/images/car2.jpeg" class="w-100" alt="">
        </div>
        <div class="col-12 col-md-6 col-xl-4 mt-4-md" data-aos="fade-left">
          <img src="./assets/images/car3.jpeg" class="w-100" alt="">
        </div>
      </div>
      <div class="row mt-3" data-aos="fade-up">
        <p>
          Hongqi E-HS9 - это полностью электрический роскошный внедорожник, электрические характеристики, комфорт и качество которого делают его уникальным в своем сегменте. Можно приобрести шесть или семь сидений с двумя батареями разного размера. Мощность 84 кВт *ч составляет 435 кВт, а дальность действия - до 396 км (в сочетании с WLTP). Более крупный из них развивает мощность 99 кВт * ч, имеет 551hk и запас хода до 465 км (в сочетании с WLTP), и разгоняется с 0 до 100 км / ч всего за 4,9 секунды, что уникально для внедорожника такого размера.
Благодаря очень просторному и тихому интерьеру, а также дизайну интерьера благодаря высокому качеству их продукции, вы можете с нетерпением ждать следующей поездки в первом классе, независимо от того, куда они направляются.
Это роскошный внедорожник, который был разработан для того, чтобы стильно перевозить вас. Высокий передний бампер с мощным барбекю и интригующий дизайн делают этот автомобиль особенным. Задняя часть E-HS9, не менее впечатляющая с точки зрения взаимосвязанного, хвостового оперения, состоящего из нескольких этапов линий в уникальном узоре.
Элегантный дизайн включает в себя скрытую дверную ручку и систему замков, которыми вы управляете как с помощью , так и с мобильных телефонов.
        </p>
      </div>
    </div>
  </section>
  <section class="electric-car-section" style="margin-top: 150px;">
    <div class="container">
      <h1 class="text-center mt-5 fw-bold" style="font-size: 65px;" data-aos="fade-up">Королевский комфорт</h1>
      <div class="row mt-4">
        <div class="col-12 mt-3">
          <img class="w-100" src="./assets/images/Imag.jpeg" alt="" data-aos="fade-up">
        </div>
      </div>
    </div>
  </section>
   <!-- finish car electr -->
  <div class="empty"></div>


  <!-- start review section -->
  <section style="margin-top: 150px;">
    <h1 class="text-center mt-5 fw-bold section-title" style="font-size: 65px;" data-aos="fade-up">Обзор</h1>
    <div class="review-btns d-flex justify-content-center mt-5">
        <button data-aos="fade-right" data-aos-offset="200" data-aos-easing="ease-in-sine" class="btn2 interiorBtn" onclick="changeImage('./assets/images/inside3.jpg')">Интерьер</button>
        <button data-aos="fade-left" data-aos-offset="200" data-aos-easing="ease-in-sine" class="btn2 active exteriorBtn" onclick="changeImage('./assets/images/outside.jpg')">Экстерьер</button>
    </div>
    <div class="review-image mt-4">
        <img class="w-100" src="./assets/images/outside.jpg" alt="" data-aos="fade-up">
    </div>
    <div class="container">
        <div class="review-btns review-btns134 review-btns2 nav-rev d-flex justify-content-center mt-5">
            <button data-aos="fade-right" class="btn2 imageBtn imageBtn1" onclick="changeImage('./assets/images/shina.jpg', 'imageBtn1')">Шина</button>
            <button data-aos="zoom-in" class="btn2 imageBtn imageBtn2" onclick="changeImage('./assets/images/left.jpg', 'imageBtn2')">левая сторона</button>
            <button data-aos="zoom-in" class="btn2 imageBtn imageBtn3" onclick="changeImage('./assets/images/prim.jpg', 'imageBtn3')">Прямой просмотр</button>
            <button data-aos="zoom-in" class="btn2 imageBtn imageBtn4 active imageBtnActive" onclick="changeImage('./assets/images/outside.jpg', 'imageBtn4')">Вид сзади</button>
            <button data-aos="fade-left" class="btn2 imageBtn imageBtn5" onclick="changeImage('./assets/images/right.jpg', 'imageBtn5')">Правая сторона</button>
        </div>
        <div class="review-btns review-btns234 d-none review-btns2 nav-rev d-flex justify-content-center mt-5">
            <button class="btn2 imageBtn imageBtn6" onclick="changeImage('./assets/images/inside1.jpg', 'imageBtn6')">Патолог</button>
            <button class="btn2 imageBtn imageBtn7" onclick="changeImage('./assets/images/inside2.jpg', 'imageBtn7')">Задние сиденья</button>
            <button class="btn2 imageBtn imageBtn8 active imageBtnActive" onclick="changeImage('./assets/images/inside3.jpg', 'imageBtn8')">Передние сиденья</button>
        </div>
        <select class="form-select nav-form-select nav-form-select134" onchange="change()" aria-label="Default select example">
            <option value="1" >Шина</option>
            <option value="2">левая сторона</option>
            <option value="3">Прямой просмотр</option>
            <option value="4">Вид сзади</option>
            <option value="5">Правая сторона</option>
        </select>
        <select class="form-select nav-form-select nav-form-select234 d-none" onchange="change2()" aria-label="Default select example">
            <option value="1">Патолог</option>
            <option value="2">Задние сиденья</option>
            <option value="3">Передние сиденья</option>
        </select>
    </div>
  </section>
  <!-- finish review section -->



  <!-- start model section -->
  <section style="margin-top: 120px;" id="models">
    <h1 class="text-center mt-5 fw-bold section-title" style="font-size: 65px;" data-aos="fade-up">Модели</h1>
    <div class="model-btn d-flex justify-content-center mt-5">
        <button data-aos="fade-right" class="btn2 active sedanBtn">Sedan</button>
        <button data-aos="zoom-in" class="btn2 suvBtn">SUV</button>
        <button data-aos="fade-left" class="btn2 evBtn">EV</button>
    </div>
    <div class="container">
        <div class="row justify-content-center sedan">

            <?php
            
            $sql = "SELECT * FROM model WHERE `type`='sedan'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
            ?>
            <div class="col-12 col-sm-12 col-md-6 col-lg-4 mt-5" data-aos="zoom-in-up">
                <img src="./assets/photos/<?php echo $row['model_picture'] ?>" class="w-100 object-fit-cover" height="250" alt="">
                <div class="text-center">
                    <h1 class="mt-3"><?php echo $row['name'] ?></h1>
                    <p>от <?php echo $row['price'] ?></p>
                    <a href="./model/?car=<?php echo $row['name'] ?>" class="btn1 bg-dark text-white fw-bold text-decoration-none">Обзор <i class="fa-solid fa-angle-right"></i></a>
                </div>
            </div>
            <?php
              }
            } else {
              echo "<p>Модель еще не доступна!</p>";
            }
            ?>

        </div>

        <div class="row justify-content-center suv">
        <?php
            
            $sql = "SELECT * FROM model WHERE `type`='suv'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
            ?>
            <div class="col-12 col-sm-12 col-md-6 col-lg-4 mt-5">
                <img src="./assets/photos/<?php echo $row['model_picture'] ?>" class="w-100 object-fit-cover" height="250" alt="">
                <div class="text-center">
                    <h1 class="mt-3"><?php echo $row['name'] ?></h1>
                    <p>от <?php echo $row['price'] ?></p>
                    <a href="./model/?car=<?php echo $row['name'] ?>" class="btn1 bg-dark text-white fw-bold text-decoration-none">Обзор <i class="fa-solid fa-angle-right"></i></a>
                </div>
            </div>
            <?php
              }
            } else {
              echo "<p>Модель еще не доступна!</p>";
            }
            ?>

        </div>


        <div class="row justify-content-center ev">
        <?php
            
            $sql = "SELECT * FROM model WHERE `type`='ev'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
            ?>
            <div class="col-12 col-sm-12 col-md-6 col-lg-4 mt-5">
                <img src="./assets/photos/<?php echo $row['model_picture'] ?>" class="w-100 object-fit-cover" height="250" alt="">
                <div class="text-center">
                    <h1 class="mt-3"><?php echo $row['name'] ?></h1>
                    <p>от <?php echo $row['price'] ?></p>
                    <a href="./model/?car=<?php echo $row['name'] ?>" class="btn1 bg-dark text-white fw-bold text-decoration-none">Обзор <i class="fa-solid fa-angle-right"></i></a>
                </div>
            </div>
            <?php
              }
            } else {
              echo "<p>Модель еще не доступна!</p>";
            }
            ?>
        </div>
    </div>
  </section>
  <!-- finish model section -->

  <!-- start dark logo section -->
  <section class="dark-logo-section">
    <div class="container text-center">
        <img src="./assets/images/Logo.png" alt="" data-aos="zoom-out-up">
        <h1 class="text-white fw-bold" data-aos="fade-up" style="font-size: 65px;">HONGQI</h1>
        <h4 class="text-secondary" data-aos="fade-up">Это</h4>
    </div>
  </section>
  <!-- finish dark logo section -->




  <!-- start about page  -->
  <section id="aboutus">
    <div class="container">
        <div class="row mt-5">
            <h1 data-aos="fade-up">История</h1>
            <p data-aos="fade-up">В 1958 году на свет появился автомобиль марки «Hongqi». С тех пор автомобиль «Hongqi» стал государственным транспортным средством для китайских лидеров и крупных национальных мероприятий. В 1960-х и 1970-х годах автомобиль Hongqi был знаменем автомобильной промышленности Китая. После конца 1970-х годов Хунци продолжал двигаться в направлении маркетизации и коммерциализации. В 2018 году бренд Hongqi представил новую стратегию и концепцию дизайна, что привело к росту рыночных продаж и постепенной реализации глобального экспорта.</p>
        </div>
        <div class="row mt-5">
            <h1 data-aos="fade-up">Концепция</h1>
            <p data-aos="fade-up">Концепция бренда Hongqi подчеркивает «новое благородство», «новую изысканность» и «новые чувства» и глубоко интегрирует традиционную восточную культуру с мировой передовой культурой, передовой наукой и технологиями, а также прекрасным эмоциональным опытом для создания превосходных продуктов и услуг.</p>
        </div>
        <div class="row mt-5">
            <h1 data-aos="fade-up">ЯЗЫК ДИЗАЙНА</h1>
            <p data-aos="fade-up">Hongqi выражает и полностью интерпретирует концепцию дизайна «нового благородства и изысканности». В будущем семья Хунци будет использовать этот единый язык дизайна.</p>
        </div>
    </div>
    <div class="about-image mt-5" data-aos="fade-up">
        <img src="./assets/images/acars.jpg" class="w-100" alt="">
    </div>
  </section>
  <!-- finish about page  -->





  <!-- start garantiya -->
  <section>
    <div class="container text-center" data-aos="fade-up">
        <h1 class="fw-bold text-center mt-5 section-title" style="font-size: 65px;">Гарантия <br> <span class="text-primary">5 лет 15 или 150 000 км</span></h1>
        <button class="btn1 bg-dark text-white" style="margin-top: 50px;">О модели <i class="fa-solid fa-bolt"></i></button>
    </div>
  </section>
  <!-- finish garantiya -->



  <!-- start news section -->
  <section style="margin-top: 130px;" id="news">
    <h1 class="fw-bold text-center mt-5 section-title" style="font-size: 55px;" data-aos="fade-up">Последние новости</h1>
    <div class="container">
        <div class="swiper mySwiperNews mt-5">
            <div class="swiper-wrapper">
            <?php
            
            $sql = "SELECT * FROM news";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
            ?>
            <div class="swiper-slide" data-aos="zoom-in-up">
                <div class="col">
                    <img class="w-100 object-fit-cover" height="250" src="./assets/photos/<?php echo $row['url'] ?>" alt="<?php echo $row['url'] ?>">
                    <div class="card-descr p-3" style="background: #F5F5F5;">
                        <p class="text-secondary"><?php echo $row['date'] ?></p>
                        <p class="maxline"><b><?php echo $row['title'] ?></b></p>
                        <a href="./news/?title=<?php echo $row['title']?>" class="mt-3 text-decoration-none">Подробно <i class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>
              </div>
            <?php
              }
            } else {
              echo "<p>новости еще не доступна!</p>";
            }
            ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
  </section>
  <!-- finish news section -->




  <!-- start filals -->
  <section style="margin-top: 130px;" id="branch">
    <h1 class="fw-bold text-center mt-5 section-title" style="font-size: 55px;" data-aos="fade-up">Филиалы</h1>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-lg-5 filial">
            <?php
            
            $sql = "SELECT * FROM branches";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
            ?>
            <h3 data-aos="fade-right" class="mt-2" onclick='changeMap(`<?php echo $row["url"] ?>`)'><?php echo $row['location'] ?></h3>
            <?php
              }
            } else {
              echo "<p>филиалы еще не доступна!</p>";
            }
            ?>
            </div>
            <div class="col-12 col-lg-7 map">
                <iframe data-aos="fade-left" class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1563.9722692253597!2d69.20591796864444!3d41.23211889930348!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38ae61e855615995%3A0x37df4b261b2605f3!2sHongqi%20Uzbekistan!5e0!3m2!1sen!2s!4v1698286246063!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
  </section>
  <!-- finish filals -->



  <!-- start footer -->
  <footer class="mt-5" id="footer">
    <div class="container d-flex flex-column justify-content-center align-items-center mt-5">
        <div class="hr w-100 mt-4">
        <hr style="color: #a3a3a3;">
        </div>
        <div class="footer-img mt-4" data-aos="zoom-out-up">
            <img src="./assets/images/Logo.png" alt="" width="50">
        </div>
        <div class="footer-nav mt-4">
            <div class="row text-center">
                <div class="col-12 col-sm-12 col-md-3 mt-3" style="margin-left: 20px;">
                    <a data-aos="fade-up" href="#" class="text-decoration-none text-black">Главная</a>
                </div>
                <div class="col-12 col-sm-12 col-md-3 mt-3" style="margin-left: 20px;">
                    <a data-aos="fade-up" href="#models" class="text-decoration-none text-black">Модели</a>
                </div>
                <div class="col-12 col-sm-12 col-md-4 mt-3" style="margin-left: 20px;">
                    <a data-aos="fade-up" href="#aboutus" class="text-decoration-none text-black">О нас</a>
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
                    <a data-aos="fade-up" href="#" class="text-black"><?php echo $row['phone'] ?></a>
                </div>
                <div class="col-12 col-sm-12 col-md-4 mt-3">
                    <a data-aos="fade-up" href="#" class="text-black"><?php echo $row['email'] ?></a>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <button class="btn1 bg-dark text-white testDriveBtn">Тест драйв <i class="fa-solid fa-bolt"></i>            </button>
        </div>
        <div class="text-center mt-4 social">
            <a data-aos="fade-up" href="<?php echo $row['youtube'] ?>"><button class="btn1 bg-light text-dark fs-5 mt-2"><i class="fa-brands fa-youtube"></i></button></a>
            <a data-aos="fade-up" href="<?php echo $row['telegram'] ?>"><button class="btn1 bg-light text-dark fs-5 mt-2"><i class="fa-brands fa-telegram"></i></button></a>
            <a data-aos="fade-up" href="<?php echo $row['instagram'] ?>"><button class="btn1 bg-light text-dark fs-5 mt-2"><i class="fa-brands fa-square-instagram"></i></button></a>
            <a data-aos="fade-up" href="<?php echo $row['facebook'] ?>"><button class="btn1 bg-light text-dark fs-5 mt-2"><i class="fa-brands fa-facebook"></i></button></a>
            <a data-aos="fade-up" href="<?php echo $row['whatsapp'] ?>"><button class="btn1 bg-light text-dark fs-5 mt-2"><i class="fa-brands fa-square-whatsapp"></i></button></a>
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




<!-- <script src="./assets/app/lazyload.min.js"></script>

<script>
  var lazyLoadInstance = new LazyLoad({
    elements_selector: ".lazy"
    // ... more custom settings?
  });
</script> -->



<!-- Bootsrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".mySwiper", {
    spaceBetween: 30,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });

  var swiperNews = new Swiper(".mySwiperNews", {
      slidesPerView: 4,
      spaceBetween: 30,
      cssMode: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      mousewheel: true,
      keyboard: true,
      breakpoints: {
        // when window width is >= 320px

        152: {
        slidesPerView: 1,
        spaceBetween: 20
        },
        452: {
        slidesPerView: 2,
        spaceBetween: 20
        },
        // when window width is >= 480px
        769: {
        slidesPerView: 3,
        spaceBetween: 30
        },
        // when window width is >= 640px
        992: {
        slidesPerView: 4,
        spaceBetween: 40
        }
    }
    });

    
</script>

<!-- Main JS -->
<script src="./assets/app/main.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
</body>
</html>