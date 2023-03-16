   <script src="assets/js/jquery.min.js"></script>
   <script src="assets/js/bootstrap.bundle.min.js"></script>
   <!--owl.carousel-->
   <script src="assets/js/owl.carousel.min.js"></script>

   <script src="assets/js/custom_jquery.js"></script>



   <!--Alertify JS - https://alertifyjs.com/guide.html -->
   <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
   <script>
     alertify.set('notifier', 'position', 'top-right');

     <?php if (isset($_SESSION['message'])) { ?>
       alertify.success('<?= $_SESSION['message']; ?>');
     <?php unset($_SESSION['message']);
      } ?>
   </script>


   </body>
   </html>