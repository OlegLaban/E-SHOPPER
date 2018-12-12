<?php include ROOT . '/include/header.php'; ?>

<section>
    <div class="conteiner">
        <div class="row">
            
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                <?php if($result): ?>
                    <p>Вы зарегистрированы!</p>
                <?php else: ?>
                    <?php if(isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li> - <?php echo $error; ?> </li>
                        <?php endforeach;?>
                    </ul>
                    <?php endif; ?>


                    <div class="signup-form"><!--sign up form-->
                        <h2>Регистрация на сайте</h2>
                        <form action="#" method="post">
                            <input type="text" name="name" placeholder="Имя" value="<?php echo $name; ?>">
                            <input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>">
                            <input type="password" name="password" placeholder="Пароль">
                            <input type="submit" class="btn btn-default" name="submit" value="Регистрация">
                        </form>
                    </div><!--/sing up form-->
                <?php endif; ?>
                <br>
                <br>
                
            </div>
        </div>
    </div>
</section>



<?php include ROOT . '/include/footer.php'; ?>



