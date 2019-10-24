 <!-- Begin Page Content -->
<div class="container-fluid">

 <!-- Page Heading -->
 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

 <div class="row">
        <div class="col-lg-11">

        <form action="" method="post">
        <input type="hidden" name="id" value=" <?= $category['id']; ?>">
        <div class="form-group row">
                <label for="active" class="col-sm-2 col-form-label">
                <?php if ($category['is_activee']== 1) : ?>
                <span class="badge badge-pill badge-primary">Active</span>
                <?php else : ?>
                <span class="badge badge-pill badge-secondary">Non Active</span>
                <?php endif ; ?>
                </label>
                <div class="col-sm-3">
                <select name="isactivee" id="isactivee" class="form-control">
                            <?php if ($category['is_active']== 1) : ?>
                             <option value="1" selected>Active</option>
                             <option value="0">Non Active</option>
                            <?php else : ?>
                            <option value="1" >Active</option>
                             <option value="0" selected>Non Active</option>
                            <?php endif ; ?>
                </select>
                </div>
            </div>
            
            <div class="form-group row">
                <label for="menu" class="col-sm-2 col-form-label">CategoryID </label>
                <div class="col-sm-3">
                <select name="categoryid" id="categoryid" class="form-control">
                                
                                <?php foreach ($subMenuCategory as $m) : ?>
                                <?php if( $m['id'] == $category['menu_id'] ) : ?>
                                <option value="<?= $m['category_id']; ?>" selected><?= $m['category_title']; ?>(<?= $m['category_id']; ?>)</option>
                                <?php else : ?>
                                <option value="<?= $m['category_id']; ?>"><?= $m['category_title']; ?> (<?= $m['category_id']; ?>)</option>
                                <?php endif; ?>
                                <?php endforeach; ?>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="category" class="col-sm-2 col-form-label">Category Title</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="title"  name="title" value="<?= $category['category_title'];?>" >
                    
                </div>
            </div>
            <div class="form-group row">
                <label for="category" class="col-sm-2 col-form-label">url</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="url"  name="url" value="<?= $category['url'];?>" >
                    
                </div>
            </div>
            
            

            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-outline-primary">Save</button>
                    <a href="<?= base_url('submenucategory'); ?>" class="btn btn-outline-danger">Cancel</a>
                    
                </div>
            </div>

        
        </form>
            


        </div>

</div>
</div>