<script setup>
import { RouterLink } from 'vue-router'

const props = defineProps({
            taskdetail:Object,   
            taskid:Number,   
        })
const emit = defineEmits(["click","updatestatus"])

  function handleClick(id){
     emit("click",id)
  }
  function updatestatus(id) { 
    emit("updatestatus",id)
   }
</script>

<template>
    <RouterLink :to="'/addtaskdetail/'+taskid" class="btn btn-sm btn-success mb-3"> Tambah Activity</RouterLink>
    <table class="table table-sm table-bordered table-striped">
        <thead>
            <tr>
                <th>
                    No
                </th>
                <th>
                    Activity
                </th>
                <th>
                    Keterangan
                </th>
                <th class="text-center">
                    Status
                </th>
                <th class="text-center">
                    Action
                </th>
                <th class="text-center">
                    Set Status
                </th>
                
            </tr>
        </thead>
        <tbody>
            <tr v-if="props.taskdetail.length==0">
                <td colspan="6" class="text-center">
                    Data Kosong
                </td>
            </tr>
            <tr v-else v-for="(detail,index) in props.taskdetail">
                <td>
                    {{ index+1 }}
                </td>
                <td>
                    {{ detail.activity }}
                </td>
                <td>
                    {{ detail.keterangan }}
                </td>   
                <td class="text-center">
                     <small v-if="detail.status" class="badge badge-success">Selesai</small>
                    <small v-else class="badge badge-danger">Belum Selesai</small>
                </td>
                <td class="text-center">
                    <button @click="handleClick(detail.id)" class="btn btn-danger btn-sm">
                        Hapus
                    </button>
                    ||
                    <RouterLink :to="'/editdetail/'+detail.id" class="btn btn-warning btn-sm">
                        Edit
                    </RouterLink>
                </td>
                <td class="text-center">
                     <button v-if="!detail.status" @click="updatestatus(detail.id)" class="btn btn-success btn-sm">
                        Set Status
                    </button>
                </td>

            </tr>
        </tbody>

    </table>
</template>