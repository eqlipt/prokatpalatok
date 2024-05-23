<?php
//render infopage for each inventory item

//set default inventory item incase none is specified
if(!isset($inventory_item)) {
    $inventory_item = find_inventory_by_id($inventory_id='1');
}

$up_arrow_url = url_for(WWW_IMG . '/up-arrow.svg');

?>

<!-- center -->
<section id="center">
    <article itemscope itemtype="http://schema.org/Offer">
				<link itemprop="businessFunction" href="http://purl.org/goodrelations/v1#LeaseOut" />
        <h1 itemprop="name"><?php echo $inventory_item['h1']; ?></h1>
        <!-- images -->
        <div class="showcase">
            <?php 
								$inventory_images = array();
								$filenames = glob('*.{[jJ][pP][gG],[pP][nN][gG],[gG][iI][fF],[wW][eE][bB][pP]}', GLOB_BRACE);
								foreach($filenames as $filename) {
									$inventory_images[] = $filename;
								}
                foreach($inventory_images as $i=>$inventory_image) {
                echo '<a href="' . $inventory_image . '" data-alt="' . $inventory_item['infopage_images_alt'] . '" class="spinner" onclick="return viewer.show(' . $i . ')"></a>';
            } ?>
        </div>
        <!-- /images -->
        
        <!-- price & deposit table -->
        <div class="card padding-block text-block accordion-item">
            <input type="checkbox">
            <div class="accordion-header">
                <div>
                    <img class="button" src="<?php echo url_for(WWW_IMG . '/buttons/coin.png'); ?>"/>
                    <h2>Стоимость проката</h2>
                </div>
                <img src="<?php echo $up_arrow_url; ?>"></img>
            </div>
            <div class="accordion-text">
                <table class="price-table" itemprop="priceSpecification" itemtype="http://schema.org/UnitPriceSpecification">
                    <tr>
                    <?php echo (isset($inventory_item['price2'])) ? '
                        <td>
                        <p class="bold">первые сутки</p>
                        </td>
                        <td>
                        <p><span itemprop="price">' . h($inventory_item['price1']) . '</span> ₽</p>
                        <meta itemprop="priceCurrency" content="RUB">
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <p class="bold">вторые сутки</p>
                        </td>
                        <td>
                        <p>' . h($inventory_item['price2']) . ' ₽</p>
                        </td>'
												:
                        '<td>
                        <p class="bold">первые двое суток</p>
                        </td>
                        <td>
                        <p><span itemprop="price">' . h($inventory_item['price1']) . '</span> ₽</p>
                        <meta itemprop="priceCurrency" content="RUB">
                        </td>';
                    ?>
                    </tr>
                    <tr>
                        <td>
                        <p class="bold">все последующие сутки</p>
                        </td>
                        <td>
                        <p><?php echo h($inventory_item['price3']); ?> ₽/сутки</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <p class="bold">залог</p>
                        </td>
                        <td>
                        <p><?php echo h($inventory_item['deposit']); ?> ₽ без документа / <?php echo h($inventory_item['deposit']*0.1); ?> ₽ с <a href="<?php echo WWW_ROOT . '/usloviya-prokata/?question=deposit'; ?>">документом</a></p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- /price & deposit table -->

        <!-- general decription -->
        <div class="card padding-block text-block accordion-item">
            <input type="checkbox">
            <div class="accordion-header">
                <div>
                    <img class="button" src="<?php echo url_for(WWW_IMG . '/buttons/camp.png'); ?>"/>
                    <h2>Описание</h2>
                </div>
                <img src="<?php echo $up_arrow_url; ?>"></img>
            </div>
            <div class="accordion-text" itemprop="description">
                <?php echo $inventory_item['description']; ?>
            </div>
        </div>
        <!-- /general decription -->

        <!-- technical info -->
        <div class="card padding-block text-block accordion-item">
            <input type="checkbox">
            <div class="accordion-header">
                <div>
                    <img class="button" src="<?php echo url_for(WWW_IMG . '/buttons/repair.png'); ?>"/>
                    <h2>Характеристики</h2>
                </div>
                <img src="<?php echo $up_arrow_url; ?>"></img>
            </div>
            <div class="accordion-text">
                <?php echo $inventory_item['technical']; ?>
            </div>
        </div>
        <!-- /technical info -->

        <!-- video if present -->
        <?php if(isset($inventory_item['video'])) {
            $video = unserialize($inventory_item['video']);
            echo 
            '<div class="card padding-block text-block accordion-item">
                <input type="checkbox" checked>
                <div class="accordion-header">
                    <div>
                        <h2>' . h($video['title']) . '</h2>
                    </div>
                    <img src=' . $up_arrow_url . '></img>
                </div>
                <div class="accordion-text">
                    <iframe width="100%" src="' . $video['url'] . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>';
        }
        ?>
        <!-- /video -->

        <!-- article if present -->
        <?php if(isset($inventory_item['article'])) {
            $article = unserialize($inventory_item['article']);
            echo 
            '<div class="card padding-block text-block accordion-item">
                <input type="checkbox" checked>
                <div class="accordion-header">
                    <div>
                        <h2>' . $article['title'] . '</h2>
                    </div>
										<img src=' . $up_arrow_url . '></img>
								</div>
                <div class="accordion-text">' . 
                    $article['text'] . '
                </div>
            </div>';
        }
        ?>
        <!-- /article -->

    </article>
</section>
<!-- /center -->

<!--Import image slider script-->
<script type="text/javascript" src="<?php echo url_for(WWW_JS . '/slide.js'); ?>"></script>
<script type="text/javascript">
    var viewer = new PhotoViewer();
    viewer.disableEmailLink();
    viewer.disablePhotoLink();
    <?php foreach($inventory_images as $inventory_image) {
        echo "viewer.add('" . $inventory_image . "');";
    } ?>
</script>

<!--Import spinner script-->
<script type="text/javascript" src="<?php echo url_for(WWW_JS . '/spinner.js'); ?>"></script>
