<script setup>
import Accordion from './Accordion.vue';
</script>
<template>
    <div class="content-wrapper" style="background-color:#ebebeb ">
         <section class="content">
    <div class="container-fluid pt-3">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <b>Manajemen Task</b>
                    </div>
                    <div class="card-body">
                        <RouterLink to="/addtask" class="btn btn-sm btn-success">Add Data</RouterLink>
                        <Accordion/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
     </div>
   
</template>