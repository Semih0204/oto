<meta charset="UTF-8">
<?php $settings = getSettings();

?>

<title> TrendAsist | <?php if (empty($settings)) {
                            echo " ";
                        } else {
                            echo $settings->companyName;
                        }; ?> | Randevu Yönetimi</title>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<?php $this->load->view("includes/include_style"); ?>