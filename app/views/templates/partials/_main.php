    <div id="main">
      <div class="container">
        <div class="row">
        <?php include '../app/views/templates/partials/main/_about-me.php'; ?>
        <!-- Blog Post (Right Sidebar) Start -->
          <div class="col-md-9">
            <div class="col-md-12 page-body">
              <div class="row">
                <?php echo $content; ?>
              </div>
            </div>

            <?php include '../app/views/templates/partials/main/_footer.php'; ?>
          </div>
          <!-- Blog Post (Right Sidebar) End -->
        </div>
      </div>
    </div>