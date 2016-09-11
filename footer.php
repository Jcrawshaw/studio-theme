 <hr>

      <footer>
        <p>
          <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
          <a href="https://www.facebook.com/Shortgirlstudio"><i class="fa fa-facebook" aria-hidden="true"></i></a>
          <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        </p>
        <p><?php bloginfo('name'); ?> &copy; <?php echo date('Y'); ?> | Designed and Developed by<a href="http://jcrawshaw.github.io/">Jenny Crawshaw</a></p>
      </footer>
    </div> <!-- /container -->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

  <div class="modal fade" id="contactForm">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Contact Us</h4>
        </div>
        <div class="modal-body">
          <?php

            if( function_exists( 'ninja_forms_display_form' ) ){ ninja_forms_display_form( 1 ); }

          ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


    <?php wp_footer(); ?>
  </body>
</html>