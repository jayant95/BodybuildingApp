var w = 640;
var h = 640;
var rsr = Raphael("map");
rsr.setViewBox(0, 0, w, h, true);
rsr.setSize('100%', '100%');

// var rsr = Raphael('map', '640', '640');

var sections = [];

var chest = rsr.path("M249.38 320L393.26 320L464.49 195.17L178.63 195.17L249.38 320Z");
chest.attr({fill: '#FFFFFF','stroke-width': '0','stroke-opacity': '1', 'stroke-width': '2'}).data('id', 'chest');
chest.node.setAttribute("class", "chest-path");
sections.push(chest);

var waist = rsr.path("M250.81 373.31L392.79 373.31L392.79 329.48L250.81 329.48L250.81 373.31Z");
waist.attr({fill: '#FFFFFF','stroke-width': '0','stroke-opacity': '1', 'stroke-width': '2'}).data('id', 'waist');
waist.node.setAttribute("class", "waist-path");
sections.push(waist);

var leftLeg = rsr.path("M316.49 450.14L255.54 519.08L208.88 519.08L251.13 382.55L316.49 382.55L316.49 450.14Z");
leftLeg.attr({fill: '#FFFFFF','stroke-width': '0','stroke-opacity': '1', 'stroke-width': '2'}).data('id', 'thighs');
leftLeg.node.setAttribute("class", "left-leg-path");
sections.push(leftLeg);

var rightLeg = rsr.path("M325.44 450.14L386.39 519.08L433.05 519.08L390.79 382.55L325.44 382.55L325.44 450.14Z");
rightLeg.attr({fill: '#FFFFFF','stroke-width': '0','stroke-opacity': '1', 'stroke-width': '2'}).data('id', 'thighs');
rightLeg.node.setAttribute("class", "right-leg-path");
sections.push(rightLeg);

var rightCalf = rsr.path("M400.41 635.68L433.05 635.68L433.05 527.39L387.07 527.39L400.41 635.68Z");
rightCalf.attr({fill: '#FFFFFF','stroke-width': '0','stroke-opacity': '1', 'stroke-width': '2'}).data('id', 'calves');
rightCalf.node.setAttribute("class", "right-calf-path");
sections.push(rightCalf);

var leftCalf = rsr.path("M241.52 635.68L208.88 635.68L208.88 527.39L254.86 527.39L241.52 635.68Z");
leftCalf.attr({fill: '#FFFFFF','stroke-width': '0','stroke-opacity': '1', 'stroke-width': '2'}).data('id', 'calves');
leftCalf.node.setAttribute("class", "left-calf-path");
sections.push(leftCalf);

var leftArm = rsr.path("M136.84 197.42L120.75 176.58L92.58 176.58L67.43 197.42L56.37 179.52L92.58 123.7L77.49 110L6.07 176.58L48.32 249.05L200.22 249.05L170.04 197.42L136.84 197.42Z");
leftArm.attr({fill: '#FFFFFF','stroke-width': '0','stroke-opacity': '1', 'stroke-width': '2'}).data('id', 'arms');
leftArm.node.setAttribute("class", "left-arm-path");
sections.push(leftArm);

var rightArm = rsr.path("M507.16 195.42L523.25 174.58L551.42 174.58L576.57 195.42L587.63 177.52L551.42 121.7L566.51 108L637.93 174.58L595.68 247.05L443.78 247.05L473.96 195.42L507.16 195.42Z");
rightArm.attr({fill: '#FFFFFF','stroke-width': '0','stroke-opacity': '1', 'stroke-width': '2'}).data('id', 'arms');
rightArm.node.setAttribute("class", "right-arm-path");
sections.push(rightArm);

var head = rsr.path("M369.43 140.94C369.43 167.36 347.98 188.81 321.56 188.81C295.14 188.81 273.69 167.36 273.69 140.94C273.69 114.51 295.14 93.06 321.56 93.06C347.98 93.06 369.43 114.51 369.43 140.94Z");
head.attr({fill: '#FFFFFF','stroke-width': '0','stroke-opacity': '1', 'stroke-width': '2'}).data('id', 'head');


for (var i = 0; i < sections.length; i++) {
  sections[i].mousedown(function(e){
    var className = this.data('id');
    createCookie("bodypart", className, 1);
    bodyPairAddClass(this.data('id'));

      if ($('#map').children().children().hasClass('active-body')){
        $('#map').children().children().removeClass('active-body');
        this.node.classList.add("active-body");
      
        var className = this.data('id');
        createCookie("bodypart", className, 1);
        bodyPairAddClass(className);
    } else {
        this.node.classList.add("active-body");
        var className = this.data('id');
        createCookie("bodypart", className, 1);
    }
  }); 
}

function bodyPairAddClass(name) {
  switch (name) {
    case "arms":
      $('.right-arm-path').addClass("active-body");
      $('.left-arm-path').addClass("active-body");
      break;
    case "thighs":
      $('.right-leg-path').addClass("active-body");
      $('.left-leg-path').addClass("active-body");
      break;
    case "calves":
      $('.right-calf-path').addClass("active-body");
      $('.left-calf-path').addClass("active-body");
      break;  
    case "chest":
      $('.chest-path').addClass("active-body");
      break;
    case "waist":
      $('.waist-path').addClass("active-body");
      break;
  }
}

function createCookie(name, value, days) {
  var expires;

  if (days) {
    var date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    expires = "; expires=" + date.toGMTString();
  } else {
    expires = "";
  }

  document.cookie = escape(name) + "=" + escape(value) + "; path=/";
}



