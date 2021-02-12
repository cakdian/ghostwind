<?php

/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Ghostwind
 * @since Ghostwind 1.0
 **/


get_header(); ?>

<?php if (have_posts()) :
    while (have_posts()) : the_post(); ?>

        <!--Title-->
        <div class="text-center pt-16 md:pt-32">
            <h1 class="font-bold break-normal text-3xl md:text-5xl"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <p class="text-sm md:text-base text-gray-500 font-bold"><?php the_date(); ?> by <?php the_author(); ?></p>
        </div>

        <!--image-->
        <div class="container w-full max-w-6xl mx-auto bg-white bg-cover mt-8 rounded" style="background-image:url(<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0]; ?>); height: 75vh;"></div>

        <!--Container-->
        <div class="container max-w-5xl mx-auto -mt-32">
            <div class="mx-0 sm:mx-6">
                <div class="bg-white w-full p-8 md:p-24 text-xl md:text-2xl text-gray-800 leading-normal" style="font-family:Georgia,serif;">
                    <?php the_content(); ?>

                    <br>

                    <!--Subscribe-->
                    <!-- <div class="container font-sans bg-green-100 rounded mt-8 p-4 md:p-24 text-center">
                        <h2 class="font-bold break-normal text-2xl md:text-4xl">Subscribe to Ghostwind CSS</h2>
                        <h3 class="font-bold break-normal font-normal text-gray-600 text-base md:text-xl">Get the latest posts delivered right to your inbox</h3>
                        <div class="w-full text-center pt-4">
                            <form action="#">
                                <div class="max-w-sm mx-auto p-1 pr-0 flex flex-wrap items-center">
                                    <input type="email" placeholder="youremail@example.com" class="flex-1 appearance-none rounded shadow p-3 text-gray-600 mr-2 focus:outline-none">
                                    <button type="submit" class="flex-1 mt-4 md:mt-0 block md:inline-block appearance-none bg-green-500 text-white text-base font-semibold tracking-wider uppercase py-4 rounded shadow hover:bg-green-400">Subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div> -->
                    <!-- /Subscribe-->


                    <!--Author-->
                    <div class="w-full items-center font-sans p-8 md:p-24">
                        <h2 class="font-bold break-normal text-2xl md:text-4xl text-center my-4">Author</h2>
                        <img class="w-40 h-40 rounded-full mx-auto mb-4" src="<?php echo get_avatar_url(get_post()->post_author); ?>" alt="<?php echo get_the_author_meta('nickname', get_post()->post_author); ?>">
                        <div class="flex-1">
                            <div class="text-center text-base font-bold text-base md:text-xl leading-none mb-2"><?php echo get_the_author_meta('nickname', get_post()->post_author); ?></div>
                            <div class="text-center text-gray-700 text-s md:text-base"><?php echo get_the_author_meta('description', get_post()->post_author); ?></div>
                        </div>
                    </div>
                    <!--/Author-->


                    <!-- comment_form -->
                    <!-- // If comments are open or we have at least one comment, load up the comment template. -->
                    <?php
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    ?>
                    <!-- End comment_form -->


                    <!-- Previous / Next Post -->
                    <div class="flex flex-wrap justify-between pt-12 -mx-6">

                        <!--1/2 col Prev -->
                        <div class="w-full md:w-1/2 p-6 flex flex-col flex-grow flex-shrink">
                            <?php if (get_previous_post()) : ?>
                                <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow-lg">
                                    <a href="<?php echo get_permalink(get_previous_post()->ID); ?>" class="flex flex-wrap no-underline hover:no-underline">
                                        <?php echo get_the_post_thumbnail(get_previous_post()->ID, 'medium_large'); ?>
                                        <p class="w-full text-gray-600 text-xs md:text-sm px-6 mt-4">PREVIOUS POST</p>
                                        <div class="w-full font-bold text-xl text-gray-900 px-6"><?php previous_post_link('%link'); ?></div>
                                        <p class="text-gray-800 font-serif text-base px-6 mb-5">
                                            <?php echo get_previous_post()->post_excerpt; ?>
                                        </p>
                                    </a>
                                </div>
                                <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow-lg p-6">
                                    <div class="flex items-center justify-between">
                                        <a href="<?php echo get_the_author_meta('user_url', get_previous_post()->post_author); ?>">
                                            <img class="w-8 h-8 rounded-full mr-4 avatar" data-tippy-content="Author Name" src="<?php echo get_avatar_url(get_previous_post()->post_author); ?>" alt="Avatar of Author">
                                        </a>
                                        <a href="<?php echo get_permalink(get_previous_post()->ID); ?>">
                                            <p class="text-gray-600 text-xs md:text-sm">READ MORE</p>
                                        </a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!--1/2 col Next -->
                        <div class="w-full md:w-1/2 p-6 flex flex-col flex-grow flex-shrink">
                            <?php if (get_next_post()) : ?>
                                <div class="flex-1 flex-row bg-white rounded-t rounded-b-none overflow-hidden shadow-lg">
                                    <a href="<?php echo get_permalink(get_next_post()->ID); ?>" class="flex flex-wrap no-underline hover:no-underline">
                                        <?php echo get_the_post_thumbnail(get_next_post()->ID, 'medium_large'); ?>
                                        <p class="w-full text-gray-600 text-xs md:text-sm px-6 mt-4">NEXT POST</p>
                                        <div class="w-full font-bold text-xl text-gray-900 px-6"><?php next_post_link('%link'); ?></div>
                                        <p class="text-gray-800 font-serif text-base px-6 mb-5">
                                            <?php echo get_next_post()->post_excerpt; ?>
                                        </p>
                                    </a>
                                </div>
                                <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow-lg p-6">
                                    <div class="flex items-center justify-between">
                                        <a href="<?php echo get_the_author_meta('user_url', get_next_post()->post_author); ?>">
                                            <img class="w-8 h-8 rounded-full mr-4 avatar" data-tippy-content="Author Name" src="<?php echo get_avatar_url(get_next_post()->post_author); ?>" alt="Avatar of Author">
                                        </a>
                                        <a href="<?php echo get_permalink(get_next_post()->ID); ?>">
                                            <p class="text-gray-600 text-xs md:text-sm">READ MORE</p>
                                        </a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                    <!-- End Previous / Next Post -->


            <?php endwhile;
    else :
        _e('Sorry, no pages matched your criteria.', 'textdomain');
    endif; ?>

            <?php get_footer(); ?>
