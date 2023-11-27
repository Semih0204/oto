<!DOCTYPE html>
<html lang="tr">

<head>
    <?php $this->load->view("includes/head") ?>
</head>

<body id="app-container" class="menu-default show-spinner">

    <?php $this->load->view("includes/navbar") ?>

    <?php $this->load->view("includes/aside") ?>


    <main>
        <?php $this->load->view("{$viewFolder}/{$subViewFolder}/content"); ?>
    </main>


    <?php $this->load->view("includes/footer"); ?>

    <?php $this->load->view("includes/include_script"); ?>
</body>

</html>