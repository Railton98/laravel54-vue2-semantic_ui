<template>
    <div class="ui fixed inverted menu">
        <router-link to="/" class="header item">Codegeo</router-link>
        <div class="ui simple dropdown item">
            Locais <i class="dropdown icom"></i>
            <div class="menu">
                <router-link to="/country" class="item">Países</router-link>
            </div>
        </div>
    </div>
</template>
