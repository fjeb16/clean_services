let selectProduct = document.querySelectorAll(".select_product");
let fechas = document.querySelectorAll(".fecha");
let tipos = document.querySelectorAll(".tipo");
console.log(Alpine)
const tipo_limpieza = {
    basico: {
        cuartos: plan_0.content.dormitorios,
        banos: plan_0.content.bano_extra,
        medioBano: plan_0.content.medio_bano_extra,
        oficinaSala: plan_0.content.oficina_sala,
        horno: plan_0.content.horno,
        refri: plan_0.content.refri,
        socalo: plan_0.content.socalo,
        zotano: plan_0.content.zotano,
        ventana: plan_0.content.ventana,
        persiana: plan_0.content.persiana,
    },
    produnda: {
        cuartos: plan_1.content.dormitorios,
        banos: plan_1.content.bano_extra,
        medioBano: plan_1.content.medio_bano_extra,
        oficinaSala: plan_1.content.oficina_sala,
        horno: plan_1.content.horno,
        refri: plan_1.content.refri,
        socalo: plan_1.content.socalo,
        zotano: plan_1.content.zotano,
        ventana: plan_1.content.ventana,
        persiana: plan_1.content.persiana,
    },
    mudanza: {
        cuartos: [177, 193, 210, 254, 275],
        banos: 20,
        medioBano: 15,
        oficinaSala: 15,
        zotano: 50,
        ventana: 10,
        persiana: 6,
    },
    mascotas: plan_0.content.mascota,
};
let tipoSeleccionado = "basico";

let totalCuartos = 0;
let totalBanos = 0;
let totalMediosBanos = 0;
let totalOficinaSala = 0;
let totalHorno = 0;
let totalRefri = 0;
let totalSocalo = 0;
let totalZotano = 0;
let totalVentana = 0;
let totalPersiana = 0;
let totalMascota = 0;



document.getElementById("basico").addEventListener("click", (evt) => {
    tipo.value = evt.target.textContent;
    tipoSeleccionado = "basico";
    recalcularValores()
    calcularTotal()
});

document.getElementById("profundo").addEventListener("click", (evt) => {
    tipo.value = evt.target.textContent;
    tipoSeleccionado = "produnda";
    recalcularValores()
    calcularTotal()
});

cuartos.addEventListener("change", (evt) => {
    switch (Number(evt.target.value)) {
        case 1:
            totalCuartos = tipo_limpieza[tipoSeleccionado].cuartos[0];
            break;
        case 2:
            totalCuartos = tipo_limpieza[tipoSeleccionado].cuartos[1];
            break;
        case 3:
            totalCuartos = tipo_limpieza[tipoSeleccionado].cuartos[2];
            break;
        case 4:
            totalCuartos = tiptipo_limpiezao[tipoSeleccionado].cuartos[3];
            break;
        case 5:
            totalCuartos = tipo_limpieza[tipoSeleccionado].cuartos[4];
            break;
        default:
            alert("Cantidad maxima de cuartos es 5");
            totalCuartos = 0;
    }
    calcularTotal();
});

banos_extra.addEventListener("change", (evt) => {
    totalBanos = tipo_limpieza[tipoSeleccionado].banos
    calcularTotal();
});

medio_banos_extra.addEventListener("change", (evt) => {
    totalMediosBanos = tipo_limpieza[tipoSeleccionado].medioBano
    calcularTotal();
});

sala_oficina.addEventListener("change", (evt) => {
    totalOficinaSala = tipo_limpieza[tipoSeleccionado].oficinaSala
    calcularTotal();
});

horno.addEventListener("change", (evt) => {
    totalHorno = tipo_limpieza[tipoSeleccionado].horno
    calcularTotal();
});

refri.addEventListener("change", (evt) => {
    totalRefri = tipo_limpieza[tipoSeleccionado].refri
    calcularTotal();
});


socalo.addEventListener("change", (evt) => {
    totalSocalo = tipo_limpieza[tipoSeleccionado].socalo
    calcularTotal();
});

zotano.addEventListener("change", (evt) => {
    totalZotano = tipo_limpieza[tipoSeleccionado].zotano
    calcularTotal();
});

ventana.addEventListener("change", (evt) => {
    totalVentana = tipo_limpieza[tipoSeleccionado].ventana
    calcularTotal();
});

persiana.addEventListener("change", (evt) => {
    totalPersiana = tipo_limpieza[tipoSeleccionado].persiana
    calcularTotal();
});

mascotas.addEventListener("change", (evt) => {
    totalMascota = tipo_limpieza['mascotas']
    calcularTotal();
});



function calcularTotal() {
    total.textContent = parseInt(
        Number(totalCuartos) +
        Number(totalBanos * Number(banos_extra.value)) +
        Number(totalOficinaSala * Number(sala_oficina.value)) +
        Number(totalMediosBanos * Number(medio_banos_extra.value)) +
        Number(totalHorno * Number(horno.value)) +
        Number(totalRefri * Number(refri.value)) +
        Number(totalSocalo * Number(socalo.value)) +
        Number(totalZotano * Number(zotano.value)) +
        Number(totalVentana * Number(ventana.value)) +
        Number(totalPersiana * Number(persiana.value)) +
        Number(totalMascota * Number(mascotas.value))
    );
}

function recalcularValores() {
    totalCuartos = tipo_limpieza[tipoSeleccionado].cuartos[Number(cuartos.value - 1)];
    totalBanos = tipo_limpieza[tipoSeleccionado].banos;
    totalMediosBanos = tipo_limpieza[tipoSeleccionado].medioBano;
    totalOficinaSala = tipo_limpieza[tipoSeleccionado].oficinaSala;
    totalHorno = tipo_limpieza[tipoSeleccionado].horno;
    totalRefri = tipo_limpieza[tipoSeleccionado].refri;
    totalSocalo = tipo_limpieza[tipoSeleccionado].socalo;
    totalZotano = tipo_limpieza[tipoSeleccionado].zotano;
    totalVentana = tipo_limpieza[tipoSeleccionado].ventana;
    totalPersiana = tipo_limpieza[tipoSeleccionado].persiana;
    totalMascota = tipo_limpieza['mascotas'];
}


