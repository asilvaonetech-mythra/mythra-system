class MythraEngine {

    constructor() {

        this.canvas = document.getElementById("mythra-engine");

        if (!this.canvas) return;

        this.ctx = this.canvas.getContext("2d");

        this.resize();

        window.addEventListener("resize", () => this.resize());

        this.stars = [];

        this.createStars();

        requestAnimationFrame(() => this.animate());

    }

    resize() {

        this.canvas.width = window.innerWidth;

        this.canvas.height = window.innerHeight;

    }

    createStars() {

        this.stars = [];

        for (let i = 0; i < 450; i++) {

            this.stars.push({

                x: Math.random() * this.canvas.width,

                y: Math.random() * this.canvas.height,

                z: Math.random() * 1200,

                size: Math.random() * 2 + .2

            });

        }

    }

    animate() {

        const ctx = this.ctx;

        const w = this.canvas.width;

        const h = this.canvas.height;

        ctx.clearRect(0,0,w,h);

        const cx = w / 2;

        const cy = h / 2;

        for(const s of this.stars){

            s.z -= 8;

            if(s.z <= 1){

                s.x = Math.random()*w;

                s.y = Math.random()*h;

                s.z = 1200;

            }

            const k = 700 / s.z;

            const px = (s.x-cx)*k + cx;

            const py = (s.y-cy)*k + cy;

            const radius = s.size*k;

            ctx.beginPath();

            ctx.arc(px,py,radius,0,Math.PI*2);

            ctx.fillStyle="white";

            ctx.fill();

        }

        requestAnimationFrame(()=>this.animate());

    }

}

window.addEventListener("load",()=>{

    new MythraEngine();

});