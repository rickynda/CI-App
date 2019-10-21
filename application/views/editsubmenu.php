 <!-- Begin Page Content -->
<div class="container-fluid">

 <!-- Page Heading -->
 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

 <div class="row">
        <div class="col-lg-4">

        <form action="" method="post">
            
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Title </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="menu" name="menu" value="<?= $subMenu['title'];?>" >
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Menu </label>
                <div class="col-sm-10">
                <select name="menu_id" id="menu_id" class="form-control">
                                <option value="">Select Menu</option>
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
            

            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-outline-primary">Save</button>
                    <a href="<?= base_url('submenumanagement'); ?>" class="btn btn-outline-danger">Cancel</a>
                    
                </div>
            </div>

        
        </form>
            


        </div>






</div>
