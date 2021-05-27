<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file.
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */



if ( ! function_exists( 'generate_top_bar' ) ) {
	add_action( 'generate_before_header', 'generate_top_bar', 5 );
	/**
	 * Build our top bar.
	 *
	 * @since 1.3.45
	 */
	function generate_top_bar() {
		if ( ! is_active_sidebar( 'top-bar' ) ) {
			return;
		}

		$inside_top_bar_class = '';

		if ( 'contained' === generate_get_option( 'top_bar_inner_width' ) ) {
			$inside_top_bar_class = ' grid-container grid-parent';

			if ( generate_is_using_flexbox() ) {
				$inside_top_bar_class = ' grid-container';
			}
		}
		?>
		
		<div <?php generate_do_element_classes( 'top_bar' ); ?>>
		
			<div class="d-none d-md-block d-xl-block inside-top-bar<?php echo $inside_top_bar_class; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- False positive. ?>">
			
		
			<div class="row">
			<div class="col-md-4 p-0"><?php dynamic_sidebar( 'top-bar' ); ?></div>
			<div class="col-md-4 p-0"><b>Working hours:</b> Mon-Fri 09:00 - 18:00</div>
			<div class="col-md-4 p-0"><b>Address:</b> 13a, Narva mnt., Tallinn, 10151, Estonia</div>
		</div>
			
	

			</div>
		</div>
		<?php
	}
}


