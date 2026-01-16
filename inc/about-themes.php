<?php
//about theme info
add_action( 'admin_menu', 'skt_association_abouttheme' );
function skt_association_abouttheme() {    	
	add_theme_page( esc_html__('About Theme', 'skt-association'), esc_html__('About Theme', 'skt-association'), 'edit_theme_options', 'skt_association_guide', 'skt_association_mostrar_guide');   
} 
//guidline for about theme
function skt_association_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>
<div class="wrapper-info">
	<div class="col-left">
   		   <div class="col-left-area">
			  <?php esc_html_e('Theme Information', 'skt-association'); ?>
		   </div>
          <p><?php esc_html_e('SKT Association theme is responsive. It caters to government municipality, alumni, university school and college websites. Civic society non profit, neighborhood charity donation, fundraiser, blood banks, activism and community kind of websites can also be built using this. Simple and built using Elementor. It is SEO friendly and compatible with contact form and WooCommerce.','skt-association'); ?></p>
          <a href="<?php echo esc_url(SKT_ASSOCIATION_SKTTHEMES_PRO_THEME_URL); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/free-vs-pro.png" alt="<?php esc_attr_e('Free Vs Pro', 'skt-association'); ?>" /></a>
	</div><!-- .col-left -->
	<div class="col-right">			
			<div class="centerbold">
				<hr />
				<a href="<?php echo esc_url(SKT_ASSOCIATION_SKTTHEMES_LIVE_DEMO); ?>" target="_blank"><?php esc_html_e('Live Demo', 'skt-association'); ?></a> | 
				<a href="<?php echo esc_url(SKT_ASSOCIATION_SKTTHEMES_PRO_THEME_URL); ?>"><?php esc_html_e('Buy Pro', 'skt-association'); ?></a> | 
				<a href="<?php echo esc_url(SKT_ASSOCIATION_SKTTHEMES_THEME_DOC); ?>" target="_blank"><?php esc_html_e('Documentation', 'skt-association'); ?></a>
                <div class="space5"></div>
				<hr />                
                <a href="<?php echo esc_url(SKT_ASSOCIATION_SKTTHEMES_THEMES); ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/sktskill.jpg" alt="<?php esc_attr_e('SKT Themes', 'skt-association'); ?>" /></a>
			</div>		
	</div><!-- .col-right -->
</div><!-- .wrapper-info -->
<?php } ?>