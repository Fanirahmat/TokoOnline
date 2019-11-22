<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Media</h1>
<div class="row clearfix">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h2>Galeri</h2>
                        </div>
                        <div class="body">
                        	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                             <ol class="carousel-indicators">
                                 <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                 <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                 <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                 <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                             </ol> 
                             <div class="carousel-inner" role="listbox" >
                                 <div class="item active">
                                     <img src="<?= base_url('asset/a.jpg')?>">
                                 </div>
                                 <div class="item">
                                     <img src="<?= base_url('asset/d.jpg')?>">
                                 </div>
                                 <div class="item">
                                     <img src="<?= base_url('asset/c.jpg')?>">
                                 </div>
                                 
                                 <div class="item">
                                     <img src="<?= base_url('asset/f.jpg')?>">
                                 </div>
                             </div>
                             <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                 <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                 <span class="sr-only">Previous</span>
                             </a>  
                             <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                 <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                 <span class="sr-only">Next</span>
                             </a> 
                            </div>
                        </div>
                    </div>
                     
                </div>
            </div>
</body>
</html>