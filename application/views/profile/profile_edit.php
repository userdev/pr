<div class="row">
    <div class="col-md-3 col-sm-4 sidebar">

        <ul class="nav nav-stacked nav-pills">
            <img class="img-responsive" src="<?php echo base_url('img/no-img.jpg'); ?>">
            <li class="active" ><a href="<?php echo base_url('profile/index'); ?>">Pamatinformācija</a>
            </li>
            <li><a href="about.html">About</a>
            </li>
            <li><a href="services.html">Services</a>
            </li>
            <li><a href="contact.php">Contact</a>
            </li>
            <li class="disabled"><a href="#">Portfolio</a>
            </li>
            <li><a href="portfolio-1-col.html">1 Column Portfolio</a>
            </li>
            <li><a href="portfolio-2-col.html">2 Column Portfolio</a>
            </li>
            <li><a href="portfolio-3-col.html">3 Column Portfolio</a>
            </li>
            <li><a href="portfolio-4-col.html">4 Column Portfolio</a>
            </li>
            <li><a href="portfolio-item.html">Single Portfolio Item</a>
            </li>
            <li class="disabled"><a href="#">Blog</a>
            </li>
            <li><a href="blog-home-1.html">Blog Home 1</a>
            </li>
            <li><a href="blog-home-2.html">Blog Home 2</a>
            </li>
            <li><a href="blog-post.html">Blog Post</a>
            </li>
            <li class="disabled"><a href="#">Blog</a>
            </li>
            <li><a href="full-width.html">Full Width Page</a>
            </li>
            <li ><a href="sidebar.html">Sidebar Page</a>
            </li>
            <li><a href="faq.html">FAQ</a>
            </li>
            <li><a href="404.html">404</a>
            </li>
            <li><a href="pricing.html">Pricing Table</a>
            </li>
        </ul>
    </div>
    <div class="col-md-9 col-sm-8">
        <h1 class="page-header"><small>Profila labošana</small>
        </h1>
        <div class="col-sm-8">
            <form role="form" method="POST" action="profile/saveuser">
                <div class="row">
                    <div class="form-group col-lg-8">
                        <div class="form-error">
                            <?php echo form_error('name', '<span class="label label-danger">', '</span>'); ?> 
                        </div>  
                        <label for="name">Vārds</label>
                        <input type="text" name="name" value="<?php echo $user->name; ?>" class="form-control" id="name" placeholder="Vārds">
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-lg-8">
                        <div class="form-error">
                            <?php echo form_error('surname', '<span class="form-error label label-danger">', '</span>'); ?> 
                        </div>
                        <label for="surname">Uzvārds</label>
                        <input type="text" name="surname" value="<?php echo $user->name; ?>" class="form-control" id="surname" placeholder="Uzvards">
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-lg-8">
                        <div class="form-error">
                            <?php echo form_error('birth', '<span class="form-error label label-danger">', '</span>'); ?> 
                        </div>
                        <label for="birthDate">Dzimšans datums</label>

                        <div class="well">
                            <input type="text" name="birth" class="span2 form-control" value="<?php echo $user->birth ?>" id="birth" >
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-lg-8">
                        <div class="form-error">
                            <?php echo form_error('sex', '<span class="form-error label label-danger">', '</span>'); ?> 
                        </div>
                        <label for="sex_man">Vīrietis</label>
                        <input name = "sex" type="radio" <?php if ($user->sex == 'm') echo 'checked'; ?> value="m" id="sex_men">
                        <label for="sex_foman">Sieviete</label>
                        <input name = "sex" type="radio" <?php if ($user->sex == 'f') echo 'checked'; ?>  value="f" id="sex_foman">
                    </div>

                    <div class="clearfix"></div>
                    <div class="form-group col-lg-8">
                        <div class="form-error">
                            <?php echo form_error('job', '<span class="form-error label label-danger">', '</span>'); ?> 
                        </div>
                        <label for="job">Darbavieta</label>
                        <input type="text" name="job" value="<?php echo $user->job; ?>" class="form-control" id="job" placeholder="Darbavieta">
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-lg-8">
                        <div class="form-error">
                            <?php echo form_error('position', '<span class="form-error label label-danger">', '</span>'); ?> 
                        </div>
                        <label for="position">Amats</label>
                        <input type="text" name="position" value="<?php echo $user->position; ?>" class="form-control" id="position" placeholder="Amats">
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-lg-8">
                        <div class="form-error">
                            <?php echo form_error('job', '<span class="form-error label label-danger">', '</span>'); ?> 
                        </div>
                        <label for="education">Izglītība</label>
                        <select class="form-control" name="education" id ="education">
                            <option value="1" <?php if ($user->education == '1') echo 'selected'; ?>>Pamata</option>
                            <option value="2" <?php if ($user->education == '2') echo 'selected'; ?>>Vidējā</option>
                            <option value="3" <?php if ($user->education == '3') echo 'selected'; ?>>Augstākā</option>
                            <option value="4" <?php if ($user->education == '4') echo 'selected'; ?>>Maģistra grāds</option>
                            <option value="5" <?php if ($user->education == '5') echo 'selected'; ?>>Doktora grāds</option>
                        </select>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-lg-8">
                        <div class="form-error">
                            <?php echo form_error('profession', '<span class="form-error label label-danger">', '</span>'); ?> 
                        </div>
                        <label for="profession">Profesija</label>
                        <input type="text" name="profession" value="<?php echo $user->profession; ?>" class="form-control" id="profession" placeholder="Profesija">
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-lg-8">
                        <div class="form-error">
                            <?php echo form_error('job', '<span class="form-error label label-danger">', '</span>'); ?> 
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-lg-10">
                        <label for="country">Dzīvesvieta</label>
                    </div>
                    <div class="col-sm-4">
                        <select name="country" class="form-control" id="country">
                            <?php if ($user->country_id == null) { ?>                            
                                <option <?php if ($user->country_id == null) echo 'selected'; ?> disabled style='display:none;'>Valsts</option>
                                <?php
                            } foreach ($countries as $country) {
                                ?>                            
                                <option <?php if ($user->country_id == $country->country_id) echo 'selected'; ?> value="<?php echo $country->country_id; ?>" ><?php echo $country->country; ?></option>
                                <?php
                            }
                            ?>

                        </select>
                    </div>
                    <div class="col-sm-4">
                        <select name="city" class="form-control">
                            <?php if ($user->city_id == null) { ?>                            
                                <option <?php if ($user->city_id == null) echo 'selected'; ?> disabled style='display:none;'>Pilsēta</option>
                                <?php
                            } foreach ($cities as $city) {
                                ?>                            
                                <option <?php if ($user->city_id == $city->city_id) echo 'selected'; ?> value="<?php echo $city->city_id; ?>" ><?php echo $city->city; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-lg-8">
                        <div class="form-error">
                            <?php echo form_error('adress_line', '<span class="form-error label label-danger">', '</span>'); ?> 
                        </div>
                        <input type="text" name="adress_line" value="<?php echo $user->adress_line; ?>" class="form-control" id="adress_line" placeholder="Ielas nosaukums">
                    </div>
                </div>

        </div>
        <div class="form-group col-lg-12">
            <input type="hidden" name="save" value="contact">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
</div>
</div>