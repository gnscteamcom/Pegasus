<?php include('modulo/header.php'); ?>
<script>
$(document).ready(function () {
	$('#menu').metisMenu();
});
</script>
<ul id="menu">
<li class="active"> <a href="#">Menu 0 <span class="fa arrow"></span></a>
<ul>
<li><a href="#">item 0.1</a></li>
<li><a href="#">item 0.2</a></li>
<li><a href="#">item 0.3</a></li>
<li><a href="#">item 0.4</a></li>
</ul>
</li>
<li> <a href="#">Menu 1 <span class="glyphicon arrow"></span></a>
<ul>
<li><a href="#">item 1.1</a></li>
<li><a href="#">item 1.2</a></li>
<li> <a href="#">Menu 1.3 <span class="fa plus-times"></span></a>
<ul>
<li><a href="#">item 1.3.1</a></li>
<li><a href="#">item 1.3.2</a></li>
<li><a href="#">item 1.3.3</a></li>
<li><a href="#">item 1.3.4</a></li>
</ul>
</li>
<li><a href="#">item 1.4</a></li>
<li> <a href="#">Menu 1.5 <span class="fa plus-minus"></span></a>
<ul>
<li><a href="#">item 1.5.1</a></li>
<li><a href="#">item 1.5.2</a></li>
<li><a href="#">item 1.5.3</a></li>
<li><a href="#">item 1.5.4</a></li>
</ul>
</li>
</ul>
</li>
<li> <a href="#">Menu 2 <span class="glyphicon arrow"></span></a>
<ul>
<li><a href="#">item 2.1</a></li>
<li><a href="#">item 2.2</a></li>
<li><a href="#">item 2.3</a></li>
<li><a href="#">item 2.4</a></li>
</ul>
</li>
</ul>
<?php include('modulo/footer.php'); ?>