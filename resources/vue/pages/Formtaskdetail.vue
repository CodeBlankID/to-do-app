<script setup>
  import api from '../js/axios';
  import router from '../router';
  const props= defineProps({
    idtask:String
  })
function submittaskdetail(activity,keterangan) {
    const data={
        "task_id":props.idtask,
        "activity":activity,
        "keterangan":keterangan,
        "status":0
    }
     api.post('/api/taskdetail/',data)
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
                        <b>Tambah Task Detail</b>
                    </div>
                    <div class="card-body bg-light">
                    <div class="row justify-content-center">
                        <div class="col-8"> 
                                <div class="card">
                                    <div class="card-body">
                                         <form>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Activity</label>
                                                    <input v-model="activity" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Activity">
                                               </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Keterangan</label>
                                                    <textarea v-model="keterangan" class="form-control" id="exampleInputPassword1" placeholder="Keterangan"></textarea>
                                                </div>
                                                <div class="card-footer text-center">
                                                <button @click="submittaskdetail(activity,keterangan)" type="button" class="btn btn-primary">Submit</button>
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