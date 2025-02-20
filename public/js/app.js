document.addEventListener("DOMContentLoaded", () => {
    const modals = document.getElementById("modal");
    const updateBtn = document.querySelector(".updateBtn");
    const closeBtn = document.getElementsByClassName("close")[0];
    const shapeButtons = document.querySelectorAll(".shape-btn");
    const profileImage = document.getElementById("profileImage");

    updateBtn.onclick = function() {
        modals.style.display = "block";
    }

    closeBtn.onclick = function() {
        modals.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modals.style.display = "none";
        }
    }

    shapeButtons.forEach(button => {
        button.addEventListener("click", () => {
            const shape = button.getAttribute("data-shape");
            switch (shape) {
                case "circle":
                    profileImage.style.borderRadius = "50%";
                    break;
                case "square":
                    profileImage.style.borderRadius = "0";
                    break;
                case "octagon":
                    profileImage.style.borderRadius = "0";
                    profileImage.style.clipPath = "polygon(30% 0%, 70% 0%, 100% 30%, 100% 70%, 70% 100%, 30% 100%, 0% 70%, 0% 30%)";
                    break;
                case "hexagon":
                    profileImage.style.borderRadius = "0";
                    profileImage.style.clipPath = "polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%)";
                    break;
                default:
                    profileImage.style.borderRadius = "50%";
            }
            modal.style.display = "none";
        });
    });
});
