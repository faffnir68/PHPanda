<?php get_header(  );
    if(have_posts(  )):
        while(have_posts(  )):
            the_post();
?>
        
        <h2 class="page-heading"><?php the_title() ?></h2>
        <div id="post-container">
            <section id="blogpost">
                <div class="card">
                    <div class="card-meta-blogpost">
                        Post by <?php the_author(); ?> on <?php the_time('F d, Y') ?> 
                        
                        <?php if(get_post_type() == 'post'): ?>
                        in <a href=""><?php echo get_the_category_list(',') ?></a>
                        <?php endif; ?>
                    </div>
                    <?php if(has_post_thumbnail()): ?>
                    <div class="card-image">
                        <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="A beautiful laptop" srcset="">
                    </div>
                    <?php endif; ?>
                    <div class="card-description">
                        <?php the_content() ?>
                    </div>
                </div>
                <div class="comments-section">
                <?php
                    $fields =  array(

                        'author' =>
                        '<input placeholder="Name" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                        '" size="30"' . $aria_req . ' /></p>',

                        'email' =>
                        '<input placeholder="Email" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                        '" size="30"' . $aria_req . ' /></p>',
                    );

                    $args = array(
                        'title_reply' => 'Share Your Thoughts',
                        'fields' => $fields,
                        'comment_field' => '<p></p><textarea placeholder="Your Comment" id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
                        '</textarea></p>',
                        'comment_notes_before' => '<p class="comment-notes">Your email address will not be published. All fields are required.</p>',
                    );

                     comment_form($args);
                    
                    $commentsNumber = get_comments_number();
                    if($commentsNumber != 0):
                    ?>

                    <div class="comments">
                        <h3>What others say</h3>
                        <ol class="all-comments">
                            <?php $comments = get_comments(array(
                                'post_id' => $post->ID,
                                'status' => 'approve'
                            )); 
                            wp_list_comments(array(
                                'per_page' => 15,
                            ), $comments);
                            ?>
                        </ol>
                    </div>

                    <?php endif; ?>
                </div>
            </section>
            <aside id="sidebar">
                <?php dynamic_sidebar('main_sidebar'); ?>
            </aside>
        </div>

        <?php endwhile; endif; ?>

<?php get_footer(  ) ?>