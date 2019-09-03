var rsr = Raphael('map', '640', '640');

var sections = [];

var left_arm = rsr.path("M208.4 191.72L88.47 191.72L47.79 177.96L13.37 108.08L44.66 44.46L83.25 54.89L66.56 103.91L83.25 148.76L114.54 125.81L159.39 125.81L211.53 143.54L208.4 191.72Z");
left_arm.attr({fill: '#FFFFFF','stroke-width': '0','stroke-opacity': '1'}).data('id', 'left-arm');
sections.push(left_arm);

var right_arm = rsr.path("M416.13 191.35L536.07 191.35L576.75 177.59L611.17 107.71L579.88 44.09L541.29 54.52L557.98 103.54L541.29 148.39L510 125.44L465.15 125.44L413.01 143.17L416.13 191.35Z");
right_arm.attr({fill: '#FFFFFF','stroke-width': '0','stroke-opacity': '1'}).data('id', 'right-arm');
sections.push(right_arm);

var chest = rsr.path("M400.31 138.53L400.31 211.53L234.48 211.53L234.48 138.53L298.1 111.41L336.69 111.41L400.31 138.53Z");
chest.attr({fill: '#FFFFFF','stroke-width': '0','stroke-opacity': '1'}).data('id', 'chest');
sections.push(chest);

var waist = rsr.path("M234.48 223.01L400.31 223.01L400.31 298.1L234.48 298.1L234.48 223.01Z");
waist.attr({fill: '#FFFFFF','stroke-width': '0','stroke-opacity': '1'}).data('id', 'waist');
sections.push(waist);

var leftLeg = rsr.path("M234.48 314.79L303.31 314.79L303.31 440.98L234.48 440.98L234.48 314.79Z");
leftLeg.attr({fill: '#FFFFFF','stroke-width': '0','stroke-opacity': '1'}).data('id', 'left-leg');
sections.push(leftLeg);

var rightLeg = rsr.path("M331.47 314.79L400.31 314.79L400.31 440.98L331.47 440.98L331.47 314.79Z");
rightLeg.attr({fill: '#FFFFFF','stroke-width': '0','stroke-opacity': '1'}).data('id', 'right-leg');
sections.push(rightLeg);

var leftCalf = rsr.path("M244.05 451.41L298.28 451.41L298.28 546.32L244.05 546.32L244.05 451.41Zd");
leftCalf.attr({fill: '#FFFFFF','stroke-width': '0','stroke-opacity': '1'}).data('id', 'left-calf');
sections.push(leftCalf);

var rightCalf = rsr.path("M338.77 451.41L393.01 451.41L393.01 546.32L338.77 546.32L338.77 451.41Z");
rightCalf.attr({fill: '#FFFFFF','stroke-width': '0','stroke-opacity': '1'}).data('id', 'right-calf');
sections.push(rightCalf);





var clicked = 0;

for (var i = 0; i < sections.length; i++) {

    // Showing off
  // sections[i].mouseover(function(e){
  //   if (clicked % 2 == 0) {
  //     this.node.style.fill = 'red';
  //     this.node.style.opacity = 0.5;
  //   }


	// //	document.getElementById('region-name').innerHTML = this.data('region');
  // });

	// sections[i].mouseout(function(e){
  //   if (clicked % 2 == 0) {
  //     this.node.style.fill = "white";
  //     this.node.style.opacity = 1;
  //   }

  // });
  
  sections[i].mousedown(function(e){
      if ($('#map').children().children().hasClass('active-body')){
        $('#map').children().children().removeClass('active-body');
        this.node.classList.add("active-body");
        document.getElementById('muscleGroup').innerHTML = this.data('id');
    } else {
        this.node.classList.add("active-body");
        document.getElementById('muscleGroup').innerHTML = this.data('id');
    }

    

    clicked++;
    //this.node.style.fill = "red";
  });
  

}

