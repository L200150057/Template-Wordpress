<?php get_header(); ?>
      <div class="row" id="row-post">
        <div class="col-sm-8 blog-main utama">

          <?php if(have_posts()) : ?>
            <?php while(have_posts()) : the_post(); ?>

              <div class="card" id="post-utama">
                <div class="row">
                  <div class="col-sm-3 gallery-caption" id="gambar-post">
                    <?php if(has_post_thumbnail()) : ?>
                    <?php else : ?>
                      <img src="<?php echo catch_that_image()?>">
                    <?php endif; ?>
                  </div>
                  <div class="col-sm-8" id="col-main">
                    <h1 class="judul-posting">
                      <a href="<?php the_permalink() ?>">
                        <?php the_title() ?>
                      </a>
                    </h1>
                    <ul class="info-post-home">
                      <li><div class="author"><div class="fa fa-user"></div> <?php the_author() ;?></div></li>
                      <li><div class="author"><div class="fa fa-calendar-o"></div> <?php echo get_the_date('d-m-Y'); ?></div></li>
                      <li><div class="author"><div class="fa fa-tags"></div><?php the_tags(); ?></div></li>
                    </ul>
                    <br/>
                    <div class="the_excerpt"><strong><?php the_excerpt() ;?></strong></div>
                    <a href="<?php the_permalink() ?>" class="btn" id="read-more">Read More</a>
                  </div>
                </div>
              </div><!-- /.post-utama -->
              <br/>

          <?php endwhile; ?>
          <?php else : ?>
            <p>Sorry No Post Found</p>
          <?php endif; ?>
          <div class="card-body">
            <div class="page-numerik">
            <center>
              <?php
              global $wp_query;

              $big = 999999999; // need an unlikely integer

              echo paginate_links( array(
                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format' => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total' => $wp_query->max_num_pages
              ) );
              ?>
            </center>
            </div>
          </div>
        </div><!-- /.blog-main -->
        <div class="col-sm-4 blog-main">
          <div class="card" id="sidebar">
            <?php dynamic_sidebar( 'Sidebar' ); ?>
          </div>
        </div>
<?php get_footer(); ?>