if ( ! function_exists( 'generate_add_footer_info' ) ) {
	add_action( 'generate_credits', 'generate_add_footer_info' );
	/**
	 * Add the copyright to the footer
	 *
	 * @since 0.1
	 */
	function generate_add_footer_info() {
		$copyright = sprintf(
			'<span class="copyright">&copy; %1$s %2$s</span> &bull; %4$s <a href="%3$s"%6$s>%5$s</a>',
			date( 'Y' ), // phpcs:ignore
			get_bloginfo( 'name' ),
			esc_url( 'https://puzzle-agency.by' ),
			_x( 'Built in', 'GeneratePress', 'generatepress' ),
			__( 'Puzzle-agency', 'generatepress' ),
			'microdata' === generate_get_schema_type() ? ' itemprop="url"' : ''
		);

		echo apply_filters( 'generate_copyright', $copyright ); // phpcs:ignore
	}
}
if ( ! function_exists( 'generate_construct_footer' ) ) {
	add_action( 'generate_footer', 'generate_construct_footer' );
	/**
	 * Build our footer.
	 *
	 * @since 1.3.42
	 */
	function generate_construct_footer() {
		$inside_site_info_class = '';

		if ( 'full-width' !== generate_get_option( 'footer_inner_width' ) ) {
			$inside_site_info_class = ' grid-container grid-parent';

			if ( generate_is_using_flexbox() ) {
				$inside_site_info_class = ' grid-container';
			}
		}
		?>
<footer <?php generate_do_element_classes( 'site-info', 'site-info' ); ?>>
	<div class="inside-site-info<?php echo $inside_site_info_class; // phpcs:ignore ?>">
		<?php
				/**
				 * generate_before_copyright hook.
				 *
				 * @since 0.1
				 *
				 * @hooked generate_footer_bar - 15
				 */
				do_action( 'generate_before_copyright' );
				?>
		<div class="copyright-bar">
			<?php
					/**
					 * generate_credits hook.
					 *
					 * @since 0.1
					 *
					 * @hooked generate_add_footer_info - 10
					 */
					do_action( 'generate_credits' );
					?>
		</div>
	</div>
</footer>
<?php
	}
}



 
if ( ! function_exists( 'generate_navigation_position' ) ) {
	/**
	 * Build the navigation.
	 *
	 * @since 0.1
	 */
	function generate_navigation_position() {
		/**
		 * generate_before_navigation hook.
		 *
		 * @since 3.0.0
		 */
		do_action( 'generate_before_navigation' );
		?>
<nav id="site-navigation" <?php generate_do_element_classes( 'navigation' ); ?>>
	<div <?php generate_do_element_classes( 'inside_navigation' ); ?>>
		<?php
				/**
				 * generate_inside_navigation hook.
				 *
				 * @since 0.1
				 *
				 * @hooked generate_navigation_search - 10
				 * @hooked generate_mobile_menu_search_icon - 10
				 */
				do_action( 'generate_inside_navigation' );
				?>

		

		
	
		<!-- форма поиска -->
		<div  type="" class="pr-3 d-none d-inline">
			<?php get_template_part( 'advanced2', 'searchform' ); ?>
		</div>
		<!-- форма поиска конец -->
		<!-- номер телефона -->
		<div type="" class="pr-3 d-inline">
			<a href="tel:+ 372 6143 135"><img width="20" src="/wp-content/uploads/2021/04/phone-1.png" alt="">
			<div class=" d-none d-xl-inline"> + 372 6143 135</div></a>
		</div>	
		<!-- номер телефона конец-->
	<!-- каталог -->
	<a href="/shop" " class="btn btn-primary d-inline mr-3"  >
        <svg style="margin: -2px 0;" width="24" height="20" fill="none" xmlns="http://www.w3.org/2000/svg" class="_1nZS"><path fill-rule="evenodd" clip-rule="evenodd" d="M5 6a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zm4-1a1 1 0 000 2h12a1 1 0 100-2H9zm0 6a1 1 0 100 2h12a1 1 0 100-2H9zm-1 7a1 1 0 011-1h6a1 1 0 110 2H9a1 1 0 01-1-1zm-4.5-4.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM5 18a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" fill="currentColor"></path></svg>
       <div class=" d-none d-xl-inline"> Kataloog</div>
		</a>
		<!-- каталог конец-->
		<!-- Задать вопрос -->
		<button type="button" class="btn btn-primary  d-none d-md-inline d-xl-inline" data-toggle="modal" data-target="#exampleModal">
		Küsi küsimus
		</button>
		<!-- Задать вопрос конец-->
		<?php
				/**
				 * generate_after_mobile_menu_button hook
				 *
				 * @since 3.0.0
				 */
				do_action( 'generate_after_mobile_menu_button' );
                    /*
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container' => 'div',
						'container_class' => 'main-nav',
						'container_id' => 'primary-menu',
						'menu_class' => '',
						'fallback_cb' => 'generate_menu_fallback',
						'items_wrap' => '<ul id="%1$s" class="%2$s ' . join( ' ', generate_get_element_classes( 'menu' ) ) . '">%3$s</ul>',
					)
				);
                    */
				/**
				 * generate_after_primary_menu hook.
				 *
				 * @since 2.3
				 */
				do_action( 'generate_after_primary_menu' );
				?>
	</div>
</nav>
<?php
		/**
		 * generate_after_navigation hook.
		 *
		 * @since 3.0.0
		 */
		do_action( 'generate_after_navigation' );
}}

add_action('woocommerce_before_main_content','custom_title_show',15 );
function custom_title_show(){
	if(is_single()){}else{
	if ( apply_filters( 'woocommerce_show_page_title', true )  ) : ?>

<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>

<?php endif;
}
}

remove_action( 'woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price' );
remove_action( 'woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating' );
remove_action( 'woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart' );
remove_action( 'woocommerce_before_shop_loop','woocommerce_catalog_ordering', 30);
remove_action( 'woocommerce_before_shop_loop','woocommerce_result_count',20);
remove_action( 'woocommerce_shop_loop_subcategory_title','woocommerce_template_loop_category_title',10);
remove_action( 'woocommerce_single_product_summary','woocommerce_template_single_meta',40);
remove_action( 'woocommerce_single_product_summary','woocommerce_template_single_add_to_cart',30);
/**delete mark in subcat list */
add_filter( 'woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title_custom',5 );
function woocommerce_template_loop_category_title_custom( $category ) {
	?>
<h2 class="woocommerce-loop-category__title">
	<span>
		<?php
		echo esc_html( $category->name );
		?>
	</span>
</h2>


<?php
	$category->count = 0;
	return $category;
}

