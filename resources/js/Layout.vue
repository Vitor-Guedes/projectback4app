<template>
    <div class="absolute flex flex-col my-6 bg-white shadow-2xl border border-slate-200 rounded-2xl sm:w-10/12 sm:top-1/4 sm:left-32 w-6/12 top-1/4 left-1/4">
        <div class="p-4">
            <h5 class="mb-2 text-slate-800 text-xl font-semibold" v-text="profile.name"></h5>
          
            <img class="mr-5 border rounded-full float-left w-52" v-bind:src="profile.image">
            <p class="h-52 text-slate-600 leading-normal font-light mb-5" v-html="profile.description"></p>

            <div class="w-full flex flex-row justify-between align-center">
                <a v-bind:href="profile.links.github" class="text-slate-800 font-semibold text-sm hover:underline flex items-center hover:text-indigo-500">
                    Git Hub
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 48 48">
                        <path d="M 24 4 C 12.972066 4 4 12.972074 4 24 C 4 35.027926 12.972066 44 24 44 C 35.027934 44 44 35.027926 44 24 C 44 12.972074 35.027934 4 24 4 z M 24 7 C 33.406615 7 41 14.593391 41 24 C 41 31.66536 35.956939 38.122519 29 40.251953 L 29 35.136719 C 29 33.226635 27.899316 31.588619 26.308594 30.773438 A 10 8 0 0 0 32.4375 18.720703 C 32.881044 17.355414 33.376523 14.960672 32.199219 13.076172 C 29.929345 13.076172 28.464667 14.632086 27.765625 15.599609 A 10 8 0 0 0 24 15 A 10 8 0 0 0 20.230469 15.59375 C 19.529731 14.625773 18.066226 13.076172 15.800781 13.076172 C 14.449711 15.238817 15.28492 17.564557 15.732422 18.513672 A 10 8 0 0 0 21.681641 30.779297 C 20.3755 31.452483 19.397283 32.674042 19.097656 34.15625 L 17.783203 34.15625 C 16.486203 34.15625 15.98225 33.629234 15.28125 32.740234 C 14.58925 31.851234 13.845172 31.253859 12.951172 31.005859 C 12.469172 30.954859 12.144453 31.321484 12.564453 31.646484 C 13.983453 32.612484 14.081391 34.193516 14.650391 35.228516 C 15.168391 36.160516 16.229687 37 17.429688 37 L 19 37 L 19 40.251953 C 12.043061 38.122519 7 31.66536 7 24 C 7 14.593391 14.593385 7 24 7 z"></path>
                    </svg>
                </a>

                <a v-bind:href="profile.links.portfolio" class="text-slate-800 font-semibold text-sm hover:underline flex items-center">
                    Portfolio
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>

                <a v-bind:href="profile.links.skils" class="text-slate-800 font-semibold text-sm hover:underline flex items-center">
                    Habilidades
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>

                <a v-bind:href="profile.links.contacts" class="text-slate-800 font-semibold text-sm hover:underline flex items-center">
                    Sobre Mim
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    beforeCreate() {
        axios.get('/api/profile')
            .then(response => {
                this.profile = response.data;
                console.log(response.data)
            });
    },  

    data() {
        return {
            name: 'Vitor Guedes Gomes',
            url_image_profile: 'https://lh3.googleusercontent.com/a/ACg8ocIE3j0F_gW3vEIhbv52sSQu8vtUaP2Mc1Ki-1FluyfW3LVdzS7w=s288-c-no',
            description: 'Eu sou desenvolvedor Backend. Comecei minha carreira trabalhanco com o Magento 1, sofri bastante por causa do xml e cache, mas consegui desenvolver as habilidades para cumprir com as necessidades do meu cargo. Mas com isso tive a oportunidade de trabalhar em um ecommerce que posteriormente evoluiu para um marketplace.<br> Após isso trabalhei em uma empresa que fornecia técnologia para criar marketplace e ecommerce, foi ai que tive contato com o framework Laravel. <br>Adora essa área de desenvolvimento e tecnologia, por isso sempre que posso tento procurar coisas novas pra aprender.',
            links: {
                github: 'https://github.com/Vitor-Guedes'
            },
            profile: {}
        }
    }
}
</script>