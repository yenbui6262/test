
	class Cobay {

		constructor(){
			var self = this;
			this.w = window.innerWidth;
			this.h = window.innerHeight;

			this.canvasBuffer = this.createCanvas(this.w,this.h);

			document.body.append(this.canvasBuffer);
			this.img = new Image();
			this.img.src = "../../images/cobay.png";

			this.img.onload = function(){
				self.run();
			}
			this.la = new Leaf(this.canvasBuffer.ctx,this.img,this.w,this.h);
		}

		update() {
			this.la.update();
		}

		draw() {
			this.la.draw();
		}

		run() {
			this.update();
			this.draw();
			window.requestAnimationFrame(this.run.bind(this));
		}

		createCanvas(width, height){
			this.canvas = document.createElement("canvas");
		    this.canvas.width = width;
		    this.canvas.height = height;
			this.canvas.ctx = this.canvas.getContext("2d");
		    return this.canvas;
		}
	}
	

