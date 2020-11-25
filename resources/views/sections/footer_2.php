<!-- content -->

        <footer class="footer">
        <div class="copy_right py-4 text-center">
    <p>Cashspring © 2020 . All rights reserved 
    </p>
</div>
        </footer>
      </div>
      <!-- End Right content here -->
    </div>
    <!-- END wrapper -->

    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/modernizr.min.js"></script>
    <script src="assets/js/detect.js"></script>
    <script src="assets/js/fastclick.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/jquery.blockUI.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/jquery.nicescroll.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>

    <script src="assets/plugins/skycons/skycons.min.js"></script>
    <script src="assets/plugins/raphael/raphael-min.js"></script>
    <script src="assets/plugins/morris/morris.min.js"></script>

    <script src="assets/pages/dashborad.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>
    <script>
      /* BEGIN SVG WEATHER ICON */
      if (typeof Skycons !== "undefined") {
        var icons = new Skycons({ color: "#fff" }, { resizeClear: true }),
          list = [
            "clear-day",
            "clear-night",
            "partly-cloudy-day",
            "partly-cloudy-night",
            "cloudy",
            "rain",
            "sleet",
            "snow",
            "wind",
            "fog",
          ],
          i;

        for (i = list.length; i--; ) icons.set(list[i], list[i]);
        icons.play();
      }

      // scroll

      $(document).ready(function() {
        $("#boxscroll").niceScroll({
          cursorborder: "",
          cursorcolor: "#cecece",
          boxzoom: true,
        });
        $("#boxscroll2").niceScroll({
          cursorborder: "",
          cursorcolor: "#cecece",
          boxzoom: true,
        });
      });
    </script>
  </body>
</html>