<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');
    
    // Membaca data JSON dari request body
    $input = json_decode(file_get_contents('php://input'), true);
    
    ob_start();

    if (!empty($input['name']) && !empty($input['message'])) {
        $_SESSION['name'] = stripslashes(htmlspecialchars($input['name']));
        $message = stripslashes(htmlspecialchars($input['message']));
        $timestamp = date("Y-m-d H:i:s");
        $cb = fopen("log.html", 'a');
        fwrite($cb, "<div class='msgln'><b>" . $_SESSION['name'] . "</b> [" . $timestamp . "]: " . $message . "<br></div>");
        fclose($cb);

        $output = json_encode(['status' => 'success']);
        ob_end_clean();
        echo $output;
    } else {
        $output = json_encode(['status' => 'error', 'message' => 'Fields cannot be empty']);
        ob_end_clean();
        echo $output;
    }
    exit;
}

function chatForm()
{
    echo '
    <div class="card-body">
        <div class="title-section animation-invisible" data-anim="fade-down">
            <h2>Do\'a & Ucapan</h2>
        </div>
        <div class="guestbook_form_wrapper">
            <form id="chatForm" class="text-center color__button__trans" method="post">
                <div class="mb-3">
                    <input type="text" name="name" placeholder="Nama" value="" class="form-control" id="myName" required/>
                </div>
                <div class="mb-3">
                    <textarea name="message" cols="30" rows="5" placeholder="Tulis do\'a dan ucapanmu" class="form-control" id="myQuotes" required></textarea>
                </div>
                <button type="submit" class="btn btn-custom color-secondary m-auto w-100" name="send" id="kirim_btn">Kirim</button>
            </form>
            <button class="btn btn-custom color-secondary m-auto w-100" data-bs-toggle="modal" data-bs-target="#kado_even" id="kado_btn">Kado</button>
        </div>
    </div>';
}
?>

<html lang="en" style="
    --color-main: #efddc7;
    --color-primary: #fcf6f1;
    --color-secondary: #704a1e;
  ">

