<div>
    <form action="index.php?p=sendLogin" method="POST">
        <label for="email">Email :</label>
        <br>
        <input type="text" name="email" id="email">
        <br>
        <label for="password">Password :</label>
        <br>
        <input type="text" name="password" id="password">
        <br><br>

        <input type="submit" name="log_in" value="se connecter" class="btn btn-primary">
    </form>
</div>
<div style="margin-top: 100px">
    <p>Vous n'avez pas de compte :( ? C'est ici</p>
    <form action="index.php?p=addUser" method="POST">
        <input type="hidden" name="role" value="user">
        <label for="nom">Nom :</label>
        <br>
        <input type="text" name="nom" id="nom">
        <br>
        <label for="email">Email :</label>
        <br>
        <input type="text" name="email" id="email">
        <br>
        <label for="password">Password :</label>
        <br>
        <input type="text" name="password" id="password">
        
        <br><br>

        <input type="submit" name="log_in" value="se connecter" class="btn btn-primary">
    </form>
</div>
