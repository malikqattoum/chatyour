<script src="<?php echo Registry::load('config')->site_url.'assets/js/combined_js_chat_page.js'.$cache_timestamp; ?>"></script>
<?php
if (Registry::load('settings')->adblock_detector === 'enable') {
    ?>
    <script src="<?php echo Registry::load('config')->site_url.'assets/js/common/ad_block_detector.js'.$cache_timestamp; ?>"></script>
    <?php
}
?>
<?php include 'layouts/chat_page/web_push_service_scripts.php'; ?>

<?php
if (Registry::load('settings')->progressive_web_application === 'enable') {
    ?>
    <script type="module">
        import 'https://cdn.jsdelivr.net/npm/@pwabuilder/pwainstall';
        const el = document.createElement('pwa-update');
        document.body.appendChild(el);
    </script>
    <?php

}
if (Registry::load('settings')->progressive_web_application === 'enable' || Registry::load('settings')->push_notifications !== 'disable') {
    ?>
    <script>
        $(window).on('load', function() {
            registerServiceWorker();
        });
    </script>

    <?php
}
if (Registry::load('current_user')->logged_in) {
    if (Registry::load('settings')->chat_page_boxed_layout === 'enable') {

        $bg_image = get_image(['from' => 'site_users/backgrounds', 'search' => Registry::load('current_user')->id, 'replace_with_default' => false]);

        if (!empty($bg_image)) {
            ?>
            <style>
                body {
                    background: url('<?php echo $bg_image;
                    ?>');
                    background-size: cover;
                    background-position: center;
                }
            </style>
            <?php
        }
    }
}

?>
<?php
include 'layouts/chat_page/google_analytics.php';
include 'assets/headers_footers/chat_page/footer.php';
?>
</html>