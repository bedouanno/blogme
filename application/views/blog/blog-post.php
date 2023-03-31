                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?php echo $title; ?></h1>
      
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                           <div class="card">
                                <div class="card-header">
                                    Create Post
                                </div>
                                <div class="card-body">
                                    <?php echo form_open('blog/post'); ?>
                                       
                                        <label for="post_title">Post Tile:</label>
                                        <input class="form-control" type="text" id="post_title" name="post_title">
                                        
                                        <label for="pst_content">Content:</label>
                                        <textarea class="form-control" id="post_content" name="post_content" required></textarea>
                                        
                                        <input class="form-control btn btn-sm btn-success mt-2"  type="submit" value="Submit">
                                    </form>
                                </div>
                           </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                LIST POST
                                </div>  
                                <div class="card-body">
                                <?php foreach($posts as $post): ?>  
                                        <ul>
                                            <li><?php echo $post['post_title']; ?> <span class="badge badge-sm badge-danger"><?php echo $post['id'] ?></span></li>
                                            <li><?php echo $post['post_content']; ?><span class="badge badge-sm badge-danger"></li>

                                            <a href="<?php echo base_url(); ?>blog/post/delete/<?php echo $post['id'] ?>">DELETE</a>
                                        </ul>
                                <?php endforeach; ?>



                                </div>
                            </div>
                        </div>

                    </div>

            </div>
            <!-- /.container-fluid -->