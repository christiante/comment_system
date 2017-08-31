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
                        <li class="selected"><a href="index.php">Home</a></li>
                        <li><a href='?controller=comment&action=listsCommentCensored'>Censored Comments</a></li>
                        <li><a href='?controller=post&action=index'>Post List</a></li>
                    </ul>
                </div>
            </div>
            <div id="site_content">
                <div id="content">
                    <?= $contenu ?>
                </div>
            </div>
            <div id="footer">
                Copyright &copy; | Christiane Charly Ramiandramanjato
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="View/js/script.js"></script>
    </body>
</html>