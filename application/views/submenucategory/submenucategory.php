
 <!-- Begin Page Content -->
 <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
            <br>
            <?= $this->session->flashdata('message'); ?>
            <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
            <?php endif; ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuCategory">Add New Submenu</a>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
            
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="subcategory" width="100%" cellspacing="0">
                    <thead><!-- Begin Page Content -->

                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">CategoryID</th>
                        <th scope="col">Category Title</th>
                        <th scope="col">url</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($subMenuCategory as $sm) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $sm['title']; ?> (<?= $sm['category_id']; ?>)</td>
                        <td><?= $sm['category_title']; ?></td>
                        <td><?= $sm['url']; ?></td>
                       
                        <td>
                            <?php if($sm['is_active']==1){
                               echo '<span class="badge badge-pill badge-primary">Active</span>';
                            }else{
                               echo ' <span class="badge badge-pill badge-secondary">Non Active</span>';
                            }
                            ?>
                        </td>
                        <td>
                            <a href="<?= base_url(); ?>submenucategory/edit/<?= $sm['id']; ?>" class="badge badge-success" >edit</a>
                            <a href="<?= base_url(); ?>submenucategory/delete/<?= $sm['id']; ?>" class="badge badge-danger" data-toggle="modal" data-target="#deleteModal">delete</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <br>
            </div>
            </div>
          </div>



</div>
<!-- /.container-fluid -->



<!-- Modal -->
<!-- Logout Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you sure delete this submenu?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url(); ?>submenumanagement/delete/<?= $sm['id']; ?>">Yes</a>
        </div>
      </div>
    </div>
  </div>

<!-- Modal -->
<div class="modal fade" id="newSubMenuCategory" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Add New Sub Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('submenucategory'); ?>" method="post">
                <div class="modal-body">
                <div class="form-group">
                        <select name="categoryid" id="categoryid" class="form-control">
                            <option value="">Select CategoryID</option>
                            <?php foreach ($subMenuCategory as $m) : ?>
                            <option value="<?= $m['category_id']; ?>"><?= $m['title']; ?> (<?= $m['category_id']; ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Category Title">
                    </div>
                   
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Url">
                    </div>
                   
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div> 

