<div id="menu">
    <?php
    if (isset($_SESSION["username"])) {
    ?>
        <label id="start">Witaj <?= $_SESSION["username"] ?>!</label>
        <form action="delete.php">
            <input id="logout" type="submit" value="Usuń konto"/>
        </form>        
        <form action="logout.php">
            <input id="logout" type="submit" value="Wyloguj się"/>
        </form>
    <?php
    } else {
    ?>
        <form action="registration.php">
            <input type="submit" value="Zarejestruj się"/>
        </form>
        <form action="login.php">
            <input type="submit" value="Zaloguj się"/>
        </form>
    <?php
    }
    ?>
</div>

<nav>
    <a id="e1" href="index.php">Home</a>
    <a id="e2" href="projects.php">Projekty</a>
    <a id="e3" href="interests.php">Zainteresowania</a>
</nav>