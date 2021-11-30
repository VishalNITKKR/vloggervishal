<?php
add_action('wp_enqueue_scripts', 'hello_vloggers_enqueue_styles');
function hello_vloggers_enqueue_styles()
{
    wp_enqueue_style('hello-vloggers-parent-style', get_template_directory_uri() . '/style.css');
}

function hello_vloggers_google_fonts()
{
    wp_enqueue_style('hello-vloggers-google-fonts', '//fonts.googleapis.com/css?family=Open+Sans:400,600', false);
}
add_action('wp_enqueue_scripts', 'hello_vloggers_google_fonts');

require get_stylesheet_directory() . '/inc/custom-header.php';

function hello_vloggers_customize_register($wp_customize)
{
    $wp_customize->add_setting('center_header_text', array(
        'default' => 1,
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('center_header_text', array(
        'label'    => __('Center Header Text', 'hello-vloggers'),
        'section'  => 'header_image',
        'priority' => 0,
        'settings' => 'center_header_text',
        'type'     => 'checkbox',
    ));


    $wp_customize->add_setting('primary_theme_color', array(
        'default'           => '#c69c6d',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_theme_color', array(
        'label'       => __('Primary Theme Color', 'hello-vloggers'),
        'section'     => 'theme_color',
        'priority'   => 1,
        'settings'    => 'primary_theme_color',
    )));


    $wp_customize->add_section('colors', array(
        'title'      => __('Background Color', 'hello-vloggers'),
        'priority'   => 150,
        'capability' => 'edit_theme_options',

    ));
    $wp_customize->add_section('static_front_page', array(
        'title'      => __('Static Front Page', 'hello-vloggers'),
        'priority'   => 150,
        'capability' => 'edit_theme_options',

    ));
    $wp_customize->add_section('sidebars_settings', array(
        'title'      => __('Sidebar', 'hello-vloggers'),
        'priority'   => 100,
        'capability' => 'edit_theme_options',
    ));
    $wp_customize->add_section('all_blog_posts', array(
        'title'      => __('All Blog Posts', 'hello-vloggers'),
        'priority'   => 100,
        'capability' => 'edit_theme_options',
    ));
    $wp_customize->add_section('customizable_blogily_header_settings', array(
        'title'      => __('Header', 'hello-vloggers'),
        'priority'   => 122,
        'capability' => 'edit_theme_options',
    ));
    $wp_customize->add_section('navigation_settings', array(
        'title'      => __('Navigation Settings', 'hello-vloggers'),
        'priority'   => 50,
        'capability' => 'edit_theme_options',
    ));
    $wp_customize->add_section('upper_widgets_settings', array(
        'title'      => __('Top Widget Settings', 'hello-vloggers'),
        'priority'   => 50,
        'capability' => 'edit_theme_options',
    ));

    /***************************************************/
    /*****               pagination                ****/
    /**************************************************/
    $wp_customize->add_section('customizable_blogily_pagination_settings', array(
        'title'      => __('Pagination Type', 'hello-vloggers'),
        'priority'   => 122,
        'capability' => 'edit_theme_options',

    ));


    $wp_customize->add_setting( 'show_post_categories', array(
        'default' => 0,
        'sanitize_callback' => 'hello_vloggers_sanitize_checkbox',
    ) );

    $wp_customize->add_control( 'show_post_categories', array(
        'label'    => __( 'Hide post categories', 'hello-vloggers' ),
        'section'  => 'all_blog_posts',
        'priority' => 1,
        'settings' => 'show_post_categories',
        'type'     => 'checkbox',
    ) );

    function hello_vloggers_sanitize_checkbox( $input ) {

    // Boolean check 
        return ( ( isset( $input ) && true == $input ) ? true : false );
    }


    $wp_customize->add_setting('customizable_blogily_pagination_type', array(
        'default'           => '1',
        'capability'        => 'edit_theme_options',
        'priority'   => 1,
        'sanitize_callback' => 'hello_vloggers_sanitize_select',
    ));

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'customizable_blogily_pagination_type',
            array(
                'label'     => __('Pagination Type', 'hello-vloggers'),
                'section'   => 'all_blog_posts',

                'settings'  => 'customizable_blogily_pagination_type',
                'type'      => 'radio',
                'choices'  => array(
                    '0'   => __('Next/Previous', 'hello-vloggers'),
                    '1'  => __('Numbered', 'hello-vloggers'),
                ),
                'transport' => 'refresh',
                'priority'   => 99,
            )
        )
    );

    //Breadcrumb
    $wp_customize->add_setting('customizable_blogily_single_breadcrumb_section', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'hello_vloggers_sanitize_select',
        'transport'         => 'refresh',
        'default'           => '1',
    ));
    $wp_customize->add_control('customizable_blogily_single_breadcrumb_section', array(
        'label'    => __('Breadcrumb Section', 'hello-vloggers'),
        'section'  => 'customizable_single_settings',
        'description' => __('This setting will only affect blog posts.', 'hello-vloggers'),
        'settings' => 'customizable_blogily_single_breadcrumb_section',
        'type'     => 'radio',
        'choices'  => array(
            '1' => __('OFF', 'hello-vloggers'),
            '0' => __('ON', 'hello-vloggers'),
        ),
    ));

    //Tags
    $wp_customize->add_setting('customizable_blogily_single_tags_section', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'hello_vloggers_sanitize_select',
        'transport'         => 'refresh',
        'default'           => '1',
    ));
    $wp_customize->add_control('customizable_blogily_single_tags_section', array(
        'label'    => __('Tags Section', 'hello-vloggers'),
        'section'  => 'customizable_single_settings',
        'description' => __('This setting will only affect blog posts.', 'hello-vloggers'),
        'settings' => 'customizable_blogily_single_tags_section',
        'type'     => 'radio',
        'choices'  => array(
            '0' => __('OFF', 'hello-vloggers'),
            '1' => __('ON', 'hello-vloggers'),
        ),
    ));

    //Related Posts
    $wp_customize->add_setting('customizable_blogily_relatedposts_section', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'hello_vloggers_sanitize_select',
        'transport'         => 'refresh',
        'default'           => '1',
    ));
    $wp_customize->add_control('customizable_blogily_relatedposts_section', array(
        'label'    => __('Related Posts Section', 'hello-vloggers'),
        'section'  => 'customizable_single_settings',
        'description' => __('This setting will only affect blog posts.', 'hello-vloggers'),
        'settings' => 'customizable_blogily_relatedposts_section',
        'type'     => 'radio',
        'choices'  => array(
            '1' => __('OFF', 'hello-vloggers'),
            '0' => __('ON', 'hello-vloggers'),
        ),
    ));

    //Author Box
    $wp_customize->add_setting('customizable_blogily_authorbox_section', array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'hello_vloggers_sanitize_select',
        'transport'         => 'refresh',
        'default'           => '1',
    ));
    $wp_customize->add_control('customizable_blogily_authorbox_section', array(
        'label'    => __('Author box Section', 'hello-vloggers'),
        'section'  => 'customizable_single_settings',
        'description' => __('This setting will only affect blog posts.', 'hello-vloggers'),
        'settings' => 'customizable_blogily_authorbox_section',
        'type'     => 'radio',
        'choices'  => array(
            '1' => __('OFF', 'hello-vloggers'),
            '0' => __('ON', 'hello-vloggers'),
        ),
    ));
}
add_action('customize_register', 'hello_vloggers_customize_register');