// подключаем js файл темы
add_action( 'wp_enqueue_scripts', 'theme_add_scripts' );
function theme_add_scripts() {
	wp_enqueue_script( 'script-main', get_stylesheet_directory_uri() .'/main.js', array(), '1.0', true );
	wp_enqueue_script( 'script-main2', get_stylesheet_directory_uri() .'/bootstrap/js/bootstrap.bundle.min.js', array(), '1.0', true );
	wp_enqueue_style( 'script-footer', get_stylesheet_directory_uri() .'/bootstrap/css/bootstrap.min.css', array(), '1.0', false );
}
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb',20);
add_action('woocommerce_before_main_content','woocommerce_breadcrumb_custom',21);
function woocommerce_breadcrumb_custom() {
	if(is_single()){}else{
		woocommerce_breadcrumb();
	}
}


add_action('wp_footer','add_modal',21);
function add_modal() {
?>
<!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xs " role="document">
		<div class="modal-content">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span style="font-weight: 200;position: absolute;right: 7px;top: -3px;font-size: 45px;color: #000;"
					aria-hidden="true">&times;</span>
			</button>
			<div class="modal-body">

				<?=do_shortcode('[contact-form-7 id="92" title="Контактная форма 1"]')?>
			</div>

		</div>
	</div>
</div>


<!-- Modal2 -->
<div class="modal fade " id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered  modal-md" role="document">
		<div class="modal-content">
            <button type="button" class="close close-catalog-btn" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
			<div class="row">

				
				<div class="col-md-12">
					<h5 class="text-center"> Kataloog</h5>

					<?php wp_nav_menu(
					        array('theme_location'=>'catalog-menu')
                    ); ?>

				</div>


					<div class="col-md-12">
					<h5 class="text-center">Firma</h5>
					<?php wp_nav_menu(); ?>
					<h5 class="text-center">Kontaktid:</h5>
					<p class="m-0">BIO RESEARCH EESTI OÜ</p>
					<p class="m-0">Reg. Number    12811028</p>
					<p class="m-0">Address: 13a, Narva mnt., Tallinn, 10151, Estonia</p>
					<p class="m-0">	Tel. + 372 6143 135</p>
					<p class="m-0">E-mail: info@bio-research.ee</p>
				</div>
					
			</div>


		</div>
	</div>
</div>
<?
}




/**
 * Product Categories Widget
 *
 * @package WooCommerce\Widgets
 * @version 2.3.0
 */

defined( 'ABSPATH' ) || exit;


function wc_register_widgets_custom() {

	register_widget( 'WC_Widget_Product_Categories_custom' );
	
}
add_action( 'widgets_init', 'wc_register_widgets_custom' );

// Product categories widget class custom
class WC_Widget_Product_Categories_custom extends WC_Widget {

	/**
	 * Category ancestors.
	 *
	 * @var array
	 */
	public $cat_ancestors;

