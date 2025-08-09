import { defineStore } from 'pinia'
import router from '../router/index'
import axios from 'axios'

export const useLoginStore = defineStore('loginStore', {
    state: () => ({
        baseURL: 'http://localhost:8000',
        userInfo: {
            name: null,
            email: null
        },
        isSignup: true,
        isLogin: false,
        isLoginError: false,
        isAdmin: false,
        returnUrl: null
    }),
    actions: {
        signup(signupObj) {
            axios.post(this.baseURL + '/signup', signupObj)
                .then(res => {
                    console.log(res)
                    axios.get(this.baseURL + '/users/' + res.data.user.id)
                        .then(res => {
                            console.log(res, 'Sign up')
                            this.userInfo = res.data
                            this.isSignup = false
                        })
                })
                .catch(err => {
                    console.log(err)
                })
        },
        login(loginObj) {
            axios.post(this.baseURL + '/api/login', loginObj)
                .then(res => {
                    console.log(res)
                    let token = res.data.accessToken
                    let userId = res.data.user.id
                    localStorage.setItem("access_token", token)
                    localStorage.setItem("access_id", userId)
                    this.getUserInfo()
                    // if(this.returnUrl) { //
                    //   router.push({ path: 'this.returnUrl' })
                    // }
                    console.log(this.returnUrl);
                })
                .catch(err => {
                    console.log(err)
                    this.isLogin = false
                    this.isLoginError = true
                })
        },
        getUserInfo() {
            let token = localStorage.getItem("access_token")
            let userId = localStorage.getItem("access_id")
            let config = {
                headers: {
                    "access-token": token,
                }
            }
            if (token !== null && userId !== null) {
                axios.get(this.baseURL + '/users/' + userId, config)
                    .then(res => {
                        console.log(res, this.returnUrl, '유저 정보 반환')
                        this.userInfo = res.data
                        this.isLogin = true
                        this.isLoginError = false
                        router.push(this.returnUrl || '/')
                        if (this.userInfo.email === 'admin@naver.com') {
                            this.isAdmin = true
                        }
                    })
            }
        },
        logout() {
            console.log('logout')
            localStorage.clear()
            this.isLogin = false
            this.isLoginError = false
            this.isAdmin = false
            this.userInfo = null
            router.push({ name: 'Home' })
        }
    }
})