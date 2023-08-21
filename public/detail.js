function showId(element) {
    let idDetail = element.nextElementSibling;
    if (idDetail.style.display === 'none') {
        idDetail.style.display = 'block';
    } else {
        idDetail.style.display = 'none';
    }
}

function showParc(element) {
    let parcDetail = element.nextElementSibling;
    if (parcDetail.style.display === 'none') {
        parcDetail.style.display = 'block';
    } else {
        parcDetail.style.display = 'none';
    }
}

function showCollab(element) {
    let collabDetail = element.nextElementSibling;
    if (collabDetail.style.display === 'none') {
        collabDetail.style.display = 'block';
    } else {
        collabDetail.style.display = 'none';
    }
}

function showStockage(element) {
    let stockDetail = element.nextElementSibling;
    if (stockDetail.style.display === 'none') {
        stockDetail.style.display = 'block';
    } else {
        stockDetail.style.display = 'none';
    }
}

/*----------Burger---------------*/

const burger = document.querySelector('.menu-burger');
const showburger = document.querySelector('.hide');

burger.addEventListener('click', () => {
    showburger.classList.toggle('visible');
}
)
/*-----------------Messgae de confirmation gestion users admin----------------------*/ 
function confirmAccess(userName) {
    return confirm("Êtes-vous sûr de vouloir approuver l'accès de l'utilisateur " + userName + " ?");
}

function confirmDelete(userName) {
    return confirm("Êtes-vous sûr de vouloir supprimer l'utilisateur " + userName + " ?");
}

function confirmAuthorize(userName) {
    return confirm("Êtes-vous sûr de vouloir autoriser " + userName + " en tant qu'administrateur ?");
}