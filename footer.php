<footer>

  <div class="container">
    <div class="row">
      <!-- Blog Categories Widget -->
      <div class="col-md-4">
        <?php if ( dynamic_sidebar( 'blog-categories' ) ); ?>
      </div>
    </div>
  </div>

  <p>&copy; Amy Kang <?php echo date('Y'); ?></p>
</footer>

<?php wp_footer(); ?>

</body>
</html>
