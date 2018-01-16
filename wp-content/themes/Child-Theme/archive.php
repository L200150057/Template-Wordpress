<?php get_header(); ?>
      <div class="row" id="row-post">
        <div class="col-sm-8 blog-main">

          <?php if(have_posts()) : ?>
            <?php while(have_posts()) : the_post(); ?>

              <div class="card" id="post-utama">
                <div class="row">
                  <div class="col-sm-3" id="gambar-post">
                    <?php if(has_post_thumbnail()) : ?>
                      <?php the_post_thumbnail() ?>
                    <?php else : ?>
                      <center><p>no image</p></center>
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
                      <li><div class="author"><div class="fa fa-calendar-o"></div> <?php the_date('d-m-Y'); ?></div></li>
                    </ul>
                    <br/>
                    <div class="the_excerpt"><?php the_excerpt() ;?></div>
                    <a href="<?php the_permalink() ?>" class="btn" id="read-more">Read More</a>
                  </div>
                </div>
              </div><!-- /.post-utama -->
              <br/>

          <?php endwhile; ?>
          <?php else : ?>
            <p><?php __('No Posts Found'); ?></p>
          <?php endif; ?>
        </div><!-- /.blog-main -->
        <div class="col-sm-4 blog-main">
          <div class="card" id="sidebar">
            <?php dynamic_sidebar( 'Sidebar' ); ?>
          </div>
        </div>
<?php get_footer(); ?>
