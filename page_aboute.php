<?php /* Template Name: About Me */ ?>
<?php get_header(); ?>

<div class="container">
    <div class="row-fluid">
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
            <div class="floating-sidebar profile-info">
                <div class="profile-info-mod profile-essentials">
                    <h2 class="my-vcard">
                        <a href="<?php echo home_url(); ?>" class="url">
                            <picture>
                                <source srcset="<?php echo get_template_directory_uri(); ?>/images/avatar.jpg" media="(-webkit-min-device-pixel-ratio: 1.5), (min--moz-device-pixel-ratio: 1.5), (-o-min-device-pixel-ratio: 3/2), (min-device-pixel-ratio: 1.5), (min-resolution: 1.5dppx)">
                                <source srcset="<?php echo get_template_directory_uri(); ?>/images/avatar.jpg">
                                <img class="photo img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/avatar.jpg">
                            </picture>
                            Dhananjaya Maha Malage
                        </a>
                    </h2>
                    <div class="blog-bio"><p>WordPress, Open Source</p></div>
                </div>
                <div class="floating-sidebar-extra">
                    <div class="profile-info-mod">
                        <h3>Recent Posts</h3>
                        <div class="recent-posts">
                            <ul>
                                <?php
                                $args = array( 'numberposts' => '5' );
                                $recent_posts = wp_get_recent_posts( $args );
                                foreach( $recent_posts as $recent ){
                                    echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
                                }
                                wp_reset_query();
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
            <div class="posts-wrap">
                <ul class="blog-posts">
                    <?php
                    if ( have_posts() ) {
                        while ( have_posts() ) {
                            the_post(); global $post;
                            ?>
                            <li>
                                <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                                <p><?php the_content(); ?></p>

                                <div class="post-meta">
                                <span>Posted on <a href="<?php the_permalink(); ?>"><?php echo get_the_date( 'l F j, Y' ); ?></a> | Tagged
                                    <?php
                                    $posttags = get_the_tags();
                                    $count=1;
                                    if ($posttags) {
                                        foreach($posttags as $tag) {
                                            if (1 == $count) {
                                                ?>
                                                <a href="<?php bloginfo('url');?>/tag/<?php print_r($tag->slug);?>"><?php echo $tag->name; ?></a>
                                                <?php
                                            }else {
                                                ?>
                                                , <a href="<?php bloginfo('url');?>/tag/<?php print_r($tag->slug);?>"><?php echo $tag->name; ?></a>
                                                <?php
                                            }
                                            $count++;
                                        }
                                    }
                                    ?>
                                </span>
                                </div>
                            </li>
                            <?php
                        } // end while
                    } // end if
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
