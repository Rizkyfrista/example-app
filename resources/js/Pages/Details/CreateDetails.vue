<template>
    <div>
        <div class="card border-0 rounded shadow">
            <div class="card-body">
                <h4>Pendidikan</h4>
                <hr>
                <form @submit.prevent="storeDetails">
                    <div class="mb-3">
                        <label class="form-label">Jenjang Pendidikan Terakhir</label>
                        <input type="text" class="form-control" v-model="post.jenjangpendidikanterakhir">
                        <div v-if="errors.title" class="mt-2 alert alert-danger">
                            {{ errors.title }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Intitusi Terakhir</label>
                        <input type="text" class="form-control" v-model="post.namaintitusiterakhir">
                        <div v-if="errors.title" class="mt-2 alert alert-danger">
                            {{ errors.title }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jurusan</label>
                        <input type="text" class="form-control" v-model="post.jurusan">
                        <div v-if="errors.title" class="mt-2 alert alert-danger">
                            {{ errors.title }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tahun Lulus</label>
                        <input type="text" class="form-control" v-model="post.tahunlulus">
                        <div v-if="errors.title" class="mt-2 alert alert-danger">
                            {{ errors.title }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">IPK</label>
                        <input type="text" class="form-control" v-model="post.ipk">
                        <div v-if="errors.title" class="mt-2 alert alert-danger">
                            {{ errors.title }}
                        </div>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary btn-md shadow-sm me-2">SIMPAN</button>
                        <button type="reset" class="btn btn-warning btn-md shadow-sm">RESET</button>
                    </div>

                    <div class="card border-0 rounded shadow-sm">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Jenjang Pendidikan Terakhir</th>
                                        <th scope="col">Nama Intitusi Terakhir</th>
                                        <th scope="col">Jurusan</th>
                                        <th scope="col">Tahun Lulus</th>
                                        <th scope="col">IPK</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
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
        errors: Object
    },

    //define Composition Api
    setup() {

        //state posts
        const post = reactive({
            jenjangpendidikanterakhir: '',
            namaintitusiterakhir: '',
            jurusan: '',
            tahunlulus: '',
            ipk: ''
        })

        //function storePost
        function storePost() {

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
            storePost
        }

    }
}
</script>
