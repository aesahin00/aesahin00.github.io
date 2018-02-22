<?php
/**
 * Index template (blog/posts)
 */
get_header();
$sidebarPos   = px_opt('sidebar-position');

$contentClass = 'span9';
$sidebarContainerClass = 'span3';
$sidebarClass = 'sidebar widget-area';

if(1 == $sidebarPos)
    $contentClass .= ' float-right';
else
    $sidebarContainerClass .= ' ';


if(is_home() && !is_front_page())
{
    $sidebar = px_get_meta('sidebar');
    $id = get_option( 'page_for_posts' );
    $title = get_the_title($id);
}
else
{
    $sidebar = "Main Sidebar";
    $title =__("My Blog Posts",TEXTDOMAIN);
}

?>
    <!--Content-->

    <div id="main" class="main">
        <div id="main-content" class="main-content container container-vspace" page-type="blog">
            <div class="row">
                <div class="<?php echo $contentClass; ?>">
                    <h1 class="page-title"><?php echo $title ; ?></h1>
                    <?php get_template_part( 'templates/loop', 'blog' );
                    if(USE_CUSTOM_PAGINATION)
                        px_get_pagination();
                    else
                        paginate_links();
                    ?>
                </div>
                <div class="<?php echo $sidebarContainerClass; ?>"><?php px_get_sidebar($sidebar); ?></div>
            </div>
        </div>
   </div>

<?php get_footer(); ?>