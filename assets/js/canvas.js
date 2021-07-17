let canvas = document.getElementById('convas');
let context = canvas.getContext('2d');

canvas.style.background = '#bff';

var width = window.innerWidth;
var height = window.innerHeight;

canvas.width = width;
canvas.height = height;


class Circle {

	constructor(xaxis, yaxis, raduis, color) {
		this.xaxis = xaxis;
		this.yaxis = yaxis;
		this.raduis = raduis;
		this.color = color;
	}

	draw(context) {
		context.beginPath();
		context.arc(this.xaxis, this.yaxis, this.raduis, 0, Math.PI * 2, false);
		context.strokeStyle = 'red';
		context.lineWidth = 6;
		context.fillStyle = this.color;
		context.fill();
		context.stroke();
		context.closePath();
	}

	random(newColor) {
		this.color = newColor;
		this.draw(context);
	}

}

let circle = new Circle(500, 500, 1000, 'black');
circle.draw(context);

canvas.addEventListener('click', () => {
	var randomColor = '#'+Math.floor(Math.random()*16777215).toString(16);
	circle.random(randomColor);
});