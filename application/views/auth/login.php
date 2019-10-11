

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-7 mt-4">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user" methode="post" action="<?= base_url('auth')?>">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" name="email" id="idemail"  placeholder="Masukan Email...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="idpassword" nama="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                      
                    </div>
                    <a href="" class="btn btn-primary btn-user btn-block">
                      Login
                    </a>
                    
                    
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?= base_url('auth/register');?>">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  