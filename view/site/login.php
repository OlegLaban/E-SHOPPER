<?php require_once(ROOT . "/include/header.php"); ?>
<section>
    <div class="conteiner">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                 <?php if(isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li> - <?php echo $error; ?> </li>
                        <?php endforeach;?>
                    </ul>
                    <?php endif; ?>
                <div class="signup-form"><!--sign up form-->
                        <h2>Вход на сайт</h2>
                        <form action="#" method="post">
                            <input type="email" name="email" placeholder="E-mail" >
                            <input type="password" name="password" placeholder="Пароль">
                            <input type="submit" class="btn btn-default" name="submit" value="Вход">
                        </form>
                    </div><!--/sing up form-->
                <br>
                <br>
                <a href="/user/register">Регистрация</a>
            </div>
        </div>
    </div>
</section>
<?php require_once(ROOT . "/include/footer.php");?> 