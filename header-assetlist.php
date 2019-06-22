<?php
/* The header / style info for the asset list */
/**
 * @package Make
 */
?><!DOCTYPE html>
<!--[if lte IE 9]><html class="no-js IE9 IE" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
	<head>
		<?php wp_head(); ?>


<link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
	<!-- Generated from http://html-generator.weebly.com -->
<script type="text/javascript">
	window.onload=function(){
	var tfrow = document.getElementById('tfhover').rows.length;
	var tbRow=[];
	for (var i=1;i<tfrow;i++) {
		tbRow[i]=document.getElementById('tfhover').rows[i];
		tbRow[i].onmouseover = function(){
		  this.style.backgroundColor = '#e2e3e9';
		};
		tbRow[i].onmouseout = function() {
		  this.style.backgroundColor = '#ffffff';
		};
	}
};
</script>


<style type="text/css">
body { font-family: 'Droid Sans', sans-serif; }
table.tftable {font-size:12px;width:100%;border-width: 1px;border-color: #a9a9a9;border-collapse: collapse;}
table.tftable th {font-size:12px;background-color:#cdcdcd;border-width: 1px;padding: 8px;border-style: solid;border-color: #a9a9a9;text-align:left;}
table.tftable tr {background-color:#ffffff;}
table.tftable td {font-size:12px;border-width: 1px;padding: 8px;border-style: solid;border-color: #a9a9a9;}

/* For Form*/
dl {
    padding: 0.5em;
  }
  dt {
    float: left;
    clear: left;
    width: 125px;
    text-align: right;
    font-weight: bold;
  }
  dd {
    margin: 0 0 0 135px;
    padding: 0 0 0.5em 0;
  }
  .btn-stat {
  background: #3498db;
  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
  background-image: -o-linear-gradient(top, #3498db, #2980b9);
  background-image: linear-gradient(to bottom, #3498db, #2980b9);
  -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  color: #ffffff;
  font-size: 20px;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
  border:none;
}

.btn-stat:hover {
  background: #3cb0fd;
  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
  text-decoration: none;
  border:none;
}


.asset-list {
  display: block;
}
.asset-container {
    overflow: auto;
}

/* Layout + responsive switches*/
@media only screen and (max-width: 849px) {
  .form-box {
    width:100%;
  }
  .instruction-box {
    width:100%;
    margin-left:0;
  }
 
}

@media only screen and (min-width: 850px) {
    /* For tablets: */
    .form-box {
  float:left;
  max-width: 45%;
  display: block;
}
.instruction-box {
  margin-left: 425px;
  display: table
}

}



</style>

        
	</head>

	<body <?php body_class(); ?>>
		<div id="site-wrapper" class="site-wrapper">
			<a class="skip-link screen-reader-text" href="#site-content"><?php esc_html_e( 'Skip to content', 'make' ); ?></a>

			<?php ttfmake_maybe_show_site_region( 'header' ); ?>

			<div id="site-content" class="site-content">
				<div class="container">
