<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="View/css/style.css" />
        <title><?= $titre ?></title>
    </head>
    <body>
        <div id="main">
            <div id="header">
                <div id="logo">
                    <div id="logo_text">
                        <h1><a href="index.php">Comment<span class="logo_colour"> System</span></a></h1>
                        <h2>Comment system with message validation.</h2>
                    </div>
                </div>
                <div id="menubar">
                    <ul id="menu">
                        <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
                        <li class="selected"><a href="index.html">Home</a></li>
                        <li><a href='?controller=comment&action=listsCommentCensured'>List Censured Comment</a></li>
                        <li><a href="page.html">A Page</a></li>
                        <li><a href="another_page.html">Another Page</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div id="contenu">
                <?= $contenu ?>
            </div> <!-- #contenu -->
            <footer id="piedBlog">
                Comment System made with PHP, HTML5 and CSS.
            </footer>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="View/js/script.js"></script>
    </body>
</html>