<script setup>
import sidebar from './sidebar.vue';
</script>
<template>
     <nav class="main-header navbar navbar-expand navbar-white navbar-light bg-grad-custom">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <RouterLink class=" btn btn-block btn-sm btn-danger" to="/logout"><i class="fas fa-power-off"></i>Logout</RouterLink>
                </li>
            </ul>
        </nav>
        <sidebar/>
</template>