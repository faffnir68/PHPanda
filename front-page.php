<?php get_header(); ?>
    <div id="banner">
        <h1>&lt;PHPanda/&gt;</h1>
        <h3>Learn coding from scratch</h3>
    </div>
    <main>
        <a href="<?php echo site_url('/blog') ?>">
            <h2 class="section-heading">All Blogs</h2>
        </a>
        <section>

        <?php 
            $posts = array(
                'post_type' => 'post',
                'posts_per_page' => 2,  
            );

            $blogposts = new WP_Query($posts);

        if ($blogposts->have_posts(  )):
                while($blogposts->have_posts(  )):
                    $blogposts->the_post();

                    
            ?>

            <div class="card">
                <div class="card-image">
                    <a href="<?php the_permalink() ?>">
                        <img src="<?php echo get_the_post_thumbnail_url( get_the_ID() )  ?>" title="" alt="Card Image">
                    </a>
                </div>
                <div class="card-description">
                    <a href="<?php the_permalink() ?>">
                        <h3><?php the_title() ?></h3>
                    </a>
                    <p>Helllo
                        <?php echo wp_trim_words(get_the_excerpt(),30) ?>
                    </p>
                    <a class="btn-readmore" href="<?php the_permalink(  )?>">Read more</a>
                </div>
            </div>

            <?php wp_reset_query(  ) ?>
                <?php 
                    endwhile; 
                endif;
                ?>

        </section>

        <a href="#">
            <h2 class="section-heading">All Projects</h2>
        </a>
        <section>

            <?php 

            $projects = array(
                'post_type' => 'project',
                'posts_per_page' => 2
            );

            $projectsPosts = new WP_Query($projects);

            if($projectsPosts->have_posts(  )): 
                while($projectsPosts->have_posts(  )):  
                    $projectsPosts->the_post(  );  
            ?>

            <div class="card">
                <div class="card-image">
                    <a href="<?php the_permalink() ?>">
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(  )) ?>" alt="Card Image">
                    </a>
                </div>
                <div class="card-description">
                    <a href="blogpost.html">
                        <h3><?php the_title() ?></h3>
                    </a>
                    <p>
                        <?php echo wp_trim_words( get_the_excerpt(), 30 ); ?>
                    </p>
                    <a class="btn-readmore" href="<?php the_permalink() ?>">Read more</a>
                </div>
            </div>

            <?php wp_reset_query(  ) ?>
                <?php 
                    endwhile; 
                endif;
            ?>

        </section>

        <h2 class="section-heading">
            Source Code
        </h2>

        <section id="section-source">
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error nihil inventore tempora? Ipsa eius iusto rem natus veniam laborum. Molestiae placeat rerum dolor minus vitae, aspernatur possimus explicabo. Perspiciatis, dolore?
            </p>
            <a class="btn-readmore" href="#">Github Profile</a>
        </section>

        <?php get_footer(); ?>

