<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import { defineProps } from "vue";

// import google recaptcha
// import { useGoogleReCaptcha } from 'vue3-google-recaptcha';

defineProps({
    csrfToken: String,
    errors: Object,
});
</script>

<template>

    <Head title="Pesquisa - Prefeitura de Mossoró" />
    <div>
        <div id="acess-bar" class="bg-pmmblue text-white">
            <div class="container mx-auto flex flex-row py-1 px-3">
                <ul class="list-none">
                    <li class="inline mr-10">
                        <a href="#" onclick="window.toggleContrast()" class="text-decoration-none text-sm">
                            Acessibilidade <i class="fa fa-adjust ml-2" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="inline text-sm">
                        Tamanho da fonte
                        <a href="#" onclick="window.aumentarFonte()">
                            <i class="fa fa-plus mx-2" aria-hidden="true"></i>
                        </a>
                        |
                        <a href="#" onclick="window.diminuirFonte()">
                            <i class="fa fa-minus mx-2" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="mx-auto">
            <div class="grid sm:grid-cols-1 md:grid-cols-2 h-full">
                <div class="col p-10">
                    <h2 class="text-3xl font-bold color-pmmblue">Pesquisa</h2>
                    <p class="text-xl font-normal color-pmmblue my-5">
                        Efeitos da pandemia de covid-19 nos profissionais de saúde da SMS de Mossoró.
                    </p>
                    <div class="card px-4 py-6 bg-pmmblue rounded-lg text-white mb-8">
                        <p class="mb-2 text-justified">
                            Convidamos você a participar da pesquisa “Efeitos da pandemia de covid-19
                            nos profissionais de saúde da Secretaria Municipal de Saúde do município de
                            Mossoró”, que tem como objetivo coletar dados e produzir indicadores para
                            caracterizar o cenário e oferecer insumos para avaliação, planejamento,
                            apoio e assistência à saúde aos profissionais da saúde da SMS de Mossoró.
                        </p>
                        <p class="mb-2 text-justified">
                            São convidados a participar da pesquisa todos os trabalhadores e as
                            trabalhadoras da Secretaria Municipal de Saúde de Mossoró, independente do
                            cargo e função que ocupa. Para sucesso desta pesquisa contamos com a sua
                            valiosa participação.
                        </p>
                    </div>
                    <h3 class="mb-3 color-pmmblue">Digite o código CNES da sua unidade:</h3>
                    <form class="mb-10" action="/proceguir" method="POST">
                        <input type="hidden" name="_token" v-bind:value="csrfToken" />
                        <div class="flex flex-grow mb-10">
                            <input type="text" name="cnes"
                                class="w-full border-transparent rounded shadow-lg bg-[#F3F3F3]" placeholder="CNES" />
                        </div>
                        <div v-if="errors.cnes"
                            class="bg-red-100 rounded-lg py-5 px-6 mb-3 text-base text-red-700 inline-flex items-center w-full"
                            role="alert">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle"
                                class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512">
                                <path fill="currentColor"
                                    d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z">
                                </path>
                            </svg>
                            {{ errors.cnes }}
                        </div>
                        <div v-if="$page.props.errado.erro != ''"
                            class="bg-red-100 rounded-lg py-5 px-6 mb-3 text-base text-red-700 inline-flex items-center w-full"
                            role="alert">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle"
                                class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512">
                                <path fill="currentColor"
                                    d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z">
                                </path>
                            </svg>
                            {{ $page.props.errado.erro }}
                        </div>
                        <div class="flex lg:flex-row md:flex-col">
                            <!-- recaptcha -->
                            <div class="flex-auto mr-4">
                                <!-- <recaptcha class="g-recaptcha" data-sitekey="6Lc9XbAZAAAAAMfU0H6B5zV5m5lYkZj1b8I5w5mQ"></recaptcha> -->
                                <div class="g-recaptcha m-3" data-sitekey="6LdHH5UUAAAAAIrf3rzUZlYRiE9U4EdYfl8twDye">
                                </div>
                            </div>
                            <div class="flex-auto w-full md:flex-grow min-w-36 md:mt-3">
                                <button class="w-full rounded-lg bg-pmmblue text-white py-4 text-2xl">
                                    Participar
                                </button>
                            </div>
                        </div>
                    </form>
                    <div id="apoiadores">
                        <h3 class="color-pmmblue mb-3">Apoiadores:</h3>
                        <ul class="flex justify-between place-content-center">
                            <li class="p-2 justify-between place-self-center">
                                <img src="/images/apoiador1.png" alt="" />
                            </li>
                            <li class="p-2 justify-between place-self-center">
                                <img src="/images/apoiador2.png" alt="" />
                            </li>
                            <li class="p-2 justify-between place-self-center">
                                <img src="/images/apoiador3.png" alt="" />
                            </li>
                            <li class="p-2 justify-between place-self-center">
                                <img src="/images/apoiador4.png" alt="" />
                            </li>
                            <li class="p-2 justify-between place-self-center">
                                <img src="/images/apoiador5.png" alt="" />
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col hidden md:block">
                    <div id="bg-right-column"></div>
                </div>
            </div>
        </div>

        <div id="footer" class="bg-pmmblue py-1 text-white">
            <div class="container mx-auto text-center">
                <p>© 2023 - Prefeitura de Mossoró. Todos os Direitos Reservados.</p>
            </div>
        </div>
    </div>
</template>

<!-- css -->
<style scoped>

</style>

<!-- script -->

<script>
window.toggleContrast = ativarContraste;
window.aumentarFonte = aumentarFonte;
window.diminuirFonte = diminuirFonte;
window.setTamanhodeFontes = setTamanhodeFontes;

localStorage.getItem("contraste") === "true" ? window.ativarContraste : null;
localStorage.getItem("fonte") ? window.setTamanhodeFontes : null;

/* aumentar e diminuir fonte*/
function aumentarFonte() {
    const elemento = document.querySelectorAll("p, h1, h2, h3, h4, h5, h6, a");
    var size = 0;
    elemento.forEach((element) => {
        const tamanho = window.getComputedStyle(element, null).getPropertyValue("font-size");
        size = parseFloat(tamanho);
        element.style.fontSize = (size <= 20 ? size + 1 : size) + "px";
    });

    // salvar no localstorage
    localStorage.setItem("fonte", size);
}

function diminuirFonte() {
    const elemento = document.querySelectorAll("p, h1, h2, h3, h4, h5, h6, a");
    var size = 0;
    elemento.forEach((element) => {
        var tamanho = window.getComputedStyle(element, null).getPropertyValue("font-size");
        size = parseFloat(tamanho);
        element.style.fontSize = (size >= 12 ? size - 1 : size) + "px";
    });

    // salvar no localstorage
    localStorage.setItem("fonte", size);
}

function setTamanhodeFontes() {
    const elemento = document.querySelectorAll("p, h1, h2, h3, h4, h5, h6, a");
    var size = localStorage.getItem("fonte");
    elemento.forEach((element) => {
        element.style.fontSize = size + "px";
    });
}

/* ativar contraste*/
function ativarContraste() {
    const elemento = document.querySelectorAll("body")[0];
    elemento.classList.toggle("contraste");

    saveConstrasteOnLocalStorage(elemento.classList.contains("contraste"));
}

function saveConstrasteOnLocalStorage(value) {
    localStorage.setItem("contraste", value);
}
mounted: {
    const script = document.createElement("script");
    script.src = "https://www.google.com/recaptcha/api.js";
    document.head.appendChild(script);
}
</script>
