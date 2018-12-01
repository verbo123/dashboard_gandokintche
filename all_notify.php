<?php
$active = "Notifications";
require 'pages/header.php';
?>
<?php require 'pages/menu.php' ?>

<?php
include 'pages/control/trans.php';
//var_dump(getTransaction());
?>

    <div class="row">
        <div class="col-md-12">
            <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                <div class="au-task js-list-load">
                    <div class="au-task__title">
                        <p style="font-size: 20px">Vos notifications</p>
                    </div>
                    <div class="au-task-list js-scrollbar3">
                        <?php
                            foreach (get_all_notif() as $notif)
                            {
                        ?>
                        <div class="au-task__item au-task__item--success">
                            <div class="au-task__item-inner">
                                <h5 class="task">
                                    <a href="#"><?php echo $notif->message; ?></a>
                                </h5>
                                <span class="time"><?php echo date_conversion($notif->date); ?></span>
                            </div>
                        </div>
                       <?php

                            }
                        ?>

                    </div>

                </div>
            </div>
        </div>
    </div>

<?php
require 'pages/htmfooter.php';
require 'pages/footer.php';
?>