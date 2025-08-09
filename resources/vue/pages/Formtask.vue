<script setup>
  import api from '../js/axios';
  import router from '../router';
function submittask(judul,description) {
    
    const data={
        "user_id":1,
        "judul":judul,
        "description":description,
        "is_completed":0
    }
     api.post('/api/task/',data)
        .then(response => {
            router.push("/task")                 
        });
 }
</script>

<template>
     <div class="content-wrapper" style="background-color:#ebebeb ">
                 <section class="content">
    <div class="container-fluid pt-3">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header text-center">
                        <b>Tambah Task</b>
                    </div>
                    <div class="card-body bg-light">
                    <div class="row justify-content-center">
                        <div class="col-8"> 
                                <div class="card">
                                    <div class="card-body">
                                         <form>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Judul</label>
                                                    <input v-model="judul" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Judul">
                                               </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Description</label>
                                                    <textarea v-model="description" class="form-control" id="exampleInputPassword1" placeholder="Description"></textarea>
                                                </div>
                                                <div class="card-footer text-center">
                                                <button @click="submittask(judul,description)" type="button" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                    </div>
                             </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
     </div>
</template>