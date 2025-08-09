<script setup>
   import api from '../js/axios';
   import { reactive, onMounted } from 'vue';
    import router from '../router';
    const posts = reactive({
        data:[]
    });
  const props= defineProps({
    iddetail:String
  })
    const fetchDataPosts = async () => {

        await api.get('/api/taskdetail/'+props.iddetail)

        .then(response => {
            posts.data=response.data.data
            console.log();
                                        
        });
    }
    onMounted(() => {
        fetchDataPosts();
    });

    function update() {
        api.put('/api/taskdetail/'+posts.data.id,posts.data)
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
                        <b>Edit Task Detail</b>
                    </div>
                    <div class="card-body bg-light">
                    <div class="row justify-content-center">
                        <div class="col-8"> 
                                <div class="card">
                                    <div class="card-body">
                                         <form @submit.prevent="update">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Activity</label>
                                                    <input v-model="posts.data.activity" type="text" class="form-control" id="exampleInputEmail1"  placeholder="Enter Activity">
                                               </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Keterangan</label>
                                                    <textarea v-model="posts.data.keterangan" class="form-control" id="exampleInputPassword1" placeholder="Keterangan"></textarea>
                                                </div>
                                                <div class="card-footer text-center">
                                                <button type="submit" class="btn btn-primary">Submit</button>
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