const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});




    function toggleFields() {
        var role = document.getElementById('statusUser').value;

        // Masquer tous les champs spécifiques
        document.getElementById('etudiantFields').style.display = 'none';
        document.getElementById('patFields').style.display = 'none';
        document.getElementById('perFields').style.display = 'none';

        // Afficher les champs en fonction du rôle sélectionné
        if (role === 'Etudiant') {
            document.getElementById('etudiantFields').style.display = 'block';
        } else if (role === 'PATS') {
            document.getElementById('patFields').style.display = 'block';
        } else if (role === 'PER') {
            document.getElementById('perFields').style.display = 'block';
        }
    }
