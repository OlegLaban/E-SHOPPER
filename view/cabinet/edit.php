<?php require_once(ROOT . '/include/header.php'); ?>
<section>
    <div class="conteiner">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                    <?php if($result):?>
                
                    <?php else: ?>
                    <?php if(isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?> </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                <div class="signup-form"><!--sign up form-->
                        <h2>Редактировать данные</h2>
                        <form action="#" method="post">
                            <input type="name" name="name" placeholder="Имя" >
                            <input type="password" name="password" placeholder="Пароль">
                            <input type="submit" class="btn btn-default" name="submit" value="Сохранить">
                        </form>
                    </div><!--/sing up form-->
                    <?php endif; ?>
                <br>
                <br>
                
            </div>
        </div>
    </div>
</section>

<?php require_once(ROOT . '/include/footer.php'); ?>
