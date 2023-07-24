<?php require('head.php'); ?>

<body id="page-top">
    <!-- Navigation-->
    <?php 
        require('nav.php');    
        require('accueil.php');    
        if(isset($messages) && !empty($messages)) {
            foreach ($messages as $message) {
                ?><div class="alert alert-success"><?=$message?></div> <?php
            }
        }  
        require('footer.php'); ?>
    <!-- Masthead-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>