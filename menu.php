<ul id="yw0">
    <li  <?php if ($_GET['r'] == 'index') echo "class=\"active\""?> >
        <a href="index.php?r=index">Home</a></li>
    <li <?php if ($_GET['r'] == 'sobre') echo "class=\"active\""?> >
        <a href="index.php?r=sobre">About</a></li>
    <li <?php if ($_GET['r'] == 'contato') echo "class=\"active\""?> >
        <a href="index.php?r=contato">Contact</a></li>
    <li <?php if ($_GET['r'] == 'login') echo "class=\"active\""?> >
        <a href="index.php?r=login">Login</a></li>
</ul>