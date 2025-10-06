
                
        <?php include '../app/views/templates/partials/_about-me.php'; ?>
        <!-- Blog Post (Right Sidebar) Start -->
          <div class="col-md-9">
            <div class="col-md-12 page-body">
              <div class="row">
                <div class="sub-title">
                  <a href="" title="Go to Home Page"
                    ><h2>Back Home</h2></a
                  >
                  <a href="#comment" class="smoth-scroll"
                    ><i class="icon-bubbles"></i
                  ></a>
                </div>

                <div class="col-md-12 content-page">
                  <div class="col-md-12 blog-post">
                    <div>
                      <?php if($post['image']!=null):?>
                      <img src='images/blog/<?php echo $post['image']; ?>' alt="<?php echo $post['title']; ?>">
                      <?php endif;?>
                    </div>

                    <!-- Post Headline Start -->
                    <div class="post-title">
                      <h2>
                        <?php echo $post['title'];?>
                      </h2>
                    </div>
                    <!-- Post Headline End -->

                    <!-- Post Detail Start -->
                    <div class="post-info">
                      <span><?php echo $post['post_date'];?></span> | <span><?php echo $post['category_name'];?></span>
                    </div>
                    <!-- Post Detail End -->

                    <p>
                      <?php echo \Core\Helpers\truncate($post['text']);?>
                    </p>

                    <!-- Post Blockquote (Italic Style) Start -->
                    <blockquote class="margin-top-40 margin-bottom-40">
                      <p>
                        <?php echo $post['quote'];?>
                      </p>
                    </blockquote>
                    <!-- Post Blockquote (Italic Style) End -->

                    <!-- Post Buttons -->
                    <div>
                      <a href="posts/<?php echo $post['id'];?>/<?php echo \Core\Helpers\slugify($post['title']);?>/edit/form.html" type="button" class="btn btn-primary"
                        >Edit Post</a
                      >
                      <a
                        href="posts/<?php echo $post['id'];?>/<?php echo \Core\Helpers\slugify($post['title']);?>/delete.html"
                        type="button"
                        class="btn btn-secondary"
                        role="button"
                        >Delete Post</a
                      >
                    </div>
                    <!-- Post Buttons End -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php include '../app/views/templates/partials/_footer.php'; ?>
          <!-- Blog Post (Right Sidebar) End -->
        </div>
        <!--Inclusion du partial spécifique à la vue show-->
           <?php include '../app/views/templates/partials/show/_endpage-box.php';?>