if (! function_exists('hello_vloggers_color_choice')):
    function hello_vloggers_color_choice()
    {
        ?>

        <style type="text/css">

            <?php if (get_theme_mod('center_header_text') == '0') : ?>      
                .site-branding, .site-branding * {
                    text-align: center;
                }
            <?php endif; ?>
            .related-posts .related-posts-no-img h5.title.front-view-title, #tabber .inside li .meta b,footer .widget li a:hover,.fn a,.reply a,#tabber .inside li div.info .entry-title a:hover, #navigation ul ul a:hover,.single_post a, a:hover, .sidebar.c-4-12 .textwidget a, #site-footer .textwidget a, #commentform a, #tabber .inside li a, .copyrights a:hover, a, .sidebar.c-4-12 a:hover, .top a:hover, footer .tagcloud a:hover,.sticky-text { color: <?php echo esc_attr(get_theme_mod('primary_theme_color')); ?>; }
            .total-comments span:after, span.sticky-post, .nav-previous a:hover, .nav-next a:hover, #commentform input#submit, #searchform input[type='submit'], .home_menu_item, .currenttext, .pagination a:hover, .readMore a, .customizableblogily-subscribe input[type='submit'], .pagination .current, .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce-product-search input[type="submit"], .woocommerce a.button, .woocommerce-page a.button, .woocommerce button.button, .woocommerce-page button.button, .woocommerce input.button, .woocommerce-page input.button, .woocommerce #respond input#submit, .woocommerce-page #respond input#submit, .woocommerce #content input.button, .woocommerce-page #content input.button, #sidebars h3.widget-title:after, .postauthor h4:after, .related-posts h3:after, .archive .postsby span:after, .comment-respond h4:after, .single_post header:after, #cancel-comment-reply-link, .upper-widgets-grid h3:after  { background-color: <?php echo esc_attr(get_theme_mod('primary_theme_color')); ?>; }
            #sidebars .widget h3, #sidebars .widget h3 a { border-left-color: <?php echo esc_attr(get_theme_mod('primary_theme_color')); ?>; }
            .related-posts-no-img, #navigation ul li.current-menu-item a, .woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce-page nav.woocommerce-pagination ul li span.current, .woocommerce #content nav.woocommerce-pagination ul li span.current, .woocommerce-page #content nav.woocommerce-pagination ul li span.current, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce-page nav.woocommerce-pagination ul li a:hover, .woocommerce #content nav.woocommerce-pagination ul li a:hover, .woocommerce-page #content nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce-page nav.woocommerce-pagination ul li a:focus, .woocommerce #content nav.woocommerce-pagination ul li a:focus, .woocommerce-page #content nav.woocommerce-pagination ul li a:focus, .pagination .current, .tagcloud a { border-color: <?php echo esc_attr(get_theme_mod('primary_theme_color')); ?>; }
            .corner { border-color: transparent transparent <?php echo esc_attr(get_theme_mod('primary_theme_color')); ?> transparent;}
            .pagination a, .pagination2, .pagination .dots, .post.excerpt { background: <?php echo esc_attr(get_theme_mod('all_blog_posts_bg')); ?>; }
            #content, #comments, #commentsAdd, .related-posts, .single-post .post.excerpt, .postauthor { background: <?php echo esc_attr(get_theme_mod('post_page_background')); ?>; }
            #sidebars .widget { background: <?php echo esc_attr(get_theme_mod('sidebar_background_color')); ?>; }
            .upper-widgets-grid { background: <?php echo esc_attr(get_theme_mod('upper_widgets_background_color')); ?>; }
            footer { background: <?php echo esc_attr(get_theme_mod('footer_bg_color')); ?>; }
            .copyrights { background: <?php echo esc_attr(get_theme_mod('footer_copyright_bg_color')); ?>; }
            #site-header { background-color: <?php echo esc_attr(get_theme_mod('top_header_background_color')); ?>; }
            .primary-navigation, .primary-navigation, #navigation ul ul li { background-color: <?php echo esc_attr(get_theme_mod('navigation_background_color')); ?>; }
            a#pull, #navigation .menu a, #navigation .menu a:hover, #navigation .menu .fa > a, #navigation .menu .fa > a, #navigation .toggle-caret, #navigation span.site-logo a, #navigation.mobile-menu-wrapper .site-logo a, .primary-navigation.header-activated #navigation ul ul li a { color: <?php echo esc_attr(get_theme_mod('navigation_link_color')); ?> }
            #sidebars .widget h3, #sidebars .widget h3 a, #sidebars h3 { color: <?php echo esc_attr(get_theme_mod('sidebar_headline_color')); ?>; }
            #sidebars .widget a, #sidebars a, #sidebars li a { color: <?php echo esc_attr(get_theme_mod('sidebar_link_color')); ?>; }
            #sidebars .widget, #sidebars, #sidebars .widget li { color: <?php echo esc_attr(get_theme_mod('sidebar_text_color')); ?>; }
            .post.excerpt .post-content, .pagination a, .pagination2, .pagination .dots { color: <?php echo esc_attr(get_theme_mod('all_blog_posts_text')); ?>; }
            .post.excerpt h2.title a { color: <?php echo esc_attr(get_theme_mod('all_blog_posts_headline')); ?>; }
            .pagination a, .pagination2, .pagination .dots { border-color: <?php echo esc_attr(get_theme_mod('all_blog_posts_text')); ?>; }
            span.entry-meta{ color: <?php echo esc_attr(get_theme_mod('all_blog_posts_date')); ?>; }
            .article h1, .article h2, .article h3, .article h4, .article h5, .article h6, .total-comments, .article th{ color: <?php echo esc_attr(get_theme_mod('post_page_headline')); ?>; }
            .article, .article p, .related-posts .title, .breadcrumb, .article #commentform textarea  { color: <?php echo esc_attr(get_theme_mod('post_page_text')); ?>; }
            .article a, .breadcrumb a, #commentform a { color: <?php echo esc_attr(get_theme_mod('post_page_link')); ?>; }
            #commentform input#submit, #commentform input#submit:hover{ background: <?php echo esc_attr(get_theme_mod('post_page_link')); ?>; }
            .post-date-customizable, .comment time { color: <?php echo esc_attr(get_theme_mod('post_page_date')); ?>; }
            .footer-widgets #searchform input[type='submit'],  .footer-widgets #searchform input[type='submit']:hover{ background: <?php echo esc_attr(get_theme_mod('footer_link_color')); ?>; }
            .footer-widgets h3:after{ background: <?php echo esc_attr(get_theme_mod('footer_headline_color')); ?>; }
            .footer-widgets h3, footer .widget.widget_rss h3 a{ color: <?php echo esc_attr(get_theme_mod('footer_headline_color')); ?>; }
            .footer-widgets .widget li, .footer-widgets .widget, #copyright-note, footer p{ color: <?php echo esc_attr(get_theme_mod('footer_text_color')); ?>; }
            footer .widget a, #copyright-note a, #copyright-note a:hover, footer .widget a:hover, footer .widget li a:hover{ color: <?php echo esc_attr(get_theme_mod('footer_link_color')); ?>; }
            .top-column-widget a, .top-column-widget a:hover, .top-column-widget a:active, .top-column-widget a:focus { color: <?php echo esc_attr(get_theme_mod('upper_widgets_link_color')); ?>; }
            .top-column-widget, .upper-widgets-grid { color: <?php echo esc_attr(get_theme_mod('upper_widgets_content_color')); ?>; }
            .top-column-widget .widget.widget_rss h3 a, .upper-widgets-grid h3, .top-column-widget h3{ color: <?php echo esc_attr(get_theme_mod('upper_widgets_headlinke_color')); ?>; }
            @media screen and (min-width: 865px) {
                .primary-navigation.header-activated #navigation a { color: <?php echo esc_attr(get_theme_mod('navigation_frontpage_link_color')); ?>; }
            }
            @media screen and (max-width: 865px) {
                #navigation.mobile-menu-wrapper{ background-color: <?php echo esc_attr(get_theme_mod('navigation_background_color')); ?>; }
            }

            <?php if ( get_theme_mod( 'toggle_header_frontpage' ) == '1' ) : ?>
                .single #site-header,
                .page #site-header { 
                    margin-bottom:0; 
                }
            <?php endif; ?>
        </style>
        <?php
    }
    add_action('wp_head', 'hello_vloggers_color_choice');
