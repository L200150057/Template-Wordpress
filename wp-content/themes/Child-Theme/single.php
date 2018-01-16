    <?php get_header(); ?>
      <div class="row" id="row-single">
        <div class="col-sm-8 blog-main">
          <?php if(have_posts()) : ?>
            <?php while(have_posts()) : the_post(); ?>
              <div class="card">
                <div class="card-header">
                  <?php if(function_exists('bcn_display'))
                    {
                        bcn_display();
                    }else
                    {
                      echo "Tolong install plugin Breadcrumb NavXT";
                    }
                  ?>
                </div>
                <div class="card-body">
                  <div class="judul-post-single">
                    <?php the_title(); ?>
                  </div>
                  <div class="info-post-single">
                    <ul class="info-post-home">
                      <li><div class="author"><div class="fa fa-user"></div> <?php the_author() ;?></div></li>
                      <li><div class="author"><div class="fa fa-calendar-o"></div> <?php the_date('d-m-Y'); ?></div></li>
                    </ul>
                  </div>
                  <?php the_content() ?>
                </div>
              </div>
              <div class="card" id="share">
                <div class="card-header" id="judul-share">
                  Please Share If Yout Like This Post
                </div>
                <div class="card-body">
                  <div class="wrap">
                    <button>Facebook</button>
                    <button>Twitter</button>
                    <button>G-Mail</button>
                  </div>
                </div>
              </div>
              <?php comments_template(); ?>
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