	/**
	 * Current Category.
	 *
	 * @var bool
	 */
	public $current_cat;

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->widget_cssclass    = 'woocommerce widget_product_categories';
		$this->widget_description = __( 'A list or dropdown of product categories.', 'woocommerce' );
		$this->widget_id          = 'woocommerce_product_categories_custom';
		$this->widget_name        = 'category-custom_custom';
		$this->settings           = array(
			'title'              => array(
				'type'  => 'text',
				'std'   => __( 'Product categories', 'woocommerce' ),
				'label' => __( 'Title', 'woocommerce' ),
			),
			'orderby'            => array(
				'type'    => 'select',
				'std'     => 'name',
				'label'   => __( 'Order by', 'woocommerce' ),
				'options' => array(
					'order' => __( 'Category order', 'woocommerce' ),
					'name'  => __( 'Name', 'woocommerce' ),
				),
			),
			'dropdown'           => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => __( 'Show as dropdown', 'woocommerce' ),
			),
			'count'              => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => __( 'Show product counts', 'woocommerce' ),
			),
			'hierarchical'       => array(
				'type'  => 'checkbox',
				'std'   => 1,
				'label' => __( 'Show hierarchy', 'woocommerce' ),
			),
			'show_children_only' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => __( 'Only show children of the current category', 'woocommerce' ),
			),
			'hide_empty'         => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => __( 'Hide empty categories', 'woocommerce' ),
			),
			'max_depth'          => array(
				'type'  => 'text',
				'std'   => '',
				'label' => __( 'Maximum depth', 'woocommerce' ),
			),
		);

		parent::__construct();
	}

	/**
	 * Output widget.
	 *
	 * @see WP_Widget
	 * @param array $args     Widget arguments.
	 * @param array $instance Widget instance.
	 */
	public function widget( $args, $instance ) {
		global $wp_query, $post;

		$count              = isset( $instance['count'] ) ? $instance['count'] : $this->settings['count']['std'];
		$hierarchical       = isset( $instance['hierarchical'] ) ? $instance['hierarchical'] : $this->settings['hierarchical']['std'];
		$show_children_only = isset( $instance['show_children_only'] ) ? $instance['show_children_only'] : $this->settings['show_children_only']['std'];
		$dropdown           = isset( $instance['dropdown'] ) ? $instance['dropdown'] : $this->settings['dropdown']['std'];
		$orderby            = isset( $instance['orderby'] ) ? $instance['orderby'] : $this->settings['orderby']['std'];
		$hide_empty         = isset( $instance['hide_empty'] ) ? $instance['hide_empty'] : $this->settings['hide_empty']['std'];
		$dropdown_args      = array(
			'hide_empty' => $hide_empty,
		);
		$list_args          = array(
			'show_count'   => $count,
			'hierarchical' => $hierarchical,
			'taxonomy'     => 'product_cat',
			'hide_empty'   => $hide_empty,
		);
		$max_depth          = absint( isset( $instance['max_depth'] ) ? $instance['max_depth'] : $this->settings['max_depth']['std'] );

		$list_args['menu_order'] = false;
		$dropdown_args['depth']  = $max_depth;
		$list_args['depth']      = $max_depth;

		if ( 'order' === $orderby ) {
			$list_args['orderby']      = 'meta_value_num';
			$dropdown_args['orderby']  = 'meta_value_num';
			$list_args['meta_key']     = 'order';
			$dropdown_args['meta_key'] = 'order';
		}

		$this->current_cat   = false;
		$this->cat_ancestors = array();

		if ( is_tax( 'product_cat' ) ) {
			$this->current_cat   = $wp_query->queried_object;
			$this->cat_ancestors = get_ancestors( $this->current_cat->term_id, 'product_cat' );

		} elseif ( is_singular( 'product' ) ) {
			$terms = wc_get_product_terms(
				$post->ID,
				'product_cat',
				apply_filters(
					'woocommerce_product_categories_widget_product_terms_args',
					array(
						'orderby' => 'parent',
						'order'   => 'DESC',
					)
				)
			);

			if ( $terms ) {
				$main_term           = apply_filters( 'woocommerce_product_categories_widget_main_term', $terms[0], $terms );
				$this->current_cat   = $main_term;
				$this->cat_ancestors = get_ancestors( $main_term->term_id, 'product_cat' );
			}
		}

		// Show Siblings and Children Only.
		if ( $show_children_only && $this->current_cat ) {
			if ( $hierarchical ) {
				$include = array_merge(
					$this->cat_ancestors,
					array( $this->current_cat->term_id ),
					get_terms(
						'product_cat',
						array(
							'fields'       => 'ids',
							'parent'       => 0,
							'hierarchical' => true,
							'hide_empty'   => false,
						)
					),
					get_terms(
						'product_cat',
						array(
							'fields'       => 'ids',
							'parent'       => $this->current_cat->term_id,
							'hierarchical' => true,
							'hide_empty'   => false,
						)
					)
				);
				// Gather siblings of ancestors.
				if ( $this->cat_ancestors ) {
					foreach ( $this->cat_ancestors as $ancestor ) {
						$include = array_merge(
							$include,
							get_terms(
								'product_cat',
								array(
									'fields'       => 'ids',
									'parent'       => $ancestor,
									'hierarchical' => false,
									'hide_empty'   => false,
								)
							)
						);
					}
				}
			} else {
				// Direct children.
				$include = get_terms(
					'product_cat',
					array(
						'fields'       => 'ids',
						'parent'       => $this->current_cat->term_id,
						'hierarchical' => true,
						'hide_empty'   => false,
					)
				);
			}

			$list_args['include']     = implode( ',', $include );
			$dropdown_args['include'] = $list_args['include'];

			if ( empty( $include ) ) {
				return;
			}
		} elseif ( $show_children_only ) {
			$dropdown_args['depth']        = 1;
			$dropdown_args['child_of']     = 0;
			$dropdown_args['hierarchical'] = 1;
			$list_args['depth']            = 1;
			$list_args['child_of']         = 0;
			$list_args['hierarchical']     = 1;
		}

		$this->widget_start( $args, $instance );

		if ( $dropdown ) {
			wc_product_dropdown_categories(
				apply_filters(
					'woocommerce_product_categories_widget_dropdown_args',
					wp_parse_args(
						$dropdown_args,
						array(
							'show_count'         => $count,
							'hierarchical'       => $hierarchical,
							'show_uncategorized' => 0,
							'selected'           => $this->current_cat ? $this->current_cat->slug : '',
						)
					)
				)
			);

			wp_enqueue_script( 'selectWoo' );
			wp_enqueue_style( 'select2' );

			wc_enqueue_js(
				"
				jQuery( '.dropdown_product_cat' ).change( function() {
					if ( jQuery(this).val() != '' ) {
						var this_page = '';
						var home_url  = '" . esc_js( home_url( '/' ) ) . "';
						if ( home_url.indexOf( '?' ) > 0 ) {
							this_page = home_url + '&product_cat=' + jQuery(this).val();
						} else {
							this_page = home_url + '?product_cat=' + jQuery(this).val();
						}
						location.href = this_page;
					} else {
						location.href = '" . esc_js( wc_get_page_permalink( 'shop' ) ) . "';
					}
				});

				if ( jQuery().selectWoo ) {
					var wc_product_cat_select = function() {
						jQuery( '.dropdown_product_cat' ).selectWoo( {
							placeholder: '" . esc_js( __( 'Select a category', 'woocommerce' ) ) . "',
							minimumResultsForSearch: 5,
							width: '100%',
							allowClear: true,
							language: {
								noResults: function() {
									return '" . esc_js( _x( 'No matches found', 'enhanced select', 'woocommerce' ) ) . "';
								}
							}
						} );
					};
					wc_product_cat_select();
				}
			"
			);
		} else {
			include_once WC()->plugin_path() . '/includes/walkers/class-wc-product-cat-list-walker-custom.php';

			$list_args['walker']                     = new WC_Product_Cat_List_Walker_custom();
			$list_args['title_li']                   = ' ';
			$list_args['pad_counts']                 = 1;
			$list_args['show_option_none']           = __( 'No product categories exist.', 'woocommerce' );
			$list_args['current_category']           = ( $this->current_cat ) ? $this->current_cat->term_id : '';
			$list_args['current_category_ancestors'] = $this->cat_ancestors;
			$list_args['max_depth']                  = $max_depth;

			echo '<ul class="product-categories_custom">';

			wp_list_categories( apply_filters( 'woocommerce_product_categories_widget_args', $list_args ) );

			echo '</ul>';
		}

		$this->widget_end( $args );
	}
}