<head>  
    <title>
        Selamat datang di pernikahan kami - Arman &amp; Mega - 10
        Agustus 2024
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Vidi &amp; Hening Digital Invitation by Yogiazy" />
    <meta name="robots" content="noindex" />
    <meta name="MobileOptimized" content="320" />
    <meta name="csrf-token" content="Urign8H9AQ1vRPQpaKK4O0hIJMobH2S8fqF9uWtD" />
    <meta name="format-detection" content="telephone=no" />
    <link rel="preconnect" href="https://ik.imagekit.io" />
    <meta property="og:description" content="Ryoogen Media" />
    <meta property="og:type" content="website" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="400" />
    <meta property="og:image:heigth" content="400" />
    <meta name="google" content="notranslate" />
    <script>
        const APP_URL = "https://arelec.site";
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="" />
    <link rel="preconnect" href="https://cdn.jsdelivr.net" />
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&amp;display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://viding.co/invitation/theme_11/css/font.css?v=34207e5a08885eb5e13800481be842e260f4f24e" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/styles.css" />
    <link rel="stylesheet" href="/css/colorpicker.css?v=63264c501e27fd074af87d371a6d9d0d150af1ed" />
    <link rel="stylesheet" href="/css/gift_registry.css?v=4ee13078077ac186c56bc0db2c674627430a64f2" />
    <style type="text/css" id="operaUserStyle"></style>
    <style type="text/css"></style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.8/dist/css/splide.min.css" integrity="sha256-sB1O2oXn5yaSW1T/92q2mGU86IDhZ0j1Ya8eSv+6QfM=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/magnific-popup@1.1.0/dist/magnific-popup.css" />
    <link rel="stylesheet" href="https://unpkg.com/@icon/icofont/icofont.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css" integrity="sha512-DIW4FkYTOxjCqRt7oS9BFO+nVOwDL4bzukDyDtMO7crjUZhwpyrWBFroq+IqRe6VnJkTpRAS6nhDvf0w+wHmxg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .caption {
            margin: 0 20px;
            /* Memberi jarak antara teks dan gambar */
        }
    </style>
    <link rel="stylesheet" href="assets/css/boxicons.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body style="overflow: hidden">
    <div class="main-app color-main">
        <!-- Loader -->
        <div class="loader-wrapper" style="visibility: hidden">
            <img src="" alt="loading" class="spinner" />
        </div>
        <script>
            document.onreadystatechange = () => {
                if (document.readyState !== "complete") {
                    document.querySelector(".loader-wrapper").style.visibility =
                        "hidden";
                } else {
                    document.querySelector(".loader-wrapper").style.visibility =
                        "hidden";
                    runAnimationOrnamentCover();
                }
            };
        </script>

        <!-- progress -->
        <div class="progress"></div>

        <!-- Envelope Section -->
        <section class="cover-section">
            <div class="elements-wrapper-absolute">
                <div class="background-element">
                    <img src="assets/img/element/bg-header.webp" alt="bg-header" class="img-fluid" />
                </div>
                <div class="orn-1">
                    <div class="image-element">
                        <img src="assets/img/element/leaf-1.webp" alt="leaf-1" class="img-fluid animate-loop has-animate" data-anim="rotate-left" data-load-animation="true" />
                    </div>
                </div>
                <div class="orn-2">
                    <div class="image-element">
                        <img src="assets/img/element/leaf-2.webp" alt="leaf-2" class="img-fluid animate-loop has-animate" data-anim="rotate-right" data-load-animation="true" />
                    </div>
                </div>
                <div class="orn-3">
                    <div class="image-element has-animate" data-anim="fade-right" data-load-animation="true">
                        <img src="assets/img/element/bush.webp" alt="bush" class="img-fluid" />
                    </div>
                    <div class="orn-4">
                        <div class="image-element has-animate" data-anim="fade-right" data-anim-duration="1000ms" style="animation-duration: 1000ms" data-load-animation="true">
                            <img src="assets/img/element/flower-1.webp" alt="flower-1" class="img-fluid animate-loop has-animate" data-anim="rotate-left" data-load-animation="true" />
                        </div>
                    </div>
                </div>
                <div class="orn-5">
                    <div class="image-element has-animate" data-anim="fade-left" data-load-animation="true">
                        <img src="assets/img/element/bush.webp" alt="bush" class="img-fluid" />
                    </div>
                    <div class="orn-6">
                        <div class="image-element has-animate" data-anim="fade-right" data-anim-duration="1000ms" style="animation-duration: 1000ms" data-load-animation="true">
                            <img src="assets/img/element/flower-1.webp" alt="flower-1" class="img-fluid animate-loop has-animate" data-anim="rotate-right" data-load-animation="true" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="cover-wrapper">
                    <div class="cover-content">
                        <div class="cover-body">
                            <div class="cover-description has-animate" data-anim="fade" data-load-animation="true">
                                <div class="greeting-wrapper has-animate" data-anim="fade-down" data-load-animation="true"></div>
                                <div class="position-relative">
                                    <p>
                                        Kami mengundang Bpk/Ibu untuk menghadiri pernikahan kami:
                                    </p>
                                </div>
                                <h1 class="title name-main cover_style notranslate">
                                    Arman &amp; Mega
                                </h1>
                                <div class="elements-widget has-animate" data-anim="fade-up" data-load-animation="true">
                                    <div style="
                        display: flex;
                        justify-content: center;
                        align-items: center;
                      ">
                                        <div style="
                          margin-top: 10px;
                          background-color: #f3f0df;
                          border-radius: 10px;
                          padding: 15px;
                          width: 180px;
                          margin-bottom: 20px;
                        ">
                                            <p>Nama Tamu</p>
                                            <p id="namaTamu" style="font-weight: bold; font-size: medium;">Tamu
                                                Undangan</p>
                                        </div>
                                    </div>
                                    <button class="btn btn-custom" id="btn-envelope">
                                        <strong>Buka Undangan <i class="fas fa-envelope-open-text"></i></strong>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Header section -->
        <section class="header-section">
            <div class="music-player playing">
                <div class="play-button">
                    <i class="bx bx-headphone"></i>
                </div>
                <audio id="my-audio">
                    <source src="assets/sound/wedding-song.mp3" type="audio/mpeg" />
                </audio>
            </div>
            <div class="elements-wrapper-absolute">
                <div class="background-element">
                    <img src="assets/img/element/bg-header.webp" alt="bg-header" class="img-fluid" />
                </div>
                <div class="orn-3">
                    <div class="image-element">
                        <img src="assets/img/element/leaf-1.webp" alt="leaf-1" class="img-fluid animate-loop animation-invisible" data-anim="rotate-left" />
                    </div>
                </div>
                <div class="orn-4">
                    <div class="image-element">
                        <img src="assets/img/element/leaf-2.webp" alt="leaf-2" class="img-fluid animate-loop animation-invisible" data-anim="rotate-right" />
                    </div>
                </div>
                <div class="orn-5">
                    <div class="image-element animation-invisible" data-anim="fade-right">
                        <img src="assets/img/element/tree-1.webp" alt="tree-1" class="img-fluid animate-loop animation-invisible" data-anim="rotate-left" />
                    </div>
                </div>
                <div class="orn-6">
                    <div class="image-element animation-invisible" data-anim="fade-left">
                        <img src="assets/img/element/tree-2.webp" alt="tree-2" class="img-fluid animate-loop animation-invisible" data-anim="rotate-right" />
                    </div>
                </div>
                <div class="orn-1">
                    <div class="orn-2">
                        <div class="image-element">
                            <img src="" alt="crowd" class="img-fluid animation-invisible" data-anim="crowd" />
                        </div>
                    </div>
                    <div class="image-element">
                        <img src="assets/img/element/hill.webp" alt="hill" class="img-fluid" />
                    </div>
                </div>
                <div class="orn-7">
                    <div class="image-element animation-invisible" data-anim="fade-right">
                        <img src="assets/img/element/bush.webp" alt="bush" class="img-fluid" />
                    </div>
                    <div class="orn-8">
                        <div class="image-element animation-invisible" data-anim="fade-right" data-anim-duration="1000ms">
                            <img src="assets/img/element/flower-1.webp" alt="flower-1" class="img-fluid animate-loop animation-invisible" data-anim="rotate-left" />
                        </div>
                    </div>
                </div>
                <div class="orn-9">
                    <div class="image-element animation-invisible" data-anim="fade-left">
                        <img src="assets/img/element/bush.webp" alt="bush" class="img-fluid" />
                    </div>
                    <div class="orn-10">
                        <div class="image-element animation-invisible" data-anim="fade-left" data-anim-duration="1000ms">
                            <img src="assets/img/element/flower-1.webp" alt="flower-1" class="img-fluid animate-loop animation-invisible" data-anim="rotate-right" />
                        </div>
                    </div>
                    <div class="orn-11">
                        <div class="image-element animation-invisible" data-anim="fade-right" data-anim-duration="1000ms">
                            <img src="assets/img/element/flower-1.webp" alt="flower-1" class="img-fluid animate-loop animation-invisible" data-anim="rotate-left" />
                        </div>
                    </div>
                </div>
                <div class="orn-12">
                    <div class="image-element">
                        <img src="assets/img/element/butterfly.webp" alt="butterfly" class="img-fluid animate-loop animation-invisible" data-anim="butterfly" />
                    </div>
                </div>
                <div class="orn-13">
                    <div class="image-element">
                        <img src="assets/img/element/butterfly.webp" alt="butterfly" class="img-fluid animate-loop animation-invisible" data-anim="butterfly" />
                    </div>
                </div>
                <div class="orn-14">
                    <div class="image-element">
                        <img src="assets/img/element/butterfly.webp" alt="butterfly" class="img-fluid animate-loop animation-invisible" data-anim="butterfly" />
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="header-content">
                            <div class="header">
                                <div class="header-title">
                                    <div class="header-title-content" style="padding-top: 100px">
                                        <h1 class="title mb-3 main_style notranslate animation-invisible" data-anim="fade">
                                            Arman <br />
                                            <span>&amp;</span> <br />
                                            Mega
                                        </h1>
                                        <div class="scroll-icon pt-5">
                                            <svg data-anim="slide-up" width="28" height="42" viewBox="0 0 28 42" fill="none" xmlns="http://www.w3.org/2000/svg" class="animation-invisible">
                                                <rect opacity="0.6" x="0.5" y="0.5" width="27" height="41" rx="13.5" stroke="#757346"></rect>
                                                <rect id="scroll-animate" opacity="0.6" x="12" y="6.66699" width="4" height="9.33333" rx="2" fill="#A79E74"></rect>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="reminder-content mt-5">
                                        <div class="countdown animation-invisible" date="08/10/2024 01:00:00 UTC" data-anim="fade">
                                            <div class="days">
                                                <p class="angka">213</p>
                                                <p class="huruf">Days</p>
                                            </div>
                                            <div class="hours">
                                                <p class="angka">20</p>
                                                <p class="huruf">Hours</p>
                                            </div>
                                            <div class="minutes">
                                                <p class="angka">0</p>
                                                <p class="huruf">Mins</p>
                                            </div>
                                            <div class="seconds">
                                                <p class="angka">45</p>
                                                <p class="huruf">Secs</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="moveable_section_wrapper position-relative">
            <section class="couple-section moveable-section" data-id="1">
                <div class="reminder-wrap">
                    <div class="elements-wrapper-absolute overflow-hidden">
                        <div class="background-element">
                            <img src="assets/img/element/bg-couple.webp" alt="bg-couple" />
                        </div>
                        <div class="orn-1">
                            <div class="image-element">
                                <img src="assets/img/element/leaf-2.webp" alt="leaf-2" class="img-fluid animate-loop animation-invisible" data-anim="rotate-left" />
                            </div>
                        </div>
                        <div class="orn-2">
                            <div class="image-element">
                                <img src="assets/img/element/tree-2.webp" alt="tree-2" class="img-fluid animate-loop animation-invisible" data-anim="rotate-right" />
                            </div>
                            <div class="orn-7">
                                <div class="image-element">
                                    <img src="assets/img/element/butterfly.webp" alt="butterfly" class="img-fluid animate-loop animation-invisible" data-anim="butterfly" />
                                </div>
                            </div>
                        </div>
                        <div class="orn-3">
                            <div class="image-element">
                                <img src="assets/img/element/bush.webp" alt="bush" class="img-fluid" />
                            </div>
                            <div class="orn-4">
                                <div class="image-element">
                                    <img src="assets/img/element/flower-1.webp" alt="flower-1" class="img-fluid animate-loop animation-invisible" data-anim="rotate-left" />
                                </div>
                            </div>
                        </div>
                        <div class="orn-5">
                            <div class="image-element">
                                <img src="assets/img/element/bush.webp" alt="bush" class="img-fluid" />
                            </div>
                            <div class="orn-6">
                                <div class="image-element">
                                    <img src="assets/img/element/flower-1.webp" alt="flower-1" class="img-fluid animate-loop animation-invisible" data-anim="rotate-left" data-anim-duration="1000ms" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container position-relative">
                        <div class="row justify-content-center">
                            <div class="col-md-10 text-center position-relative">
                                <div class="couple-content">
                                    <div class="couple-content-body color-primary">
                                        <div class="col-md-8">
                                            <div class="title-section animation-invisible" data-anim="fade-down">
                                                <h2>Bersatu dan Menyatu</h2>
                                            </div>
                                            <div class="position-relative animation-invisible" data-anim="fade-up">
                                                <p>
                                                    Kami, dengan penuh kebahagiaan, mengundang
                                                    Bapak/Ibu/Saudara/i sekalian untuk menghadiri hari
                                                    istimewa kami. Kehadiran dan doa restu dari
                                                    Bapak/Ibu/Saudara/i akan menambah kebahagiaan di
                                                    hari spesial kami ini.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="image-wrapper">
                                        <img data-src="assets/img/DSC07630.jpg" alt="couple-background" class="couple-background ls-is-cached lazyloaded" src="assets/img/DSC07630.jpg" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="couple-wrapper">
                    <div class="couple-body">
                        <div class="couple">
                            <div class="image-wrap man">
                                <div class="image-element">
                                    <img src="assets/img/2.webp" alt="couple" class="couple-image man" />
                                </div>
                            </div>
                            <div class="orn-1">
                                <div class="image-element">
                                    <img src="assets/img/element/leaf-1.webp" alt="leaf-1" class="img-fluid animate-loop animation-invisible" data-anim="rotate-left" />
                                </div>
                            </div>
                            <div class="couple-description">
                                <h3 class="bride_style notranslate animation-invisible" data-anim="slide-right">
                                    Arman
                                </h3>
                                <div class="couple-parent animation-invisible" data-anim="zoom-out">
                                    <div class="couple-parent-description">
                                        <p style="margin-bottom: 0px">Putra dari</p>
                                    </div>

                                    <div class="couple-parent-name">
                                        <p class="notranslate" style="margin-bottom: 0px">
                                            Bpk Dalle
                                        </p>
                                        <p style="margin-bottom: 0px">&amp;</p>
                                        <p class="notranslate" style="margin-bottom: 0px">
                                            Ibu Sumarti
                                        </p>
                                    </div>
                                </div>
                                <div class="sosmed-wrap mt-3">
                                    <a href="https://www.instagram.com/armandahlanarman/" class="sosmed color-secondary notranslate" target="_blank">
                                        <small><i class="fab fa-instagram"></i></small>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="couple">
                            <div class="image-wrap woman">
                                <div class="image-element">
                                    <img src="assets/img/3.webp" alt="couple" class="couple-image women" />
                                </div>
                            </div>
                            <div class="orn-2">
                                <div class="image-element">
                                    <img src="assets/img/element/leaf-1.webp" alt="leaf-1" class="img-fluid animate-loop animation-invisible" data-anim="rotate-left" data-anim-duration="1000ms" />
                                </div>
                            </div>
                            <div class="couple-description">
                                <h3 class="bride_style notranslate animation-invisible" data-anim="slide-right">
                                    IMEGA ANANDA ISMAIL, A. Md. T
                                </h3>
                                <div class="couple-parent animation-invisible" data-anim="zoom-out">
                                    <div class="couple-parent-description">
                                        <p style="margin-bottom: 0px">Putri dari</p>
                                    </div>

                                    <div class="couple-parent-name">
                                        <p class="notranslate" style="margin-bottom: 0px">
                                            Bpk Ismail
                                        </p>
                                        <p style="margin-bottom: 0px">&amp;</p>
                                        <p class="notranslate" style="margin-bottom: 0px">
                                            Ibu Ella
                                        </p>
                                    </div>
                                </div>
                                <div class="sosmed-wrap mt-3">
                                    <a href="https://www.instagram.com/armandahlanarman/" class="sosmed color-secondary notranslate" target="_blank">
                                        <small><i class="fab fa-instagram"></i></small>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="story-section moveable-section" data-id="2">
                <div class="story">
                    <div class="elements-wrapper-absolute">
                        <div class="background-element">
                            <img src="assets/img/element/bg-couple.webp" alt="bg-couple" />
                        </div>
                        <div class="orn-1">
                            <div class="image-element">
                                <img src="assets/img/element/leaf-2.webp" alt="leaf-2" class="img-fluid animate-loop animation-invisible" data-anim="rotate-left" data-anim-duration="1000ms" />
                            </div>
                        </div>
                        <div class="orn-2">
                            <div class="image-element">
                                <img src="assets/img/element/flower-1.webp" alt="flower-1" class="img-fluid animate-loop animation-invisible" data-anim="rotate-left" />
                            </div>
                        </div>
                        <div class="orn-3">
                            <div class="image-element">
                                <img src="assets/img/element/butterfly.webp" alt="butterfly" class="img-fluid animate-loop animation-invisible" data-anim="butterfly" />
                            </div>
                        </div>
                    </div>
                    <div class="container position-relative">
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <div class="story-content">
                                    <div class="image-wrapper">
                                        <div class="image-element">
                                            <img src="assets/img/4.jpg" alt="story-background" class="story-background lazyload" />
                                        </div>
                                    </div>
                                    <div class="story-description color-primary">
                                        <div class="col-md-12 mx-auto">
                                            <div class="title-section animation-invisible" data-anim="fade-down">
                                                <h2 class="text-center">
                                                    Dan Begitulah Semua Ini Terjadi
                                                </h2>
                                            </div>
                                            <div class="position-relative animation-invisible" data-anim="fade-up">
                                                <p>
                                                    <em>Sesekali dunia ini terasa membosankan dan tak ada
                                                        yang lebih menarik daripada menjadi pemurung dan
                                                        menarik diri dari dunia. Tetapi setelah ini
                                                        barangkali kami bisa berencana tentang hal-hal
                                                        besar dan kecil, untuk hari-hari yang akan datang
                                                        dan masa depan yang tak melulu baik. Sebab
                                                        akhirnya kehidupan terus berjalan dan kami kini
                                                        dapat melakukannya bersama-sama—begitu seterusnya,
                                                        sampai setua tubuh mengizinkan.</em>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="gallery-section moveable-section" data-id="3">
                <div class="container text-center">
                    <div class="d-flex justify-content-center align-items-center mb-4">
                        <img src="assets/img/element/leaves-left.png" width="80" class="d-none d-sm-block">
                        <h2 class="caption text-4xl my-0 mx-5">Our Gallery</h2>
                        <img src="assets/img/element/leaves-right.png" width="80" class="d-none d-sm-block">
                    </div>
                </div>
                <div class="gallery-default">
                    <div class="zoom-gallery-default">
                        <a href="assets/img/gallery/1.webp" data-anim="flip-left">
                            <img src="assets/img/gallery/2.webp" alt="photo" class="photo lazyload" />
                        </a>
                        <a href="assets/img/gallery/2.webp" data-anim="flip-left">
                            <img src="assets/img/gallery/2.webp" alt="photo" class="photo lazyload" />
                        </a>
                        <a href="assets/img/3.webp" data-anim="flip-left">
                            <img src="assets/img/gallery/3.webp" alt="photo" class="photo lazyload" />
                        </a>
                        <a href="assets/img/4.webp" data-anim="flip-left">
                            <img src="assets/img/gallery/4.webp" alt="photo" class="photo lazyload" />
                        </a>
                        <a href="assets/img/5.webp" data-anim="flip-left">
                            <img src="assets/img/gallery/5.webp" alt="photo" class="photo lazyload" />
                        </a>
                    </div>
                </div>
            </section>

            <section class="moveable-section" data-id="4">
                <!-- Vanue & Event section -->
                <section class="venue-section">
                    <div class="orn-1">
                        <div class="image-element animation-invisible" data-anim="fade-left">
                            <img src="assets/img/element/tree-2.webp" alt="tree-2" class="img-fluid animate-loop animation-invisible" data-anim="rotate-left" />
                        </div>
                    </div>
                    <div class="orn-2">
                        <div class="image-element animation-invisible" data-anim="fade-left">
                            <img src="assets/img/element/leaf-2.webp" alt="leaf-2" class="img-fluid animate-loop animation-invisible" data-anim="rotate-left" />
                        </div>
                    </div>
                    <div class="venue-wrapper">
                        <div class="container position-relative">
                            <div class="row justify-content-start">
                                <div class="col-md-8 col-lg-6 col-xl-5 position-relative">
                                    <div class="venue-description">
                                        <div class="title-section animation-invisible" data-anim="fade-down">
                                            <h2>Lokasi</h2>
                                        </div>
                                        <div data-anim="fade-up" class="animation-invisible">
                                            <p>
                                                Dengan penuh rasa hormat kami mengharapkan kehadiran
                                                Bapak/Ibu/Saudara sekalian pada Acara Pernikahan kami
                                                yang akan kami laksanakan pada :
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="venue-content">
                            <div class="container">
                                <div class="row justify-content-center row-venue">
                                    <div class="col-md-6 position-relative">
                                        <div class="card">
                                            <div class="elements-wrapper-absolute">
                                                <div class="background-element">
                                                    <img src="assets/img/element/bg-card-venue.webp" alt="bg-card-venue" />
                                                </div>
                                            </div>
                                            <div class="card-body animation-invisible" data-anim="fade-right">
                                                <div class="event-name">
                                                    <h4>Akad Nikah</h4>
                                                    <hr />
                                                    <p>Sabtu</p>
                                                    <div class="date">
                                                        <p>10 Agustus 2024</p>
                                                    </div>
                                                    <p>10:00 WITA S/d Selesai</p>
                                                </div>
                                                <div class="event-place color-primary">
                                                    <div class="ribbon-venue" data-animationloop="keyframe">
                                                        <div>
                                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 560 560" style="
                                    enable-background: new 0 0 560 560;
                                    overflow: visible;
                                  " xml:space="preserve">
                                                                <g id="Layer_1"></g>
                                                                <g id="Layer_3">
                                                                    <g>
                                                                        <g>
                                                                            <path class="st0" d="M273.3,48.3c34.1,0,66.1,13.3,90.3,37.4c24.1,24.1,37.4,56.2,37.4,90.3c0,93.4-63.7,165.3-105.8,212.8c-4.4,4.9-8.5,9.6-12.3,14c-2.9,3.4-6.3,5.2-9.5,5.2c-4.1,0-7.4-2.8-9.4-5.2c-4.6-5.3-9.4-10.7-14.5-16.5c-20.4-23-43.5-49.1-63-80c-22.1-35-34.9-69.1-39.2-104.3c-4.8-39.7,6.8-79.6,31.9-109.4c22.5-26.7,53.5-42.4,87.3-44.2C268.7,48.4,271.1,48.3,273.3,48.3 M273.3,29.3c-2.6,0-5.2,0.1-7.8,0.2c-87.5,4.6-147.7,87.9-137.1,174.9c11.7,96.3,80.1,163.3,121.1,210.8c6.8,7.8,15.3,11.8,23.8,11.8c8.6,0,17.1-3.9,23.9-11.8C338.4,367.6,420,286.7,420,176C420,95,354.3,29.3,273.3,29.3L273.3,29.3z">
                                                                            </path>
                                                                        </g>
                                                                        <g>
                                                                            <path class="st0" d="M275.1,118c30.6,0,55.5,24.9,55.5,55.5S305.7,229,275.1,229s-55.5-24.9-55.5-55.5S244.5,118,275.1,118 M275.1,99c-41.1,0-74.5,33.3-74.5,74.5S234,248,275.1,248s74.5-33.3,74.5-74.5S316.2,99,275.1,99L275.1,99z">
                                                                            </path>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                                <g id="Layer_2">
                                                                    <ellipse class="st1" cx="272.8" cy="437.9" rx="146.4" ry="40.9"></ellipse>
                                                                    <ellipse class="st0 dot" cx="273.6" cy="437.9" rx="63.1" ry="17"></ellipse>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <h4 class="notranslate">HOTEL GRAND TOWN MAKASSAR</h4>
                                                    <span class="notranslate">Jl. Pengayoman, Depan Toko Grand
                                                        Toserba(Pasar Segar)</span>
                                                </div>
                                                <div class="widget-elements">
                                                    <a class="btn btn-custom color-secondary" aria-label="button maps" href="https://maps.app.goo.gl/yDop7oXxh5A8Rgm8A">Google Maps</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 position-relative">
                                        <div class="card">
                                            <div class="elements-wrapper-absolute">
                                                <div class="background-element">
                                                    <img src="assets/img/element/bg-card-venue.webp" alt="bg-card-venue" />
                                                </div>
                                            </div>
                                            <div class="card-body animation-invisible" data-anim="fade-right">

                                                <div class="event-name" style="padding-top: 20px">
                                                    <h4>Resepsi</h4>
                                                    <hr />
                                                    <p>Sabtu</p>
                                                    <div class="date">
                                                        <p>10 Agustus 2024</p>
                                                    </div>
                                                    <p>13:00 WITA S/d Selesai</p>
                                                    <p>PESTA MALAM</p>
                                                </div>
                                                <div class="event-place color-primary">
                                                    <div class="ribbon-venue" data-animationloop="keyframe">
                                                        <div>
                                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 560 560" style="
                                    enable-background: new 0 0 560 560;
                                    overflow: visible;
                                  " xml:space="preserve">
                                                                <g id="Layer_1"></g>
                                                                <g id="Layer_3">
                                                                    <g>
                                                                        <g>
                                                                            <path class="st0" d="M273.3,48.3c34.1,0,66.1,13.3,90.3,37.4c24.1,24.1,37.4,56.2,37.4,90.3c0,93.4-63.7,165.3-105.8,212.8c-4.4,4.9-8.5,9.6-12.3,14c-2.9,3.4-6.3,5.2-9.5,5.2c-4.1,0-7.4-2.8-9.4-5.2c-4.6-5.3-9.4-10.7-14.5-16.5c-20.4-23-43.5-49.1-63-80c-22.1-35-34.9-69.1-39.2-104.3c-4.8-39.7,6.8-79.6,31.9-109.4c22.5-26.7,53.5-42.4,87.3-44.2C268.7,48.4,271.1,48.3,273.3,48.3 M273.3,29.3c-2.6,0-5.2,0.1-7.8,0.2c-87.5,4.6-147.7,87.9-137.1,174.9c11.7,96.3,80.1,163.3,121.1,210.8c6.8,7.8,15.3,11.8,23.8,11.8c8.6,0,17.1-3.9,23.9-11.8C338.4,367.6,420,286.7,420,176C420,95,354.3,29.3,273.3,29.3L273.3,29.3z">
                                                                            </path>
                                                                        </g>
                                                                        <g>
                                                                            <path class="st0" d="M275.1,118c30.6,0,55.5,24.9,55.5,55.5S305.7,229,275.1,229s-55.5-24.9-55.5-55.5S244.5,118,275.1,118 M275.1,99c-41.1,0-74.5,33.3-74.5,74.5S234,248,275.1,248s74.5-33.3,74.5-74.5S316.2,99,275.1,99L275.1,99z">
                                                                            </path>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                                <g id="Layer_2">
                                                                    <ellipse class="st1" cx="272.8" cy="437.9" rx="146.4" ry="40.9"></ellipse>
                                                                    <ellipse class="st0 dot" cx="273.6" cy="437.9" rx="63.1" ry="17"></ellipse>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <h4 class="notranslate">Rumah Mempelai Pria</h4>
                                                    <span class="notranslate">Lorong Pongka 2, </span>Jl.Pajjaiang
                                                    No.19, Sudiang Raya, Kec.Biringkanaya, Kota Makassar
                                                    </span>
                                                </div>
                                                <div class="widget-elements">
                                                    <a class="btn btn-custom color-secondary" aria-label="button maps" href="https://maps.app.goo.gl/pwL7GoQDegkzeQEg8">Google Maps</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
            <section class="wishes-section moveable-section" data-id="6">
                <div class="wishes-form-wrapper">
                    <div class="elements-wrapper-absolute">
                        <div class="background-element">
                            <img src="assets/img/element/bg-header.webp" alt="bg-header" />
                        </div>
                        <div class="orn-1">
                            <div class="image-element">
                                <img src="assets/img/element/leaf-2.webp" alt="leaf-2" class="img-fluid animate-loop animation-invisible" data-anim="rotate-left" data-anim-duration="1000ms" />
                            </div>
                        </div>
                        <div class="orn-2">
                            <div class="image-element">
                                <img src="assets/img/element/tree-1.webp" alt="tree-1" class="img-fluid animate-loop animation-invisible" data-anim="rotate-left" data-anim-duration="1000ms" />
                            </div>
                        </div>
                        <div class="orn-3">
                            <div class="image-element">
                                <img src="assets/img/element/tree-2.webp" alt="tree-2" class="img-fluid animate-loop animation-invisible" data-anim="rotate-right" data-anim-duration="1000ms" />
                            </div>
                        </div>
                    </div>
                    <div class="container position-relative">
                        <div class="row justify-content-center align-items-center flex-column">
                            <div class="col-md-8 col-lg-6 position-relative" style="z-index: 3">
                                <div class="card card-form">
                                    <?php chatForm(); ?>
                                    <div id="menu">
                                        <div style="clear: both"></div>
                                    </div>
                                    <div id="chatbox">
                                        <?php
                                        if (file_exists("log.html") && filesize("log.html") > 0) {
                                            $handle = fopen("log.html", "r");
                                            $contents = fread($handle, filesize("log.html"));
                                            fclose($handle);
                                            echo $contents;
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wishes-preview">
                    <div class="orn-4">
                        <div class="image-element">
                            <img src="assets/img/element/flower-1.webp" alt="flower-1" class="img-fluid animate-loop animation-invisible" data-anim="rotate-left" />
                        </div>
                    </div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-6">
                                <div class="card">
                                    <div class="card-body text-left">
                                        <div id="doaUcapan">
                                            <div class="wishes" data-anim="zoom-in-up" id="ucapanTamu">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="apology-section moveable-section" data-id="7">
                <div class="orn-1">
                    <div class="image-element">
                        <img src="assets/img/element/flower-1.webp" alt="flower-1" class="img-fluid animate-loop animation-invisible" data-anim="rotate-left" data-anim-duration="1000ms" />
                    </div>
                </div>
                <div class="orn-2">
                    <div class="image-element">
                        <img src="assets/img/element/leaf-1.webp" alt="leaf-1" class="img-fluid animate-loop animation-invisible" data-anim="rotate-left" />
                    </div>
                </div>
                <div class="container position-relative">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-10 text-center position-relative">
                            <div class="appology-wrap">
                                <div class="title-section animation-invisible" data-anim="fade-down">
                                    <h2>Pangestunipun</h2>
                                </div>
                                <div class="col-md-10 m-auto col-10 animation-invisible" data-anim="fade-up">
                                    <div class="mb-0">
                                        <p>
                                            Tanpa mengurangi rasa hormat, Izinkan kami mengharapkan
                                            kehadiran Bapak/lbu/Saudara/i melalui undangan digital
                                            ini, serta dapat memberikan doa restu kepada kami.
                                        </p>
                                        <p>Terima kasih.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="thank-section moveable-section" data-id="9">
                <div class="thank-wrapper">
                    <div class="elements-wrapper-absolute">
                        <div class="background-element">
                            <img src="assets/img/element/bg-header.webp" alt="bg-header" class="img-fluid" />
                        </div>
                        <div class="orn-3">
                            <div class="image-element">
                                <img src="assets/img/element/leaf-1.webp" alt="leaf-1" class="img-fluid animate-loop animation-invisible" data-anim="rotate-left" />
                            </div>
                        </div>
                        <div class="orn-4">
                            <div class="image-element">
                                <img src="assets/img/element/leaf-2.webp" alt="leaf-2" class="img-fluid animate-loop animation-invisible" data-anim="rotate-right" />
                            </div>
                        </div>
                        <div class="orn-5">
                            <div class="image-element animation-invisible" data-anim="fade-right">
                                <img src="assets/img/element/tree-1.webp" alt="tree-1" class="img-fluid animate-loop animation-invisible" data-anim="rotate-left" />
                            </div>
                        </div>
                        <div class="orn-6">
                            <div class="image-element animation-invisible" data-anim="fade-left">
                                <img src="assets/img/element/tree-2.webp" alt="tree-2" class="img-fluid animate-loop animation-invisible" data-anim="rotate-right" />
                            </div>
                        </div>
                        <div class="orn-1">
                            <div class="orn-2">
                                <div class="image-element">
                                    <img src="" alt="crowd" class="img-fluid animation-invisible" data-anim="crowd" />
                                </div>
                            </div>
                            <div class="image-element">
                                <img src="assets/img/element/hill.webp" alt="hill" class="img-fluid" />
                            </div>
                        </div>
                        <div class="orn-7">
                            <div class="image-element animation-invisible" data-anim="fade-right">
                                <img src="assets/img/element/bush.webp" alt="bush" class="img-fluid" />
                            </div>
                            <div class="orn-8">
                                <div class="image-element animation-invisible" data-anim="fade-right" data-anim-duration="1000ms">
                                    <img src="assets/img/element/flower-1.webp" alt="flower-1" class="img-fluid animate-loop animation-invisible" data-anim="rotate-left" />
                                </div>
                            </div>
                        </div>
                        <div class="orn-9">
                            <div class="image-element animation-invisible" data-anim="fade-left">
                                <img src="assets/img/element/bush.webp" alt="bush" class="img-fluid" />
                            </div>
                            <div class="orn-10">
                                <div class="image-element animation-invisible" data-anim="fade-left" data-anim-duration="1000ms">
                                    <img src="assets/img/element/flower-1.webp" alt="flower-1" class="img-fluid animate-loop animation-invisible" data-anim="rotate-left" />
                                </div>
                            </div>
                            <div class="orn-11">
                                <div class="image-element animation-invisible" data-anim="fade-right" data-anim-duration="1000ms">
                                    <img src="assets/img/element/flower-1.webp" alt="flower-1" class="img-fluid animate-loop animation-invisible" data-anim="rotate-right" data-anim-duration="1000ms" />
                                </div>
                            </div>
                        </div>
                        <div class="orn-12">
                            <div class="image-element">
                                <img src="assets/img/element/butterfly.webp" alt="butterfly" class="img-fluid animate-loop animation-invisible" data-anim="butterfly" />
                            </div>
                        </div>
                        <div class="orn-13">
                            <div class="image-element">
                                <img src="assets/img/element/butterfly.webp" alt="butterfly" class="img-fluid animate-loop animation-invisible" data-anim="butterfly" />
                            </div>
                        </div>
                        <div class="orn-14">
                            <div class="image-element">
                                <img src="assets/img/element/butterfly.webp" alt="butterfly" class="img-fluid animate-loop animation-invisible" data-anim="butterfly" />
                            </div>
                        </div>
                    </div>
                    <div class="container position-relative">
                        <div class="row justify-content-center">
                            <div class="col-md-10 position-relative">
                                <div class="thank color-primary">
                                    <div class="image-wrapper">
                                        <div class="image-element">
                                            <img src="assets/img/5.webp" alt="thank-background" class="thank-background lazyload" />
                                        </div>
                                    </div>
                                    <div class="thank-body">
                                        <div class="title-section animation-invisible" data-anim="fade-down">
                                            <h2>Terimakasih</h2>
                                        </div>
                                        <div data-anim="zoom-in" class="animation-invisible">
                                            <p>
                                                Kami mengucapkan terimakasih kepada Bapak/Ibu/Saudara
                                                yang telah menghadiri seluruh rangkaian acara
                                                pernikahan kami. Semoga waktu yang diberikan oleh
                                                Bapak/Ibu/Saudara sekalian menjadi berkah dan manfaat
                                                yang kelak dibalas oleh Tuhan Yang Maha Esa. Terima
                                                kasih atas seluruh ucapan yang diberikan. Semoga kami
                                                menjadi pasangan yang berbahagia dunia dan akhirat :)
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <div class="modal fade show-maps" id="kado_even" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button type="button" class="btn-modal" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-xmark"></i>
                    </button>
                    <div class="modal-actions" style="margin-bottom: 40px">
                        <h2>Kado Pernikahan</h2>
                    </div>
                    <div style="
                display: flex;
                justify-content: center;
                align-items: center;
              ">
                        <div style="display: block; justify-content: center; width: 300px">
                            <div style="
                    display: flex;
                    justify-content: start;
                    align-items: center;
                    margin-bottom: 5px;
                    width: 100%;
                  ">
                                <p style="margin-right: 10px">Nama Bank:</p>
                                <p style="
                      background-color: white;
                      border: solid;
                      border-width: 2px;
                      border-radius: 10px;
                      padding: 5px;
                      padding-inline: 15px;
                    ">
                                    Bank BCA
                                </p>
                            </div>
                            <div style="
                    display: flex;
                    justify-content: start;
                    align-items: center;
                    margin-bottom: 5px;
                    width: 100%;
                  ">
                                <p style="margin-right: 10px">Nama Rekening:</p>
                                <p style="
                      background-color: white;
                      border: solid;
                      border-width: 2px;
                      border-radius: 10px;
                      padding: 5px;
                      padding-inline: 15px;
                    ">
                                    Arman
                                </p>
                            </div>
                            <div style="
                    display: flex;
                    justify-content: start;
                    align-items: center;
                    margin-bottom: 5px;
                    width: 100%;
                  ">
                                <p style="margin-right: 10px">No. Rekening:</p>
                                <p style="
                      background-color: white;
                      border: solid;
                      border-width: 2px;
                      border-radius: 10px;
                      padding: 5px;
                      padding-inline: 15px;
                    " id="no_rekening">
                                    3930993548
                                </p>
                            </div>
                            <div style="
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    margin-bottom: 5px;
                    width: 100%;
                  ">
                                <button type="buttton" class="btn btn-custom color-secondary m-auto w-100 mb-3" id="salin_btn">
                                    Salin No. Rekening
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <svg style="position: absolute; pointer-events: none" width="0" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1">
        <defs>
            <clipPath id="wishes-polygon" clipPathUnits="objectBoundingBox">
                <polygon points="0 0, 1 1, 1 0"></polygon>
            </clipPath>
        </defs>
    </svg>

    <!-- script libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/Flip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.2.2/lazysizes.min.js" async integrity="sha512-q583ppKrCRc7N5O0n2nzUiJ+suUv7Et1JGels4bXOaMFQcamPk9HjdUknZuuFjBNs7tsMuadge5k9RzdmO+1GQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            function loadLog() {
                var oldscrollHeight = $("#chatbox")[0].scrollHeight - 20;
                $.ajax({
                    url: "log.html",
                    cache: false,
                    success: function(html) {
                        $("#chatbox").html(html);
                        var newscrollHeight = $("#chatbox")[0].scrollHeight - 20;
                        if (newscrollHeight > oldscrollHeight) {
                            $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal');
                        }
                    },
                    error: function() {
                        console.error("Error loading chat log");
                    }
                });
            }

            setInterval(loadLog, 2500);

            $("#chatForm").submit(function(e) {
                e.preventDefault(); // Prevent the form from submitting normally
                var formData = {
                    name: $('#myName').val(),
                    message: $('#myQuotes').val()
                };

                $.ajax({
                    url: "index.php",
                    type: "POST",
                    data: JSON.stringify(formData),
                    contentType: "application/json",
                    dataType: "json",
                    success: function(response) {
                        if (response.status === 'success') {
                            $('#myName').val('');
                            $('#myQuotes').val('');
                            loadLog(); // Reload chat log after successful submission
                        } else {
                            alert(response.message); // Show error message if any
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX error:", status, error);
                        console.log(xhr.responseText); // Log the response text for debugging
                        alert("There was an error sending the message. Please try again.");
                    }
                });
            });
        });
    </script>
    <style>
        input.error,
        select.error {
            margin-bottom: 0px !important;
        }

        label.error {
            display: block;
            width: 100%;
            margin-bottom: 0.5rem;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
    <script>
        $("#formGift").validate({
            submitHandler: function(form) {
                form.submit();
            },
        });
    </script>
    <script>
        var player;
        var player2;
        var gallery_player = document.getElementById("gallery_player");
        var livestream_player = document.getElementById("livestream_player");
        var livestream_player_sm = document.getElementById(
            "livestream_player_small"
        );
        var audio = document.getElementById("audio_file");
        var play_pause_btn = document.getElementById("musicControl");

        function onYouTubeIframeAPIReady() {
            if (gallery_player) {
                player = new YT.Player("gallery_player", {
                    height: "390",
                    width: "640",
                    videoId: "SzPrFMFqFwM",
                    events: {
                        onStateChange: onPlayerStateChange,
                    },
                });
            }

            if (livestream_player) {
                player2 = new YT.Player("livestream_player", {
                    height: "390",
                    width: "640",
                    videoId: "SzPrFMFqFwM",
                    events: {
                        onStateChange: onPlayerStateChange,
                    },
                });
            }

            if (livestream_player_sm) {
                player2 = new YT.Player("livestream_player_small", {
                    height: "390",
                    width: "640",
                    videoId: "SzPrFMFqFwM",
                    events: {
                        onStateChange: onPlayerStateChange,
                    },
                });
            }
        }

        function onPlayerStateChange(event) {
            if (event.data == YT.PlayerState.PLAYING) {
                if (audio) {
                    if (audio.duration > 0 && !audio.paused) {
                        console.log("Music Paused");
                        play_pause_btn.click();
                    }
                }

                if (sound) {
                    if (sound.playing()) {
                        play_pause_btn.click();
                    }
                }
            }
        }

        function loadYT() {
            var tag = document.createElement("script");
            tag.src = "https://www.youtube.com/iframe_api";
            var firstScriptTag = document.getElementsByTagName("script")[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
            console.log("loading youtube iframe");
        }

        $("#closeEnvelope, #btn-envelope, #btn-cover").on("click", function() {
            loadYT();
        });
    </script>

    <!-- scripts plugins -->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="/js/colorpicker.min.js?v=e4e0a438c01838272acbfb4f2b4d1232cbe44709"></script>
    <script src="/js/gift_registry_script.js?v=9bc1b0252ca518352d0e81960c9f47e69fdf9f17"></script>

    <!-- scripts custom -->
    <script src="assets/js/countdown.js"></script>
    <script src="assets/js/app.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const btnOpenAngpao = document.querySelector("#openAngpao");
            const formAngpao = document.querySelector("#formGift");

            if (btnOpenAngpao) {
                btnOpenAngpao.addEventListener("click", () => {
                    formAngpao.classList.remove("d-none");
                    btnOpenAngpao.classList.add("d-none");
                    ScrollTrigger.refresh();
                });
            }
        });

        $("#anonymous_angpao").click(function() {
            if ($(this).is(":checked")) {
                $(".angpao-field-hideable").prop("required", false);
                $(".angpao-field-hideable").hide("500");
            } else {
                $(".angpao-field-hideable").prop("required", true);
                $(".angpao-field-hideable").show("500");
            }

            setTimeout(function() {
                ScrollTrigger.refresh();
            }, 1000);
        });

        $(document).ready(function() {
            // fonts
            $("head").append(
                '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />'
            );

            $("head").append(
                '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.8/dist/css/splide.min.css" integrity="sha256-sB1O2oXn5yaSW1T/92q2mGU86IDhZ0j1Ya8eSv+6QfM=" crossorigin="anonymous">'
            );
            $("head").append(
                '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/magnific-popup@1.1.0/dist/magnific-popup.css">'
            );
            $("head").append(
                '<link rel="stylesheet" href="https://unpkg.com/@icon/icofont/icofont.css">'
            );
            $("head").append(
                '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css" integrity="sha512-DIW4FkYTOxjCqRt7oS9BFO+nVOwDL4bzukDyDtMO7crjUZhwpyrWBFroq+IqRe6VnJkTpRAS6nhDvf0w+wHmxg==" crossorigin="anonymous" referrerpolicy="no-referrer" />'
            );

            $.ajaxSetup({
                headers: {
                    // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    "X-Requested-With": "XMLHttpRequest",
                },
            });

            // font family
            let couple_name_on_main_font_family = "";
            let couple_name_on_cover_font_family = "";
            let couple_name_on_couple_font_family = "";
            let parents_name_on_couple_font_family = "";

            // font size
            let couple_name_on_main_font_size = "";
            let couple_name_on_cover_font_size = "";
            let couple_name_on_couple_font_size = "";
            let parents_name_on_couple_font_size = "";

            // change font family and font size
            $(".main_style").css({
                "font-family": couple_name_on_main_font_family,
                "font-size": couple_name_on_main_font_size + "px",
            });

            $(".cover_style").css({
                "font-family": couple_name_on_cover_font_family,
                "font-size": couple_name_on_cover_font_size + "px",
            });

            $(".bride_style").css({
                "font-family": couple_name_on_couple_font_family,
                "font-size": couple_name_on_couple_font_size + "px",
            });

            $(".couple-parent-description p").css({
                "margin-bottom": "0px",
            });

            $(".couple-parent-name p").css({
                "font-family": parents_name_on_couple_font_family,
                "font-size": parents_name_on_couple_font_size + "px",
                "margin-bottom": "0px",
            });
        });

        var section_order = [1, 2, 3, 4, 6, 5, 7, 8, 9];
        var section_wrapper = $(".moveable_section_wrapper");

        section_wrapper.append(
            $.map(section_order, function(elm) {
                return $(".moveable-section[data-id='" + elm + "']");
            })
        );

        $(".translate-btn").on("click", function() {
            lang = $(this).data("lang");
            changeLanguageByButtonClick(lang);
        });

        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                    pageLanguage: "viding",
                },
                "google_translate_element"
            );
        }

        function changeLanguageByButtonClick(lang) {
            // var language = document.getElementById("language").value;
            var selectField = document.querySelector(
                "#google_translate_element select"
            );
            for (var i = 0; i < selectField.children.length; i++) {
                var option = selectField.children[i];
                // find desired langauge and change the former language of the hidden selection-field
                if (option.value == lang) {
                    selectField.selectedIndex = i;
                    // trigger change event afterwards to make google-lib translate this side
                    selectField.dispatchEvent(new Event("change"));
                    break;
                }
            }
        }

        function reset_translation() {
            $(".skiptranslate iframe").contents().find("#\\:1\\.restore").click();
        }

        /** Color Picker **/
        const defaultColors = {
            main: "#efddc7",
            primary: "#fcf6f1",
            secondary: "#704a1e",
        };

        const cp = colorpicker(
            document.querySelector(".colorpicker__wrapper"),
            defaultColors,
            ""
        );

        /** End of Color Picker **/
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.4/clipboard.min.js"></script>
    <script>
        // Clipboard
        var clipboard = new ClipboardJS(".btn-copy-bank-acc");
        console.log(clipboard);

        clipboard.on("success", function(e) {
            alert("Copied Successfully!");
        });

        clipboard.on("error", function(e) {
            alert("Copy failed!");
        });
    </script>

    <script defer="" src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317" integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA==" data-cf-beacon='{"rayId":"81e1c60c9e358802","version":"2023.10.0","token":"9788b2a8af4d4335bde0fab3174b2eed"}' crossorigin="anonymous" style="display: none !important"></script>
    <script src="assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>