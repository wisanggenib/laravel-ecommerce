
      <!-- <footer class="br-footer">
        <div class="footer-left">
          <div class="mg-b-2">Copyright &copy; 2017. Bracket. All Rights Reserved.</div>
          <div>Attentively and carefully made by ThemePixels.</div>
        </div>
        <div class="footer-right d-flex align-items-center">
          <span class="tx-uppercase mg-r-10">Share:</span>
          <a target="_blank" class="pd-x-5" href="https://www.facebook.com/sharer/sharer.php?u=http%3A//themepixels.me/bracket/intro"><i class="fa fa-facebook tx-20"></i></a>
          <a target="_blank" class="pd-x-5" href="https://twitter.com/home?status=Bracket,%20your%20best%20choice%20for%20premium%20quality%20admin%20template%20from%20Bootstrap.%20Get%20it%20now%20at%20http%3A//themepixels.me/bracket/intro"><i class="fa fa-twitter tx-20"></i></a>
        </div>
      </footer> -->
    </div><!-- br-mainpanel -->

    
    <script src="<?= base_url() ?>assets/admin/lib/popper.js/popper.js"></script>
    <script src="<?= base_url() ?>assets/admin/lib/bootstrap/bootstrap.js"></script>
    <script src="<?= base_url() ?>assets/admin/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="<?= base_url() ?>assets/admin/lib/moment/moment.js"></script>
    <script src="<?= base_url() ?>assets/admin/lib/jquery-ui/jquery-ui.js"></script>
    <script src="<?= base_url() ?>assets/admin/lib/jquery-switchbutton/jquery.switchButton.js"></script>
    <!-- <script src="<?= base_url() ?>assets/admin/lib/peity/jquery.peity.js"></script> -->
    <script src="<?= base_url() ?>assets/admin/lib/jquery.sparkline.bower/jquery.sparkline.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/lib/d3/d3.js"></script>
    <script src="<?= base_url() ?>assets/admin/lib/rickshaw/rickshaw.min.js"></script>

    <script src="<?= base_url() ?>assets/admin/js/bracket.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/ResizeSensor.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/widgets.js"></script>
    <script>

      $("textarea").keyup(function(){
        $(this).height(0);
        if (this.scrollHeight > 30) {
          $(this).height(this.scrollHeight);
        }else{
          $(this).height(30);
        }
      })

      $("textarea").each(function(textarea) {
        $(this).height(0);
        if (this.scrollHeight > 30) {
          $(this).height(this.scrollHeight);
        }else{
          $(this).height(30);
        }
      });

      setTimeout(function() {
        $('.tutup_alert').hide(300);
      }, 6000);

      $(function(){
        'use strict'

        $(window).resize(function(){
          minimizeMenu();
        });

        minimizeMenu();

        function minimizeMenu() {
          if(window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1199px)').matches) {
            // show only the icons and hide left menu label by default
            $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
            $('body').addClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideUp();
          } else if(window.matchMedia('(min-width: 1200px)').matches && !$('body').hasClass('collapsed-menu')) {
            $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
            $('body').removeClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideDown();
          }
        }

      });


    </script>
  </body>
</html>
