<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expo-Video</title>
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="style/css/css1.css">
    <!-------------La chatgraphi------------------>
    <link rel="stylesheet" href="style/css/GlobaleColor.css">
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>


<style>
    li {
        margin: 0;
        padding: 0;
    }


    .righttop {
        border: 0;
        background-color: #1a6faf;
    }




    .commentcontainer {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .commentcontainer p {
        margin-bottom: 10px;
    }

    .commentcontainer p strong {
        font-weight: bold;
    }

    .commentcontainer p:first-child {
        margin-top: 0;
    }

    .commentcontainer p:last-child {
        margin-bottom: 0;
        text-align: end;
    }


    .contentright {
        justify-content: flex-start;
    }









    form {
        position: fixed;
        bottom: 0;
        background-color: #69a9c5;
        padding: 20px;
        right: 0;
        bottom: 50px;
        width: 40%;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
        display: none;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input[type="text"],
    textarea {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }


    .toggleButton {
        /* Button background color */
        background-color: #1a6faf;

        /* Button text color */
        color: white;

        /* Button padding */
        padding: 10px 20px;

        /* Button border */
        border: none;
        border-radius: 4px;

        /* Button cursor style */
        cursor: pointer;

        /* Button hover effect */
        transition: background-color 0.3s ease;
    }

    .toggleButton:hover {
        background-color: #45a049;
    }


    .btncomment {
        position: fixed;
        right: 0;
        bottom: 10px;
    }

    .btnclos {

        padding: 0;
        margin: 0;
        font-size: 32px;
        position: absolute;
        right: 0;
        top: 0;

        background-color: transparent;
    }


    @media screen () {}



    @media screen and (max-width: 940px) {
        form {
            right: 0;
            left: 10%;
            bottom: 50px;
            width: 83%;
        }
    }
</style>

<body onload="vedioSource('','')" style="background: #f4f0f0;">
    <header><img src="./image/headerold.JPG" width="100%" alt=""></header>
    <div style="margin: auto;display: flex;justify-content: center;align-items: center;background-color: #1a6faf;">
        <a class="nav-link " href="../../index.html" style="width:fite-content;position: relative;"><span style="color:white; font-weight:bold"> Accueil </span> </a>


    </div>

    <div class="content">

        <div class="lefttop">
            <i class="fas fa-volume-mute logo" style="display: none;" onclick="logo()"></i>
            <div id="contentvedio"></div>
        </div>
        <div class="contentright">
            <div style="" class="righttop">
                <!--Les jours --->
                <div class="btn-group btnjour" style="display: flex;" role="group" id="btnjour" aria-label="Basic example">
                    <button style="outline: none; " class="btnjr1 btnactive">Vendredi</button>
                    <button style="outline: none;  ;" class="btnjr2 ">Samedi</button>
                    <button style="outline: none;" class="btnjr3 "> <a class="nav-link " href="./gallery/s1.html" style=" width:fite-content;position: relative;"><span style=" font-weight:bold"> GALERIE </span> </a></button>


                </div>
                <div style="" id="contentjour" class="contentjour">
                    <div style="" class="jr1 jr jouractive">
                        <h1> Vendredi 09 juin 2023 </h1>

                        <div class="txtnormal">
                            <li><a onclick='vedioSource(this)' id="https://www.youtube.com/embed/MuSE9jHSoDQ"><img src="./image/vendredi/01.png" width="100%" alt=""><span class="btnplay"><img src="image/Play.png" width="10%" alt=""></span></a></li>
                            <li><a onclick='vedioSource(this)' id="https://www.youtube.com/embed/YawicH6MeWM"><img src="./image/vendredi/02.png" width="100%" alt=""><span class="btnplay"><img src="image/Play.png" width="10%" alt=""></span></a></li>


                            <li><a onclick='vedioSource(this)' id="https://www.youtube.com/embed/_1fmdyumHyA"><img src="./image/vendredi/04.png" width="100%" alt=""><span class="btnplay"><img src="image/Play.png" width="10%" alt=""></span></a></li>
                            <li> <a onclick='vedioSource(this)' id="https://www.youtube.com/embed/TdF58FTPYJY"><img src="./image/vendredi/06.png" width="100%" alt=""><span class="btnplay"><img src="image/Play.png" width="10%" alt=""></span></a></li>


                            <li style="display: none;"><a onclick='vedioSource(this)' id="https://www.youtube.com/embed/8Ccjhw7jGE8"><img src="./image/vendredi/05.png" width="100%" alt=""><span class="btnplay"><img src="image/Play.png" width="10%" alt=""></span></a></li>


                            <li style="display: none;"><a onclick='vedioSource(this)' id="https://www.youtube.com/embed/TdF58FTPYJY"><img src="./image/vendredi/06.png" width="100%" alt=""><span class="btnplay"><img src="image/Play.png" width="10%" alt=""></span></a></li>
                            <li><a onclick='vedioSource(this)' id="https://www.youtube.com/embed/2oonfe9Qka4"><img src="./image/vendredi/07.png" width="100%" alt=""><span class="btnplay"><img src="image/Play.png" width="10%" alt=""></span></a></li>
                            <li><a onclick='vedioSource(this)' id="https://www.youtube.com/embed/3YxnYb3hbdk"><img src="./image/vendredi/08.png" width="100%" alt=""><span class="btnplay"><img src="image/Play.png" width="10%" alt=""></span></a></li>
                            <li><a onclick='vedioSource(this)' id="https://www.youtube.com/embed/d0IQSiqy4L0"><img src="./image/vendredi/09.png" width="100%" alt=""><span class="btnplay"><img src="image/Play.png" width="10%" alt=""></span></a></li>

                        </div>


                    </div>

                    <div style="" class="jr2 jr">
                        <h1> samedi 10 juin 2023 </h1>
                        <div class="txtnormal">
                            <li><a onclick='vedioSource(this)' id="https://www.youtube.com/embed/lSuKEf0qRL4"><img src="./image/samedi/02.png" width="100%" alt=""><span class="btnplay"><img src="image/Play.png" width="10%" alt=""></span></a></li>
                            <li><a onclick='vedioSource(this)' id="https://www.youtube.com/embed/1cg_HxVIyNU"><img src="./image/samedi/03.png" width="100%" alt=""><span class="btnplay"><img src="image/Play.png" width="10%" alt=""></span></a></li>
                            <li style="display: none;"><a onclick='vedioSource(this)' id="https://www.youtube.com/embed/lSuKEf0qRL4"><img src="./image/samedi/04.png" width="100%" alt=""><span class="btnplay"><img src="image/Play.png" width="10%" alt=""></span></a></li>
                            <li><a onclick='vedioSource(this)' id="https://www.youtube.com/embed/aY6Xphs5uio"><img src="./image/samedi/05.png" width="100%" alt=""><span class="btnplay"><img src="image/Play.png" width="10%" alt=""></span></a></li>
                            <li><a onclick='vedioSource(this)' id="https://www.youtube.com/embed/GB7D0cyjzH8"><img src="./image/samedi/06.png" width="100%" alt=""><span class="btnplay"><img src="image/Play.png" width="10%" alt=""></span></a></li>
                            <li><a onclick='vedioSource(this)' id="https://www.youtube.com/embed/KHdpzSmkIlc"><img src="./image/samedi/07.png" width="100%" alt=""><span class="btnplay"><img src="image/Play.png" width="10%" alt=""></span></a></li>
                            <li><a onclick='vedioSource(this)' id="https://www.youtube.com/embed/O5TeDLZRD84"><img src="./image/samedi/08.png" width="100%" alt=""><span class="btnplay"><img src="image/Play.png" width="10%" alt=""></span></a></li>

                            <li><a onclick='vedioSource(this)' id="https://www.youtube.com/embed/5Y5kp_McUEQ"><img src="./image/samedi/09.png" width="100%" alt=""><span class="btnplay"><img src="image/Play.png" width="10%" alt=""></span></a></li>

                            <li><a onclick='vedioSource(this)' id="https://www.youtube.com/embed/utUb4TCsJlc"><img src="./image/samedi/10.png" width="100%" alt=""><span class="btnplay"><img src="image/Play.png" width="10%" alt=""></span></a></li>
                            <li><a onclick='vedioSource(this)' id="https://www.youtube.com/embed/dsNu7y9o1fs"><img src="./image/samedi/11.png" width="100%" alt=""><span class="btnplay"><img src="image/Play.png" width="10%" alt=""></span></a></li>
                            <li><a onclick='vedioSource(this)' id="https://www.youtube.com/embed/tCAhYMSbPP4"><img src="./image/samedi/12.png" width="100%" alt=""><span class="btnplay"><img src="image/Play.png" width="10%" alt=""></span></a></li>


                        </div>
                    </div>
                </div>





            </div>
        </div>

        <script src="js/js.js"></script>
        <!-- lien de live -->
        <a hidden id="cmclive" class="glightbox"></a>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
        <script src="./js/bootstrap.bundle.min.js"></script>
        <script src="js/glightbox.min.js" id="glightbox"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>










        <script>
            window.addEventListener('load', function() {
                const hiddenLink = document.querySelector('.privideo');
                hiddenLink.click();
            });
        </script>



</body>

</html>