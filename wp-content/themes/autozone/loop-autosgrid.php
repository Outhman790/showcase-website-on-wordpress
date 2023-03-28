<?php
global $post, $PIXAD_Autos;
$Settings = new PIXAD_Settings();
$settings = $Settings->getSettings( 'WP_OPTIONS', '_pixad_autos_settings', true );

$validate = $Settings->getSettings( 'WP_OPTIONS', '_pixad_autos_validation', true ); // Get validation settings

$showInSidebar = pixad::getsideviewfields($validate);
$validate = pixad::validation( $validate ); // Fix undefined index notice

$auto_translate = unserialize( get_option( '_pixad_auto_translate' ) );

?>

<div class="row">
    <?php while ( have_posts() ) : the_post(); ?>
    <?php 
            $comment_args = array( 'status' => 'approve', 'post_id' => $post->ID, );
            $comments = get_comments($comment_args);
            $post_rating = [];
            foreach($comments as $comment){
                $post_rating[] = floatval( get_comment_meta( $comment->comment_ID, 'rating', true ) );
            }
            ?>

    <div class="col-md-4">
        <div class="slider-grid__inner slider-grid__inner_mod-b">

            <div class="card__img">


                <?php if( has_post_thumbnail() ): ?>
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('autozone_latest_item', array('class' => 'img-responsive')); ?>
                </a>


                <?php else: ?>
                <img class="no-image" src="<?php echo PIXAD_AUTO_URI .'assets/img/no_image.jpg'; ?>" alt="no-image">
                <?php endif; ?>


                <?php if( get_post_meta(get_the_ID(), 'pixad_auto_featured_text', true) ): ?>
                <span class="card__wrap-label"><span class="card__label"><?php echo  get_post_meta( get_the_ID(), 'pixad_auto_featured_text', true ); ?></span></span>
                <?php endif; ?>


                <?php if( $validate['auto-price_show'] && $PIXAD_Autos->get_meta('_auto_price') ): ?>
                <?php
                    $custom_price_catalog = get_post_meta( $post->ID, 'custom_price_catalog', 1 );
                    $price_catalog = $custom_price_catalog ? $custom_price_catalog : $PIXAD_Autos->get_price();
                    //$price_catalog = is_numeric($PIXAD_Autos->get_meta('_auto_price')) || $PIXAD_Autos->get_meta('_auto_price') == '' ? $PIXAD_Autos->get_price() : $auto_translate[$PIXAD_Autos->get_price()];
                    ?>
                <span class="slider-grid__price_wrap"><span class="slider-grid__price"><span><?php echo wp_kses_post($price_catalog); ?></span></span></span>
                <?php endif; ?>
                <?php do_action( 'autozone_autos_single_auto_img', $post ); ?>

                <?php if( is_user_logged_in() ): ?>
                <?php
                    $author_ID = get_post_field( 'post_author', get_the_ID() );
                    $user = get_user_by('ID', $author_ID);
                    if( $author_ID == get_current_user_id()){?>
                <a class="tm-autos-top-edit-button" href=" <?php echo esc_url(get_site_url().'/members/') . $user->user_login . '/add_autos?auto_id=' . get_the_ID();?>"><span><?php echo __('Edit', 'autozone')?></span></a>
                <?php } ?>
                <?php endif; ?>

            </div>
            <div class="tmpl-gray-footer">
                <a class="tmpl-slider-grid__name" href="<?php the_permalink(); ?>"><?php echo wp_kses_post(get_the_title())?></a>
                <?php if(!empty($post_rating)):?>
                <div class="star-rating"><span style="width:<?php echo  esc_html( array_sum($post_rating)/count($post_rating) * 20 );?>%"></span></div>
                <?php endif;?>

                <ul class="tmpl-slider-grid__info list-unstyled">

                    <?php foreach ($showInSidebar as $id => $sideAttribute):?>
                    <?php   $id='_'.$id; 
                                 $id = str_replace('-', '_', $id); 
                                  ?>
                    <?php  if( $PIXAD_Autos->get_meta($id) ): ?>
                    <li><i class="<?php echo esc_html($sideAttribute['icon'])?>"></i>
                        <?php
                                    $val_attr =  $PIXAD_Autos->get_meta($id);
                                    if(!empty($auto_translate[$val_attr])  ){
                                      echo esc_html($auto_translate[$val_attr]);
                                    }else{
                                      echo esc_html($PIXAD_Autos->get_meta($id));
                                    }
                                      ?>
                    </li>
                    <?php endif; ?>

                    <?php endforeach;?>
                </ul>
            </div>

        </div>
    </div>
    <?php endwhile; ?>
</div>
