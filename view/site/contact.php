<?php require_once ROOT . "/include/header.php" ; ?>

<section>
    <div class="conteiner">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                    
                <?php if ($result): ?>
                    <p>Сообщение отправлено! Мы ответим вам на указанный email.</p>
                <?php else: ?>
                    <?php if(isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> -<?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                <div class="signup-form"><!--sign up form-->
                        <h2>Обратная связь</h2>
                        <p>Есть вопрос? Напишите нам</p>
                        <form action="#" method="post">
                            <p>Ваша почта</p>
                            <input type="email" name="userEmail" placeholder="Ваш email" >
                            <p>Ваше сообщение</p>
                            <input type="text" name="userText" placeholder="Ваше сообщение">
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

<?php require_once ROOT . "/include/footer.php" ; ?>