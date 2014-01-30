<?php
if (!isset($user->username))
    $user->username = '';
if (!isset($user->email))
    $user->email = '';
if (!isset($user->username_log))
    $user->username_log = '';
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Registrējies
            <small>It's Nice to Meet You!</small>
        </h1>
        <div class="login-img"><img src="<?php echo base_url('img/login-large.jpg'); ?>" alt="Smiley face" height="82%" width="82%"></div>
        <div class="col-sm-8">
            <form role="form" method="POST" action="saveuser">
                <div class="row">
                    <div class="form-group col-lg-4">
                        <div class="form-error">

                            <?php echo form_error('username', '<span class="label label-danger">', '</span>'); ?> 
                        </div>                        
                        <input type="text" name="username" value="<?php echo $user->username ?>" class="form-control" id="input1" placeholder="Lietotājvārds">
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-lg-4">
                        <div class="form-error">
                            <?php echo form_error('email', '<span class="form-error label label-danger">', '</span>'); ?> 
                        </div>
                        <input type="email" name="email" value="<?php echo $user->email; ?>" class="form-control" id="input2" placeholder="E-pasts">
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-lg-4">
                        <div class="form-error">
                            <?php echo form_error('password', '<span class="form-error label label-danger">', '</span>'); ?> 
                        </div>
                        <input type="password" name="password" class="form-control" id="input2" placeholder="Parole">
                    </div>

                    <div class="form-group col-lg-12">
                        <input type="hidden" name="save" value="contact">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-12">
        <h4 class="">Ienāc</h4>
        <div class="col-sm-8">
            <form role="form" method="POST" action="takelogin">
                
                <div class="row">
                    <div class="form-group col-lg-4">
                        <div class="form-error">                            
                            <?php
                            if (isset($user->userFound)) {
                                if (!$user->userFound) {
                                    echo '<span class="label label-danger">Lietotāja vārds vai parole ir nepareizs</span>';
                                }
                            }
                            echo form_error('username_log', '<span class="form-error label label-danger">', '</span>');
                            ?> 
                        </div>
                        <input type="text" name="username_log" value="<?php echo $user->username_log; ?>" class="form-control" id="input1" placeholder="Lietotājvārds vai E-pasts">
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-lg-4">
                        <div class="form-error">
                            <?php echo form_error('password_log', '<span class="form-error label label-danger">', '</span>'); ?> 
                        </div>
                        <input type="password" name="password_log" class="form-control" id="input2" placeholder="Parole">
                    </div>
                    <div class="form-group col-lg-12">
                        <input type="hidden" name="save" value="contact">
                        <button type="submit" class="btn btn-primary">Ienākt</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>