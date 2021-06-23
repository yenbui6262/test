
	class Sprite{
		constructor(canvas, image, sw, sh) {
			this.canvas = canvas;
			this.image = image;
			this.sw = sw;
			this.sh = sh;
			this.x = 0;
			this.y = 0;
			this.frame = 0;
		}

		setPosition(x,y) {
			this.x = x;
			this.y = y;
		}

		setFrame(frame) {
			this.frame = frame;
		}

		draw(){
			this.canvas.drawImage(this.image,0,this.frame*this.sh,this.sw,this.sh,this.x,this.y,this.sw,this.sh);
		}
	}