add_action( 'after_setup_theme', 'theme_register_nav_menu' );
function theme_register_nav_menu() {
    register_nav_menu( 'catalog-menu', 'Catalog list' );
}

//separate category and products
remove_filter( 'woocommerce_product_loop_start', 'woocommerce_maybe_show_product_subcategories' );
// add subcategories before the product loop (yet after catalog_ordering and result_count -> see priority 40)
//add_action( 'woocommerce_before_shop_loop', 'wp56123_show_product_subcategories', 40 );

function wp56123_show_product_subcategories() {
    $subcategories = woocommerce_maybe_show_product_subcategories();
    if ($subcategories) {
        echo '<ul class="products columns-3 ">',$subcategories,'</ul><hr>';
    }
}

//enable gutenberg for wordpress
function activate_gutenberg_products($can_edit, $post_type){
    if($post_type == 'product'){
        $can_edit = true;
    }

    return $can_edit;
}
//add_filter('use_block_editor_for_post_type', 'activate_gutenberg_products', 10, 2);

add_filter( 'woocommerce_single_product_carousel_options', 'truemisha_product_gallery_arrows' );

function truemisha_product_gallery_arrows( $options ) {

    $options[ 'directionNav' ] = true;
    $options[ 'controlNav' ] = false ;
    $options[ 'smoothHeight'  ] = true;
    $options[ 'prevText'  ] = "<img class='flex-prev-custom' src='/wp-content/uploads/2021/05/arrow2.png'>";
    $options[ 'nextText'  ] = "<img class='flex-next-custom' src='/wp-content/uploads/2021/05/arrow2.png'>";


    return $options;

}

