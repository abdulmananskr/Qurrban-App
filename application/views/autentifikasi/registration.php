    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-8 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="post"
                                action="<?= base_url('autautentifikasih/registration'); ?>">
                                <div class="form-group">
                                    <input type="nama" class="form-control 
                                    form-control-user" id="nama" name='nama' placeholder="User Name"
                                        value=<?= set_value('nama');?>>
                                    <?= form_error('nama', '<small class= "text-danger pl-3">', '</small>');?>
                                </div>
                                <div class="form-group">
                                    <input type="no_telepon" class="form-control 
                                    form-control-user" id="no_telepon" name='no_telepon' placeholder="Phone Number"
                                        value=<?= set_value('no_telepon');?>>
                                    <?= form_error('no_telepon', '<small class= "text-danger pl-3">', '</small>');?>
                                </div>
                                <div class="form-group">
                                    <input type="alamat" class="form-control 
                                    form-control-user" id="alamat" name='alamat' placeholder="Address"
                                        value=<?= set_value('alamat');?>>
                                    <?= form_error('alamat', '<small class= "text-danger pl-3">', '</small>');?>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control 
                                    form-control-user" id="email" name='email' placeholder="Email Address"
                                        value=<?= set_value('email');?>>
                                    <?= form_error('email', '<small class= "text-danger pl-3">', '</small>');?>
                                </div>
                                <div class="form-group row ">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="password1"
                                            name="password1" placeholder="Password">
                                        <?= form_error('password1', '<small class= "text-danger pl-3">', '</small>');?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="password2"
                                            name="password2" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <button type='submit' class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                                </class=>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('autentifikasi'); ?>">Already have an account?
                                        Login!</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>