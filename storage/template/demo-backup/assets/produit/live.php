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
        width: 30%;
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
        background-color: #10b4fe;

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
        background-color: #fe8e38;
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

<body onload="checkIfIframeExist()" style="background: #f4f0f0;">
    <header><img src="./image/headerold.JPG" width="100%" alt=""></header>
    <div style="margin: auto;display: flex;justify-content: center;align-items: center;background-color: #10b4fe; padding : 7px;">
        <a class="nav-link " href="../../../index.html" style="width:fite-content;position: relative;"><span style="color:white; font-weight:bold"> Accueil </span> </a>

        <a class="nav-link " href="./index.html" style="    margin: 9px 30px; width:fite-content;position: relative;"><span style="color:white; font-weight:bold ;"> Videos </span> </a>

    </div>

    <div class="content">

        <div class="lefttop">
            <div id="contentvedio">
            <iframe width="560" height="315" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                <img class="videoImg" style="display: none; width : 100%;" src="../img/background/1.jpg" />
            </div>
        </div>


        <div class="contentright">
            <?php
                // Specify the database name and path
                $databaseFile = './gestdb/db.sqlite';

                try {
                    // Create a new SQLite database connection
                    $pdo = new PDO("sqlite:$databaseFile");
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    // Fetch all comments from the "comment" table
                    $selectQuery = "SELECT * FROM comment";
                    $statement = $pdo->query($selectQuery);
                    $comments = $statement->fetchAll(PDO::FETCH_ASSOC);

                    // Display the comments
                    foreach ($comments as $comment) {
                        echo "<div  class='commentcontainer'> ";
                        echo "<p><strong></strong> " . $comment['txtcomment'] . "</p>";

                        echo "<p><strong style='color: #fe8e38;'>Nom:</strong> " . $comment['name'] . "</p>";

                        echo "</div>";
                    }
                } catch (PDOException $e) {
                    // Display error message
                    echo "Failed to retrieve comments: " . $e->getMessage();
                }
            ?>


            <div>
                <!-- HTML form in your PHP page -->
                <form id="commentForm" style="position: fixed;    bottom: 79px;" action="gestdb/save_comment.php" method="POST">
                    <button class="toggleButton btnclos" onclick="toggleform()"> <i style="font-size: 33px;      color: #b90a0a;" class="fa-regular fa-circle-xmark"></i></button>


                    <label for="name">Voter Nom:</label>
                    <input type="text" id="name" name="name" required><br>

                    <label for="comment">Voter commentaire:</label>
                    <textarea id="comment" name="comment" required></textarea><br>

                    <input type="submit" value="envoyer">
                </form>
            </div>

            <button id="toggleButton" class="toggleButton btncomment" onclick="toggleform()">Ajouter commentaire</button>


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

        function checkIfIframeExist(){
            if (!$('#contentvedio iframe').attr('src'))
            {
                console.log('here');
                $('#contentvedio iframe').remove();
                $('#contentvedio .videoImg').css('display', 'block');
            }
            
        }

        window.addEventListener('load', function() {
            const hiddenLink = document.querySelector('.privideo');
            hiddenLink.click();
        });



        $(document).ready(function() {
            $('.toggleButton').click(function() {
                $('#commentForm').toggle(300);
            });
        });
    </script>



</body>

</html>