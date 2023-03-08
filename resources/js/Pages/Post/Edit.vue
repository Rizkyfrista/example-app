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

                    <!-- PENDIDIKAN -->
                    <form @submit.prevent="storePendidikan(post.pendidikan_form.id)">
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
                                    <tr v-for="pendidikan in post.pendidikan_data" :key="pendidikan.id">
                                        <td>{{ pendidikan.jenjangpendidikanterakhir }}</td>
                                        <td>{{ pendidikan.namaintitusiakademik }}</td>
                                        <td>{{ pendidikan.jurusan }}</td>
                                        <td>{{ pendidikan.tahunlulus }}</td>
                                        <td>{{ pendidikan.ipk }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-primary me-2"
                                                v-on:click.prevent="editPendidikan(`${pendidikan.id}`)">Edit</button>
                                            <button class="btn btn-sm btn-danger"
                                                v-on:click.prevent="pendidikanDestroy(`${pendidikan.id}`)">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- RIWAYAT PELATIHAN -->
                    <form @submit.prevent="storeRiwayatPelatihan(post.riwayatpelatihan_form.id)">
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
                                    <tr v-for="riwayatpelatihan in post.riwayatpelatihan_data" :key="riwayatpelatihan.id">
                                        <td>{{ riwayatpelatihan.namakursusseminar }}</td>
                                        <td>{{ riwayatpelatihan.sertifikat }}</td>
                                        <td>{{ riwayatpelatihan.tahun }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-primary me-2"
                                                v-on:click.prevent="editPelatihan(`${riwayatpelatihan.id}`)">Edit</button>
                                            <button class="btn btn-sm btn-danger"
                                                v-on:click.prevent="pelatihanDestroy(`${riwayatpelatihan.id}`)">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- RIWAYAT PEKERJAAN -->
                    <form @submit.prevent="storeRiwayatPekerjaan(post.riwayatpekerjaan_form.id)">
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
                                    <tr v-for="riwayatpekerjaan in post.riwayatpekerjaan_data" :key="riwayatpekerjaan.id">
                                        <td>{{ riwayatpekerjaan.namaperusahaan }}</td>
                                        <td>{{ riwayatpekerjaan.posisiterakhir }}</td>
                                        <td>{{ riwayatpekerjaan.pendapatanterakhir }}</td>
                                        <td>{{ riwayatpekerjaan.tahun }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-primary me-2"
                                                v-on:click.prevent="editPekerjaan(`${riwayatpekerjaan.id}`)">Edit</button>
                                            <button class="btn btn-sm btn-danger"
                                                v-on:click.prevent="pekerjaanDestroy(`${riwayatpekerjaan.id}`)">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary btn-md shadow-sm me-2">UPDATE</button>
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
        errors: Object,
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
            pendidikan_form: {},
            pendidikan_data: props.post.pendidikann,
            riwayatpelatihan_form: {},
            riwayatpelatihan_data: props.post.pelatihann,
            riwayatpekerjaan_form: {},
            riwayatpekerjaan_data: props.post.pekerjaann,
            temp_pendidikan: null,
            temp_pelatihan: null,
            temp_pekerjaan: null,
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
            let pendidikan = post.pendidikan_data
            let riwayatpelatihan = post.riwayatpelatihan_data
            let riwayatpekerjaan = post.riwayatpekerjaan_data

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
                expectedsalary: expectedsalary,
                pendidikan: pendidikan,
                riwayatpelatihan: riwayatpelatihan,
                riwayatpekerjaan: riwayatpekerjaan,
            })
        }

        //function store data
        function storePendidikan(id) {
            if (!id) {
                const tempId = post.pendidikan_data.map(data => {
                    return data.id
                })
                const newId = tempId[tempId.length - 1] + 1;
                post.pendidikan_form['id'] = newId;
                post.pendidikan_data.push(post.pendidikan_form);
                post.pendidikan_form = {}
            } else {
                post.pendidikan_form['id'] = id;
                post.pendidikan_data.push(post.pendidikan_form);
                post.pendidikan_form = {}
            }
        }

        function storeRiwayatPelatihan(id) {
            if (!id) {
                const tempId = post.riwayatpelatihan_data.map(data => {
                    return data.id
                })
                const newId = tempId[tempId.length - 1] + 1;
                post.riwayatpelatihan_form['id'] = newId;
                post.riwayatpelatihan_data.push(post.riwayatpelatihan_form);
                post.riwayatpelatihan_form = {}
            } else {
                post.riwayatpelatihan_form['id'] = id;
                post.riwayatpelatihan_data.push(post.riwayatpelatihan_form);
                post.riwayatpelatihan_form = {}
            }
        }

        function storeRiwayatPekerjaan(id) {
            if (!id) {
                const tempId = post.riwayatpekerjaan_data.map(data => {
                    return data.id
                })
                const newId = tempId[tempId.length - 1] + 1;
                post.riwayatpekerjaan_form['id'] = newId;
                post.riwayatpekerjaan_data.push(post.riwayatpekerjaan_form);
                post.riwayatpekerjaan_form = {}
            } else {
                post.riwayatpekerjaan_form['id'] = id;
                post.riwayatpekerjaan_data.push(post.riwayatpekerjaan_form);
                post.riwayatpekerjaan_form = {}
            }
        }

        //function reset
        function resetPendidikan(id) {
            console.log('test')
            post.pendidikan_form = {}
        }

        function resetRiwayatPelatihan(id) {
            console.log('test')
            post.riwayatpelatihan_form = {}
        }

        function resetRiwayatPekerjaan(id) {
            console.log('test')
            post.riwayatpekerjaan_form = {}
        }

        //function edit
        function editPendidikan(id) {
            console.log(id);
            const filterData = post.pendidikan_data.filter(data => {
                return data.id == id;
            })
            if (post.pendidikan_form.id) {
                post.pendidikan_data.push(post.temp_pendidikan)
                post.temp_pendidikan = null;
            }

            if (filterData) {
                post.temp_pendidikan = filterData[0];
                post.pendidikan_form.id = filterData[0].id;
                post.pendidikan_form.jenjangpendidikanterakhir = filterData[0].jenjangpendidikanterakhir;
                post.pendidikan_form.namaintitusiakademik = filterData[0].namaintitusiakademik;
                post.pendidikan_form.jurusan = filterData[0].jurusan;
                post.pendidikan_form.tahunlulus = filterData[0].tahunlulus;
                post.pendidikan_form.ipk = filterData[0].ipk;

                post.pendidikan_data = post.pendidikan_data.filter(data => {
                    return data.id != id;
                })
            }
        }

        function editPelatihan(id) {
            console.log(id);
            const filterData = post.riwayatpelatihan_data.filter(data => {
                return data.id == id;
            })
            if (post.riwayatpelatihan_form.id) {
                post.riwayatpelatihan_data.push(post.temp_pelatihan)
                post.temp_pelatihan = null;
            }

            if (filterData) {
                post.temp_pelatihan = filterData[0];
                post.riwayatpelatihan_form.id = filterData[0].id;
                post.riwayatpelatihan_form.namakursusseminar = filterData[0].namakursusseminar;
                post.riwayatpelatihan_form.sertifikat = filterData[0].sertifikat;
                post.riwayatpelatihan_form.tahun = filterData[0].tahun;

                post.riwayatpelatihan_data = post.riwayatpelatihan_data.filter(data => {
                    return data.id != id;
                })
            }
        }

        function editPekerjaan(id) {
            console.log(id);
            const filterData = post.riwayatpekerjaan_data.filter(data => {
                return data.id == id;
            })
            if (post.riwayatpekerjaan_form.id) {
                post.riwayatpekerjaan_data.push(post.temp_pekerjaan)
                post.temp_pekerjaan = null;
            }

            if (filterData) {
                post.temp_pekerjaan = filterData[0];
                post.riwayatpekerjaan_form.id = filterData[0].id;
                post.riwayatpekerjaan_form.namaperusahaan = filterData[0].namaperusahaan;
                post.riwayatpekerjaan_form.posisiterakhir = filterData[0].posisiterakhir;
                post.riwayatpekerjaan_form.pendapatanterakhir = filterData[0].pendapatanterakhir;
                post.riwayatpekerjaan_form.tahun = filterData[0].tahun;

                post.riwayatpekerjaan_data = post.riwayatpekerjaan_data.filter(data => {
                    return data.id != id;
                })
            }
        }

        //function delete
        function pendidikanDestroy(id) {
            Inertia.delete('/posts/pendidikan/' + id, {
                preserveScroll: true,
                onSuccess: () => {
                    this.post.pendidikan_data = this.post.pendidikan_data.filter(data => {
                        return data.id != id;
                    })
                }
            })
        }

        function pelatihanDestroy(id) {
            Inertia.delete('/posts/pelatihan/' + id, {
                preserveScroll: true,
                onSuccess: () => {
                    this.post.riwayatpelatihan_data = this.post.riwayatpelatihan_data.filter(data => {
                        return data.id != id;
                    })
                }
            })
        }

        function pekerjaanDestroy(id) {
            Inertia.delete('/posts/pekerjaan/' + id, {
                preserveScroll: true,
                onSuccess: () => {
                    this.post.riwayatpekerjaan_data = this.post.riwayatpekerjaan_data.filter(data => {
                        return data.id != id;
                    })
                }
            })
        }

        return {
            post,
            updatePost,
            storePendidikan,
            storeRiwayatPelatihan,
            storeRiwayatPekerjaan,
            resetPendidikan,
            resetRiwayatPelatihan,
            resetRiwayatPekerjaan,
            editPendidikan,
            editPelatihan,
            editPekerjaan,
            pendidikanDestroy,
            pelatihanDestroy,
            pekerjaanDestroy,
        }
    }
}
</script>
