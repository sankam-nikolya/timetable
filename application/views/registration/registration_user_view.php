<?php echo validation_errors(); ?>

<div class="container">
    <div class="well">
        <?php echo form_open('registration/add_user') ?>

        <p>Ваш логин:</p>
        <input type="text" name="login" value="" size="50" class="form-control">

        <p>Ваш e-mail:</p>
        <input type="text" name="email" value="" size="50" class="form-control">

        <p>Ваш пароль:</p>
        <input type="password" name="password" value="" size="50" class="form-control">

        <p>Повторите вашь пароль</p>
        <input type="password" name="password" value="" size="50" class="form-control">

        <br>

        <input type="submit" name="submit" value="Зарегистрироваться" class="btn btn-primary">

        </form>
    </div>

</div>