if ( ! function_exists( 'woocommerce_template_loop_product_link_open' ) ) {
    /**
     * Insert the opening anchor tag for products in the loop.
     */
    function woocommerce_template_loop_product_link_open() {
        global $product;

        $link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );

        $term = $product->get_attribute('pa_brand');
        $term = get_term_by('slug', $term, 'pa_brand');
        $brand_url=get_field('brand_logo', 'pa_brand_' . $term->term_id);
        if($brand_url==''){
            echo '<div class="woo_image_block"><a href="' . esc_url( $link ) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">';
        }else{
            echo '<div class="woo_image_block"><img class="product_brand" src="'.$brand_url.'"><a href="' . esc_url( $link ) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">';
        }

    }
}
if ( ! function_exists( 'woocommerce_template_loop_product_link_close' ) ) {
    /**
     * Insert the closing anchor tag for products in the loop.
     */
    function woocommerce_template_loop_product_link_close() {
        echo '</a></div>';
    }
}

add_filter( 'product_cat_class', 'remove_category_class', 21, 3 ); //woocommerce use priority 20, so if you want to do something after they finish be more lazy
function remove_category_class( $classes ) {
    if ( 'product' == get_post_type() ) {
        $classes = array_diff( $classes, array( 'last','first' ) );
    }
    return $classes;
}
add_filter( 'woocommerce_post_class', 'remove_post_class', 21, 3 ); //woocommerce use priority 20, so if you want to do something after they finish be more lazy
function remove_post_class( $classes ) {
    if ( 'product' == get_post_type() ) {
        $classes = array_diff( $classes, array( 'last','first' ) );
    }
    return $classes;

}
if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) {

    /**
     * Get the product thumbnail for the loop.
     */
    function woocommerce_template_loop_product_thumbnail() {
        // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        echo'<div class="product_loop_img_wrapper">';
        echo woocommerce_get_product_thumbnail();
        echo'</div>';
    }
}

