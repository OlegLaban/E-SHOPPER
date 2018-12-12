<?php require_once(ROOT . '/include/header.php'); ?>
<section>
    <h2>Кабинет</h2>
    <h3>Привет <?php echo $user['name']; ?></h3>
    <a href="/cabinet/edit">Редактировать данные</a>
</section>

<?php require_once(ROOT . '/include/footer.php'); ?>