<template>
           <div class="login-page bg-body-secondary">
           <div class="login-box">
        <div class="card">
            <div class="card-header text-center">
                <h5 class="m-0">Login Page</h5>
            </div>
            <div class="card-body login-card-body">
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input  v-model="email" id="email" type="text" name="username" class="form-control" placeholder="Email" />
                        <div class="input-group-text"><span class="bi bi-envelope"></span></div>
                    </div>
                    <div class="input-group mb-3">
                        <input   v-model="password" id="password" type="password" name="password" class="form-control"
                            placeholder="Password" />
                        <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="d-grid gap-2">
                                <button @click="loginStore.login({email, password})"  class="btn btn-primary">Login</button>
                            </div>
                        </div>
                    </div>
                </form>
                <br>
             
            </div>
        </div>
    </div>
    </div>

</template>

<script>
import { useLoginStore } from '../stores/login' 
export default {
  data() {
    return {
      email: null, 
      password: null 
    }
  },
  setup() {
    const loginStore = useLoginStore() 
    return { loginStore } 
  }
}
</script>
