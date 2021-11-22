<?php
/** Template Name: New Property */
?>

<?php get_header(); ?>
<?php 

function isa_cpt_excerpt_more( $more ) {
    global $post;
    $anchor_text = 'Read more';
    if ( 'property' == $post->post_type ) {
        $more = ' &hellip; <a href="'. esc_url( get_permalink() ) . '">' . $anchor_text . '</a>';
    }
    return $more;
}
add_filter('excerpt_more', 'isa_cpt_excerpt_more');

 $args = array(
     'post_type'=> 'property'
 );

 $the_query = new WP_Query($args); ?>


<div class="new-property-page">
   <?php if($the_query -> have_posts()); ?>
        <?php while($the_query->have_posts() ) :$the_query->the_post(); ?>

        <div class="row main-panel" >
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <a href="<?php the_permalink(); ?>">
                <img src="<?php the_field('header_image') ?>" class="header-image" alt="<?php the_field('header_image') ?>">
                </a>
                
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 right-panel" >
                    <h1 class="title" > 
                        <a href="<?php the_permalink(); ?>" class="title">
                        <?php the_title(); ?>
                        </a>
                    </h1>
                
                    <?php the_excerpt(); ?>
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12  fact-panel">
                                <div class="folded-corner service_tab_1">
                                    <div class="text">
                                        <i class="far fa-check-square"></i>
                                        <i class="title" >
                                            Fact Sheets
                                        </i>
                                        <div class="content">
                                            <p >
                                                <?php the_field('facts') ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12  payment-panel" >
                                    <div class="text">
                                        <i class="fas fa-money-bill" ></i>
                                        <i class="title">
                                            Paymnet Plan
                                        </i>
                                        <div class="content">
                                            <p id="price">Reservation Fee: <?php the_field('price') ?></p> 
                                            <p ><?php the_field('payment_plan') ?></p>
                                        </div>
                                    </div>
                            </div>  
                        </div>
                </div>
            </div>
        </div>

        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
</div>

<?php get_footer(); ?>