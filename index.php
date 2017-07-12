<?php
/**
 * The main template file.
 *
 * Required page
 *
 * @package cp
 */

get_header(); ?>
  <body>

    <div class="container">
		<?php get_template_part( 'template-parts/content', 'nav' ); ?>
    </div> <!-- /container -->

<div class="container blog">
   <div class="row">
      <div class="col-md-12">
         <div id="postlist">

             <div id="app">
                 <example></example>
             </div>

			 <!-- Start the Loop. -->
			 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<!-- Display the date (November 16th, 2009 format) and a link to other posts by this posts author. -->

				<!-- Display the Post's content in a div box. -->

				<!-- post -->
				<div class="panel">
				   <div class="panel-heading">
					  <div class="text-center">
						 <div class="row">
							<div class="col-sm-9">
							   <h3 class="pull-left"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
							</div>
							<div class="col-sm-3">
							   <h4 class="pull-right">
								  <small><em><?php the_time('F jS, Y'); ?></em></small>
							   </h4>
							</div>
						 </div>
					  </div>
				   </div>
				   <div class="panel-body">
					  <?= the_excerpt(); ?> <a href="<?php the_permalink(); ?>" class="btn btn-default">Read more</a>

				   </div>
				  <?php $tags = get_the_tags(); ?>
				  <?php if(!empty($tags)) { ?>
					   <div class="panel-footer">
							  <?php foreach($tags as $tag) { ?>
								<span class="label label-default"><?= $tag->name; ?></span>
							  <?php }//end foreach ?>
					   </div>
				  <?php }//end if ?>
				</div>
				<!-- end post -->

			 <?php endwhile; else : ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			 <?php endif; ?>
         </div>
      </div>
   </div>
</div>
<?php
get_footer();
