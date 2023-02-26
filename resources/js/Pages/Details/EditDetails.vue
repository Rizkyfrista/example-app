<template>
    <div>
        <div class="card border-0 rounded shadow">
            <div class="card-body">
                <h4>EDIT POST</h4>
                <hr>
                <form @submit.prevent="updatePost">
                    <div class="mb-3">
                        <label class="form-label">Jenjang Pendidikan Terakhir</label>
                        <input type="text" class="form-control" v-model="details.jenjangpendidikanterakhir">
                        <div v-if="errors.title" class="mt-2 alert alert-danger">
                            {{ errors.title }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Intitusi Terakhir</label>
                        <input type="text" class="form-control" v-model="details.namaintitusiterakhir">
                        <div v-if="errors.title" class="mt-2 alert alert-danger">
                            {{ errors.title }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jurusan</label>
                        <input type="text" class="form-control" v-model="details.jurusan">
                        <div v-if="errors.title" class="mt-2 alert alert-danger">
                            {{ errors.title }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tahun Lulus</label>
                        <input type="text" class="form-control" v-model="details.tahunlulus">
                        <div v-if="errors.title" class="mt-2 alert alert-danger">
                            {{ errors.title }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">IPK</label>
                        <input type="text" class="form-control" v-model="details.ipk">
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
            jenjangpendidikanterakhir: '',
            namaintitusiterakhir: '',
            jurusan: '',
            tahunlulus: '',
            ipk: ''
        })

        //function storePost
        function storeDetails() {

            //define variable
            let jenjangpendidikanterakhir = post.jenjangpendidikanterakhir
            let namaintitusiterakhir = post.namaintitusiterakhir
            let jurusan = post.jurusan
            let tahunlulus = post.tahunlulus
            let ipk = post.ipk

            //send data
            Inertia.details('/posts/', {
                jenjangpendidikanterakhir: jenjangpendidikanterakhir,
                namaintitusiterakhir: namaintitusiterakhir,
                jurusan: jurusan,
                tahunlulus: tahunlulus,
                ipk: ipk,
            })

        }

        return {
            details,
            storeDetails
        }

    }
}
</script>
