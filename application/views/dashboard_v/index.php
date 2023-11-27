<!DOCTYPE html>
<html lang="tr">

<head>
    <?php $this->load->view("includes/head") ?>
</head>

<body id="app-container" class="menu-default show-spinner">

    <?php $this->load->view("includes/navbar") ?>

    <?php $this->load->view("includes/aside") ?>


    <main>
        <?php $this->load->view("{$viewFolder}/content"); ?>
    </main>


    <?php $this->load->view("includes/footer"); ?>

    <?php $this->load->view("includes/include_script"); ?>

    <script>
        $(document).ready(function() {

            var eventsdata = <?php echo $calendarData ?>;

            $(".calendar").fullCalendar({
                themeSystem: "bootstrap4",
                height: "auto",
                isRTL: false,
                header: {
                    'center': 'title',
                    'left': 'month,agendaWeek,agendaDay'
                },
                titleFormat: 'D MMMM YYYY',
                locale: 'tr',
                eventStartEditable: false,
                eventDurationEditable: false,
                selectable: true,
                minTime: '08:00',
                maxTime: '22:00',
                slotDuration: '00:15',
                slotLabelFormat: 'hh:mm',
                buttonText: {
                    today: "Bugün",
                    month: "Ay",
                    week: "Hafta",
                    day: "Gün",
                    list: "Liste"
                },
                bootstrapFontAwesome: {
                    prev: " simple-icon-arrow-left",
                    next: " simple-icon-arrow-right",
                    prevYear: " simple-icon-control-start",
                    nextYear: " simple-icon-control-end"
                },
                events: eventsdata
            });


        });
    </script>


</body>

</html>