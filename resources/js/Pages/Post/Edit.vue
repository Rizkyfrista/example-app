<template>
    <div>
        <div class="card border-0 rounded shadow">
            <div class="card-body">
                <h4>EDIT POST</h4>
                <hr>
                <h4>Application Form</h4>
                <hr>
                <!-- HEADER -->
                <form @submit.prevent="updatePost">
                    <div class="mb-3">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control" v-model="post.firstname">
                        <div v-if="errors.title" class="mt-2 alert alert-danger">
                            {{ errors.title }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control" v-model="post.lastname">
                        <div v-if="errors.title" class="mt-2 alert alert-danger">
                            {{ errors.title }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" v-model="post.address">
                        <div v-if="errors.title" class="mt-2 alert alert-danger">
                            {{ errors.title }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">City/State/Zip</label>
                        <input type="text" class="form-control" v-model="post.city_state_zip">
                        <div v-if="errors.title" class="mt-2 alert alert-danger">
                            {{ errors.title }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Home Phone</label>
                        <input type="text" class="form-control" v-model="post.homephone">
                        <div v-if="errors.title" class="mt-2 alert alert-danger">
                            {{ errors.title }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cell Phone</label>
                        <input type="text" class="form-control" v-model="post.cellphone">
                        <div v-if="errors.title" class="mt-2 alert alert-danger">
                            {{ errors.title }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" v-model="post.email">
                        <div v-if="errors.title" class="mt-2 alert alert-danger">
                            {{ errors.title }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Applied Position</label>
                        <input type="text" class="form-control" v-model="post.appliedposition">
                        <div v-if="errors.title" class="mt-2 alert alert-danger">
                            {{ errors.title }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Expected Salary</label>
                        <input type="text" class="form-control" v-model="post.expectedsalary">
                        <div v-if="errors.title" class="mt-2 alert alert-danger">
                            {{ errors.title }}
                        </div>
                    </div>


                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary btn-md shadow-sm me-2">UPDATE</button>
                        <button type="reset" class="btn btn-warning btn-md shadow-sm">RESET</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
//import layout
import LayoutApp from '../../Layouts/App.vue'

import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'

export default {

    //layout
    layout: LayoutApp,

    //props
    props: {
        post: Object,
        errors: Object
    },

    //define Composition Api
    setup(props) {

        //state posts
        const post = reactive({
            firstname: props.post.firstname,
            lastname: props.post.lastname,
            address: props.post.address,
            city_state_zip: props.post.city_state_zip,
            homephone: props.post.homephone,
            cellphone: props.post.cellphone,
            email: props.post.email,
            appliedposition: props.post.appliedposition,
            expectedsalary: props.post.expectedsalary,
        })

        //function updatePost
        function updatePost() {

            //define variable
            let firstname = post.firstname
            let lastname = post.lastname
            let address = post.address
            let city_state_zip = post.city_state_zip
            let homephone = post.homephone
            let cellphone = post.cellphone
            let email = post.email
            let appliedposition = post.appliedposition
            let expectedsalary = post.expectedsalary

            //send data
            Inertia.put(`/posts/${props.post.id}`, {
                firstname: firstname,
                lastname: lastname,
                address: address,
                city_state_zip: city_state_zip,
                homephone: homephone,
                cellphone: cellphone,
                email: email,
                appliedposition: appliedposition,
                expectedsalary: expectedsalary
            })

        }

        return {
            post,
            updatePost
        }

    }
}
</script>
