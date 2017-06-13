// ************************************************************************** //
//                                                                            //
//                                                        :::      ::::::::   //
//   logoanimate.js                                     :+:      :+:    :+:   //
//                                                    +:+ +:+         +:+     //
//   By: scollet <marvin@42.fr>                     +#+  +:+       +#+        //
//                                                +#+#+#+#+#+   +#+           //
//   Created: 2017/06/05 18:24:21 by scollet           #+#    #+#             //
//   Updated: 2017/06/05 18:24:22 by scollet          ###   ########.fr       //
//                                                                            //
// ************************************************************************** //

var logo_canvas = document.getElementById('jgravlogo');

function  animate(orbit, radius,
  x, y,
    start, end,
      color, thickness,
        alpha, angle) {
  orbit.translate(logo_canvas.width / 2, logo_canvas.height / 2);
  orbit.rotate(angle * Math.PI / 2345);
  orbit.translate(-(logo_canvas.width / 2), -(logo_canvas.height / 2));
  draw(orbit, radius, x, y, start, end, color, thickness, alpha);
}

function logo_display() {
  var outer = planet = inner = pos = neg = animation = logo_canvas.getContext('2d');
  var width = logo_canvas.width;
  var height = logo_canvas.height;
  var angle = 0;

  window.setInterval(function() {
    angle = (angle + 1) % 4680;
    /* COMMENT THE LINE BELOW FOR A GOOD TIME */
    animation.save();
    animation.clearRect(0, 0, 250, 250);
    /* INNER PLANET */
    animate(planet, 60, width / 2, height / 2, 0, Math.PI * 2, 'white', 10, 1, angle, false);
    /* OUTER ORBIT */
    animate(outer, 90, width / 2, height / 2, Math.PI * 1.38, Math.PI * 1.2, 'white', 10, 1, angle, false);
    /* INNER ORBIT */
    animate(inner, 45, width / 2, height / 2, 0, Math.PI * 2, '#051644', 5, 1, angle, true);
    /* OUTER SATELLITE */
    animate(pos, 20, 69.9, 53.3, 0, Math.PI * 2, 'white', 1, 1, -1 * angle, false);
    /* INNER SATELLITE */
    animate(neg, 10, 153, 159, 0, Math.PI * 2, '#051644', 10, 1, -1 * angle, true);
    /* COMMENT THE LINE BELOW FOR A GOOD TIME */
    animation.restore();
  }, 100)
}

function  draw(orbit, radius,
  x, y,
    start, end,
      color, thickness, alpha, anticlockwise) {
  for (var i = 0; i < 1; i++) {
    for (var j = 0; j < 1; j++) {
      orbit.beginPath();
      orbit.globalAlpha = alpha;
      orbit.fillStyle = color;
      orbit.strokeStyle = color;
      orbit.lineWidth = thickness;
      orbit.arc(x, y, radius, start, end, anticlockwise);
      if (radius === 20 || radius === 10 || radius === 60) {
        orbit.fill()
      } else {
        orbit.stroke();
      }
    }
  }
}

/*
**  Test Function(s):
*/

/*

function draw() {
  var logo_canvas = document.getElementById('jgravlogo');
  if (logo_canvas.getContext) {
    var ctx = logo_canvas.getContext('2d');

    ctx.fillRect(25, 25, 100, 100);
    ctx.clearRect(45, 45, 60, 60);
    ctx.strokeRect(50, 50, 50, 50);
  }
}

*/
