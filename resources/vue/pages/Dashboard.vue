<script setup>
import axios from 'axios';
import { reactive, onMounted } from 'vue';
const dataquote = reactive({
    data:{}
});
const getQuotes = axios.create({
    baseURL: 'https://dummyjson.com/quotes'
})
 const fetchData = async () => {
        await getQuotes.get('/random').then(response => {
            dataquote.data = response.data
        });
    }
    onMounted(() => {
        fetchData();
    });
</script>

<template>
     <div class="content-wrapper" style="background-color:#ebebeb ">
                 <section class="content">
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-center">
                        <b>Quotes Of The Day</b>
                    </div>
                    <div class="card-body text-center bg-light">
                       <blockquote>
                  <p>{{dataquote.data.quote}}</p>
                  <small>"<cite title="Source Title">{{dataquote.data.author}}</cite>"</small>
                </blockquote>
                    </div>
                    <hr>
                    <div class="card-body bg-light mt-3">
                        <h5>Catatan :</h5>
                        <ul>
                            <li>
                                <h6>BACKEND : <b>OK !</b></h6>
                            </li>
                            <li>
                                <h6>FRONTEND :</h6>
                                <ul>
                                    <li>
                                        Login & Register : <b>Belum</b>
                                    </li>
                                     <li>
                                       Filter Status : <b>Belum</b>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
     </div>
</template>