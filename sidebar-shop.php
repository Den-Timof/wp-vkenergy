<div class="d-none d-md-block col-4">
	<div class="sidebar-shop sidebar-list">
		<a href="<?php echo get_category_link(64) ?>" class="sidebar-title">
			<?php ?>
			Каталог продукции
		</a>

			<?php

				$taxonomy     = 'product_cat';
				$order        = 'menu_order';
				$orderby      = 'ID';
				$show_count   = 0;
				$pad_counts   = 0;
				$hierarchical = 1;
				$title        = '';
				$empty        = 0;
				$exclude      = '15';

				$args = array(
					'taxonomy'     => $taxonomy,
					'order'        => $order,
					'orderby'      => $orderby,
					'show_count'   => $show_count,
					'pad_counts'   => $pad_counts,
					'hierarchical' => $hierarchical,
					'title_li'     => $title,
					'exclude'      => $exclude,
					'hide_empty'   => $empty
				);
		
				$all_categories = get_categories( $args );
				
				foreach ($all_categories as $cat) {

					
					$term_link = get_term_link( $cat );
					
					if($cat->category_parent == 64) {
						echo '<div class="sidebar-list-elem">';

							$category_id = $cat->term_id;
			?>
				<a style="color: #242d34;" href="<?php echo $term_link; ?>">
					<strong><?php echo $cat->name ?></strong>
				</a>
			
				<?php
					$subcat_args = array(
						'child_of'     => $category_id,
						'taxonomy'     => $taxonomy,
						'order'        => $order,
						'orderby'      => $orderby,
						'show_count'   => $show_count,
						'pad_counts'   => $pad_counts,
						'hierarchical' => $hierarchical,
						'title_li'     => $title,
						'exclude'      => $exclude,
						'hide_empty'   => $empty
					);
				
					$all_subcategories = get_categories( $subcat_args );
					
					// echo '<br>' . $category_id . '<br>';
					// var_dump($all_subcategories);

					echo '<ul>';

					foreach ($all_subcategories as $subcat) {

						$term_link = get_term_link( $subcat );

						if($subcat->category_parent == $category_id) {
							echo '<li><a href="'.$term_link.'">'.$subcat->name.'</a></li>';
						}
					}

					echo '</ul>';
				
				?>
			
			<?php
					echo '</div>';
					
					}
				}
			?>

	</div>
</div>