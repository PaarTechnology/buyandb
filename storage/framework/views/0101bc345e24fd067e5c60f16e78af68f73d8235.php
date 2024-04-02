<?php if(count($combinations[0]) > 0): ?>
	<table class="table physical_product_show table-borderless">
		<thead class="thead-light thead-50 text-capitalize">
			<tr>
				<th class="text-center">
					<label for="" class="control-label"><?php echo e(translate('SL')); ?></label>
				</th>
				<th class="text-center">
					<label for="" class="control-label"><?php echo e(translate('attribute_Variation')); ?></label>
				</th>
				<th class="text-center">
					<label for="" class="control-label"><?php echo e(translate('variation_Wise_Price')); ?> (<?php echo e(\App\CPU\BackEndHelper::currency_symbol()); ?>)</label>
				</th>
				<th class="text-center">
					<label for="" class="control-label"><?php echo e(translate('SKU')); ?></label>
				</th>
				<th class="text-center">
					<label for="" class="control-label"><?php echo e(translate('Variation_Wise_Stock')); ?></label>
				</th>
			</tr>
		</thead>
		<tbody>
<?php endif; ?>

<?php
    $serial = 1;
?>

<?php $__currentLoopData = $combinations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $combination): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<?php
		$sku = '';
		foreach (explode(' ', $product_name) as $key => $value) {
			$sku .= substr($value, 0, 1);
		}

		$str = '';
		foreach ($combination as $key => $item){
			if($key > 0 ){
				$str .= '-'.str_replace(' ', '', $item);
				$sku .='-'.str_replace(' ', '', $item);
			}
			else{
				if($colors_active == 1){
					$color_name = \App\Model\Color::where('code', $item)->first()->name;
					$str .= $color_name;
					$sku .='-'.$color_name;
				}
				else{
					$str .= str_replace(' ', '', $item);
					$sku .='-'.str_replace(' ', '', $item);
				}
			}
		}
	?>

	<?php if(strlen($str) > 0): ?>
			<tr>
                <td class="text-center">
                    <?php echo e($serial++); ?>

                </td>
				<td>
					<label for="" class="control-label"><?php echo e($str); ?></label>
				</td>
				<td>
					<input type="number" name="price_<?php echo e($str); ?>" value="<?php echo e($unit_price); ?>" min="0" step="0.01" class="form-control variation-price-input" required placeholder="<?php echo e(translate('ex')); ?>: 535">
				</td>
				<td>
					<input type="text" name="sku_<?php echo e($str); ?>" value="<?php echo e($sku); ?>" class="form-control" required placeholder="<?php echo e(translate('ex')); ?>: MCU47V593M">
				</td>
				<td>
					<input type="number" onkeyup="update_qty()" name="qty_<?php echo e($str); ?>" value="1" min="1" max="1000000" step="1" class="form-control" required placeholder="<?php echo e(translate('ex')); ?>: 5">
				</td>
			</tr>
	<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</tbody>
</table>

<script>
	update_qty();
	function update_qty()
	{
		var total_qty = 0;
		var qty_elements = $('input[name^="qty_"]');
		for(var i=0; i<qty_elements.length; i++)
		{
			total_qty += parseInt(qty_elements.eq(i).val());
		}
		if(qty_elements.length > 0)
		{

			$('input[name="current_stock"]').attr("readonly", true);
			$('input[name="current_stock"]').val(total_qty);
		}
		else{
			$('input[name="current_stock"]').attr("readonly", false);
		}
	}
	$('input[name^="qty_"]').on('keyup', function () {
		var total_qty = 0;
		var qty_elements = $('input[name^="qty_"]');
		for(var i=0; i<qty_elements.length; i++)
		{
			total_qty += parseInt(qty_elements.eq(i).val());
		}
		$('input[name="current_stock"]').val(total_qty);
	});

</script>
<?php /**PATH /home/buyandb/public_html/resources/views/admin-views/product/partials/_sku_combinations.blade.php ENDPATH**/ ?>