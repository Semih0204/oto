<!DOCTYPE html>
<html lang="tr">

<head>
    <?php $this->load->view("includes/head") ?>
</head>

<body class="background show-spinner no-footer">
    <div class="fixed-background"></div>

    <main>
        <?php $this->load->view("{$viewFolder}/{$subViewFolder}/content"); ?>
    </main>


    <?php $this->load->view("includes/include_script"); ?>
</body>

</html>