<ul>
    <li  <?php if ($_GET['r'] == 'inicio') echo "class=\"active\""?> >
        <a href="index.php?r=inicio">Início</a></li>
    <li <?php if ($_GET['r'] == 'sobre') echo "class=\"active\""?> >
        <a href="index.php?r=sobre">Sobre</a></li>
    <li <?php if ($_GET['r'] == 'contato') echo "class=\"active\""?> >
        <a href="index.php?r=contato">Contato</a></li>
    <li <?php if ($_GET['r'] == 'login') echo "class=\"active\""?> >
        <a href="index.php?r=login">Entrar</a></li>
    <li <?php if ($_GET['r'] == 'tabela') echo "class=\"active\""?> >
        <a href="index.php?r=tabela">Tabela</a></li>
    <li <?php if ($_GET['r'] == 'cadastro') echo "class=\"active\""?> >
        <a href="index.php?r=cadastro">Cadastro</a></li>
    <li <?php if ($_GET['r'] == 'form') echo "class=\"active\""?> >
        <a href="index.php?r=form">Formulario</a></li>
    <a class="menu" href="logout.php">SAIR</a>
</ul>
