<?php
global $ccollapsePlugin; // we'll need this below
?>
<div class="wrap">
    <h2>Collapser Settings</h2>
    <p>As per settings found here <a href="https://github.com/vaakash/jquery-collapser">VaaKash jQuery Collapser</a></p>

    <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    	<?php $ccollapsePlugin->the_nonce(); ?>
    	<table class="form-table">
			<tbody>
				<tr>
					<th scope="row" valign="top">Mode</th>
					<td>
						<label>

<?php $c_mode = $ccollapsePlugin->get_setting('ccollapse_truncate_mode'); ?>

<select name="<?php echo $ccollapsePlugin->get_field_name('ccollapse_truncate_mode'); ?>">
  <option value="chars" <?php if ($c_mode == 'chars') echo 'selected'; ?>>Charactars</option>
  <option value="words" <?php if ($c_mode == 'words') echo 'selected'; ?>>Words</option>
  <option value="lines" <?php if ($c_mode == 'lines') echo 'selected'; ?>>Lines</option>
  <option value="block" <?php if ($c_mode == 'block') echo 'selected'; ?>>Whole Element</option>
</select>
						
							<br />
							
						</label>
					</td>
				</tr>	

				<tr>
					<th scope="row" valign="top">Ammount</th>
					<td>
						<label>
							<input type="text" name="<?php echo $ccollapsePlugin->get_field_name('ccollapse_truncate_amount'); ?>" value="<?php echo $ccollapsePlugin->get_setting('ccollapse_truncate_amount'); ?>" /><br />
						</label>
					</td>
				</tr>
				
				
				<tr>
					<th scope="row" valign="top">Speed</th>
					<td>
						<label>

<?php $c_speed = $ccollapsePlugin->get_setting('ccollapse_truncate_speed'); ?>

<select name="<?php echo $ccollapsePlugin->get_field_name('ccollapse_truncate_speed'); ?>">
  <option value="slow" <?php if ($c_speed == 'slow') echo 'selected'; ?>>Slow</option>
  <option value="medium" <?php if ($c_speed == 'medium') echo 'selected'; ?>>Medium</option>
  <option value="fast" <?php if ($c_speed == 'fast') echo 'selected'; ?>>Fast</option>
</select>
						
							<br />
							
						</label>
					</td>
				</tr>

	
			</tbody>
    	</table>
    	<input class="button-primary" type="submit" value="Save Settings" />
    </form>
</div>