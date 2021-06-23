
	class Leaf {
		constructor(canvasCTX,img,w,h) {
			this.soLuong  = ~~((w+ h)/78);
			this.canvasCTX = canvasCTX;
			//this.canvasCTX.fillStyle = "#abcdef00";
			this.img = img;
			this.w = w;
			this.h = h;
			this.sp = new Sprite(this.canvasCTX, img,18,10);
			this.v = [];
			for(let i=0; i<this.soLuong; ++i) {
				this.v[i] = new Point(this.rand(w),this.rand(h),this.rand(3,false),this.rand(2)+2,this.rand(19));
			}

			this.lastTime = new Date().getTime();
			this.now = 0;
			this.deltaTime = 0;
		}

		update() {
			this.now = new Date().getTime();
			this.deltaTime = this.now - this.lastTime;
			this.lastTime = this.now;
			for(let i=0; i<this.soLuong; ++i){
				this.v[i].y += (this.v[i].dy / 4) * this.deltaTime/16
				this.v[i].x += (this.v[i].dx / 4) * this.deltaTime/16;
				this.v[i].frame += 0.5*this.deltaTime/16;
				if(this.v[i].frame >15){
					this.v[i].frame = 0;
				}
				if(this.v[i].y > this.h || this.v[i].x > this.w || this.v[i].x < -18){
					this.v[i].y  = -this.rand(25);
	                this.v[i].x  = this.rand(this.w);
	                this.v[i].dx = this.rand(3,false);
	                this.v[i].dy = this.rand(2) + 2;
				}
			}


		}

		draw() {
			this.canvasCTX.clearRect(0,0,this.w,this.h)
			for(let i=0; i<this.soLuong; ++i) {
				this.sp.setPosition(~~this.v[i].x, ~~this.v[i].y);
				this.sp.setFrame(~~(this.v[i].frame/4));
				this.sp.draw(this.canvasCTX);
			}
		}
	
		rand(limit, abs = true) {
	        if(abs) {
	            return Math.random() * limit;
	        }
	        if(Math.round(Math.random() * 2)){
	            return Math.random() * limit;
	        }
	        return - Math.random() * limit;
	    }

	}