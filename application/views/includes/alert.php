<?php

$alert = $this->session->userdata("alert");

if ($alert) {

    if ($alert["type"] === "success") { ?>

        <script>
            iziToast.success({
                title: '<?php echo $alert["title"]; ?>',
                message: '<?php echo $alert["text"]; ?>',
                position: "bottomRight",
                maxWidth: "400"
            })
        </script>

    <?php } else if ($alert["type"] === "error") { ?>

        <script>
            iziToast.error({
                title: '<?php echo $alert["title"]; ?>',
                message: '<?php echo $alert["text"]; ?>',
                position: "bottomRight",
                maxWidth: "400"
            })
        </script>

    <?php } else if ($alert["type"] === "warning") { ?>

        <script>
            iziToast.warning({
                title: '<?php echo $alert["title"]; ?>',
                message: '<?php echo $alert["text"]; ?>',
                position: "bottomRight",
                maxWidth: "400"
            })
        </script>

<?php }
} ?>