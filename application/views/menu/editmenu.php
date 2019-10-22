 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<div class="row">
       <div class="col-lg-7">

       <form action="" method="post">
       <input type="hidden" name="id" value="<?= $menu['id']; ?>">
       
           <div class="form-group row">
               <label for="JS" class="col-sm-2 col-form-label">Name</label>
               <div class="col-sm-3">
                   <input type="text" class="form-control" id="menu" name="menu" value="<?= $menu['menu'];?>" >
               </div>
           </div>
           

           <div class="form-group row justify-content-end">
               <div class="col-sm-10">
                   <button type="submit" class="btn btn-outline-primary">Save</button>
                   <a href="<?= base_url('menumanagement'); ?>" class="btn btn-outline-danger">Cancel</a>
                   
               </div>
           </div>

       
       </form>
           


       </div>

</div>
</div>