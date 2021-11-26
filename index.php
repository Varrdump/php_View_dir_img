<style>
.br1{
margin:2px;
box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
transition: 0.3s;
border-radius: 5px; /* 5px rounded corners */
}
.br1:hover {
box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
img {
border-radius: 5px 5px 0 0;
}
/* The Modal (background) */
.modal {
display: none; /* Hidden by default */
position: fixed; /* Stay in place */
z-index: 1; /* Sit on top */
left: 0;
top: 0;
width: 100%; /* Full width */
height: 100%; /* Full height */
overflow: auto; /* Enable scroll if needed */
background-color: rgb(0,0,0); /* Fallback color */
background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
background-color: #fefefe;
margin: 3% auto; /* 15% from the top and centered */
padding: 10px;
border: 1px solid #888;
width: 30%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
color: #aaa;
float: right;
font-size: 28px;
font-weight: bold;
}

.close:hover,
.close:focus {
color: black;
text-decoration: none;
cursor: pointer;
}
</style>
<?php $images = glob("images/*.*"); ?>
<br>
<center><strong>TOTAL FILE : <?=count($images);?></strong></center>
<br>
<center>
<?php
for ($i=0; $i<count($images); $i++) 
{ 
$single_image = $images[$i];
$name = str_replace("images/","",$single_image);
$e = explode(".",$single_image);
$ext = end($e);
if($ext=='png' or $ext=='jpg' or $ext=='jpeg' or $ext=='gif'){
$data ='<img src="'.$single_image.'" class="br1" width="50"/>' ; 
}else{
$data =''; 
}
?>
<a href="javascript:void(0)" onclick="img_(<?=$i?>);">
<input type="hidden" id="val<?=$i?>" value="<?=$single_image?>">
<input type="hidden" id="name<?=$i?>" value="<?=$name?>">
<?=$data?>
</a>
<?php
}
?>

</center>
<!-- The Modal -->
<div id="myModal" class="modal">

<!-- Modal content -->
<div class="modal-content">
<span class="close">&times;</span>
<div id="img"></div>

</div>

</div>

<script>
function img_(id){
var val = document.getElementById("val"+id).value;
var name = document.getElementById("name"+id).value;
document.getElementById("img").innerHTML = '<img src="'+val+'" width="100%"/><center>'+name+'</center>';
modal.style.display = "block";
}
// Get the modal
var modal = document.getElementById("myModal");

/*/ Get the button that opens the modal
var btn = document.getElementById("myBtn0");
// Get the button that opens the modal
var val = document.getElementById("val0").value;

// When the user clicks on the button, open the modal
btn.onclick = function() {
document.getElementById("img").innerHTML = '<img src="'+val+'" width="100%"/>';
modal.style.display = "block";
}*/

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
if (event.target == modal) {
modal.style.display = "none";
}
}
</script>
