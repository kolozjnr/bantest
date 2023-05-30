<?php
$accno = "2061989827";

$code = "033";


?>
<body>
    <style>
        .container {
  /* Set the position and dimensions of the container */
  position: relative;
  width: 100%;
  height: 100%;
}

.overlay {
  /* Set the size and position of the overlay */
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  
  /* Apply a backdrop blur effect with a radius of 5 pixels */
  backdrop-filter: blur(5px);
  
  /* Set the opacity of the overlay to 0.8 */
  opacity: 0.8;
  
  /* Set the background color of the overlay */
  background-color: rgba(0, 0, 0, 0.5); /* Use an RGBA value to specify the color and opacity */
}

.content {
  /* Set the position and z-index of the content */
  position: relative;
  z-index: 1;
}

    </style>
<div class="container" id="container" style="display: none; ">
  <div class="overlay"></div>
  <img src="Spinner-0.6s-98px.gif" style="position:fixed; left:50%; top:35%;" alt="">
</div>
<button onclick="accountv()">
    click
</button>

<script>
    function accountv(){
   
    var accno = parseInt("<?= $accno ?>")
    var code = encodeURIComponent("<?= $code?>")

    var data ={
        accno:accno,
        code:code
    }
    var jsonData = JSON.stringify(data)
    console.log(jsonData)

    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 1){
            document.getElementById("container").style.display = "block";

        }
        else if(this.readyState ==2){
            document.getElementById("container").style.display = "block"

        }
        else if(this.readyState == 3){
            document.getElementById("container").style.display = "block"

        }
        else if(this.status == 200 && this.readyState == 4){
            document.getElementById("container").style.display = "none"
            console.log(this.responseText)

        }
    }
    xhttp.open("POST", "verify.php", true)
    xhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xhttp.send(jsonData)
}
</script>
</body>
