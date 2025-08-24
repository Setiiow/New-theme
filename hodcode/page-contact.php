  <?php get_header() ?>
    <main id="main" class="site-main mx-auto max-w-200 rounded-xl my-20 p-5 ">
      <?php
      if (have_posts()) {
        while (have_posts()) {
          the_post();
          the_title('<h2>', '</h2>');
          the_content();
          // the_post_thumbnail();
        }
      } else {
        echo '<p>No content found.</p>';
      }
      ?>
    </main>
  <?php get_footer()
  ?>

  
  
  

