
const endpoint = `/web_fs_3/`;
const testMode = false;

async function postData( uri = "", data = {} ){

    let rs = await fetch( endpoint+uri, {
        method: 'POST', 
        mode: 'no-cors',
        headers: {
          'Content-Type':  "application/json",
        //   'Content-Type':  'application/x-www-form-urlencoded',
        }, 
        body: JSON.stringify(data) 
    });
    return await rs.json();

}

function recalculatePrice(){
    let ServiceDestination = document.getElementById("ServiceDestination");
    if( ServiceDestination.value === ""){
        return false;
    }
    document.getElementsByClassName("resumen-destination")[0].innerHTML = ServiceDestination.options[ServiceDestination.selectedIndex].text;

    let ServiceType = document.getElementById("ServiceType");
    if( ServiceType.value === ""){
        return false;
    }
    document.getElementsByClassName("resumen-service")[0].innerHTML = ServiceType.options[ServiceType.selectedIndex].text;

    postData("server/getPrice.php", {
            "ServiceDestination" : ServiceDestination.value,
            "ServiceType" : ServiceType.value,
    } ).then( (data)=>{
        [...document.getElementsByClassName("total-title")].forEach(el => {
            el.getElementsByTagName("span")[0].innerHTML = `$ ${data.price} USD`;
        });
    });
}

document.getElementById("ServiceDestination").addEventListener("change", () => {
    recalculatePrice(); 
}, true);

document.getElementById("ServiceType").addEventListener("change", () => {
    recalculatePrice();
}, true);

recalculatePrice();

const ScheduleAction = () => {
    let ServiceSchedule = document.getElementById("ServiceSchedule");

    if( ServiceSchedule.value === "20:00"){
        document.body.classList.add("theme-dark");
    }else{
        document.body.classList.remove("theme-dark");
    }

    let el = ServiceSchedule;
    document.getElementsByClassName("resumen-schedule")[0].innerHTML = el.options[el.selectedIndex].text;
};
document.getElementById("ServiceSchedule").addEventListener("change", () => {
    ScheduleAction();
}, true);

ScheduleAction();



document.getElementById("Step1Btn").addEventListener("click", () => {
    validateStep1();
});

function validateStep1(){
    if( !testMode ){
        let ServiceDestination = document.getElementById("ServiceDestination");
        if( ServiceDestination.value === ""){
            alert("Selecciona un destino.");
            return false;
        }

        let ServiceType = document.getElementById("ServiceType");
        if( ServiceType.value === ""){
            alert("Selecciona un tipo de servicio.");
            return false;
        }

        let ServiceSchedule = document.getElementById("ServiceSchedule");
        if( ServiceSchedule.value === ""){
            alert("Selecciona un horario.");
            return false;
        }
    }

    document.getElementById("Step1").classList.add("hidden");
    document.getElementById("Step2").classList.remove("hidden");
    
}

document.getElementById("Step2Btn").addEventListener("click", () => {
    validateStep2();
});

function validateStep2(){
    if( !testMode ){
        let InName = document.getElementById("InName").value;
        if (InName.length == 0) {
            alert("Falta poner su nombre en el campo.")
            return false;
        }

        let InPhone = document.getElementById("InPhone").value;
        if ( isNaN(parseFloat(InPhone)) ) {
            alert("El campo telefono solo acepta numeros.")
            return false;
        }

        let InEmail = document.getElementById("InEmail").value;
        var mailFormat =  /\S+@\S+\.\S+/;
        if ( !InEmail.match(mailFormat) ) {
            alert("El campo Email necesita un correo valido.")
            return false;
        }
    }

    const form = document.querySelector('form');
    const formData = Object.fromEntries(new FormData(form).entries());

    postData("server/book.php", formData ).then( (data)=>{
        if( data.status == 1){
            window.location.href = endpoint+'details.php?rsva='+data.msg;
        }else{
            alert(data.msg);
        }
        
    });
}

document.getElementById("Step2BtnReturn").addEventListener("click", () => {
    document.getElementById("Step1").classList.remove("hidden");
    document.getElementById("Step2").classList.add("hidden");
});