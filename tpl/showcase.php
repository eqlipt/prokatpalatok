<h1><?php echo($category_item['name']); ?></h1>
	<?php $inventory_set = find_inventory_by_category($category_item['id']);
	while($inventory_item = mysqli_fetch_assoc($inventory_set)) { ?>
		<a href="<?php echo url_for('/' . $category_item['path'] . '/' . $inventory_item['path'] . '/'); ?>">
			<div class="inventory-item card">
				<img src="<?php echo url_for(WWW_IMG . '/inventory/' . $inventory_item['inventory_item_img_path'] . '_450.jpg'); ?>" 
							alt="<?php echo($inventory_item['inventory_item_img_alt']); ?>" 
							sizes="(min-width: 1021px) 195px,
										 (min-width: 661px) 450px,
										 (min-width: 511px) 195px,
										 (min-width: 200px) 450px,
										 450px"
							srcset="<?php echo url_for(WWW_IMG . '/inventory/' . $inventory_item['inventory_item_img_path'] . '_450.jpg'); ?> 450w, 
											<?php echo url_for(WWW_IMG . '/inventory/' . $inventory_item['inventory_item_img_path'] . '_195.jpg'); ?> 195w" 
				/>
				<div>
					<h2><?php echo($inventory_item['name']); ?></h2>
					<?php if(isset($inventory_item['brief'])) {; ?>
					<p class="brief"><?php echo($inventory_item['brief']);?></p><?php } ?>
					<?php if(isset($inventory_item['badge'])) {; ?>
					<p class="badge"><?php echo($inventory_item['badge']);?></p><?php } ?>
					<?php if(isset($inventory_item['price2'])) {; ?>
					<p class="price">первые сутки - <?php echo($inventory_item['price1']); ?> ₽</p>
					<p class="price">вторые сутки - <?php echo($inventory_item['price2']); ?> ₽</p>
					<?php } else { ?>
					<br>
					<p class="price">первые двое суток - <?php echo($inventory_item['price1']); ?> ₽</p>
					<?php } ?>
					<p class="price">последующие сутки - <?php echo($inventory_item['price3']); ?> ₽/сут.</p>
				</div>
			</div>
		</a>
	<?php }
	mysqli_free_result($inventory_set); ?>