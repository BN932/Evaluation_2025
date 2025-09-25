                
        <?php include '../app/views/templates/partials/main/_about-me.php'; ?>
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
                    <!-- Post Headline Start -->
                    <div class="post-title">
                      <h1><?php echo $title ?></h1>
                    </div>
                    <!-- Post Headline End -->

                    <!-- Form Start -->
                    <form action="posts/add/insert.html" method="POST" enctype="application/x-www-form-urlencoded">
                      <div class="form-group">
                        <label for="title">Title</label>
                        <input
                          type="text"
                          name="title"
                          id="title"
                          class="form-control"
                          placeholder="Enter your title here"
                        />
                      </div>
                      <div class="form-group">
                        <label for="text">Text</label>
                        <textarea
                          id="text"
                          name="text"
                          class="form-control"
                          rows="5"
                          placeholder="Enter your text here"
                        ></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlFile1"> Image</label>
                        <input type="file" class="form-control-file btn btn-primary" id="exampleFormControlFile1">
                      </div>
                      <div class="form-group">
                        <label for="text">Quote</label>
                        <textarea
                          id="quote"
                          name="quote"
                          class="form-control"
                          rows="5"
                          placeholder="Enter your quote here"
                        ></textarea>
                      </div>
                      <div class="form-group">
                        <label for="text">Category</label>
                        <select
                          id="category"
                          name="category_id"
                          class="form-control"
                        >
                          <option disabled selected>
                            Select your category
                          </option>
                          <option value="1">Life style</option>
                          <option value="2">Sport</option>
                        </select>
                      </div>
                      <div>
                        <input
                          class="btn btn-primary"
                          type="submit"
                          value="submit"
                        />
                        <input
                          class="btn btn-secondary"
                          type="reset"
                          value="reset"
                        />
                      </div>
                    </form>
                    <!-- Form End -->
                  </div>
                </div>
              </div>
            </div>