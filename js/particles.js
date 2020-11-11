const ctx = document.getElementById('canvas').getContext('2d');
var canvas = document.getElementById('canvas');
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

function init() {
    window.requestAnimationFrame(draw);
}

class Particle {
    constructor(id) {
        this.x;
        this.y;
        this.speedX;
        this.speedY;
        this.size;
        this.opacity;
        this.id = id;
        // Add to list of particles
        Particle.instances.push(this);
    }
    // Generate initial particles
    generateOnscreen() {
        this.calcPositionX();
        this.calcPositionY();
        this.calcSpeed();
        this.calcSize();
        this.calcOpacity();
    }
    // Reposition particle once off screen
    reposition(direction) {
        // Right
        if (direction == 'right' ) {
            this.x = canvas.width + 50;
            this.speedX = Math.floor(5 * Math.random()) - 5;
            this.speedY = Math.floor(11 * Math.random()) - 5;
        }
        // Left
        if (direction == 'left' ) {
            this.x = -50;
            this.speedX = Math.floor(5 * Math.random()) + 1;
            this.speedY = Math.floor(11 * Math.random()) - 5;
        }
        // Below
        if (direction == 'below' ) {
            this.y = canvas.height + 50;
            this.speedX = Math.floor(11 * Math.random()) - 5;
            this.speedY = Math.floor(5 * Math.random()) - 5;
        }
        // Adove
        if (direction == 'above' ) {
            this.y = -50;
            this.speedX = Math.floor(11 * Math.random()) - 5;
            this.speedY = Math.floor(5 * Math.random()) + 1;
        }
    }
    calcPositionX() {
        this.x = Math.floor(canvas.width * Math.random());
    }
    calcPositionY () {
        this.y = Math.floor(canvas.height * Math.random());
    }
    calcSpeed() {
        this.speedX = Math.floor(11 * Math.random()) - 5;
        while (this.speedX == 0) this.speedX = Math.floor(11 * Math.random()) - 5;
        this.speedY = Math.floor(11 * Math.random()) - 5;
        while (this.speedY == 0) this.speedY = Math.floor(11 * Math.random()) - 5;
    }
    calcOpacity() {
        this.opacity = 0.40 * Math.random() + 0.10;
    }
    calcSize() {
        this.size = Math.floor(10 * Math.random()) + 5;
    }
    checkOnscreen () {
        if (this.x >= canvas.width + 100) this.reposition('right');
        if (this.x <= 0 - 100) this.reposition('left');
        if (this.y >= canvas.height + 100) this.reposition('below');
        if (this.y <= 0 - 100) this.reposition('above');
    }
}
// Class instance destroyer
Particle.prototype.destroy = function () {
    var i = 0;
    while (Particle.instances[i] !== this) { i++; }
    Particle.instances.splice(i, 1);
};
// Create a list of alive particles
Particle.instances = [];

// Amount of particles to initially spawn
var particleMax = 100;
for (var i = 0; i < particleMax; i++) {
    Particle.instances[i] = new Particle(i);
    Particle.instances[i].generateOnscreen();
}

var frameCounter=0;
function draw() {
    if(++frameCounter % 3){
        window.requestAnimationFrame(draw);
        return false;
    }
    ctx.globalCompositeOperation = 'copy';
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    ctx.canvas.width = window.innerWidth;
    ctx.canvas.height = window.innerHeight;

    var canvasGradient = ctx.createLinearGradient(0, canvas.height, canvas.width, 0);
    canvasGradient.addColorStop(0, "#19acff");
    canvasGradient.addColorStop(.7, "#b743ff");
    ctx.fillStyle = canvasGradient;
    ctx.fillRect(0, 0, canvas.width, canvas.height);

    // Update particles
    for (var i in Particle.instances) {
        // Instance of particle class
        Particle.instances[i].checkOnscreen();
        Particle.instances[i].x += Particle.instances[i].speedX;
        Particle.instances[i].y += Particle.instances[i].speedY;
        ctx.beginPath();
        ctx.globalAlpha = Particle.instances[i].opacity;
        ctx.arc(Particle.instances[i].x, Particle.instances[i].y, Particle.instances[i].size, 0, 2 * Math.PI);
        ctx.fillStyle = 'white';
        ctx.fill();
    }
    window.requestAnimationFrame(draw);
}

init();
