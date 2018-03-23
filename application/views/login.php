<?php include('header.php');?>
<div id="content">
    <div class="mdl-card mdl-shadow--6dp">
        <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
            <h2 class="mdl-card__title-text">Optic-Red</h2>
        </div>
    <div class="mdl-card__supporting-text">
            <form action="#">
                <div class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" type="text" id="userName" />
                    <label class="mdl-textfield__label" for="userName">Usuario</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" type="password" id="userPass" />
                    <label class="mdl-textfield__label" for="userPass">Contraseña</label>
                </div>
            </form>
        </div>
        <div class="mdl-card__actions mdl-card--border">
            <button onclick="login()" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">Ingresar</button>
        </div>
    </div>
</div>
<?php include('footer.php') ?>
