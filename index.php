<!DOCTYPE html>

<html>
<head>
    <?php wp_head(); ?>
</head>
<body>
<div class="container">
    <section name="header">
        <header>
            <h1>Nightime Asylum PR</h1>
            <ul class="services">
                <li>Radio/print Production</li>
                <li>Tour Promotion</li>
                <li>Interviews / In-Studios</li>
                <li>Asset Management</li>
                <li>Creative Consultation</li>
                <li>Marketing Strategies</li>
                <li>Release Scheduling</li>
                <li>Label Services</li>
                <li>Referral Discounts</li>
            </ul>
        </header>
    </section>
    <div class="sidebar-left">
        <?php if ( is_active_sidebar( 'main-page-sidebar' ) ) { ?>
            <ul id="sidebar">
                <?php dynamic_sidebar('main-page-sidebar'); ?>
            </ul>
        <?php } ?>
    </div>

</div>


</body>
<?php wp_footer(); ?>
</html>