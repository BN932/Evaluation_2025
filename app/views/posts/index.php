                
                
        <?php include '../app/views/templates/partials/_about-me.php'; ?>
        <!-- Blog Post (Right Sidebar) Start -->
          <div class="col-md-9">
            <div class="col-md-12 page-body">
              <div class="row">
                <div class="col-md-12 content-page">
                  <!-- ADD A POST -->
                  <div>
                    <a href="posts/add/form.html" type="button" class="btn btn-primary"
                      >Add a Post</a
                    >
                  </div>
                  <!-- ADD A POST END -->
                  <?php foreach($posts as $post):?>
                  <!-- Blog Post Start -->
                  <div class="col-md-12 blog-post row">
                    <div class="post-title">
                      <a href="posts/<?php echo $post['id'];?>/<?php echo \Core\Helpers\slugify($post['title']);?>.html"
                        ><h2>
                          <?php echo $post['title'];?>
                        </h2></a
                      >
                    </div>
                    <div class="post-info">
                      <span><?php echo $post['post_date'] ;?></span> | <span><?php echo $post['category_name'];?></span>
                    </div>
                    <p>
                      <?php echo \Core\Helpers\truncate($post['quote']);?>
                    </p>
                    <a
                      href="posts/<?php echo $post['id'];?>/<?php echo \Core\Helpers\slugify($post['title']);?>.html"
                      class="
                        button button-style button-anim
                        fa fa-long-arrow-right
                      "
                      ><span>Read More</span></a
                    >
                  </div>
                  <!-- Blog Post End -->
                   <?php endforeach; ?>

                  

                  <nav aria-label="Page navigation example" style="text-align: center;">
                    <ul class="pagination">
                      <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                      <?php for($i=1; $i<=$nbrPages; $i++):?>
                      <li class="page-item"><a class="page-link" href="posts/page/<?php echo $i?>"><?php echo $i?></a></li>
                      <?php endfor?>
                      <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
            <?php include '../app/views/templates/partials/_footer.php'; ?>
          <!-- Blog Post (Right Sidebar) End -->
          </div>