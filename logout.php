<?php
    session_start();//initialisation de la session 
    session_destroy();//terminer la session
    header("Location:index.php");//redirection vers la page index
