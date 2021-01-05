<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style_registration.css">
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <title>REGISTRATION PAGE</title>
</head>

<body>
<div class="container">
    <div class="logo">
        <img src="public/img/logo2.svg">
    </div>
    <div class="registration-container">
        <form class="registration"action="registration" method="POST">
            <div class="messages">
                <?php
                if(isset($messages)){
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </div>

            <input name="name" type="text" placeholder="name" required>
            <input name="surname" type="text" placeholder="surname" required>
            <input name="email" type="text" placeholder="email@email.com" required>
            <input name="password" type="password" placeholder="password" required>
            <input name="confirmedPassword" type="password" placeholder="confirm password" required>
            <button>Create account</button>
        </form>
    </div>
</div>
</body>