endif;




/* Sanitizers */
function hello_vloggers_sanitize_select($input, $setting)
{
    // Ensure input is a slug.
    $input = sanitize_key($input);

    // Get list of choices from the control associated with the setting.
    $choices = $setting->manager->get_control($setting->id)->choices;

    // If the input is a valid key, return it; otherwise, return the default.
    return (array_key_exists($input, $choices) ? $input : $setting->default);
}



/**
 * Post Layout for Archives
 */
if ( ! function_exists( 'customizable_blogily_archive_post' ) ) {
    /**
     * Display a post of specific layout.
     * 
     * @param string $layout
     */
    function customizable_blogily_archive_post( $layout = '' ) { 
     ?>
     <article class="post excerpt">

         <?php if ( has_post_thumbnail() ) { ?>
            <div class="post-blogs-container-thumbnails">
            <?php } else { ?>
                <div class="post-blogs-container">
                <?php } ?>

                <?php if ( empty($customizable_blogily_full_posts) ) : ?>


                    <?php if ( has_post_thumbnail() ) { ?>
                        <div class="featured-thumbnail-container">
                          <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" id="featured-thumbnail">
                              <?php  $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');  
                              echo '<div class="blog-featured-thumbnail" style="background-image:url('.esc_url($featured_img_url).')"></div>';
                              ?>
                          </a>
                      </div>
                      <div class="thumbnail-post-content">
                      <?php } else { ?>
                       <div class="nothumbnail-post-content">
                       <?php } ?>


                       <h2 class="title">
                          <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
                      </h2>

                      <span class="entry-meta">
                          <?php echo get_the_date(); ?>
                          <?php
                          if ( is_sticky() && is_home() && ! is_paged() ) {
                              printf( ' / <span class="sticky-text">%s</span>', __( 'Featured', 'hello-vloggers' ) );
                          } ?>
                      </span>
                      <div class="post-content">
                          <?php echo customizable_blogily_excerpt(50); ?>...
                      </div>
                      <?php customizable_blogily_readmore(); ?>
                      <?php else : ?>

                      </div>
                  </div>

              <?php endif; ?>

              <?php if ( get_theme_mod( 'show_post_categories' ) == '' ) : ?>
                <div class="post-category">
                    <?php the_category(' '); ?>
                </div>
                <?php else: ?>
                <?php endif; ?>

            </article>
        <?php }
    }