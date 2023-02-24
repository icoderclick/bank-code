<?php

function options_zarinpal_callback()
{
    // check user capabilities
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

    if (isset($_GET['tab'])){
        $active_tab=$_GET['tab'];
    }else {
        $active_tab='tab-one';
    }

    ?>

    <div class="wrap">
        <style>
            .fff {background: #fff}
        </style>
       <section class="nav-tab-wrapper">
           <a style="font-family: IRANSansWeb;border-top-right-radius: 5px;border-top-left-radius: 5px;" href="?page=options_zarinpal&tab=tab-one" class="nav-tab <?php echo $active_tab == 'tab-one' ? 'nav-tab-active fff' : ''?>">درگاه پرداخت</a>
           <a style="font-family: IRANSansWeb;border-top-right-radius: 5px;border-top-left-radius: 5px;" href="?page=options_zarinpal&tab=tab-two" class="nav-tab <?php echo $active_tab == 'tab-two' ? 'nav-tab-active fff' : ''?>">تنظیمات</a>
       </section>
        <form action="options.php" method="post">
            <?php
            if ($active_tab == 'tab-one'){


            ?>
            <h1 style="font-family: IRANSansWeb;margin: 30px 0">کد درگاه پرداخت زرین پال</h1>
            <?php
            echo $active_tab;
            settings_fields('getaway_settings');
            do_settings_sections('getaway_setting');
            submit_button('ذخیره اطلاعات');
            }
            if ($active_tab == 'tab-two'){

           ?>

            <h1 style="font-family: IRANSansWeb;margin: 30px 0">تنظیمات</h1>
            <?php
             }
            ?>

        </form>
    </div>
    <?php
}



