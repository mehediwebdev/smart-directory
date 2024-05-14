<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>


<div class="col-md-4">
    <?php
  global $post;
  $args = array(         
           'post_type' => 'wpc_wp_classifieds',
            'post_status' => 'publish',
            'post_in' => $id,
            'orderby' => $orderby            
            
            );
        
         $my_query = new WP_Query( $args ); 

         if( $my_query->have_posts() ) : 
         while (  $my_query->have_posts() ) : $my_query->the_post(); 

         $terms = get_the_terms( $post->ID, 'wpc-listing-location', true );
         $terms1 = get_the_terms( $post->ID, 'wpc-listing-type', true );
         $terms2 = get_the_terms( $post->ID, 'category', true );
         $terms3 = get_the_terms( $post->ID, 'post_tag', true );
         ?>
       
                
      
       <div class="card" style="width:400px">
            <?php the_post_thumbnail( 'full', array( 'class' => 'img-fluid' ) ); ?>
            <a href="">
    <?php 
    if (!empty($terms1)) {
        foreach ($terms1 as $term) {
            echo $term->name;
        }
    }
    ?>
</a>


<a href="">
    <?php 
    if (!empty($terms2)) {
        foreach ($terms2 as $term) {
            echo $term->name;
        }
    }
    ?>
</a>
<a href="">
    <?php 
    if (!empty($terms3)) {
        foreach ($terms3 as $term) {
            echo $term->name;
        }
    }
   
    ?>
</a>



            <div class="card-body">
                <h4 class="card-title"><?php the_title(); ?></h4>
                <p class="card-text"><?php the_content(); ?></p>
                <a href="<?php the_permalink(); ?>" class="btn btn-primary">See Details</a>
                


                <a href="">
    <?php 
    if (!empty($terms)) {
        foreach ($terms as $term) {
            echo $term->name . ', ';
        }
    }
    ?>
</a>









            </div>
        </div>

 <?php
        
         endwhile;
        endif;

        ?>


</div>

</body>
</html>