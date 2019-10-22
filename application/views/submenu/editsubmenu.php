 <!-- Begin Page Content -->
<div class="container-fluid">

 <!-- Page Heading -->
 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

 <div class="row">
        <div class="col-lg-7">

        <form action="" method="post">
        <input type="hidden" name="id" value="<?= $subMenu['id']; ?>">
        <div class="form-group row">
                <label for="active" class="col-sm-2 col-form-label">
                <?php if ($subMenu['is_active']== 1) : ?>
                <span class="badge badge-pill badge-primary">Active</span>
                <?php else : ?>
                <span class="badge badge-pill badge-secondary">Non Active</span>
                <?php endif ; ?>
                </label>
                <div class="col-sm-5">
                <select name="isactive" id="isactive" class="form-control">
                            <?php if ($subMenu['is_active']== 1) : ?>
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
                <label for="title" class="col-sm-2 col-form-label">Title </label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="title" name="title" value="<?= $subMenu['title'];?>" >
                </div>
            </div>
            <div class="form-group row">
                <label for="menu" class="col-sm-2 col-form-label">Menu </label>
                <div class="col-sm-5">
                <select name="menu_id" id="menu_id" class="form-control">
                                
                                <?php foreach ($menu as $m) : ?>
                                <?php if( $m['id'] == $subMenu['menu_id'] ) : ?>
                                <option value="<?= $m['id']; ?>" selected><?= $m['menu']; ?></option>
                                <?php else : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                <?php endif; ?>
                                <?php endforeach; ?>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="category" class="col-sm-2 col-form-label">CategoryID </label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="categoryid" readonly name="categoryid" value="<?= $subMenu['category_id'];?>" >
                    
                </div>
            </div>
            <div class="form-group row">
                <label for="icon" class="col-sm-2 col-form-label">Icon </label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="icon" name="icon" value="<?= $subMenu['icon'];?>" >
                </div>
            </div>
            <div class="form-group row">
                <label for="JS" class="col-sm-2 col-form-label">Attribute JS </label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="target" name="target" value="<?= $subMenu['target'];?>" >
                </div>
            </div>
            

            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-outline-primary">Save</button>
                    <a href="<?= base_url('submenumanagement'); ?>" class="btn btn-outline-danger">Cancel</a>
                    
                </div>
            </div>

        
        </form>
            


        </div>

</div>
</div>