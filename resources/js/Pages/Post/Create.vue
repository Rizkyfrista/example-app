<template>
    <div>
        <div class="card border-0 rounded shadow">
            <div class="card-body">
                <h4>Application Form</h4>
                <hr>
                <!-- HEADER -->
                <form @submit.prevent="storePost">
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

                    <!-- PENDIDIKAN -->
                    <form @submit.prevent="storePendidikan">
                        <div class="mb-3">
                            <h4>Pendidikan</h4>
                            <hr>
                            <label class="form-label">Jenjang Pendidikan Terakhir</label>
                            <input type="text" class="form-control"
                                v-model="post.pendidikan_form.jenjangpendidikanterakhir">
                            <div v-if="errors.title" class="mt-2 alert alert-danger">
                                {{ errors.title }}
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Intitusi Akademik</label>
                            <input type="text" class="form-control" v-model="post.pendidikan_form.namaintitusiakademik">
                            <div v-if="errors.title" class="mt-2 alert alert-danger">
                                {{ errors.title }}
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jurusan</label>
                            <input type="text" class="form-control" v-model="post.pendidikan_form.jurusan">
                            <div v-if="errors.title" class="mt-2 alert alert-danger">
                                {{ errors.title }}
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tahun Lulus</label>
                            <input type="text" class="form-control" v-model="post.pendidikan_form.tahunlulus">
                            <div v-if="errors.title" class="mt-2 alert alert-danger">
                                {{ errors.title }}
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">IPK</label>
                            <input type="text" class="form-control" v-model="post.pendidikan_form.ipk">
                            <div v-if="errors.title" class="mt-2 alert alert-danger">
                                {{ errors.title }}
                            </div>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary btn-md shadow-sm me-2">TAMBAH DATA
                                PENDIDIKAN</button>
                            <button class="btn btn-warning btn-md shadow-sm"
                                v-on:click.prevent="resetPendidikan">RESET</button>
                        </div>
                    </form>

                    <div class="card border-0 rounded shadow-sm">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Jenjang Pendidikan Terakhir</th>
                                        <th scope="col">Nama Intitusi Akademik</th>
                                        <th scope="col">Jurusan</th>
                                        <th scope="col">Tahun Lulus</th>
                                        <th scope="col">IPK</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="pendidikan in post.pendidikan_data"
                                        :key="pendidikan.jenjangpendidikanterakhir">
                                        <td>{{ pendidikan.jenjangpendidikanterakhir }}</td>
                                        <td>{{ pendidikan.namaintitusiakademik }}</td>
                                        <td>{{ pendidikan.jurusan }}</td>
                                        <td>{{ pendidikan.tahunlulus }}</td>
                                        <td>{{ pendidikan.ipk }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-primary me-2"
                                                v-on:click.prevent="editPendidikan(`${pendidikan.jenjangpendidikanterakhir}`)">Edit</button>
                                            <button class="btn btn-sm btn-danger"
                                                v-on:click.prevent="deletePendidikan(`${pendidikan.jenjangpendidikanterakhir}`)">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- RIWAYAT PELATIHAN -->
                    <form @submit.prevent="storeRiwayatPelatihan">
                        <div class="mb-3">
                            <h4>Riwayat Pelatihan</h4>
                            <hr>
                            <label class="form-label">Nama Kursus / Seminar</label>
                            <input type="text" class="form-control" v-model="post.riwayatpelatihan_form.namakursusseminar">
                            <div v-if="errors.title" class="mt-2 alert alert-danger">
                                {{ errors.title }}
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Sertifikat (ada/tidak)</label>
                            <input type="text" class="form-control" v-model="post.riwayatpelatihan_form.sertifikat">
                            <div v-if="errors.title" class="mt-2 alert alert-danger">
                                {{ errors.title }}
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tahun</label>
                            <input type="text" class="form-control" v-model="post.riwayatpelatihan_form.tahun">
                            <div v-if="errors.title" class="mt-2 alert alert-danger">
                                {{ errors.title }}
                            </div>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary btn-md shadow-sm me-2">TAMBAH DATA
                                RIWAYAT PELATIHAN</button>
                            <button class="btn btn-warning btn-md shadow-sm"
                                v-on:click.prevent="resetRiwayatPelatihan">RESET</button>
                        </div>
                    </form>

                    <div class="card border-0 rounded shadow-sm">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nama Kursus / Seminar</th>
                                        <th scope="col">Sertifikat (ada/tidak)</th>
                                        <th scope="col">Tahun</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="riwayatpelatihan in post.riwayatpelatihan_data"
                                        :key="riwayatpelatihan.namakursusseminar">
                                        <td>{{ riwayatpelatihan.namakursusseminar }}</td>
                                        <td>{{ riwayatpelatihan.sertifikat }}</td>
                                        <td>{{ riwayatpelatihan.tahun }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-primary me-2"
                                                v-on:click.prevent="editRiwayatPelatihan(`${riwayatpelatihan.namakursusseminar}`)">Edit</button>
                                            <button class="btn btn-sm btn-danger"
                                                v-on:click.prevent="deleteRiwayatPelatihan(`${riwayatpelatihan.namakursusseminar}`)">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- RIWAYAT PEKERJAAN -->
                    <form @submit.prevent="storeRiwayatPekerjaan">
                        <div class="mb-3">
                            <h4>Riwayat Pekerjaan</h4>
                            <hr>
                            <label class="form-label">Nama Perusahaan</label>
                            <input type="text" class="form-control" v-model="post.riwayatpekerjaan_form.namaperusahaan">
                            <div v-if="errors.title" class="mt-2 alert alert-danger">
                                {{ errors.title }}
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Posisi Terakhir</label>
                            <input type="text" class="form-control" v-model="post.riwayatpekerjaan_form.posisiterakhir">
                            <div v-if="errors.title" class="mt-2 alert alert-danger">
                                {{ errors.title }}
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pendapatan Terakhir</label>
                            <input type="text" class="form-control" v-model="post.riwayatpekerjaan_form.pendapatanterakhir">
                            <div v-if="errors.title" class="mt-2 alert alert-danger">
                                {{ errors.title }}
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tahun</label>
                            <input type="text" class="form-control" v-model="post.riwayatpekerjaan_form.tahun">
                            <div v-if="errors.title" class="mt-2 alert alert-danger">
                                {{ errors.title }}
                            </div>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary btn-md shadow-sm me-2">TAMBAH DATA
                                RIWAYAT PEKERJAAN</button>
                            <button class="btn btn-warning btn-md shadow-sm"
                                v-on:click.prevent="resetRiwayatPekerjaan">RESET</button>
                        </div>
                    </form>

                    <div class="card border-0 rounded shadow-sm">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nama Perusahaan</th>
                                        <th scope="col">Posisi Terakhir</th>
                                        <th scope="col">Pendapatan Terakhir</th>
                                        <th scope="col">Tahun</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="riwayatpekerjaan in post.riwayatpekerjaan_data"
                                        :key="riwayatpekerjaan.namaperusahaan">
                                        <td>{{ riwayatpekerjaan.namaperusahaan }}</td>
                                        <td>{{ riwayatpekerjaan.posisiterakhir }}</td>
                                        <td>{{ riwayatpekerjaan.pendapatanterakhir }}</td>
                                        <td>{{ riwayatpekerjaan.tahun }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-primary me-2"
                                                v-on:click.prevent="editRiwayatPekerjaan(`${riwayatpekerjaan.namaperusahaan}`)">Edit</button>
                                            <button class="btn btn-sm btn-danger"
                                                v-on:click.prevent="deleteRiwayatPekerjaan(`${riwayatpekerjaan.namaperusahaan}`)">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary btn-md shadow-sm me-2"
                            v-on:click.prevent="storePost">SIMPAN</button>
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
    // data: {
    //     pendidikan: null,
    // },
    // method: {
    //     storePendidikan() {
    //         this.post.pendidikan_form.push({ test: 'test' });
    //     },
    // },

    //define Composition Api
    setup() {

        //state posts
        const post = reactive({
            firstname: '',
            lastname: '',
            address: '',
            city_state_zip: '',
            homephone: '',
            cellphone: '',
            email: '',
            appliedposition: '',
            expectedsalary: '',
            pendidikan_form: {},
            pendidikan_data: [],
            riwayatpelatihan_form: {},
            riwayatpelatihan_data: [],
            riwayatpekerjaan_form: {},
            riwayatpekerjaan_data: [],
        });

        //function storePost
        function storePost() {

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
            let pendidikan = post.pendidikan_data
            let riwayatpelatihan = post.riwayatpelatihan_data
            let riwayatpekerjaan = post.riwayatpekerjaan_data

            //send data
            Inertia.post('/posts/', {
                firstname: firstname,
                lastname: lastname,
                address: address,
                city_state_zip: city_state_zip,
                homephone: homephone,
                cellphone: cellphone,
                email: email,
                appliedposition: appliedposition,
                expectedsalary: expectedsalary,
                pendidikan: pendidikan,
                riwayatpelatihan: riwayatpelatihan,
                riwayatpekerjaan: riwayatpekerjaan,
            })
        }

        //function store data
        function storePendidikan() {
            console.log(post.pendidikan_form);
            post.pendidikan_data.push(post.pendidikan_form);
            post.pendidikan_form = {}
        }

        function storeRiwayatPelatihan() {
            console.log(post.riwayatpelatihan_form);
            post.riwayatpelatihan_data.push(post.riwayatpelatihan_form);
            post.riwayatpelatihan_form = {}
        }

        function storeRiwayatPekerjaan() {
            console.log(post.riwayatpekerjaan_form);
            post.riwayatpekerjaan_data.push(post.riwayatpekerjaan_form);
            post.riwayatpekerjaan_form = {}
        }

        //function reset
        function resetPendidikan() {
            console.log('test')
            post.pendidikan_form = {}
        }

        function resetRiwayatPelatihan() {
            console.log('test')
            post.riwayatpelatihan_form = {}
        }

        function resetRiwayatPekerjaan() {
            console.log('test')
            post.riwayatpekerjaan_form = {}
        }

        //function edit and delete
        function editPendidikan(id) {
            for (var i = 0; i < post.pendidikan_data.length; i++) {

                if (Object.values(post.pendidikan_data[i]).indexOf(id) !== -1) {
                    post.pendidikan_form.jenjangpendidikanterakhir = post.pendidikan_data[i].jenjangpendidikanterakhir
                    post.pendidikan_form.namaintitusiakademik = post.pendidikan_data[i].namaintitusiakademik
                    post.pendidikan_form.jurusan = post.pendidikan_data[i].jurusan
                    post.pendidikan_form.tahunlulus = post.pendidikan_data[i].tahunlulus
                    post.pendidikan_form.ipk = post.pendidikan_data[i].ipk
                    console.log('data ditemukan')
                    post.pendidikan_data.splice(i, 1);
                } else {
                    console.log('data tidak ditemukan')
                }
            }
        }

        function deletePendidikan(id) {
            for (var i = 0; i < post.pendidikan_data.length; i++) {

                if (Object.values(post.pendidikan_data[i]).indexOf(id) !== -1) {
                    console.log('data ditemukan')
                    post.pendidikan_data.splice(i, 1);
                } else {
                    console.log('data tidak ditemukan')
                }
            }
        }

        function editRiwayatPelatihan(id) {
            for (var i = 0; i < post.riwayatpelatihan_data.length; i++) {

                if (Object.values(post.riwayatpelatihan_data[i]).indexOf(id) !== -1) {
                    post.riwayatpelatihan_form.namakursusseminar = post.riwayatpelatihan_data[i].namakursusseminar
                    post.riwayatpelatihan_form.sertifikat = post.riwayatpelatihan_data[i].sertifikat
                    post.riwayatpelatihan_form.tahun = post.riwayatpelatihan_data[i].tahun
                    console.log('data ditemukan')
                    post.riwayatpelatihan_data.splice(i, 1);
                } else {
                    console.log('data tidak ditemukan')
                }
            }
        }

        function deleteRiwayatPelatihan(id) {
            for (var i = 0; i < post.riwayatpelatihan_data.length; i++) {

                if (Object.values(post.riwayatpelatihan_data[i]).indexOf(id) !== -1) {
                    console.log('data ditemukan')
                    post.riwayatpelatihan_data.splice(i, 1);
                } else {
                    console.log('data tidak ditemukan')
                }
            }
        }

        function editRiwayatPekerjaan(id) {
            for (var i = 0; i < post.riwayatpekerjaan_data.length; i++) {

                if (Object.values(post.riwayatpekerjaan_data[i]).indexOf(id) !== -1) {
                    post.riwayatpekerjaan_form.namaperusahaan = post.riwayatpekerjaan_data[i].namaperusahaan
                    post.riwayatpekerjaan_form.posisiterakhir = post.riwayatpekerjaan_data[i].posisiterakhir
                    post.riwayatpekerjaan_form.pendapatanterakhir = post.riwayatpekerjaan_data[i].pendapatanterakhir
                    post.riwayatpekerjaan_form.tahun = post.riwayatpekerjaan_data[i].tahun
                    console.log('data ditemukan')
                    post.riwayatpekerjaan_data.splice(i, 1);
                } else {
                    console.log('data tidak ditemukan')
                }
            }
        }

        function deleteRiwayatPekerjaan(id) {
            for (var i = 0; i < post.riwayatpekerjaan_data.length; i++) {

                if (Object.values(post.riwayatpekerjaan_data[i]).indexOf(id) !== -1) {
                    console.log('data ditemukan')
                    post.riwayatpekerjaan_data.splice(i, 1);
                } else {
                    console.log('data tidak ditemukan')
                }
            }
        }

        return {
            post,
            storePost,
            storePendidikan,
            storeRiwayatPelatihan,
            storeRiwayatPekerjaan,
            resetPendidikan,
            resetRiwayatPelatihan,
            resetRiwayatPekerjaan,
            editPendidikan,
            deletePendidikan,
            editRiwayatPelatihan,
            deleteRiwayatPelatihan,
            editRiwayatPekerjaan,
            deleteRiwayatPekerjaan,
        }

    },

    methods: {

    }
}
</script>
