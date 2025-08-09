<script setup>
    import { reactive, onMounted } from 'vue';
    import TableDetail from './TableDetail.vue';
    import api from '../js/axios';

    const posts = reactive({
        data:[]
    });

    const fetchDataPosts = async () => {
        await api.get('/api/task')
        .then(response => {
            posts.data=response.data.data                            
        });
    }

    onMounted(() => {
        fetchDataPosts();
    });
    function deletetask(id) {
        api.delete('/api/task/'+id)
        .then(response => {
            fetchDataPosts();                 
        });
      }
    function deletedetail(id) { 
       api.delete('/api/taskdetail/'+id)
        .then(response => {
            fetchDataPosts();                 
        });
     }
     function updatestatus(id) { 
      api.put('/api/taskdetail/'+id,{'status':1})
        .then(response => {
            fetchDataPosts();                 
        });
      }
</script>
<template>

    <div class="card mt-3">
              <div class="card-body bg-light border">
                <div id="accordion">
                  <div class="card shadow-sm border" v-for="(post, index) in posts.data" :key="index">
                    <div class="card-header">
                      <h4 class="card-title w-100">
                        <a class="d-block w-100 collapsed text-dark" data-toggle="collapse" :href="'#collapse'+index" aria-expanded="false">
                         <h5 class="d-inline">{{ index+1 }}.&nbsp;{{ post.judul }}</h5>
                         <small v-if="post.is_completed" class="badge badge-success float-right">Completed <i class="fas fa-check"></i></small>
                         <small v-else class="badge badge-danger float-right">Not Complete <i class="fas fa-exclamation"></i></small>
                        </a>
                      </h4>
                    </div>
                    <div :id="'collapse'+index" class="collapse" data-parent="#accordion" style="">
                      <div class="card-body">
                         <blockquote>{{ post.description }}</blockquote>
                          <hr>
                         <TableDetail :taskid="post.id" :taskdetail="post.task_detail" @click="deletedetail" @updatestatus="updatestatus" />
                      
                      </div>
                      <div class="card-footer text-center">
                          <button @click='deletetask(post.id)' class="btn btn-sm btn-danger">Delete</button>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
             
            </div>
</template>