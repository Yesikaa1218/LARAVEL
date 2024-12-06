
// Función para ordenar aleatoriamente un arreglo
function shuffleArray(inputArray){
    inputArray.sort(()=> Math.random() - 0.5);
}

// Lista de miembros
let membersList = ["Efren", "Leslie", "Salvador"];
shuffleArray(membersList);

// Insertar la card de cada miembro
for(let member of membersList) {
    let fullName;
    let position;
    let linkedIn;
    let imageId;

    if(member == "Efren") {
        fullName = "Efrén de Jesús Enríquez Nieto";
        position = "Desarrollador de Software Full-Stack";
        linkedIn = "https://www.linkedin.com/in/efren-de-jesus-enriquez-nieto/";
        imageId = "efren_enriquez";
    }
    else if (member == "Leslie"){
        fullName = "Leslie Anaid Rosas Reyna";
        position = "Desarrolladora de Software Back-End";
        linkedIn = "https://www.linkedin.com/in/leslie-rosas-8004a3229/";
        imageId = "leslie_rosas";

    }
    else if (member == "Salvador") {
        fullName = "Salvador Eduardo Pazos Urbano";
        position = "Desarrollador de Software Full-Stack";
        linkedIn = "https://www.linkedin.com/in/salvador-pazos/";
        imageId = "salvador_pazos";
    }

    $(function(){
        $("#miembros-multimedia").prepend(`<div class="miembro-multimedia-card">
                <img id="${imageId}" src="https://cdn.discordapp.com/attachments/967983219096027138/993245307376767186/persona.jpg" alt="${fullName}" class="miembro-multimedia-image">
                <h4 class="miembro-multimedia-name text-center">${fullName}</h4>
                <div class="miembro-multimedia-divider"></div>
                <p class="miembro-multimedia-position text-center">${position}</p>
                <a href="${linkedIn}" target="_blank">
                    <img class="miembro-multimedia-linkedin linkedin-icon" src="" alt="LinkedIn">
                </a>
        </div>`);
    });
}

$(function(){
    $("#miembros-multimedia").prepend(

        `<div class="miembro-multimedia-card">
            <img id="angel_medrano" src="https://cdn.discordapp.com/attachments/967983219096027138/993245307376767186/persona.jpg" alt="Lic. Angel Adrián Medrano Galván" class="miembro-multimedia-image">
            <h4 class="miembro-multimedia-name text-center">Lic. Angel Adrián Medrano Galván</h4>
            <div class="miembro-multimedia-divider"></div>
            <p class="miembro-multimedia-position text-center">Jefe de Desarrollo Multimedia</p>
            <a href="https://www.linkedin.com/in/angel-adrian-medrano-galvan/" target="_blank">
                <img class="miembro-multimedia-linkedin linkedin-icon" src="" alt="LinkedIn">
            </a>
        </div>`
    
    );

    $("#miembros-multimedia").prepend(

        `<div class="miembro-multimedia-card">
            <img src="https://cdn.discordapp.com/attachments/967983219096027138/993245307376767186/persona.jpg" alt="M.A. Alma Patricia Calderón Martínez" class="miembro-multimedia-image">
            <h4 class="miembro-multimedia-name text-center">M.A. Alma Patricia Calderón Martínez</h4>
            <div class="miembro-multimedia-divider"></div>
            <p class="miembro-multimedia-position text-center">Coordinadora de LMAD</p>
            <a href="#" target="_blank">
                <img class="miembro-multimedia-linkedin linkedin-icon" src="" alt="LinkedIn">
            </a>
        </div>`
    
    );
});