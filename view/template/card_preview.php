<?php
$img = json_decode($item['img_post'], TRUE);
?>
<div class="right-card-menu opacityAnimate" style="background: white;">
    <a href="<?= $item['url'] ?>">
        <div class="img-context">
            <img alt="<?= $img['alt'] ?>" title="<?= $img['title'] ?>" src="<?= Core::imgUrl($img['url']) ?>">
        </div>
        <div class="text-context" style="height:max-content !important;">
            <p class="" style="padding-top: 4.5px; font-size: 15px;"><?= $item['post_name'] ?></p>
        </div>
    </a>
    <?php if ((int)$object['count_chield'] !== 0) : ?>
        <div class="product_description text-context">
            <div class="row">
                <div class="rating-result col-lg-7">
                    <?php for ($i = 1; $i <= 5; $i++) { ?>
                        <span class="<?= $item['rait_prod'] >= $i ? 'active' : '' ?>"></span>
                    <?php } ?>
                </div>
                <div class="col-lg-5" style="padding-left: 0px;">
                    <span style="text-transform: none;font-size: 0.9vw;float: right;display: contents;">0 <?= $object['lang'] === 'ru' ? 'отзывов' : ($object['lang'] === 'uk' ? 'відгуків' : 'reviews') ?></span>
                </div>
            </div>
            <div class="row">
                <!--                price                       -->
                <div class="col-lg-12">
                    <span style="float: left;color: grey;"><s><?= (int)$item['sales'] > 0 ? $item['sales'] . ' ₴' : '<br>' ?> </s></span>
                </div>
                <div class="col-lg-12">
                    <span class="price-font"
                          style="font-size: 20px;float: left;padding: 0px;"><?= (float)$item['price'] ?? 0 ?> ₴</span>
                    <span class="glyphicon glyphicon-shopping-cart" style="font-size: 20px;float: right;"></span>
                </div>
                <!--                price-end                   -->
                <div class="col-lg-12" style="text-transform: none;padding-right: 0px;text-align: right; color: green">
                    <div class="col-lg-7" style="text-align: right; padding: 0px;">
                        <span style="font-size: 0.9vw"><?= $item['lang'] === 'ru' ? 'Готов к отправке' : ($item['lang'] === 'uk' ? 'Готовий до відправлення' : 'Ready to ship') ?></span>
                    </div>
                    <div class="col-lg-5" style="text-align: left;">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                             fill="#000000" height="15px" width="15px" version="1.1" id="Layer_1"
                             viewBox="0 0 491.1 491.1" xml:space="preserve" style="fill: currentColor">
                                <g transform="translate(0 -540.36)">
                                    <g>
                                        <g>
                                            <path d="M401.5,863.31c-12,0-23.4,4.7-32,13.2c-8.6,8.6-13.4,19.8-13.4,31.8s4.7,23.2,13.4,31.8c8.7,8.5,20,13.2,32,13.2     c24.6,0,44.6-20.2,44.6-45S426.1,863.31,401.5,863.31z M401.5,933.31c-13.8,0-25.4-11.4-25.4-25s11.6-25,25.4-25     c13.6,0,24.6,11.2,24.6,25S415.1,933.31,401.5,933.31z"/>
                                            <path d="M413.1,713.41c-1.8-1.7-4.2-2.6-6.7-2.6h-51.3c-5.5,0-10,4.5-10,10v82c0,5.5,4.5,10,10,10h81.4c5.5,0,10-4.5,10-10v-54.9     c0-2.8-1.2-5.5-3.3-7.4L413.1,713.41z M426.5,792.81h-61.4v-62.1h37.4l24,21.6V792.81z"/>
                                            <path d="M157.3,863.31c-12,0-23.4,4.7-32,13.2c-8.6,8.6-13.4,19.8-13.4,31.8s4.7,23.2,13.4,31.8c8.7,8.5,20,13.2,32,13.2     c24.6,0,44.6-20.2,44.6-45S181.9,863.31,157.3,863.31z M157.3,933.31c-13.8,0-25.4-11.4-25.4-25s11.6-25,25.4-25     c13.6,0,24.6,11.2,24.6,25S170.9,933.31,157.3,933.31z"/>
                                            <path d="M90.6,875.61H70.5v-26.6c0-5.5-4.5-10-10-10s-10,4.5-10,10v36.6c0,5.5,4.5,10,10,10h30.1c5.5,0,10-4.5,10-10     S96.1,875.61,90.6,875.61z"/>
                                            <path d="M141.3,821.11c0-5.5-4.5-10-10-10H10c-5.5,0-10,4.5-10,10s4.5,10,10,10h121.3C136.8,831.11,141.3,826.71,141.3,821.11z"/>
                                            <path d="M30.3,785.01l121.3,0.7c5.5,0,10-4.4,10.1-9.9c0.1-5.6-4.4-10.1-9.9-10.1l-121.3-0.7c-0.1,0-0.1,0-0.1,0     c-5.5,0-10,4.4-10,9.9C20.3,780.51,24.8,785.01,30.3,785.01z"/>
                                            <path d="M50.7,739.61H172c5.5,0,10-4.5,10-10s-4.5-10-10-10H50.7c-5.5,0-10,4.5-10,10S45.2,739.61,50.7,739.61z"/>
                                            <path d="M487.4,726.11L487.4,726.11l-71.6-59.3c-1.8-1.5-4-2.3-6.4-2.3h-84.2v-36c0-5.5-4.5-10-10-10H60.5c-5.5,0-10,4.5-10,10     v73.2c0,5.5,4.5,10,10,10s10-4.5,10-10v-63.2h234.8v237.1h-82c-5.5,0-10,4.5-10,10s4.5,10,10,10h122.1c5.5,0,10-4.5,10-10     s-4.5-10-10-10h-20.1v-191.1h80.6l65.2,54l-0.7,136.9H460c-5.5,0-10,4.5-10,10s4.5,10,10,10h20.3c5.5,0,10-4.4,10-9.9l0.8-151.6     C491,730.91,489.7,728.01,487.4,726.11z"/>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                    </div>
                </div>
                <div class="row" style="padding-left: 5px;">
                    <?php foreach ($metadata['filters_langs'] as $key => $filterName) {
                        if (!empty($item[$key . '_name'])) {
                            ?>
                            <div class="col-lg-12" style="text-transform:none;">
                                <span style="font-size: 0.9vw;"><?= $filterName[$object['lang']] . ': ' . $item[$key . '_name'] ?></span>
                            </div>
                        <?php }
                    } ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

</div>

