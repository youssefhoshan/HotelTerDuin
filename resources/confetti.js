document.addEventListener("DOMContentLoaded", function() {
    var canvas = document.getElementById("confetti");
    var context = canvas.getContext("2d");
    var width = window.innerWidth;
    var height = window.innerHeight;
    canvas.width = width;
    canvas.height = height;

    var particles = [];
    var particleCount = 100;
    var popDuration = 200; // Duur van het 'poppen' in milliseconden

    function createParticle() {
        var particle = {};
        particle.x = Math.random() * canvas.width;
        particle.y = Math.random() * canvas.height;
        particle.color = getRandomColor();
        particle.radius = Math.random() * 10 + 5;
        particle.speedX = Math.random() * 4 - 2;
        particle.speedY = Math.random() * 4 - 2;
        particle.opacity = 1;
        particles.push(particle);
    }

    for (var i = 0; i < particleCount; i++) {
        createParticle();
    }

    function getRandomColor() {
        var letters = "0123456789ABCDEF";
        var color = "#";
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    function update() {
        context.clearRect(0, 0, canvas.width, canvas.height);

        for (var i = 0; i < particles.length; i++) {
            var particle = particles[i];

            if (particle.opacity > 0) {
                particle.x += particle.speedX;
                particle.y += particle.speedY;

                particle.opacity -= 1 / popDuration;

                context.beginPath();
                context.arc(particle.x, particle.y, particle.radius, 0, 2 * Math.PI);
                context.fillStyle = `rgba(${hexToRGB(particle.color)}, ${particle.opacity})`;
                context.fill();
            } else {
                particles.splice(i, 1);
                i--;
            }
        }

        if (particles.length > 0) {
            requestAnimationFrame(update);
        } else {
            canvas.remove(); // Verwijder het canvas-element nadat de animatie is voltooid
        }
    }

    function hexToRGB(hex) {
        var r = parseInt(hex.slice(1, 3), 16);
        var g = parseInt(hex.slice(3, 5), 16);
        var b = parseInt(hex.slice(5, 7), 16);
        return `${r}, ${g}, ${b}`;
    }

    update();
});
