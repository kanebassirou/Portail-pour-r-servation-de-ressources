    document.addEventListener("DOMContentLoaded", function () {
        const filterButtons = document.querySelectorAll(".filter-button");
        const resourceItems = document.querySelectorAll(".filter");

        filterButtons.forEach(button => {
            button.addEventListener("click", function () {
                // Supprimer la classe 'active' de tous les boutons
                filterButtons.forEach(btn => btn.classList.remove("active"));
                this.classList.add("active");

                const filterValue = this.getAttribute("data-filter");

                resourceItems.forEach(item => {
                    if (filterValue === "all" || item.classList.contains(filterValue)) {
                        item.style.display = "block"; // Afficher
                    } else {
                        item.style.display = "none"; // Masquer
                    }
                });
            });
        });
    });
