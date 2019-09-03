<?php
  session_start();
  require("includes/header.php");
  require_once("includes/db_connection.php");
  require("includes/form_template.php");
?>

<!-- <div class="wrap">
<img src="img/bodybuilderBody.jpg" alt="" usemap="#bodyMap" class="bodyMap" width='700' height='588'/>
<map name="bodyMap" id="Map"> -->
    <!-- <area shape="poly"
        title="legs"
        href="#"
        class="leg-area"
        onMouseOver="showSomething('leg-area')"
        onMouseOut="clear()"
        coords="302,256,347,324,312,398,275,392,282,287"/>
    <area shape="poly"
        title="legs"
        href="#"
        class="leg-area"
        onMouseOver="showSomething('leg-area')"
        coords="397,254,365,294,366,330,379,358,400,389,426,389,430,337" />
    <area shape="poly"
        title="arms"
        href="#"
        class="arm-area"
        onMouseOver="showSomething('arm-area')"
        coords="459,76,488,112,480,128,464,132,450,131,430,106,437,86,447,77" />
    <area shape="poly"
        title="arms"
        href="#"
        class="arm-area"
        onMouseOver="showSomething('arm-area')"
        coords="271,103,253,129,233,130,218,124,229,87,250,77,262,84" />
    <area shape="poly"
        title="waist"
        href="#"
        class="waist-area"
        onMouseOver="showSomething('waist-area')"
        coords="307,222,395,219,392,242,309,245" />
    <area shape="poly"
        title="chest"
        href="#"
        class="chest-area"
        onMouseOver="showSomething('chest-area')"
        shape="poly"
        coords="274,104,427,102,406,150,296,151" />
    <area shape="poly"
        title="calves"
        href="#"
        class="calf-area"
        onMouseOver="showSomething('calf-area')"
        coords="384,436,398,441,403,460,404,490,401,509,385,471" />
    <area shape="poly"
        title="calves"
        href="#"
        class="calf-area"
        onMouseOver="showSomething('calf-area')"
        coords="313,434,320,452,312,481,301,514,296,491,298,448,308,432" />
</map>

<svg id="svg">
</svg>

</div> -->

<div id="map" class="body-map">
</div>

<h3 id="muscleGroup"></h3>


<?php
  require("includes/footer.php");
 ?>

 <script>

    function createPolygon(name) {
      var ele = document.getElementsByClassName(name);
      var coords = ele[0].coords;
    }

    function showSomething(name){
      var ele = document.getElementsByClassName(name);
      var coords = ele[0].coords;
      var svg = document.getElementById('svg');
      var polygon = document.createElementNS("http://www.w3.org/2000/svg", "polygon");
      svg.appendChild(polygon);

      var arr = coords.split(",").map(Number);

      for (var i = 0; i < arr.length; i++) {
        var x = arr[i];
        var y = arr[i+1];
        var point = svg.createSVGPoint();
        point.x = x;
        point.y = y;
        polygon.points.appendItem(point);
        i++;
      }

      polygon.setAttributeNS(null, "fill", "red");


    }

    function clear() {
      var svg = document.getElementById('svg');

      while (svg.lastChild) {
        svg.removeChild(svg.lastChild);
      }
    }


   // areas.mouseover(function() {
   //   var id = $(".body area").index(this);
   //
   //   return false;
   // }).mouseleave(function() {
   //   return false;
   // });
 </script>
