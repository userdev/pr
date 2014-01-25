<div class="row">

    <div class="col-lg-12">
        <h1 class="page-header">Registrējies
            <small>It's Nice to Meet You!</small>
        </h1>
        <div class="col-sm-8">
            <form role="form" method="POST" action="contact-form-submission.php">
                <div class="row">
                    <div class="form-group col-lg-4">
                        <input type="text" name="contact_name" class="form-control" id="input1" placeholder="Lietotājvārds">
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-lg-4">
                        <input type="email" name="contact_email" class="form-control" id="input2" placeholder="E-pasts">
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-lg-4">
                        <input type="email" name="contact_email" class="form-control" id="input2" placeholder="Parole">
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
        <h3 class="page-header">Ielogojies
        </h3>
        <div class="col-sm-8">
            <form role="form" method="POST" action="contact-form-submission.php">
                <div class="row">
                    <div class="form-group col-lg-4">
                        <input type="text" name="contact_name" class="form-control" id="input1" placeholder="Lietotājvārds vai E-pasts">
                    </div>
       
                    <div class="clearfix"></div>
                    <div class="form-group col-lg-4">
                        <input type="email" name="contact_email" class="form-control" id="input2" placeholder="Parole">
                    </div>

                    <div class="form-group col-lg-12">
                        <input type="hidden" name="save" value="contact">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>